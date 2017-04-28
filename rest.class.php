<?php
	

	class restCurl{

		private static $username;
		private static $password;

		public function __construct($username, $password){	
			self::$username = $username;
			self::$password = $password;
		}

		private static function execute($method, $url, $parameter = NULL){

			//Authentication
			$credentials = base64_encode(self::$username.":".self::$password);
	 		$httpHeader = array("Content-Type: application/json; charset=utf-8","Authorization: Basic " . $credentials);

	 		//curl init
	 		$curl = curl_init($url);

	 		//parameter is true
	 		if($parameter!=NULL AND $method=='POST' OR $method=='PUT'){
	 			//send parameter
	 			curl_setopt($curl, CURLOPT_POSTFIELDS, $parameter);
	 		}

	 		//method type
	 		switch($method){
	 			case 'PUT': curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT"); break;
	 			case 'DELETE': curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "DELETE"); break;
	 			case 'POST': curl_setopt($curl, CURLOPT_POST, true);; break;
	 		}

	 		//curl prepare
	 		curl_setopt($curl, CURLOPT_HTTPHEADER, $httpHeader);
	 		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, true);
	 		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

	 		//response
	 		$response = curl_exec($curl);
	 		$status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
	 		
	 		//close
	 		curl_close($curl);

	 		//return
	 		return array('status' => $status, 'data' => json_decode($response, true));


		}

		final static function get($url){
			return self::execute('GET', $url);
		}

		final static function post($url, $parameter){
			return self::execute('POST', $url, $parameter);
		}

		final static function put($url, $parameter){
			return self::execute('PUT', $url, $parameter);
		}

		final static function delete($url){
			return self::execute('DELETE', $url);
		}


	}