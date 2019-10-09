<?php

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('User_model');
        $this->load->model('Token_model');
    }

    //user login function
    public function index()
    {
        if ($this->session->userdata('email') != null) {
            redirect(base_url());
        }
        //validation rules
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');

        //title page
        $data['title'] = "Login";

        //load header
        $this->load->view('style/header', $data);

        if ($this->form_validation->run() == false) {
            //validation fail / default page
            $this->load->view('auth/login');
        } else {
            //validation success
            $this->_login();
        }

        //load footer
        $this->load->view('style/footer');
    }

    //login process
    private function _login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $userData = $this->User_model->getUserData($email);
        //check user
        if ($userData) {
            //email exist
            if ($userData['is_active'] == 1) {
                //active
                if (password_verify($password, $userData['password'])) {
                    //password matches
                    $data['user'] = [
                        'name' => $userData['full_name'],
                        'email' => $userData['email'],
                    ];
                    //set session
                    $this->session->set_userdata($data['user']);
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                    Selamat datang!
                    </div>');
                    redirect(base_url('profile'));
                } else {
                    //password not matches
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                    Password salah!
                    </div>');
                    redirect('login');
                }
            } else {
                //not active
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Mohon periksa email untuk aktivasi akun
                </div>');
                redirect('login');
            }
        } else {
            //email not exist
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Email tidak valid atau belum terdaftar
            </div>');
            redirect('login');
        }
    }

    //user register function
    public function register()
    {
        if ($this->session->userdata('email') != null) {
            redirect(base_url());
        }
        //validation rules
        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
            'is_unique' => 'email already used'
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[6]|matches[password2]', [
            'length' => 'Password terlalu pendek (minimal 6 karakter)',
            'matches[password2]' => 'Kedua password tidak cocok',
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

        //title page
        $data['title'] = "Register";
        //load header
        $this->load->view('style/header', $data);

        if ($this->form_validation->run() == false) {
            //validation fail / default page
            $this->load->view('auth/register');
        } else {
            //validation success
            $data['user'] = [
                'nama_lengkap' => htmlspecialchars($this->input->post('name', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'is_active' => 0,
            ];

            //input database
            $this->User_model->register($data['user']);

            //token
            $token = base64_encode(random_bytes(32));
            $data['user_token'] = [
                'email' => $this->input->post('email', true),
                'token' => $token
            ];
            //input token
            $this->Token_model->insertToken($data['user_token']);

            //data email
            $data['email'] = [
                'type' => 'activation',
                'token' => $token,
                'email' => $data['user_token']['email'],
                'subject' => 'Aktivasi akun',
            ];
            //send email
            $this->_sendEmail($data['email']);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Mohon periksa email anda untuk aktivasi
          </div>');
            redirect(base_url('auth/activate_reminder'));
        }

        //load footer
        $this->load->view('style/footer');
    }

    //send email, 
    // require : $data => array('email','token','type','subject') 
    private function _sendEmail($data)
    {
        //email config
        $config = [
            'protocol'  => 'smtp',
            'smtp_host' => 'ssl://smtp.gmail.com',
            'smtp_port' => 465,
            'smtp_user' => 'forum.cagar.budaya@gmail.com',
            'smtp_pass' => 'forumcagbudRPL6',
            'mailtype'  => 'html',
            'charset'   => 'utf-8',
            'crlf'      => "\r\n",
            'newline'   => "\r\n",
            'wordwrap'  => TRUE,
        ];
        $this->load->library('email');
        $this->email->initialize($config);

        //email info
        $this->email->from('forum.cagar.budaya@gmail.com', 'CAGBUD Army');
        $this->email->to($data['email']);
        $this->email->subject($data['subject']);

        switch ($data['type']) {
            case 'activation':
                $this->email->message('<!DOCTYPE html>
<html>
	<head>
		<title>Email Activation</title>
		</head>
		<body>
			<table border="0" cellpadding="0" cellspacing="0" width="100%" style="table-layout:fixed;background-color:#F9F9F9;" id="bodyTable">
				<tbody>
					<tr>
						<td align="center" valign="top" style="padding-right:10px;padding-left:10px;" id="bodyCell">
							<table border="0" cellpadding="0" cellspacing="0" style="max-width:600px; margin-top: 60px" width="100%" class="wrapperBody">
								<tbody>
									<tr>
										<td align="center" valign="top">
											<table border="0" cellpadding="0" cellspacing="0" style="background-color:#FFFFFF;border-color:#E5E5E5; border-style:solid; border-width:0 1px 1px 1px;" width="100%" class="tableCard">
												<tbody>
													<tr>
														<td height="5" style="background-color:#00384f;font-size:1px;line-height:3px;" class="topBorder">&nbsp;</td>
													</tr>
													<tr>
														<td align="center" valign="top" style="padding-top:30px;padding-bottom:5px;padding-left:20px;padding-right:20px;" class="mainTitle">
															<h2 class="text" style="color:#000000; font-family: Poppins, Helvetica, Arial, sans-serif; font-size:28px; font-weight:500; font-style:normal; letter-spacing:normal; line-height:36px; text-transform:none; text-align:center; padding:0; margin:0">Aktivasi Akun</h2>
														</td>
													</tr>
													<tr>
														<td align="center" valign="top" style="padding-left:20px;padding-right:20px;" class="containtTable ui-sortable">
															<table border="0" cellpadding="0" cellspacing="0" width="100%" class="tableDescription">
																<tbody>
																	<tr>
																		<td align="center" valign="top" style="padding-bottom:20px;" class="description">
																			<p class="text" style="color:#666666; font-family: Open Sans, Helvetica, Arial, sans-serif; font-size:14px; font-weight:400; font-style:normal; letter-spacing:normal; line-height:22px; text-transform:none; text-align:center; padding:0; margin:0">
																			Terima kasih telah bergabung bersama kami. <br>Tekan tombol dibawah untuk mengaktifkan akun anda.
																			</p>
																		</td>
																	</tr>
																</tbody>
															</table>
															<table border="0" cellpadding="0" cellspacing="0" width="100%" class="tableButton">
																<tbody>
																	<tr>
																		<td align="center" valign="top" style="padding-top:20px;padding-bottom:20px;">
																			<table align="center" border="0" cellpadding="0" cellspacing="0">
																				<tbody>
																					<tr>
																						<td align="center" class="ctaButton" style="background-color:#00384f;padding-top:12px;padding-bottom:12px;padding-left:35px;padding-right:35px;border-radius:50px"> <a class="text" href="' . base_url() . 'auth/verify?email=' . $data['email'] . '&token=' . urlencode($data['token']) . '" target="_blank" style="color:#FFFFFF; font-family:Poppins, Helvetica, Arial, sans-serif; font-size:13px; font-weight:600; font-style:normal;letter-spacing:1px; line-height:20px; text-transform:uppercase; text-decoration:none; display:block"> Aktifkan akun </a>
																						</td>
																					</tr>
																				</tbody>
																			</table>
																		</td>
																	</tr>
																</tbody>
															</table>
														</td>
													</tr>
													<tr>
														<td height="20" style="font-size:1px;line-height:1px;">&nbsp;</td>
													</tr>
													<tr>
														<td align="center" valign="middle" style="padding-bottom: 40px;" class="emailRegards"></td>
													</tr>
												</tbody>
											</table>
											<table border="0" cellpadding="0" cellspacing="0" width="100%" class="space">
												<tbody>
													<tr>
														<td height="30" style="font-size:1px;line-height:1px;">&nbsp;</td>
													</tr>
												</tbody>
											</table>
										</td>
									</tr>
								</tbody>
							</table>
							<table border="0" cellpadding="0" cellspacing="0" style="max-width:600px;" width="100%" class="wrapperFooter">
								<tbody>
									<tr>
										<td align="center" valign="top">
											<table border="0" cellpadding="0" cellspacing="0" width="100%" class="footer">
												<tbody>
													<tr>
														<td align="center" valign="top" style="padding: 10px 10px 5px;" class="brandInfo">
															<p class="text" style="color:#777777; font-family:Open Sans, Helvetica, Arial, sans-serif; font-size:12px; font-weight:400; font-style:normal; letter-spacing:normal; line-height:20px; text-transform:none; text-align:center; padding:0; margin:0;">©&nbsp; Tugas Akhir RPL 2019 | RPL A </p>
														</td>
													</tr>
													<tr>
														<td height="30" style="font-size:1px;line-height:1px;">&nbsp;</td>
													</tr>
												</tbody>
											</table>
										</td>
									</tr>
									<tr>
										<td height="30" style="font-size:1px;line-height:1px;">&nbsp;</td>
									</tr>
								</tbody>
							</table>
						</td>
					</tr>
				</tbody>
			</table>
	</body>
</html>');
                break;
            case 'forgot':
                $this->email->message('<!DOCTYPE html>
                <html>
                    <head>
                        <title>Reset Password</title>
                        </head>
                        <body>
                            <table border="0" cellpadding="0" cellspacing="0" width="100%" style="table-layout:fixed;background-color:#F9F9F9;" id="bodyTable">
                                <tbody>
                                    <tr>
                                        <td align="center" valign="top" style="padding-right:10px;padding-left:10px;" id="bodyCell">
                                            <table border="0" cellpadding="0" cellspacing="0" style="max-width:600px; margin-top: 60px" width="100%" class="wrapperBody">
                                                <tbody>
                                                    <tr>
                                                        <td align="center" valign="top">
                                                            <table border="0" cellpadding="0" cellspacing="0" style="background-color:#FFFFFF;border-color:#E5E5E5; border-style:solid; border-width:0 1px 1px 1px;" width="100%" class="tableCard">
                                                                <tbody>
                                                                    <tr>
                                                                        <td height="5" style="background-color:#00384f;font-size:1px;line-height:3px;" class="topBorder">&nbsp;</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td align="center" valign="top" style="padding-top:30px;padding-bottom:5px;padding-left:20px;padding-right:20px;" class="mainTitle">
                                                                            <h2 class="text" style="color:#000000; font-family: Poppins, Helvetica, Arial, sans-serif; font-size:28px; font-weight:500; font-style:normal; letter-spacing:normal; line-height:36px; text-transform:none; text-align:center; padding:0; margin:0">Atur Ulang Sandi</h2>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td align="center" valign="top" style="padding-left:20px;padding-right:20px;" class="containtTable ui-sortable">
                                                                            <table border="0" cellpadding="0" cellspacing="0" width="100%" class="tableDescription">
                                                                                <tbody>
                                                                                    <tr>
                                                                                        <td align="center" valign="top" style="padding-bottom:20px;" class="description">
                                                                                            <p class="text" style="color:#666666; font-family: Open Sans, Helvetica, Arial, sans-serif; font-size:14px; font-weight:400; font-style:normal; letter-spacing:normal; line-height:22px; text-transform:none; text-align:center; padding:0; margin:0">
                                                                                            Tekan tombol dibawah untuk mengatur ulang sandi akun anda.
                                                                                            </p>
                                                                                        </td>
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>
                                                                            <table border="0" cellpadding="0" cellspacing="0" width="100%" class="tableButton">
                                                                                <tbody>
                                                                                    <tr>
                                                                                        <td align="center" valign="top" style="padding-top:20px;padding-bottom:20px;">
                                                                                            <table align="center" border="0" cellpadding="0" cellspacing="0">
                                                                                                <tbody>
                                                                                                    <tr>
                                                                                                        <td align="center" class="ctaButton" style="background-color:#00384f;padding-top:12px;padding-bottom:12px;padding-left:35px;padding-right:35px;border-radius:50px"> <a class="text" href="' . base_url('auth/resetpassword?email=' . $data['email'] . '&token=' . urlencode($data['token'])) . '" target="_blank" style="color:#FFFFFF; font-family:Poppins, Helvetica, Arial, sans-serif; font-size:13px; font-weight:600; font-style:normal;letter-spacing:1px; line-height:20px; text-transform:uppercase; text-decoration:none; display:block"> Reset</a>
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                </tbody>
                                                                                            </table>
                                                                                        </td>
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td height="20" style="font-size:1px;line-height:1px;">&nbsp;</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td align="center" valign="middle" style="padding-bottom: 40px;" class="emailRegards"></td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                            <table border="0" cellpadding="0" cellspacing="0" width="100%" class="space">
                                                                <tbody>
                                                                    <tr>
                                                                        <td height="30" style="font-size:1px;line-height:1px;">&nbsp;</td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <table border="0" cellpadding="0" cellspacing="0" style="max-width:600px;" width="100%" class="wrapperFooter">
                                                <tbody>
                                                    <tr>
                                                        <td align="center" valign="top">
                                                            <table border="0" cellpadding="0" cellspacing="0" width="100%" class="footer">
                                                                <tbody>
                                                                    <tr>
                                                                        <td align="center" valign="top" style="padding: 10px 10px 5px;" class="brandInfo">
                                                                            <p class="text" style="color:#777777; font-family:Open Sans, Helvetica, Arial, sans-serif; font-size:12px; font-weight:400; font-style:normal; letter-spacing:normal; line-height:20px; text-transform:none; text-align:center; padding:0; margin:0;">©&nbsp; Tugas Akhir RPL 2019 | RPL A </p>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td height="30" style="font-size:1px;line-height:1px;">&nbsp;</td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td height="30" style="font-size:1px;line-height:1px;">&nbsp;</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                    </body>
                </html>');
                break;
        }

        if ($this->email->send()) {
            //email send success
            return true;
        } else {
            //email send got error
            echo $this->email->print_debugger();
            die;
        }
    }

    //verify token from email 
    public function verify()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');
        //check email on table user_token
        $emailCheck = $this->Token_model->getData('email', $email);
        //check token on table user_token
        $tokenCheck = $this->Token_model->getData('token', $token);

        if ($emailCheck) {
            //email matches
            if ($tokenCheck) {
                //token matches
                //activate user account
                $this->User_model->activateUser($email);
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                Aktivasi Berhasil! Silakan login untuk melanjutkan
                </div>');
                redirect('login');
            } else {
                //token false
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Aktivasi gagal! mohon gunakan kode token yang valid
                </div>');
                redirect('login');
            }
        } else {
            //email false
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Aktivasi gagal! mohon gunakan email yang terdaftar
            </div>');
            redirect('login');
        }
    }

    //just show remider activation email page
    public function activate_reminder()
    {
        $data['title'] = 'Activation';
        $this->load->view('style/header', $data);
        $this->load->view('auth/activate_reminder');
        $this->load->view('style/footer');
    }

    //logout
    public function logout()
    {
        if ($this->session->userdata('email') != null) {
            //if user login
            $this->session->unset_userdata('email');
            $this->session->unset_userdata('role_id');
            $this->session->set_flashdata('message', '<div class=" alert alert-success" role="alert">
            Anda berhasil logout
        </div>');
            redirect('login');
        } else {
            //if user not login
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Anda belum melakukan login
        </div>');
            redirect('login');
        }
    }

    //enter email to get reset email
    public function forgotPassword()
    {
        $data['title'] = "Forgot password";
        $this->load->view('style/header', $data);

        //validation
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');

        if ($this->form_validation->run() == false) {
            //validation fail / default page
            $this->load->view('auth/forgot');
        } else {
            //validation success
            $email = $this->input->post('email');
            $emailCheck = $this->User_model->getUserData($email);
            if ($emailCheck) {
                //email valid
                if ($emailCheck['is_active'] == 0) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                        Email belum diaktivasi
                        </div>');
                    redirect('forgot');
                } else {
                    //email activated; do reset
                    $token = base64_encode(random_bytes(32));
                    $data['user_token'] = [
                        'email' => $email,
                        'token' => $token
                    ];
                    //input token
                    $this->Token_model->insertToken($data['user_token']);

                    //data email
                    $data['email'] = [
                        'type' => 'forgot',
                        'token' => $token,
                        'email' => $data['user_token']['email'],
                        'subject' => 'Resetting Password',
                    ];
                    //send email
                    $this->_sendEmail($data['email']);

                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                        Mohon periksa email anda untuk mengatur ulang sandi
                        </div>');
                    redirect('forgot');
                }
            } else {
                //email not valid
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                    Email tidak ditemukan
                    </div>');
                redirect('forgot');
            }
        }

        $this->load->view('style/footer');
    }

    //validate link email and token from email
    public function resetPassword()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');
        //check email on table user_token
        $emailCheck = $this->Token_model->getData('email', $email);

        if ($emailCheck) {
            //email matches
            //check token on table user_token
            $tokenCheck = $this->Token_model->getData('token', $token);
            if ($tokenCheck) {
                //token matches
                $this->session->set_userdata('reset_pass', $email);
                //reset password
                $this->changePassword();
                //delete token
                $this->Token_model->deleteToken($token);
            } else {
                //token false
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                 Atur ulang gagal! mohon gunakan kode yang valid
                 </div>');
                redirect('forgot');
            }
        } else {
            //email false
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
             Atur ulang gagal! mohon gunakan email yang terdaftar
             </div>');
            redirect('forgot');
        }
    }

    //update new password
    public function changePassword()
    {
        $data['title'] = "Change Password";
        $this->load->view('style/header', $data);

        if (!$this->session->userdata('reset_pass')) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
             Mohon gunakan link dari email anda
             </div>');
            redirect('login');
        }
        //validation
        $this->form_validation->set_rules('password1', 'New Password', 'required|trim|min_length[6]|matches[password2]');
        $this->form_validation->set_rules('password2', 'Repeat Password', 'required|trim|min_length[6]|matches[password1]');

        if ($this->form_validation->run() == false) {
            $this->load->view('auth/change_password');
        } else {
            $email = $this->session->userdata('reset_pass');
            $update = [
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT)
            ];
            //update password on database
            $this->User_model->updateUser($email, $update);
            //unset session
            $this->session->unset_userdata('reset_pass');
            //reset success
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
             Password anda telah diperbarui! silakan login
             </div>');
            redirect('login');
        }

        $this->load->view('style/footer');
    }
}
