(function( $ ) {
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



	$(function() {

		// $('#get-intouch-submission').on('click',function(e){

		// 	e.preventDefault();
		// 	var quizValue = $('input.quiz').val();
		// 	var quizAnswerKey = $('input[name=answer_quiz]').val();
		// 	$('.wait-spinner').show();
		// 	jQuery.post(
		// 		ktsgif_object.ajax_url,
		// 		{
		// 			// wp ajax action
		// 			action : 'ktsgif_contact_form',
		// 			nextNonce : ktsgif_object.nextNonce,
		// 			quizValue : quizValue,
		// 			quizAnswerKey : quizAnswerKey,
		// 		},

		// 		function( response ) {

		// 			$('.wait-spinner').hide();

		// 			if (response.correct == 0){
		// 				$('.quiz-label').css('background','yellow');
		// 				$('.response-output').css({'background':'yellow','padding':'10'}).text('Incorrect!');
		// 				e.preventDefault();
		// 			}
		// 			if (response.correct == 1){
		// 				$('.quiz-label').css('background','none');
		// 				$('.response-output').css({'background':'green','padding':'10','color':'white'}).text('Correct!');

		// 				$('#kate-and-toms-contact-form').submit();

		// 			}

		// 		}

		// 	);




		// });

		// function startSubmission() {
		// 	console.log('Foo!');

		// }

		// function stopSubmission() {
		// 	return false;
		// }

		$('#get-intouch-button').on('click',function(e){
			$('#ktshouseid').val('');
		});

		//numberOfPets.addEventListener('keyup', checkValue);

		$(document).on('input', '.number-of-pets input', function(){
			var petDetails = document.getElementById('petcon');
			if ( ! petDetails ) return;

			if($(this).val() > 0) {
				petDetails.style.display = "block";
			} else {
				petDetails.style.display = "none";
			}
		});

		$(document).on('input', '.number-of-pets-book input', function(){
			var petDetailsBook = document.getElementsByClassName('petcon-book');
			if ( ! petDetailsBook.length ) return;

			if($(this).val() > 0) {
				petDetailsBook[0].style.display = "block";
			} else {
				petDetailsBook[0].style.display = "none";
			}
		});

		$('#source').on('change', function (){
			var sourceVal = $(this).val();
			var sourceSpecify = document.getElementById('specify-other');
			if(sourceVal == 'other') {
				sourceSpecify.style.display = 'block';
			} else {
				sourceSpecify.style.display = 'none';
			}
		});


		// function checkValue(event) {
		// 	var inputValue = this.value.length;
		// 	if(inputValue) {
		// 		petDetails.style.display = "block";
		// 	} else {
				
		// 	}
		// }


	});


})( jQuery );

