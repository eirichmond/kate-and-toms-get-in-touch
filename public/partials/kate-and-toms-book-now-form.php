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

// $public = new Kate_And_Toms_Get_In_Touch_Public('get in touch', '1.0');
// $quiz = $public->kateandtoms_form_quiz(true);
// $id = get_the_ID();
// $title = get_the_title($id);
// $current_permalink = get_option('siteurl') . $_SERVER['REQUEST_URI'];

?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->

<?php if ( ! isset( $_POST['booking_select_nonce'] ) || ! wp_verify_nonce( $_POST['booking_select_nonce'], 'booking_select_action' ) ) { ?>

    <h3>Sorry, a security error has occured!</h3>
    <p>Something went wrong with your selection and your link was sent insecurely, please try again. Perhaps clearing your cache and any suspect cookies will resolve this issue.</p>

<?php } else { ?>

    <form action="/process-booking-forms" method="post" id="kate-and-toms-book-form" class="kate-and-toms-book-form">

    <div class="top_label">Name</div>

    <div class="clearfix">
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
    </div>

    <div class="top_label">Address</div>

    <div class="clearfix">
        <div class="form_object">
            <span class="address-1">
                <input type="text" name="address-1" value="" size="40" class="kate-and-toms-contact-form-text-input" aria-required="true" aria-invalid="false" placeholder="Address Line 1" required>
            </span>
        </div>
        <div class="form_object">
            <span class="address-2">
                <input type="text" name="address-2" value="" size="40" class="wpcf7-form-control wpcf7-text" aria-invalid="false" placeholder="Address Line 2">
            </span>
        </div>
    </div>

    <div class="clearfix">
        <div class="form_object">
            <span class="address-3">
                <input type="text" name="address-3" value="" size="40" class="kate-and-toms-contact-form-text-input" aria-required="true" aria-invalid="false" placeholder="Town/City" required>
            </span>
        </div>
        <div class="form_object">
            <span class="address-4">
                <input type="text" name="address-4" value="" size="40" class="kate-and-toms-contact-form-text-input" aria-required="true" aria-invalid="false" placeholder="County">
            </span>
        </div>
    </div>
    <div class="clearfix">
        <div class="form_object">
            <span class="address-5">
                <input type="text" name="address-5" value="" size="5" maxlength="9" class="kate-and-toms-contact-form-text-input" aria-required="true" aria-invalid="false" placeholder="Post Code" required>
            </span>
        </div>
    </div>
    <div class="top_label">Contact details</div>
    <div class="clearfix">
        <div class="form_object">
            <span class="email">
                <input type="email" name="email" value="" size="40" class="kate-and-toms-contact-form-email-inp" aria-required="true" aria-invalid="false" placeholder="Email Address" required>
            </span>
        </div>
        <div class="form_object">
            <span class="mobile">
                <input type="text" name="mobile" value="" size="40" class="kate-and-toms-contact-form-text-input" aria-required="true" aria-invalid="false" placeholder="Mobile" required>
            </span>
        </div>
    </div>
    <div class="top_label">Number of guests</div>
    <div class="clearfix">
        <div class="form_object">
            <span class="number-of-adults">
                <input type="text" name="number-of-adults" value="" size="40" class="kate-and-toms-contact-form-text-input" aria-required="true" aria-invalid="false" placeholder="Number of Adults" required>
            </span>
        </div>
        <div class="form_object">
            <span class="number-of-children">
                <input type="text" name="number-of-children" value="" size="40" class="kate-and-toms-contact-form-text-input" aria-required="true" aria-invalid="false" placeholder="Number of Children 2-16" required>
            </span>
        </div>
    </div>
    <div class="clearfix">
        <div class="form_object">
            <span class="number-of-infants">
                <input type="text" name="number-of-infants" value="" size="40" class="kate-and-toms-contact-form-text-input" aria-required="true" aria-invalid="false" placeholder="Number of Infants 0-2" required>
            </span>
        </div>
        <div class="form_object">
            <span class="number-of-pets-book">
                <input type="text" name="number-of-pets" value="" size="40" class="kate-and-toms-contact-form-text-input" aria-required="false" aria-invalid="false" placeholder="Number of Dogs">
            </span>
        </div>

        <div class="petcon-book" style="display:none;">

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


    </div>
    <div class="top_label">Nature of stay/occasion</div>
    <div class="clearfix">
        <div class="form_object full">
            <span class="nature-of-stay">
                <!-- <input type="text" name="nature-of-stay" value="" size="40" class="kate-and-toms-contact-form-text-input" aria-required="true" aria-invalid="false" placeholder="Birthday, Anniversary etc" required> -->
                <select name="nature-of-stay" class="select " aria-required="true" aria-invalid="false" required="">
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
    </div>
    <div class="top_label">Age range of group .approx</div>
    <div class="clearfix">
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
    </div>
    <h3 style="margin-top:15px;">Your booking</h3>
    <p>Please check your booking details below.</p>

    <div class="booking_option_cont" style="margin:20px 0">
        <div class="booking_option" style="display:inline-block;width:80px;">House:</div>
        <div class="booking_option booking" style="display:inline-block;width:390px;margin-left:-4px;">
            <span class="property_name">
                <input type="text" name="property_name" value="<?php echo esc_html($_POST['house_name']); ?>" size="40" class="kate-and-toms-contact-form-text-input" aria-invalid="false">
            </span>
        </div>
        <div class="booking_option" style="display:inline-block;width:80px;">Date from:</div>
        <div class="booking_option booking" style="display:inline-block;width:390px;margin-left:-4px;">
            <span class="date_from"><input type="text" name="date_from" value="<?php echo esc_html($_POST['date_from']); ?>" size="40" class="kate-and-toms-contact-form-text-input" aria-invalid="false"></span>
        </div>
        <div class="booking_option" style="display:inline-block;width:80px;">Duration:</div>
        <div class="booking_option booking" style="display:inline-block;width:390px;margin-left:-4px;">
            <span class="period"><input type="text" name="period" value="<?php echo esc_html($_POST['period']); ?>" size="40" class="kate-and-toms-contact-form-text-input" aria-invalid="false"></span>
        </div>
    </div>

    <div style="display: none;">
        <input type="text" name="salutation" style="display:none">
        <input type="hidden" name="post_id" value="<?php echo esc_html($_POST['post_id']); ?>" size="40" class="kate-and-toms-contact-form-text-input" aria-invalid="false">
        <?php wp_nonce_field( 'booking_select_action', 'booking_select_nonce' ); ?>
    </div>

    <p>
        <input type="submit" value="Book Now" class="wpcf7-form-control wpcf7-submit btn btn-success">
        <span class="ajax-loader"></span>
    </p>
    <div class="wpcf7-response-output wpcf7-display-none"></div>
    </form>

<?php } ?>

