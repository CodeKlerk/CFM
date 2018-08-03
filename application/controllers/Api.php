	<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Api extends CI_Controller {

		public function __construct()
		{    	
			parent::__construct();
			$this->load->library('Session');

			$this->endpoint = "http://saleslifecrm.com:5000/api/";
		}

		// login function for API

		public function login()
		{

			$resource = 'TokenAuth/Authenticate';
			$payload = array(
				'userNameOrEmailAddress'=> $_POST['username'],
				'password'=> $_POST['password'],
				'twoFactorVerificationCode'=> "string",
				'rememberClient'=> true,
				'twoFactorRememberClientToken'=> "string",
				'singleSignIn'=> true,
				'returnUrl'=> "string"
			);

			$response = $this->sendRequest($resource,'POST',$payload);
			if ($response){
				$session_array = array('userid'=> $response->result->userId,
					'token'=>$response->result->accessToken);
				$session_data = $this->session->set_userdata($session_array);
				$this->userInfo();
			}
			else{
				echo "Connection aborted: Please check your internet connection";
			}

		}

		public  function userInfo(){

			$resource ="/api/services/app/Profile/GetCurrentUserProfileForEdit";

			$response = $this->sendRequest($resource,'GET','',$this->session->userdata('token'));
	// var_dump($response);die;
			if ($response){

				header('Content-Type: application/json');
				echo json_encode($response,JSON_PRETTY_PRINT);
			}
			else{
				echo "Connection aborted: Please check your internet connection";
			}




		}

		public function getMembers($datatable = null){

			$resource ="services/app/Members/GetAll";


			$response = $this->sendRequest($resource,'GET','',$this->session->userdata('token'));
			// echo "<pre>";var_dump($this->session->all_userdata());			die;
			if ($datatable == 'datatable'){
				// $result = array();
				$result['data'] = array();
				foreach ($response->result->items as $key => $item) {
					$arr = array();

					$arr = [$item->member->fullName,$item->member->cellphone,$item->member->emailAddress,$item->member->id];
					array_push($result['data'], $arr);
				}
				$response = $result;
			}

			if ($response){

				header('Content-Type: application/json');
				echo json_encode($response,JSON_PRETTY_PRINT);
			}
			else{
				echo "Connection aborted: Please check your internet connection";
			}

		}

		public function getPledges($datatable = null){

			$resource ="services/app/MemberPledges/GetAll";


			$response = $this->sendRequest($resource,'GET','',$this->session->userdata('token'));
			if ($datatable == 'datatable'){
				// $result = array();
				$result['data'] = array();
				foreach ($response->result->items as $key => $item) {
					$arr = array();

					$arr = [$item->member->fullName,$item->member->cellphone,$item->member->emailAddress,$item->member->id];
					array_push($result['data'], $arr);
				}
				$response = $result;
			}

			if ($response){

				header('Content-Type: application/json');
				echo json_encode($response,JSON_PRETTY_PRINT);
			}
			else{
				echo "Connection aborted: Please check your internet connection";
			}

		}


		public function CreatePledge()
		{

			$resource = 'services/app/MemberPledges/CreateOrEdit';
			$payload = array(
				'name'=> "Serious pledge",
				'amount'=> 5000000,
				'datePledged'=> "2018-07-24T22:33:10.163Z",
				'initialPayment'=> 0,
				'contributed'=> 0,
				'balance'=> 0,
				'active'=> true,
				'memberId'=> 3,
				'userId'=> $this->session->userdata('userId'),
				'pledgeStakeId'=> 0,
				'paymentPeriodId'=> 0,
				'isDeleted'=> true,
				'deleterUserId'=> 0,
				'deletionTime'=> "2018-07-23T22:33:10.164Z",
				'lastModificationTime'=> "2018-07-23T22:33:10.164Z",
				'lastModifierUserId'=> 0,
				'creationTime'=> "2018-07-23T22:33:10.164Z",
				'creatorUserId'=> 0,
				'id'=> 0

			);
			$response = $this->sendRequest($resource,'POST',$payload);
			if ($response){

				$session_array = array('userid'=> $response->result->userId,
					'token'=>$response->result->accessToken);
				$session_data = $this->session->set_userdata($session_array);
				$this->userInfo();
			}
			else{
				echo "Connection aborted: Please check your internet connection";
			}

		}









	// API interaction function
		private function sendRequest($resource,$method, $payload = null,$authorization = null){
			//  Initiate cURL.
			$ch = curl_init($this->endpoint.$resource);
			//  The JSON data.
			//  Encode the array into JSON.
			$jsonDataEncoded = json_encode($payload);
			//  Tell cURL that we want to send a POST request.
			
			if ($method == 'POST') {
				curl_setopt($ch, CURLOPT_POST, 1);
			//  Attach our encoded JSON string to the POST fields.
				curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonDataEncoded);
			}
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);

			//  Set the content type to application/json
			curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Abp.TenantId: 5','Authorization: Bearer '.$authorization)); 
			$response = curl_exec($ch);
			$status = curl_getinfo($ch);
			curl_close($ch);
			return json_decode($response);

		}
	}