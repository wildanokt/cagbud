$(document).ready(function () {
	//list peserta
	$('.owl-head').owlCarousel({
		items: 1,
		loop: true,
		margin: 0,
		autoplay: true,
		smartSpeed: 1000,
		autoplayTimeout: 4000,
		autoplayHoverPause: false
	});

	$('.owl-peserta').owlCarousel({
		items: 5,
		loop: true,
		margin: 0,
		autoplay: true,
		smartSpeed: 800,
		autoplayTimeout: 3000,
		autoplayHoverPause: true
	});

	$('.owl-sponsor').owlCarousel({
		items: 2,
		loop: true,
		margin: 10,
		autoplay: true,
		smartSpeed: 800,
		autoplayTimeout: 3000,
		autoplayHoverPause: true
	});

	$('.owl-medpar').owlCarousel({
		items: 5,
		loop: true,
		margin: 10,
		autoplay: true,
		smartSpeed: 800,
		autoplayTimeout: 3000,
		autoplayHoverPause: true
	});
});


//faq
$("#accordion").on("hide.bs.collapse show.bs.collapse", e => {
	$(e.target)
		.prev()
		.find("i:last-child")
		.toggleClass("fa-minus fa-plus");
});

$("#accordion").on("shown.bs.collapse", e => {
	$("html, body").animate({
			scrollTop: $(e.target)
				.prev()
				.offset().top
		},
		400
	);
});
