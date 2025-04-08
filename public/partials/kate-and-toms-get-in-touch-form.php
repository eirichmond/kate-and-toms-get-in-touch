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



<!-- This file should primarily consist of HTML with a little bit of PHP. -->

<form action="/process-contact-forms" method="post" id="kate-and-toms-contact-form" class="kate-and-toms-contact-form" >

    <div class="gitwrap">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>

        <div class="top_label">Name</div>

        <div class="form_object">
            <span class="first-name">
                <input type="text" name="first-name" value="" size="40" class="kate-and-toms-contact-form-text-input" aria-required="true" aria-invalid="false" placeholder="First" required>
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


        <div class="top_label">Check-in</div>
        <div class="form_object">
            <span class="checkin">
                <input type="date" name="checkin" value="" class="kate-and-toms-contact-form-date-input" aria-required="true" aria-invalid="false" placeholder="Check-in Date" required>
            </span>
        </div>

        <div class="top_label">Stay Duration</div>
        <div class="form_object">
            <span class="stay-duration">
                <select name="stay-duration" class="kate-and-toms-contact-form-select " aria-required="true" aria-invalid="false" required>
                    <option value="1">1 (midweek only)</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="7">7</option>
                    <option value="8+">8+</option>
                    <option value="other">other</option>
                </select>
            </span>
        </div>

        <div class="top_label">No. of</div>
        <div class="form_object">
            <span class="number-of-adults">
                <input type="text" name="number-of-adults" value="" size="40" class="kate-and-toms-contact-form-text-input" aria-required="true" aria-invalid="false" placeholder="Adults" required>
            </span>
        </div>

        <div class="form_object">
            <span class="number-of-children">
                <input type="text" name="number-of-children" value="" size="40" class="kate-and-toms-contact-form-text-input" aria-required="true" aria-invalid="false" placeholder="Children 2-16" required>
            </span>
        </div>

        <div class="form_object">
            <span class="number-of-infants">
                <input type="text" name="number-of-infants" value="" size="40" class="kate-and-toms-contact-form-text-input" aria-required="true" aria-invalid="false" placeholder="Infants 0-2" required>
            </span>
        </div>

        <div class="form_object">
            <span class="number-of-pets">
                <input type="text" name="number-of-pets" value="" size="40" class="kate-and-toms-contact-form-text-input" aria-required="false" aria-invalid="false" placeholder="Dogs">
            </span>
        </div>

        <div id="petcon" style="display:none;">

            <div class="form_object">
                <span class="breed-of-pets">
                    <input type="text" name="breed-of-pets" value="" size="40" class="kate-and-toms-contact-form-text-input" aria-required="false" aria-invalid="false" placeholder="Breed of dog(s)">
                </span>
            </div>

            <div class="form_object">
                <span class="age-of-pets">
                    <input type="text" name="age-of-pets" value="" size="40" class="kate-and-toms-contact-form-text-input" aria-required="false" aria-invalid="false" placeholder="Age of dog(s)">
                </span>
            </div>

        </div>


        <div class="top_label">Age range of group .approx</div>
        <div class="form_object">
            <span class="age-range-from">
                <input type="text" name="age-range-from" value="" size="40" class="kate-and-toms-contact-form-text-input" aria-required="true" aria-invalid="false" placeholder="from" required>
            </span>
        </div>

        <div class="form_object">
            <span class="age-range-to">
                <input type="text" name="age-range-to" value="" size="40" class="kate-and-toms-contact-form-text-input" aria-required="true" aria-invalid="false" placeholder="to" required>
            </span>
        </div>

        <div class="top_label">Occasion</div>
        <div class="form_object">
            <span class="nature-of-stay">
                <select name="nature-of-stay" class="select " aria-required="true" aria-invalid="false" required>
                    <option value="Holiday">Holiday</option>
                    <option value="up to 29th Birthday Party">up to 29th Birthday Party</option>
                    <option value="30-40th Birthday Party">30-40th Birthday Party</option>
                    <option value="40+ Birthday Party">40+ Birthday Party</option>
                    <option value="Celebration (non-wedding)">Celebration (non-wedding)</option>
                    <option value="Hen Party">Hen Party</option>
                    <option value="Stag Party">Stag Party</option>
                    <option value="Corporate Event">Corporate Event</option>
                    <option value="Wedding">Wedding</option>
                    <option value="Wedding Accommodation">Wedding Accommodation</option>
                </select>
            </span>
        </div>

        <div class="top_label">Comment</div>
        <p>

            <span class="your-message">
                <textarea name="your-message" cols="40" rows="10" class="kate-and-toms-contact-form-textarea" aria-invalid="false" placeholder="Your message..."></textarea>
            </span>

            <br>



            <!-- <span class="quiz">
                <label>
                    <span class="quiz-label"><?php echo wp_kses($quiz['question'], array('strong' => true, 'p' => true)); ?></span>
                    <input type="text" name="quiz" size="40" class="quiz" autocomplete="off" aria-required="true" aria-invalid="false" required>
                </label>
                <input type="hidden" name="answer_quiz" value="<?php echo esc_html($quiz['key']); ?>">
            </span> -->

        </p>

        <p>

            <span class="flyturd">
                <span class="checkbox-398">
                    <span class="checkbox">
                        <span class="list-item first last">
                            <input type="checkbox" name="newsletter-opt-in[]" value="Opt in to receive our email newsletter about our special offers and new houses.">
                            <span class="list-item-label">Opt in to receive our email newsletter about our special offers and new houses.</span>
                        </span>
                    </span>
                </span>
                <p></p>
                <p>See our <a href="https://docs.kateandtoms.com/packs/kateandtoms-privacy-policy2-FEB22.pdf" target="_blank">privacy policy</a> for more information.</p>
            </span>

        </p>

        <div style="display: none;">
            <input type="text" name="salutation" style="display:none">
            <?php wp_nonce_field( 'process_contact_action', 'process_contact_nonce_field' ); ?>
        </div>

        <p>
            <span class="title">
                <input type="hidden" name="title" value="<?php echo esc_html($title); ?>" size="40" class="dynamichidden" aria-invalid="false">
                <input id="ktshouseid" type="hidden" name="post_id" value="<?php echo esc_html($id); ?>" size="40" class="dynamichidden" aria-invalid="false">
            </span>
            <span class="permalink">
                <input type="hidden" name="permalink" value="<?php echo esc_html($current_permalink); ?>" size="40" class="dynamichidden" aria-invalid="false">
            </span>
            <script src="https://www.google.com/recaptcha/api.js" async defer></script>
            <div class="g-recaptcha" data-sitekey="<?php echo esc_attr( GRCKEY ); ?>"></div>
            <br>
            <input type="submit" value="Send enquiry" id="get-intouch-submission" class="submit btn btn-4">
        </p>

        <p>
            <span class="response-output display-none"></span>
            <span class="wait-spinner" style="display:none;">|</span>
        </p>

    </div>



</form>
