<?php

/**
 * Provide a public-facing view for the plugin
 *
 * This file is used to markup the public-facing aspects of the plugin.
 *
 * @link       https://elliottrichmond.co.uk
 * @since      1.0.0
 *
 * @package    Kate_And_Toms_Get_In_Touch
 * @subpackage Kate_And_Toms_Get_In_Touch/public/partials
 */

$public = new Kate_And_Toms_Get_In_Touch_Public('get in touch', '1.0');
$quiz = $public->kateandtoms_form_quiz(true);
$id = get_the_ID();
$title = get_the_title($id);
$current_permalink = get_option('siteurl') . $_SERVER['REQUEST_URI'];
?>

<script src="https://www.google.com/recaptcha/api.js" async defer></script>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->


<form action="/process-contact-forms" method="post" id="kate-and-toms-contact-form" class="kate-and-toms-contact-form" >
    <div class="gitwrap">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>

        <div class="top_label">Name</div>

        <div class="form_object">
            <span class="first-name">
                <input type="text" name="first-name" value="" size="40" class="kate-and-toms-contact-form-text-input"  placeholder="First"  required>
            </span>
        </div>

        <div class="form_object">
            <span class="last-name">
                <input type="text" name="last-name" value="" size="40" class="kate-and-toms-contact-form-text-input" aria-required="true" aria-invalid="false" placeholder="Last" required>
            </span>
        </div>


        <div class="top_label">Contact details</div>

        <div class="form_object">
            <span class="contact-number">
                <input type="text" name="contact-number" value="" size="40" class="kate-and-toms-contact-form-text-input" aria-required="true" aria-invalid="false" placeholder="Contact number" required>
            </span>
        </div>


        <div class="form_object">
            <span class="email-address">
                <input type="email" name="email-address" value="" size="40" class="kate-and-toms-contact-form-email-input" aria-required="true" aria-invalid="false" placeholder="Email address" required>
            </span>
        </div>

        <div class="top_label">House</div>

        <div class="form_object">
            <span class="wpcf7-form-control-wrap house-name">
                <input type="text" name="house-name" value="" size="40" class="kate-and-toms-contact-form-text-input" aria-invalid="false" placeholder="House name" required>
            </span>
        </div>

        <div class="top_label">House Postcode</div>
        <div class="form_object">
            <span class="wpcf7-form-control-wrap house-postcode">
                <input type="text" name="house-postcode" value="" size="40" class="kate-and-toms-contact-form-text-input" aria-invalid="false" placeholder="House postcode" required>
            </span>
        </div>

        <div class="form_object">
            <span class="wpcf7-form-control-wrap your-message">
                <textarea name="your-message" cols="40" rows="10" class="kate-and-toms-contact-form-textarea" aria-invalid="false" placeholder="Tell us about your property - e.g. number of beds, bathrooms, location and features..."></textarea>
            </span>
        </div>

		<div class="top_label">How did you hear about us?</div>
        <div class="form_object">
            <span class="source">
                <select id="source" name="source" class="kate-and-toms-contact-form-select " aria-required="true" aria-invalid="false" required>
                    <option value="word-of-mouth">Word of mouth</option>
                    <option value="google-search">Google search</option>
                    <option value="facebook-instagram">Facebook/Instagram advert</option>
                    <option value="previous-guest">Previous guest</option>
                    <option value="other">Other (please specify)</option>
                </select>
            </span>
        </div>

        <div id="specify-other" class="form_object" style="display:none;">
            <span class="wpcf7-form-control-wrap other-source">
                <textarea name="other-source" cols="40" rows="10" class="kate-and-toms-contact-form-textarea" aria-invalid="false"></textarea>
            </span>
        </div>


        <div class="top_label">Website - Please email any photos to hayley@kateandtoms.com</div>

        <div class="form_object">
            <span class="wpcf7-form-control-wrap website">
                <input type="text" name="website" value="" size="40" class="kate-and-toms-contact-form-text-input" aria-invalid="false" placeholder="Website (link to own website or property listing)">
            </span>
        </div>

        <!-- <p>
            <span class="quiz">
                <label>
                    <span class="quiz-label"><?php echo esc_html($quiz['question']); ?></span>
                    <input type="text" name="quiz" size="40" class="quiz" autocomplete="off" aria-required="true" aria-invalid="false" required>
                </label>
                <input type="hidden" name="answer_quiz" value="<?php echo esc_html($quiz['key']); ?>">
            </span>
        </p> -->

        <div style="display: none;">
            <input type="text" name="salutation" style="display:none">
            <?php wp_nonce_field( 'process_contact_action', 'process_contact_nonce_field' ); ?>
        </div>

        <div class="g-recaptcha" data-sitekey="<?php echo GRCKEY; ?>"></div>
        <br>
        <input type="submit" value="Submit" id="get-intouch-submission" class="submit btn btn-4">

        <p>
            <span class="response-output display-none"></span>
            <span class="wait-spinner" style="display:none;">|</span>
        </p>

    </div>
</form>



