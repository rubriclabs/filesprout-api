<?php 
/*
 * Filesprout API 
*/

// Example useage
require("path/to/this/filename.php");

$f = new filesprout();

// Setup your product
$f->setName('Test Product');
$f->setPrice('20.00');
$f->setCurrency('USD');
$f->setEmail('paypalemail@address.com');
$f->setDownloadURI('http://location_of_your_file/product.pdf');

// Get link 
$link = $f->getLink();	
echo $link;

echo '<hr/>';

// Get Button
$button = $f->getButton();
echo $button;

*/

class filesprout {

	/**
	 * Target endpoint for Filesprout.com API
	 *
	 * @var string
	 */
	
	private $api = 'https://filesprout.com/l/api/';
	
	
	/**
	 * API version to access
	 *
	 * @var string
	 */
	
	private $version = '1.0';
	
	
	/**
	 * The name of the product
	 *
	 * @var string
	 */
	
	private $name;
	
	
	/**
	 * The price of the product
	 *
	 * @var float
	 */
	
	private $price;
	
	
	/**
	 * The currency for the transaction
	 * Potential values are GBP, USD, or EUR
	 *
	 * @var string
	 */
	
	private $currency;
	
	
	/**
	 * Paypal Email address
	 *
	 * @var string
	 */
	
	private $email;
	
	
	/**
	 * Location on internet of the file to be downloaded
	 * once the transaction is complete
	 *
	 * @var string
	 */
	
	private $downloadURI;
	
	
	/**
	 * Method called on API
	 * Potential values are 'getbutton' or 'getlink'
	 *
	 * @var string
	 */
	
	private $route;
	
	
	/**
	 * Set product name
	 *
	 * @param string $name
	 */

	public function setName($name) {
		$this->name = $name;  
	}
	
	
	/**
	 * Set product price
	 *
	 * @param float $price
	 */
	
	public function setPrice($price) {
		$this->price = $price;  
	}
	
		
	/**
	 * Set currency
	 *
	 * @param string $currency
	 */
	
	public function setCurrency($currency) {
		$this->currency = strtoupper($currency);  
	}
	
	
	/**
	 * Set email address
	 *
	 * @param string $email
	 */
	
	public function setEmail($email) {
		$this->email = $email;  
	}
	
	
	/**
	 * Sets URI from which the digital download can be downloaded once purchased
	 *
	 * @param string $uri
	 */
	
	public function setDownloadURI($uri) {
		$this->downloadURI = $uri;  
	}
	
	
	/**
	 * Gets a link from Filesprout, for use in email and social media etc
	 */
	
	public function getLink() {
		$this->route = 'getlink';
		$getLink = $this->makeRequest();
		if(isset($getLink['error'])) {
			return $getLink['error'];
		} else {
			return $getLink['data'];
		}		
		
	}	
	
	
	/**
	 * Gets a full button from Filesprout, for use on websites etc.
	 */
	
	public function getButton() {
		$this->route = 'getbutton';
		$getButton = $this->makeRequest();
		if(isset($getButton['error'])) {
			return $getButton['error'];
		} else {
			return $getButton['data'];
		}		
	}	
	
	
	/**
	 * Utility method that makes the assembles the request and makes it
	*/
	
	private function makeRequest() {
		
		$product = array(
			'name' => $this->name,
			'price' => $this->price,
			'currency' => $this->currency,
			'email' => $this->email,
			'downloadURI' => $this->downloadURI
		);
		
		$data = json_encode($product);
		$apiRequest = $this->api . $this->version. '/' . $this->route;
		
		$ch = curl_init($apiRequest);                                                                      
		curl_setopt($ch, CURLOPT_POST ,1);                                                                 
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data);                                                                  
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                                                      
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
		    'Content-Type: application/json',                                                                                
		    'Content-Length: ' . strlen($data))                                                                       
		);		
		
		$response = curl_exec($ch);
		curl_close($ch);
		$product =  (array) json_decode($response);
		return $product;
	
	}	
}