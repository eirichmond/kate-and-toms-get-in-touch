<?php
// If this file is called directly, abort.
if ( ! isset( $_POST['process_contact_nonce_field'] ) || ! wp_verify_nonce( $_POST['process_contact_nonce_field'], 'process_contact_action' ) ) {

    error_log( 'The process_contact_nonce_field did not verify when trying to process the contact form.' );
    wp_die( 'Sorry, something went wrong, please notify the administrators.' );

} else {

    if ( !empty( $_POST['salutation'] ) ) {
        http_response_code(405);
        wp_die('Method Not Allowed');
    }

    $secret = GRCSECRET;
    $key = $_POST["g-recaptcha-response"];

        // Make the POST request to verify the response
    $verify_url = 'https://www.google.com/recaptcha/api/siteverify';
    $response = file_get_contents($verify_url . '?secret=' . $secret . '&response=' . $key);

    error_log( 'reCAPTCHA response: ' . $response );

    $response_data = json_decode( $response );

    if ( $response_data->success ) { // we will add a score check after running some logs for a while
        // reCAPTCHA validation successful
        // Proceed with form processing (e.g., send email, store in database)
        if (get_current_blog_id() != 8) {

            do_action( 'kateandtoms_process_contact_post', $_POST );

        } else {

            do_action('kateandtoms_process_contact_partners_post', $_POST);

        }

    } else {

        error_log('reCAPTCHA verification failed. Please try again.');
        wp_die('reCAPTCHA verification failed. Please try again.');

    }

}


?>
