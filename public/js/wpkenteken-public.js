(function ($) {
	'use strict';

	/**
	 * All of the code for your public-facing JavaScript source
	 * should reside in this file.
	 *
	 * Note: It has been assumed you will write jQuery code here, so the
	 * $ function reference has been prepared for usage within the scope
	 * of this function.
	 *
	 * This enables you to define handlers, for when the DOM is ready:
	 *
	 * $(function() {
	 *
	 * });
	 *
	 * When the window is loaded:
	 *
	 * $( window ).load(function() {
	 *
	 * });
	 *
	 * ...and/or other possibilities.
	 *
	 * Ideally, it is not considered best practise to attach more than a
	 * single DOM-ready or window-load handler for a particular page.
	 * Although scripts in the WordPress core, Plugins and Themes may be
	 * practising this, we should strive to set a better example in our own work.
	 */

	$(window).load(function () {

		$(document).ready(function () {

			$('.wpkenteken-kenteken').on("focusout", function () {

				var api_key = wpkenteken_ajax_object.api_key;

				// Add node to display warning.
				if ($('#wpkenteken-warning').length === 0) {

					if ($('.wpkenteken-kenteken').is("input")) {

						$('.wpkenteken-kenteken').parent().append('<div id="wpkenteken-warning"></div>');
					} else {

						$('.wpkenteken-kenteken').append('<div id="wpkenteken-warning"></div>');
					}
				} else {

					$('#wpkenteken-warning').text('');
				}

				console.log(wpkenteken_ajax_object);

				// Validate input.

				if ($('.wpkenteken-kenteken').is("input")) {
					// CSS class on element.
					var invoer = $('.wpkenteken-kenteken').val(); //CF7+NF
				} else {
					// CSS class on cantainer.
					var invoer = $('.wpkenteken-kenteken :input').first().val();
				}
				// console.log(invoer);
				let kenteken = invoer.replace(/[^0-9a-zA-Z]/g, "");
				kenteken = kenteken.toUpperCase();
				if (kenteken.length !== 6) {
					$('#wpkenteken-warning').text(wpkenteken_ajax_object.invalid_message);
					return false;
				}

				// AJAX request.

				$.ajax({
					url: "https://opendata.rdw.nl/resource/qyrd-w56j.json?kenteken=" + kenteken,
					type: "GET",
					dataType: 'json',
					data: {
						"$limit": 5000,
						"$$app_token": api_key
					},
					success: function (data) {
						var response = data[0];
						if (typeof response !== 'undefined') {
							// Results found. Fill form fields.
							console.log('results');
							if ($('.wpkenteken-kenteken').is("input")) {
								console.log(' results elements');
								let merkElement = $('.wpkenteken-merk');
								if (merkElement) {
									merkElement.val(response.merk);
								}
								let modelElement = $('.wpkenteken-model');
								if (modelElement) {
									modelElement.val(response.handelsbenaming);
								}

								let bouwjaarElement = $('.wpkenteken-bouwjaar');
								if (bouwjaarElement) {
									bouwjaarElement.val(response.datum_eerste_toelating.substring(0, 4));
								}
							} else {
								console.log(' results container');
								let merkElement = $('.wpkenteken-merk :input').first();
								if (merkElement) {
									merkElement.val(response.merk);
								}
								let modelElement = $('.wpkenteken-model :input').first();
								if (modelElement) {
									modelElement.val(response.handelsbenaming);
								}
								let bouwjaarElement = $('.wpkenteken-bouwjaar :input').first();
								if (bouwjaarElement) {
									bouwjaarElement.val(response.datum_eerste_toelating.substring(0, 4));
								}
							}

						} else {
							// No results. Empty form fields and return a warning.
							if ($('.wpkenteken-kenteken').is("input")) {
								// Empty fields with CSS class on elements.
								let merkElement = $('.wpkenteken-merk');
								if (merkElement) {
									merkElement.val('');
								}
								let modelElement = $('.wpkenteken-model');
								if (modelElement) {
									modelElement.val('');
								}

								let bouwjaarElement = $('.wpkenteken-bouwjaar');
								if (bouwjaarElement) {
									bouwjaarElement.val('');
								}
							} else {
								// Empty fields with CSS class on containers.
								let merkElement = $('.wpkenteken-merk :input').first();
								if (merkElement) {
									merkElement.val('');
								}
								let modelElement = $('.wpkenteken-model :input').first();
								if (modelElement) {
									modelElement.val('');
								}
								let bouwjaarElement = $('.wpkenteken-bouwjaar :input').first();
								if (bouwjaarElement) {
									bouwjaarElement.val('');
								}
							}
							$('#wpkenteken-warning').text(wpkenteken_ajax_object.no_results_message);
						}
					},
					error: function (jqXHR, textStatus, errorThrown) {
						switch (jqXHR.statusCode) {
							case 404:
								$('#wpkenteken-warning').text(wpkenteken_ajax_object.not_found_error_message);
								break;
							case 500:
								$('#wpkenteken-warning').text(wpkenteken_ajax_object.server_error_message);
								break;
							default:
								$('#wpkenteken-warning').text(wpkenteken_ajax_object.default_error_message);
						}
					}
				});
			});
		});
	});

})(jQuery);
