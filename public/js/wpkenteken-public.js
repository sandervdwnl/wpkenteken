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

		$(document).ready( function() {

		$('.wpkenteken-kenteken').on("focusout", function () {

			// Add node to display warning.
			if ($('#wpkenteken-warning').length === 0) {
			
				if($('.wpkenteken-kenteken').is("input")) {
					console.log('init cf7 of nf');
					$('.wpkenteken-kenteken').parent().append('<div id="wpkenteken-warning"></div>');
				} else {
					console.log('init wpf');
					$('.wpkenteken-kenteken').append('<div id="wpkenteken-warning"></div>');
				}
			} else {
				$('#wpkenteken-warning').text('');
			}

			// Validate input.

			if($('.wpkenteken-kenteken').is("input")) {
				console.log('invoer cf7 of nf');
				var invoer = $('.wpkenteken-kenteken').val(); //CF7+NF
			} else {
				console.log('invoer wpf');
				var invoer = document.querySelector('.wpkenteken-kenteken > input[type="text"]').value;
			}
			console.log(invoer);
			let kenteken = invoer.replace(/[^0-9a-zA-Z]/g, "");
			kenteken = kenteken.toUpperCase();
			if (kenteken.length !== 6) {
				$('#wpkenteken-warning').text('Invoer is ongeldig. Probeer het opnieuw.');
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
					var response = data[0];
					if (typeof response !== 'undefined') {
						// Results found. Fill form fields.
						console.log(response);
						if($('.wpkenteken-kenteken').is("input")) { 
							console.log('update cf7+nf');
							document.querySelector('.wpkenteken-merk').value = response.merk;
							document.querySelector('.wpkenteken-model').value = response.handelsbenaming;
							document.querySelector('.wpkenteken-bouwjaar').value = response.datum_eerste_toelating.substring(0, 4);	
						} else {
							console.log('update wpf');
							document.querySelector('.wpkenteken-merk > input[type="text"]').value = response.merk;
							document.querySelector('.wpkenteken-model > input[type="text"]').value = response.handelsbenaming;
							document.querySelector('.wpkenteken-bouwjaar > input[type="text"]').value = response.datum_eerste_toelating.substring(0, 4);	
						}
						
					} else {
						// No results. Empty form fields and return a warning.
						console.log(response);
						if($('.wpkenteken-kenteken').is("input")) { 
							document.querySelector('.wpkenteken-merk').value = '';
							document.querySelector('.wpkenteken-model').value = '';
							document.querySelector('.wpkenteken-bouwjaar').value = '';
							
						} else {
							document.querySelector('.wpkenteken-merk > input[type="text"]').value = '';
							document.querySelector('.wpkenteken-model > input[type="text"]').value = '';
							document.querySelector('.wpkenteken-bouwjaar > input[type="text"]').value = '';
						}
						$('#wpkenteken-warning').text('Geen resultaat gevonden. Check het ingevoerde kenteken. of probeer het later nog eens.');
					}
				},
				error: function(data) {
					alert('Error');
				}
			
			});
		});
	});
	});

})(jQuery);
