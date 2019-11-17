<style>
    .dropdown:hover>.dropdown-menu {
        display: block;
    }

    .dropleft:hover>.dropdown-menu {
        display: block;
    }

    .dropdown-item:hover>.dropdown-menu {
        display: block;
    }

    ul li {
        list-style-type: none;
        display: inline;
    }

    .navbar-nav .nav-link {
        display: inline-block;
    }

    .ml-auto {
        display: inline-block !important;
    }

    .dropdown>.dropdown-toggle:active {
        pointer-events: none;
    }
</style>

<header>
    <nav class="navbar navbar-expand-md navbar-default bg-light">
        <div class="container">
            <a class="navbar-brand" href="<?= base_url() ?>">
                <img src="<?= base_url('assets/logo_brand.png') ?>" height="30" alt="image">
                CAGBUD
            </a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav1" aria-controls="navbarNav1" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav1">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url() ?>"><span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('situs') ?>">Situs</a>
                    </li>
                </ul>

                <ul class="navbar-nav justify-content-end d-none d-lg-flex ml-md-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="https://www.facebook.com/"><i class="fab fa-facebook"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="https://www.instagram.com/"><i class="fab fa-instagram"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="https://twitter.com/"><i class="fab fa-twitter"></i></a>
                    </li>
                </ul>
                <?php switch ($status) {
                    case 0: ?>
                        <a class="btn btn-outline-primary ml-md-3" href="<?= base_url('login') ?>">Login</a>
                        <a class="btn btn-outline-primary ml-md-3" href="<?= base_url('register') ?>">Register</a>
                    <?php break;
                    case 1:
                        $thumb = explode(' ', $user['nama_lengkap'])[0];
                        ?>
                        <div class="ml-2 dropdown">
                            <button class="btn btn-outline-primary dropdown-toggle" type="button" id="dropdownMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <?= "Hai! " . $thumb ?>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenu">
                                <img src="<?= base_url('assets/uploads/profile/' . $user['foto']) ?>" class="img-thumbnail" alt="">
                                <a href="<?= base_url('profile') ?>" class="dropdown-item btn" type="button">Profile</a>

                                <div class="dropdown-divider"></div>

                                <div class="dropleft">
                                    <a class="btn nav-link dropdown-toggle" href="#" id="subMenu" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                        Proposal
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="subMenu">
                                        <a class="dropdown-item" href="<?= base_url('input_proposal') ?>">Ajukan temuan situs</a>
                                        <a class="dropdown-item" href="<?= base_url('managemen') ?>">Atur situs</a>
                                    </div>
                                </div>

                                <div class="dropdown-divider"></div>

                                <!-- <button class="dropdown-item btn btn-danger" type="button"><a href="<?= base_url('logout') ?>" style="text-decoration: none; color: white;">Log out</a></button> -->
                                <a class="dropdown-item btn btn-danger" href="<?= base_url('logout') ?>" style="text-decoration: none; color: white;">Log out</a>
                            </div>
                        </div>
                    <?php break;
                } ?>
            </div>
        </div>
    </nav>
</header>