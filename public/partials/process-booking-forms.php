<?php
// If this file is called directly, abort.
if ( ! isset( $_POST['booking_select_nonce'] ) || ! wp_verify_nonce( $_POST['booking_select_nonce'], 'booking_select_action' ) ) {

    error_log('The process_booking_nonce_field did not verify when trying to process the contact form.');
    wp_die('Sorry, something went wrong, please notify the administrators.');

} else {
    do_action('kateandtoms_process_booking_post', $_POST);
}


?>