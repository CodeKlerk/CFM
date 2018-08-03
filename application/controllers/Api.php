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
				$response = array(
					'message' =>"Connection aborted: Please check your internet connection",
					'code'=> 5,
					'redirect'=> base_url().'account/home'
				);
				echo json_encode($response);
			}
		}
		public function signup()
		{

			$resource = 'services/app/Account/Register';

			$fullname = $_POST['fullname'];
			$surname = $_POST['surname'];
			$username = $_POST['username'];
			$email = $_POST['email'];
			$password = $_POST['password'];
			
			$payload = array(
				'name'=>$fullname,
				'surname'=>$surname,
				'userName'=>$username,
				'emailAddress'=>$email,
				'password'=>$password,
				'captchaResponse'=>"string"
			);

			$response = $this->sendRequest($resource,'POST',$payload);
			if ($response){
// $response->success
				$response = array(
					'message' =>"Account created succesfully",
					'code'=> 5,
					'redirect'=> base_url().'account/login'
				);
				echo json_encode($response);

			}
			else{
				$response = array(
					'message' =>"Connection aborted: Please check your internet connection",
					'code'=> 5,
					'redirect'=> base_url().'account/login'
				);
				echo json_encode($response);
			}
		}

		public  function userInfo(){

			$resource ="services/app/Profile/GetCurrentUserProfileForEdit";

			$response = $this->sendRequest($resource,'GET','',$this->session->userdata('token'));
			if ($response){

				$data['userid'] = $response->result->userId;
				$data['name'] = $response->result->name;
				$data['surname'] = $response->result->surname;
				$data['username'] = $response->result->userName;
				$data['emailaddress'] = $response->result->emailAddress;
				$data['phonenumber'] = $response->result->phoneNumber;

				$this->session->set_userdata($data);
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
			if ($datatable == 'datatable'){
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

			$resource ="services/app/MemberPledges/GetAll?ActiveFilter=1";
			$response = $this->sendRequest($resource,'GET','',$this->session->userdata('token'));
			if ($datatable == 'datatable'){
				// $result = array();
				$result['data'] = array();
				foreach ($response->result->items as $key => $item) {
					$arr = array();

					$arr = [
						$item->memberPledge->name,
						$item->memberPledge->amount,
						$item->memberPledge->balance,
						$item->memberPledge->contributed,
						$this->lookup('roles',null,$item->memberPledge->pledgeStakeId)->displayName,
						$item->memberPledge->memberId,	
						$item->memberPledge->initialPayment

					];
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
				// $this->userInfo();
			}
			else{
				echo "Connection aborted: Please check your internet connection";
			}

		}

		public function lookup($object,$json = null,$id = null){

			switch ($object) {
				
				case 'stakes':
				$resource = 'services/app/PledgeStakes/GetAll?MobileAppFilter=1&WebAppFilter=1';
				break;

				case 'roles':
				$resource = 'services/app/Role/GetRoles';
				break;

				case 'organizations':
				$resource = 'services/app/OrganizationUnit/GetOrganizationUnits';
				break;
				
				case 'relationships':
				$resource = 'services/app/OrganizationUnit/GetOrganizationUnits';
				break;

				case 'periods':
				$resource = 'services/app/OrganizationUnit/GetOrganizationUnits';
				break;

				case 'paymentmodes':
				$resource = 'services/app/PaymentModes/GetAll?ActiveFilter=1';
				break;



				default:
				break;
			}
			$returnable;
			// echo $id;
			$response = $this->sendRequest($resource,'GET','',$this->session->userdata('token'));
			if($id!==null){
				foreach ($response->result->items as $key => $value) {
					$returnable = ($value->id = $id) ? $response->result->items[$key] : $returnable ;
				}
			}
			else{
				$returnable = $response->result->items;
			}
			if($json !== null){
				header('Content-Type: application/json');
				echo json_encode($returnable);
			}
			return $returnable;
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