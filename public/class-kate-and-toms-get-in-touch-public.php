<?php
//old v2
define('GRCSECRET', '6LeWkOsZAAAAAFkvFDIIIl0gaZ50M6iXZsaPAFhX');
define('GRCKEY', '6LeWkOsZAAAAAB_I17SCVfYYhTlTJ5WJHIylopiE');

//new keys v2
// define('GRCSECRET', '6LcJJBMsAAAAAJQiZevIw-c3ouShFa2cgrwhRCQD');
// define('GRCKEY', '6LcJJBMsAAAAAMl3a4z0TYG6oye-NkJ5NygWFDTg');
// upgraded to v3
// define('GRCSECRET', '6LcJI-YpAAAAAM0tl2YZiD1_37rTIo7yffs687pb');
// define('GRCKEY', '6LcJI-YpAAAAAEEBfpDIdSzHJkJTI4345zr5TeFw');


define('IPRO_API_URL', 'http://booking.kateandtoms.com');

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://elliottrichmond.co.uk
 * @since      1.0.0
 *
 * @package    Kate_And_Toms_Get_In_Touch
 * @subpackage Kate_And_Toms_Get_In_Touch/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Kate_And_Toms_Get_In_Touch
 * @subpackage Kate_And_Toms_Get_In_Touch/public
 * @author     Elliott Richmond <elliott@squareonemd.co.uk>
 */
class Kate_And_Toms_Get_In_Touch_Public {



	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Kate_And_Toms_Get_In_Touch_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Kate_And_Toms_Get_In_Touch_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/kate-and-toms-get-in-touch-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Kate_And_Toms_Get_In_Touch_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Kate_And_Toms_Get_In_Touch_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/kate-and-toms-get-in-touch-public.js', array( 'jquery' ), $this->version, false );

		wp_localize_script( $this->plugin_name, 'ktsgif_object', array( 'ajax_url' => admin_url( 'admin-ajax.php' ), 'nextNonce' => wp_create_nonce( 'wwcc-ktsgif-nonce' ) ) );

		// Enqueue reCAPTCHA script
		wp_enqueue_script( 'google-recaptcha', 'https://www.google.com/recaptcha/api.js', array(), null, false );
		// Enqueue reCAPTCHA script
		// wp_enqueue_script( $this->plugin_name . '-google-recaptcha', plugin_dir_url( __FILE__ ) . 'js/kate-and-toms-recaptcha.js', array(), null, true );
		// wp_localize_script( $this->plugin_name . '-google-recaptcha', 'ktrecaptcha_object', array( 'key' => GRCKEY ) );

	}

	/**
	 * Call back function for the hook 'kateandtoms_get_in_touch'.
	 *
	 * @author  Elliott Richmond <elliott@squareonemd.co.uk>
	 *
	 * @since 1.0
	 *
	 */
	public function kateandtoms_get_in_touch_callback() {

		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/partials/kate-and-toms-get-in-touch-form.php';

	}

	/**
	 * Call back function for the hook 'kateandtoms_get_in_touch'.
	 *
	 * @author  Elliott Richmond <elliott@squareonemd.co.uk>
	 *
	 * @since 1.0
	 *
	 */
	public function kateandtoms_get_in_touch_partners_callback() {

		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/partials/kate-and-toms-get-in-touch-partners-form.php';

	}

	/**
	 * Call back function for the hook 'kateandtoms_book_now'.
	 *
	 * @author  Elliott Richmond <elliott@squareonemd.co.uk>
	 *
	 * @since 1.0
	 *
	 */
	public function kateandtoms_book_now_callback() {

		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/partials/kate-and-toms-book-now-form.php';

	}

	/**
	 * Undocumented function
	 *
	 * @return void
	 */
	public function generate_access_token() {

		$curl = curl_init();

		curl_setopt_array($curl, array(
			CURLOPT_URL => IPRO_API_URL . "/oauth/2.0/token",
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "POST",
			CURLOPT_POSTFIELDS => "grant_type=client_credentials",
			CURLOPT_HTTPHEADER => array(
				"Authorization: Basic MTAwMTo2NDNmNjc5NTA1NTA0ZDE3OTY1NDQ2NDdkMTFjNWIwMA==",
				"Content-Type: application/x-www-form-urlencoded"
			),
		));

		$response = curl_exec($curl);

		curl_close($curl);
		$response = json_decode($response);
		if($response->Success === false) {
			error_log('There was an error generating an access token at iPro.');
			wp_die('Sorry, your enquiry wasn\'t sent, please go back and try again in a few minutes.');
		} else {
			return $response->access_token;
		}


	}
	
	/**
	 * Call the correct page if the slug matches.
	 *
	 * @author  Elliott Richmond <elliott@squareonemd.co.uk>
	 *
	 * @since 1.0
	 *
	 * @param int    $template  The template being called.
	 */
	public function kateandtoms_process_contact_form_template( $template ) {

		$kate_and_toms_get_in_touch_config = array(
			'public_pages' => array(
				array(
					'slug'=>'process-contact-forms',
					'title'=>'Process Contact Forms'
				),
				array(
					'slug'=>'process-booking-forms',
					'title'=>'Process Booking Forms'
				)
			)
		);

		foreach ($kate_and_toms_get_in_touch_config['public_pages'] as $pages) {
			if ( is_page( $pages['slug'] ) ) {
				$new_template = plugin_dir_path( dirname( __FILE__ ) ) . 'public/partials/'.$pages['slug'].'.php';
				if ( !empty( $new_template ) ) {
					return $new_template;
				}
			}
		}

		return $template;
	}

	/**
	 * This is the summary for a DocBlock.
	 *
	 * @author  Elliott Richmond <elliott@squareonemd.co.uk>
	 *
	 * @since 1.0
	 *
	 * @param int    $example  This is an example function/method parameter description.
	 */
	public function kateandtoms_form_quiz($boolean = false) {

		$quiz = array(
			array (
				'question' => 'To make sure you\'re a human, please type the following words into the box below:<p><strong>Doctor Foster went to Gloucester</strong></p>',
				'key' => 'gPjje1rOvYAUzgCHl9Oi6zlHJwhWAQm1',
				'gPjje1rOvYAUzgCHl9Oi6zlHJwhWAQm1' => 'DoctorFosterwenttoGloucester'
			),
			array (
				'question' => 'To make sure you\'re a human, please type the following words into the box below:<p><strong>Half the fun is getting there</strong></p>',
				'key' => 'pCr495qdRzjnwE9TLdPLAKPrlE6Bk2mm',
				'pCr495qdRzjnwE9TLdPLAKPrlE6Bk2mm' => 'Halfthefunisgettingthere'
			),
		);
		if ($boolean) {
			$key = array_rand($quiz, 1);
			return $quiz[$key];
		}

		return $quiz;

	}

	/**
	 * Property ref lookup.
	 *
	 * @author  Elliott Richmond <elliott@squareonemd.co.uk>
	 *
	 * @since 1.0
	 *
	 * @param int    $post_id  post id.
	 * @return int	$property_id  the iPro property id
	 */

	public function ipro_reflookup_callback($post_id) {

		$site_id = get_current_blog_id();
		if($site_id != 11) {
			// this is the old way of getting the property id	
			// $post_id = get_post_meta($post_id, 'availability_site_post_id', true);
			
			// this is the new way of getting the property id
			$ipro_property_id = get_post_meta($post_id, 'ipro_property_id', true);
			if($ipro_property_id == '') {
				$parent_id = get_post_field('post_parent', $post_id);
				$ipro_property_id = get_post_meta($parent_id, 'ipro_property_id', true);
			}
		}

		$access_token = $this->generate_access_token();

		$curl = curl_init();

		curl_setopt_array($curl, array(
			CURLOPT_URL => 'http://booking.kateandtoms.com/apis/properties/reflookup?access_token='.$access_token,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_FOLLOWLOCATION => false,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "GET",
			CURLOPT_HTTPHEADER => array(
				"Authorization: Basic MTAwMTo2NDNmNjc5NTA1NTA0ZDE3OTY1NDQ2NDdkMTFjNWIwMA==",
				"Content-Type: application/json"
			),
		));

		$response = curl_exec($curl);
		curl_close($curl);

		$response = json_decode($response);

		$key = array_search($post_id, array_column($response, 'PropertyReference'));
		$property_id = $response[$key]->PropertyId;
		return $property_id;

	}

	/**
	 * Process the form data.
	 *
	 * @author  Elliott Richmond <elliott@squareonemd.co.uk>
	 *
	 * @since 1.0
	 *
	 * @param int    $post_data  the forms post data.
	 */
	public function kateandtoms_process_contact_post_callback($post_data) {
		//var_dump($post_data);

		if ( !isset( $post_data["g-recaptcha-response"] ) && empty( $post_data["g-recaptcha-response"] ) ) {
			
			error_log( 'reCAPTCHA verification failed. Suspected spam before sending to iPro.' );
			error_log( json_encode( $post_data ) );
			error_log( json_encode( $_SERVER ) );
       		wp_die('Not you again!');

		}

		$access_token = $this->generate_access_token();

		if(isset($post_data['newsletter-opt-in']) && $post_data['newsletter-opt-in'] != '')  {
			$newsletter = 'Yes';
		} else {
			$newsletter = '-';
		}

		if(isset($post_data['post_id']) && $post_data['post_id'] != '') {
			$property_id = $this->ipro_reflookup_callback($post_data['post_id']);
		} else {
			$property_id = '';
		}
		

		$message = sprintf( __( 'From: %s' ), $post_data['first-name'].' '.$post_data['last-name'].' <'.$post_data['email-address'].'>' . ' Contact number: '. $post_data['contact-number']) . "\r\n\r\n";
		$message .= sprintf( __( 'Page Name: %s' ), $post_data['title'] ) . "\r\n\r\n";
		$message .= sprintf( __( 'Message Body: %s' ), $post_data['your-message'] ) . "\r\n\r\n";
		$message .= sprintf( __( 'Send from: %s' ), $post_data['permalink'] ) . "\r\n\r\n";
		$message .= sprintf( __( 'Number of Adults: %s' ), $post_data['number-of-adults'] ) . "\r\n\r\n";
		$message .= sprintf( __( 'Number of Children: %s' ), $post_data['number-of-children'] ) . "\r\n\r\n";
		$message .= sprintf( __( 'Number of Infants: %s' ), $post_data['number-of-infants'] ) . "\r\n\r\n";
		$message .= sprintf( __( 'Number of Pets: %s' ), $post_data['number-of-pets'] ) . "\r\n\r\n";
		$message .= sprintf( __( 'Breed of Pets: %s' ), $post_data['breed-of-pets'] ) . "\r\n\r\n";
		$message .= sprintf( __( 'Age of Pets: %s' ), $post_data['age-of-pets'] ) . "\r\n\r\n";
		$message .= sprintf( __( 'Nature of stay: %s' ), $post_data['nature-of-stay'] ) . "\r\n\r\n";
		$message .= sprintf( __( 'Age range: %s' ), $post_data['age-range-from'].' - '.$post_data['age-range-to'] ) . "\r\n\r\n";
		$message .= sprintf( __( 'Checkin: %s' ), date('l, jS F Y',strtotime($post_data['checkin'])) ) . "\r\n\r\n";
		$message .= sprintf( __( 'Stay Duration: %s' ), $post_data['stay-duration'] ) . "\r\n\r\n";
		$message .= sprintf( __( 'Opt in to receive newsletter: %s' ), $newsletter ) . "\r\n\r\n";


		if($post_data['stay-duration'] == '8+' || $post_data['stay-duration'] == 'other') {
			$enddate = '-';
		} else {
			$enddate = date('Y-m-d',strtotime($post_data['checkin'].' + ' . $post_data['stay-duration'] . 'days'));
		}

		$api_url = '/apis/enquiry?';
		$api_url .= 'firstname='.urlencode($post_data['first-name']);
		$api_url .= '&lastname='.urlencode($post_data['last-name']);
		$api_url .= '&startdate='.date('Y-m-d',strtotime($post_data['checkin']));
		$api_url .= '&enddate='.$enddate;
		$api_url .= '&days='.$post_data['stay-duration'];
		$api_url .= '&mobile='.urlencode($post_data['contact-number']);
		$api_url .= '&email='.$post_data['email-address'];
		$api_url .= '&adults='.urlencode($post_data['number-of-adults']);
		$api_url .= '&children='.urlencode($post_data['number-of-children']);
		$api_url .= '&infants='.urlencode($post_data['number-of-infants']);
		$api_url .= '&pets='.urlencode($post_data['number-of-pets']);
		$api_url .= '&natureofstay='.urlencode($post_data['nature-of-stay']);
		// check if $property_id is empty or not
		if($property_id != '') {
			$api_url .= '&phone='.urlencode('222222');
			$api_url .= '&source='.urlencode('Enquire from website');
			$api_url .= '&propertyids='.$property_id;
		} else {
			$api_url .= '&phone='.urlencode('333333');
			$api_url .= '&source='.urlencode('Get In Touch');
		}
		$api_url .= '&comments='.urlencode($message);
		$api_url .= '&createdate='.date('Y-m-d',strtotime('now'));

		$curl = curl_init();

		curl_setopt_array($curl, array(
			CURLOPT_URL => IPRO_API_URL . $api_url,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => '',
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => 'POST',
			CURLOPT_HTTPHEADER => array(
				'Content-Length: 0',
				'Authorization: Bearer ' . $access_token
			),
		));

		$response = curl_exec($curl);

		curl_close($curl);
		error_log($response);
		$mail = (array)json_decode($response);
		if(!array_key_exists('Id', $mail)) {
			$message .= sprintf( __( 'Returned by iPRO API: %s' ), $response) . "\r\n\r\n";
			$sent_mail = wp_mail('report@kateandtoms.com', 'Enquiry or Get In Touch Error via Kate & Toms', $message);
			$sent_mail = wp_mail('elliott@squareonemd.co.uk', 'Enquiry or Get In Touch Error via Kate & Toms', $message);
		}
	
		wp_redirect('/thank-you/');

	}

	/**
	 * resolve period from string.
	 *
	 * @author  Elliott Richmond <elliott@squareonemd.co.uk>
	 *
	 * @since 1.0
	 *
	 * @param string    $string  the string period.
	 * @return string    $duration  the string period.
	 */
	public function resolve_booking_period($string) {

		/**

			Note on KT's period rates and days:

			2 night weekend = Friday(1) +1day checkout Sunday duration 3 days
			3 night weekend = Friday(1) +2day checkout Monday duration 4 days
			Week = Friday(1) +6day checkout Friday duration 7 days
			Midweek = Monday(1) +3day checkout Friday duration 4 days

		**/


		$string = strtolower($string);
		$string = str_replace(' ','-',$string);
		$array = array(
			'2-night-weekend' => '2',
			'3-night-weekend' => '3',
			'week' => '7',
			'midweek' => '4',
			'5-nights' => '4',
		);
		return $array[$string];
	}

	/**
	 * Process the form data.
	 *
	 * @author  Elliott Richmond <elliott@squareonemd.co.uk>
	 *
	 * @since 1.0
	 *
	 * @param int    $post_data  the forms post data.
	 */
	public function kateandtoms_process_booking_post_callback($post_data) {

		if ( !empty( $_POST['salutation'] ) ) {
			http_response_code(405);
			wp_die('Method Not Allowed');
		}

	    
	    // temporary hack to prevent spambot
	    if($post_data['email'] === 'testing@example.com') {
	        wp_die();
	    }
	    
	    if (strpos($post_data['first-name'], 'Jcfuzqsq') !== false) {
            wp_die();
        }
	    if (strpos($post_data['last-name'], 'Jcfuzqsq') !== false) {
            wp_die();
        }


		$duration = $this->resolve_booking_period($post_data['period']);
		$enddate = date('Y-m-d',strtotime($post_data['date_from'].' + ' . $duration . 'days'));
		$property_id = $this->ipro_reflookup_callback($post_data['post_id']);

		$access_token = $this->generate_access_token();

		$message = sprintf( __( 'Booking details are detailed below:' )) . "\r\n\r\n";

		$message .= sprintf( __( 'Full name: %s' ), $post_data['first-name'].' '.$post_data['last-name']) . "\r\n\r\n";
		$message .= sprintf( __( 'Email address: %s' ), $post_data['email']) . "\r\n\r\n";
		$message .= sprintf( __( 'Mobile number: %s' ), $post_data['mobile']) . "\r\n\r\n";
		$message .= sprintf( __( 'Address: %s' ), $post_data['address-1'].' '.$post_data['address-1'].' '.$post_data['address-2'].' '.$post_data['address-3'].' '.$post_data['address-4'].' '.$post_data['address-5']) . "\r\n\r\n";
		$message .= sprintf( __( 'Booking details:' )) . "\r\n\r\n";

		$message .= sprintf( __( 'House name: %s' ), $post_data['property_name']) . "\r\n\r\n";
		$message .= sprintf( __( '%s from %s' ), $post_data['period'], $post_data['date_from']) . "\r\n\r\n";
		$message .= sprintf( __( 'Number of Adults: %s' ), $post_data['number-of-adults']) . "\r\n\r\n";
		$message .= sprintf( __( 'Number of Children: %s' ), $post_data['number-of-children']) . "\r\n\r\n";
		$message .= sprintf( __( 'Number of Infants: %s' ), $post_data['number-of-infants']) . "\r\n\r\n";
		$message .= sprintf( __( 'Number of Pets: %s' ), $post_data['number-of-pets']) . "\r\n\r\n";
		$message .= sprintf( __( 'Breed of Pets: %s' ), $post_data['breed-of-pets']) . "\r\n\r\n";
		$message .= sprintf( __( 'Age of Pets: %s' ), $post_data['age-of-pets']) . "\r\n\r\n";
		$message .= sprintf( __( 'Nature of event: %s' ), $post_data['nature-of-stay']) . "\r\n\r\n";
		$message .= sprintf( __( 'Age range: %s - %s' ), $post_data['age-range-from'], $post_data['age-range-to']) . "\r\n\r\n";

		// wp_mail('hello@kateandtoms.com', 'Booking of '.$post_data['property_name'].' from Kate & Tom\'s date: ' . $post_data['period'] . ' from ' . $post_data['date_from'], $message, $headers);

		$api_url = '/apis/enquiry?';
		$api_url .= 'firstname='.urlencode($post_data['first-name']);
		$api_url .= '&lastname='.urlencode($post_data['last-name']);
		$api_url .= '&startdate='.date('Y-m-d',strtotime($post_data['date_from']));
		$api_url .= '&enddate='.$enddate;
		$api_url .= '&days='.$duration;
		$api_url .= '&mobile='.urlencode($post_data['mobile']);
		$api_url .= '&phone='.urlencode('111111');
		$api_url .= '&email='.$post_data['email'];
		$api_url .= '&adults='.urlencode($post_data['number-of-adults']);
		$api_url .= '&children='.urlencode($post_data['number-of-children']);
		$api_url .= '&infants='.urlencode($post_data['number-of-infants']);
		$api_url .= '&pets='.urlencode($post_data['number-of-pets']);
		$api_url .= '&natureofstay='.urlencode($post_data['nature-of-stay']);
		$api_url .= '&source='.urlencode('Book Now');
		$api_url .= '&propertyids='.$property_id;
		$api_url .= '&comments='.urlencode($message);
		$api_url .= '&createdate='.date('Y-m-d',strtotime('now'));
		
		

		$curl = curl_init();

		curl_setopt_array($curl, array(
			CURLOPT_URL => IPRO_API_URL . $api_url,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => '',
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => 'POST',
			CURLOPT_HTTPHEADER => array(
				'Content-Length: 0',
				'Authorization: Bearer ' . $access_token
			),
		));

		$response = curl_exec($curl);
		curl_close($curl);

		error_log($response);
		$mail = (array)json_decode($response);
		if(!array_key_exists('Id', $mail)) {
			$message .= sprintf( __( 'Returned by iPRO API: %s' ), $response) . "\r\n\r\n";
			$sent_mail = wp_mail('report@kateandtoms.com', 'Book Now Error via Kate & Toms', $message);
			$sent_mail = wp_mail('elliott@squareonemd.co.uk', 'Book Now Error via Kate & Toms', $message);
		}

		wp_redirect('/thank-you/');

	}

	/**
	 * Process the form data.
	 *
	 * @author  Elliott Richmond <elliott@squareonemd.co.uk>
	 *
	 * @since 1.0
	 *
	 * @param int    $post_data  the forms post data.
	 */
	public function kateandtoms_process_contact_partners_post_callback($post_data) {

		if ( !isset( $post_data["g-recaptcha-response"] ) && empty( $post_data["g-recaptcha-response"] ) ) {
			
			error_log( 'reCAPTCHA verification failed. Suspected spam before sending to iPro.' );
			error_log( json_encode( $post_data ) );
			error_log( json_encode( $_SERVER ) );
       		wp_die('Not you again!');

		}


		$headers[] = 'From: '.$post_data['first-name'].' '.$post_data['last-name'].' <'.$post_data['email-address'].'>';

		$message = sprintf( __( 'From: %s' ), $post_data['first-name'].' '.$post_data['last-name'].' <'.$post_data['email-address'].'>' . ' Contact number: '. $post_data['contact-number']) . "\r\n\r\n";
		$message .= sprintf( __( 'Message Body: %s' ), $post_data['your-message'] ) . "\r\n\r\n";
		$message .= sprintf( __( 'House Name: %s' ), $post_data['house-name'] ) . "\r\n\r\n";
		$message .= sprintf( __( 'House Postcode: %s' ), $post_data['house-postcode'] ) . "\r\n\r\n";
		$message .= sprintf( __( 'Website: %s' ), $post_data['website'] ) . "\r\n\r\n";
		$message .= sprintf( __( 'Where did you hear about us: %s' ), $post_data['source'] ) . "\r\n\r\n";
		$message .= sprintf( __( 'Source (if other): %s' ), $post_data['other-source'] ) . "\r\n\r\n";

		wp_mail(array('hayley@kateandtoms.com', 'jonathanw@kateandtoms.com', 'andy@kateandtoms.com'), 'Website Partners enquiry from Kate & Tom\'s', $message, $headers);

		wp_redirect('/thank-you/');

	}





	/**
	 * Check the quiz form.
	 *
	 * @author  Elliott Richmond <elliott@squareonemd.co.uk>
	 *
	 * @since 1.0
	 *
	 */
	public function ktsgif_contact_form() {
		// Handle request then generate response using WP_Ajax_Response
		$nonce = $_POST['nextNonce'];
		if ( ! wp_verify_nonce( $nonce, 'wwcc-ktsgif-nonce' ) ) {
			die ( 'Busted!' );
		}

		$quizmasters = $this->kateandtoms_form_quiz();
		$_POST['quizValue'] = str_replace(' ', '', $_POST['quizValue']);

		foreach ($quizmasters as $quizmaster) {
			if(array_key_exists($_POST['quizAnswerKey'], $quizmaster)) {
				if ($_POST['quizValue'] == $quizmaster[$_POST['quizAnswerKey']]) {
					$_POST['correct'] = true;
				} else {
					$_POST['correct'] = 0;
				}
			}
		}

		wp_send_json($_POST);

		// Don't forget to stop execution afterward.
		wp_die();
	}

}
