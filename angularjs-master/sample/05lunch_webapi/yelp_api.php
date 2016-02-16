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
require_once('lib/OAuth.php');

// Set your OAuth credentials here  
// These credentials can be obtained from the 'Manage API Access' page in the
// developers documentation (http://www.yelp.com/developers)
$CONSUMER_KEY = NULL;
$CONSUMER_SECRET = NULL;
$TOKEN = NULL;
$TOKEN_SECRET = NULL;


$API_HOST = 'api.yelp.com';
$DEFAULT_TERM = 'lunch';
$DEFAULT_LOCATION = 'Tokyo, JP';
$DEFAULT_LANG = 'ja';
//$DEFAULT_LOCATION = 'Higashijujo, kita-ku, Tokyo, JP'
$SEARCH_LIMIT = 10;
$SEARCH_PATH = '/v2/search/';
$BUSINESS_PATH = '/v2/business/';


/** 
 * Makes a request to the Yelp API and returns the response
 * 
 * @param    $host    The domain host of the API 
 * @param    $path    The path of the APi after the domain
 * @return   The JSON response from the request      
 */
function request($host, $path) {
    $unsigned_url = "http://" . $host . $path;

    // Token object built using the OAuth library
    $token = new OAuthToken($GLOBALS['TOKEN'], $GLOBALS['TOKEN_SECRET']);

    // Consumer object built using the OAuth library
    $consumer = new OAuthConsumer($GLOBALS['CONSUMER_KEY'], $GLOBALS['CONSUMER_SECRET']);

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
    $ch = curl_init($signed_url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    $data = curl_exec($ch);
    curl_close($ch);
    
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
    
    $url_params['term'] = $term ?: $GLOBALS['DEFAULT_TERM'];
    $url_params['location'] = $location?: $GLOBALS['DEFAULT_LOCATION'];
    $url_params['limit'] = $GLOBALS['SEARCH_LIMIT'];
    $url_params['lang'] = $GLOBALS['DEFAULT_LANG'];
    $search_path = $GLOBALS['SEARCH_PATH'] . "?" . http_build_query($url_params);
    
    return request($GLOBALS['API_HOST'], $search_path);
}

/**
 * Query the Business API by business_id
 * 
 * @param    $business_id    The ID of the business to query
 * @return   The JSON response from the request 
 */
function get_business($business_id) {
    $url_params = array();
    $url_params['lang'] = $GLOBALS['DEFAULT_LANG'];
    $business_path = $GLOBALS['BUSINESS_PATH'] . $business_id . "?" .http_build_query($url_params);

    return request($GLOBALS['API_HOST'], $business_path);
}

/**
 * Queries the API by the input values from the user 
 * 
 * @param    $term        The search term to query
 * @param    $location    The location of the business to query
 */
function query_api($term, $location) {     
    $response = json_decode(search($term, $location));
    $business_id = $response->businesses[0]->id;
    
    print sprintf(
        "%d businesses found, querying business info for the top result \"%s\"\n\n",         
        count($response->businesses),
        $business_id
    );
    
    //$response = get_business($business_id);
    $response = get_business(urlencode($business_id));
    
    print sprintf("Result for business \"%s\" found:\n", $business_id);
    echo "$response\n";
}

function get_results($term, $location) {
    $response = json_decode(search($term, $location));
    return json_encode($response->businesses);
}

/**
 * User input is handled here 
 */
$longopts  = array(
    "term::",
    "location::",
);
    
$options = getopt("", $longopts);

$term = $options['term'] ?: 'lunch';
$location = $options['location'] ?: '渋谷駅';
// query_api($term, $location);
//get_results($term, $location);

switch ($_SERVER['REQUEST_METHOD']) {
case 'GET':
if (isset($_GET['storeId'])) {
    $business = get_business(urlencode($_GET['storeId']));
    $business = json_decode($business);
    $ar = [];
    $ar[] = $business;
    echo json_encode($ar);
} else if (isset($_GET['place'])) {
    $location = $_GET['place'];
    echo get_results($term, $location);
} else {
    echo get_results($term, $location);
}
break;
case 'POST':
  break;
case 'DELETE':
  break;
}


?>
