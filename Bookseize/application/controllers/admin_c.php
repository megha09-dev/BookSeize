<?php
  /**
  * 
  */
  class admin_c extends CI_Controller
  {
  	
  	function __construct()
  	{
  		parent::__construct();
		$this->load->helper('url');
		$this->load->model('model_admin');
		$this->load->library("session");
		$this->load->library('Password_encryption');
  	}
  	function index()
  	{
  		$this->load->view("login_admin");
			if(isset($_POST["btnsignin"]))
			{
						
				$where=array(
				'EmailId'=>$this->input->post("txtmail"),
				'Password'=>$this->password_encryption->encrypt($this->input->post("txtpwd"))
				);
				$data=$this->model_admin->selectone("tbladmin",$where);
				print_r($data);
				if(count($data)>0)
				{
					//echo "ok";
					$sessiondata=array(
					'AdminId'=>$data["AdminId"],
					'AdminName'=>$data["AdminName"],
					'EmailId'=>$data["EmailId"],
					'ContactNo'=>$data["ContactNo"],
					'ImageUrl'=>$data["ImageUrl"]
					);
					$this->session->set_userdata($sessiondata);
					print_r($sessiondata);
					echo $this->session->userdata("AdminId");
					echo "<br>";
					echo $this->session->userdata("AdminName");		
					redirect(base_url()."home");
				}
				else
				{
					$this->session->set_flashdata("error",true);
					redirect(base_url()."admin_c");
								
				}
			}
  	}

  	function forgotpwd()
  	{
  		$this->load->view("forgotpwd");
  	}

  	function checkemail()
  	{
  		$email=$_POST["email"];
		$where = array('EmailId' => $email );
		$result=$this->model_admin->checkrecord("tbladmin",$where);
		if($result!="true")
		{
			echo "* Email doesn't match!";
		}
		else
		{
			echo "";
		}
  	}

  	function otp()
  	{
  		$email=$this->input->post("txtemail");
  		$where = array('EmailId' => $email );
  		$result=$this->model_admin->selectone("tbladmin",$where);
  		if($email==$result["EmailId"])
  		{
  			$to  = $result["EmailId"];
			// subject
			$subject ="Bookseize - Forgot Password";

			// message
			$message = rand(1000,9999);
			$_SESSION["otp"]=$message;

			// To send HTML mail, the Content-type header must be set
			$headers  = 'MIME-Version: 1.0' . "\r\n";
			$headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";

			// Additional headers
			$headers .= 'To:'.$result["AdminName"]." ".$result["EmailId"]. "\r\n";
			$headers .= 'From: Bookseize' . "\r\n";


			// Mail it
			if(mail($to, $subject, $message, $headers))
			{	
				$this->load->view("otpvarification");
			}	

  		}
  		else
  		{
  			echo "Invalid";
  		}
  	}

  	function setpwd()
  	{
  		if($_SESSION["otp"]==$this->input->post("txtotp"))
  		{
  			$this->load->view("setpassword");
  		}
  		
  	}
  }

?>