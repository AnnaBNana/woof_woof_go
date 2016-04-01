<?php

/**
 * Yelp API v2.0 code sample.
 *
 * This program demonstrates the capability of the Yelp API version 2.0
 * by using the Search API to query for businesses by a search term and location,
 * and the Business API to query additional information about the top result
 * from the search query.
 *
 * Please refer to http://www.yelp.com/developers/documentation for the API documentation.
 *
 * This program requires a PHP OAuth2 library, which is included in this branch and can be
 * found here:
 *      http://oauth.googlecode.com/svn/code/php/
 *
 * Sample usage of the program:
 * `php sample.php --term="bars" --location="San Francisco, CA"`
 */

// Enter the path that the oauth library is in relation to the php file

require_once(APPPATH.'/controllers/lib/OAuth.php');

// Set your OAuth credentials here
// These credentials can be obtained from the 'Manage API Access' page in the
// developers documentation (http://www.yelp.com/developers)
// $CONSUMER_KEY = '_pmw3YMrac7ofHFpGiiMyA';
// $CONSUMER_SECRET = 'pJtz8l91IymifCyoQFDmDyK3jTE';
// $TOKEN = 'AyNJ46oaiV8Oxi11-3JiE6lXihKGq6-8';
// $TOKEN_SECRET = 'x9RtygUWK31cYyOURyxofztMfsg';
//
//
// $API_HOST = 'api.yelp.com';
// $DEFAULT_TERM = 'Greer Park';
// $DEFAULT_LOCATION = 'San Jose, CA';
// $SEARCH_LIMIT = 3;
// $SEARCH_PATH = '/v2/search/';
// $BUSINESS_PATH = '/v2/business/';


/**
 * Makes a request to the Yelp API and returns the response
 *
 * @param    $host    The domain host of the API
 * @param    $path    The path of the APi after the domain
 * @return   The JSON response from the request
 */

class Yelp extends CI_Controller {

  public $CONSUMER_KEY = '_pmw3YMrac7ofHFpGiiMyA';
  public $CONSUMER_SECRET = 'pJtz8l91IymifCyoQFDmDyK3jTE';
  public $TOKEN = 'AyNJ46oaiV8Oxi11-3JiE6lXihKGq6-8';
  public $TOKEN_SECRET = 'x9RtygUWK31cYyOURyxofztMfsg';

  public $API_HOST = 'api.yelp.com';
  public $DEFAULT_TERM = 'park';
  public $DEFAULT_LOCATION = 'San Jose, Ca';
  public $SEARCH_LIMIT = 3;
  public $SEARCH_PATH = '/v2/search/';
  public $BUSINESS_PATH = '/v2/business/';

  public function __construct() {
		parent::__construct();
    // $this->load->model('Query');
		// $this->load->helper('globals');
	}

  function request($host, $path) {

      $token = $this->TOKEN;
      $token_secret = $this->TOKEN_SECRET;
      $consumer_key = $this->CONSUMER_KEY;
      $consumer_secret = $this->CONSUMER_SECRET;
      $unsigned_url = "https://" . $host . $path;


      // Token object built using the OAuth library
      $token = new OAuthToken($token, $token_secret);

      // Consumer object built using the OAuth library
      $consumer = new OAuthConsumer($consumer_key, $consumer_secret);

      // Yelp uses HMAC SHA1 encoding
      $signature_method = new OAuthSignatureMethod_HMAC_SHA1();

      $oauthrequest = OAuthRequest::from_consumer_and_token(
          $consumer,
          $token,
          'GET',
          $unsigned_url
      );

      // Sign the request
      $oauthrequest->sign_request($signature_method, $consumer, $token);

      // Get the signed URL
      $signed_url = $oauthrequest->to_url();

      // Send Yelp API Call
      try {
          $ch = curl_init($signed_url);
          if (FALSE === $ch)
              throw new Exception('Failed to initialize');
          curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
          curl_setopt($ch, CURLOPT_HEADER, 0);
          $data = curl_exec($ch);

          if (FALSE === $data)
              throw new Exception(curl_error($ch), curl_errno($ch));
          $http_status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
          if (200 != $http_status)
              throw new Exception($data, $http_status);

          curl_close($ch);
      } catch(Exception $e) {
          trigger_error(sprintf(
              'Curl failed with error #%d: %s',
              $e->getCode(), $e->getMessage()),
              E_USER_ERROR);
      }

      return $data;
  }

  /**
   * Query the Search API by a search term and location
   *
   * @param    $term        The search term passed to the API
   * @param    $location    The search location passed to the API
   * @return   The JSON response from the request
   */
  function search($term, $location) {
      $url_params = array();

      $new_term = $this->DEFAULT_TERM;
      $new_location = $this->DEFAULT_LOCATION;
      $new_search_limit = $this->SEARCH_LIMIT;
      $new_search_path = $this->SEARCH_PATH;

      $url_params['term'] = $term ?: $new_term;
      $url_params['location'] = $location?: $new_location;
      $url_params['limit'] = $new_search_limit;
      $search_path = $new_search_path . "?" . http_build_query($url_params);

      return $this->request($this->API_HOST, $search_path);
  }

  /**
   * Query the Business API by business_id
   *
   * @param    $business_id    The ID of the business to query
   * @return   The JSON response from the request
   */
  function get_business($business_id) {
      $bp = $this->BUSINESS_PATH;
      $business_path = $bp . urlencode($business_id);
      $api_host = $this->API_HOST;
      return $this->request($api_host, $business_path);
  }

  /**
   * Queries the API by the input values from the user
   *
   * @param    $term        The search term to query
   * @param    $location    The location of the business to query
   */
  function query_api($term, $location) {
      $response = json_decode($this->search($term, $location));
      $business_id = $response->businesses[0]->id;

      // print sprintf(
      //     "%d businesses found, querying business info for the top result \"%s\"\n\n",
      //     count($response->businesses),
      //     $business_id
      // );

      $response = $this->get_business($business_id);

      // print sprintf("Result for business \"%s\" found:\n", $business_id);
      return "$response\n";
  }

  public function park($park_id, $park_name, $park_loc) {
    $req = $this->query_api($park_name, $park_loc);
    $park_data = json_decode($req, true);
    $yelp_data = array(
      "rating_img_url" => $park_data['rating_img_url_large'],
      "review_count" => $park_data['review_count'],
      "url" => $park_data['url'],
      "reviews" => $park_data['reviews'][0],
      "image_url" => $park_data['image_url'],
      "review_image_url" => $park_data['snippet_image_url']
    );
    // var_dump($park_data);
    // die();
    $reg['park_id'] = $park_id;
    $reg['yelp_data'] = $yelp_data;
    if ($this->session->userdata('login_status') == true) {
      $reg['id'] = $this->session->userdata['id'];
      $this->load->view('header');
      $this->load->view('navbar');
      $this->load->view('park', $reg);
      $this->load->view('footer');
    } else {
      $this->load->view('header');
      $this->load->view('park', $reg);
      $this->load->view('footer');
    }

  }

}
?>
