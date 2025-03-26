<?php
// If this file is called directly, abort.
if ( ! isset( $_POST['process_contact_nonce_field'] ) || ! wp_verify_nonce( $_POST['process_contact_nonce_field'], 'process_contact_action' ) ) {

    error_log('The process_contact_nonce_field did not verify when trying to process the contact form.');
    wp_die('Sorry, something went wrong, please notify the administrators.');

} else {

    if ( !empty( $_POST['salutation'] ) ) {
        http_response_code(405);
        wp_die('Method Not Allowed');
    }

    $secret = GRCSECRET;
    $key = $_POST['g-recaptcha-response'];

    
    $url = 'https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$key;

    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_HTTPHEADER => array(
            "Content-Type: application/json",
            "Content-Length: 0"
        ),
    ));

    $response = curl_exec($curl);

    curl_close($curl);
    $response = json_decode($response, true);

    if(isset($response['success']) && $response['success'] == false) {
        error_log('The CAPTCHA failed.');
        wp_die('Please go back and make sure your checked the security CAPTCHA box correctly.');
    } elseif (get_current_blog_id() != 8) {

        do_action('kateandtoms_process_contact_post', $_POST);

    } else {

        do_action('kateandtoms_process_contact_partners_post', $_POST);

    }



}


?>
