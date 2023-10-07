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

		$('.wpkenteken-kenteken').focusout(function () {

			// Validate input.

			const invoer = document.querySelector('.wpkenteken-kenteken > input[type="text"]').value;
			console.log(invoer);
			let kenteken = invoer.replace(/[^0-9a-zA-Z]/g, "");
			kenteken = kenteken.toUpperCase();
			console.log(kenteken);
			if (kenteken.length !== 6) {
				alert('De invoer is ongeldig');
				return false;
			}

			// AJAX request.

			$.ajax({
				url: "https://opendata.rdw.nl/resource/qyrd-w56j.json?kenteken=" + kenteken,
				type: "GET",
				dataType: 'json',
				data: {
					"$limit": 5000,
					"$$app_token": "NnFU01CF99CsjkG7hGMIWIqiC"
				},
				success: function (data) {
					console.log('succes');
					var response = data[0];
					console.log(response);
					if (typeof response !== 'undefined') {
						console.log(response.merk);
						console.log(response.model);
						console.log(response.bouwjaar);
						document.querySelector('.wpkenteken-merk > input[type="text"]').value = response.merk;
						document.querySelector('.wpkenteken-model > input[type="text"]').value = response.handelsbenaming;
						document.querySelector('.wpkenteken-bouwjaar > input[type="text"]').value = response.datum_eerste_toelating.substring(0, 4);
						$('.model').val(response.handelsbenaming);
						var bouwjaar = (response.datum_eerste_toelating).substring(0, 4);
						$('.bouwjaar').val(bouwjaar);
					} else {
						$('.response').text('Geen resultaat gevonden. Check het ingevoerde kenteken. of probeer het later nog eens.');
					}
				},
				error: function(data) {
					alert('Error');
				}
			
			});
		});
	});

})(jQuery);
