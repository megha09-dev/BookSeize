<?php
	class others extends CI_Controller
	{
		

		function __construct()
		{
			parent::__construct();
			$this->load->helper('url');
			$this->load->model('model_admin');
			$this->load->library("session");
			$this->load->library('Password_encryption');
			$this->load->helper('auth');
			authcheck();

		}

		 function datetime()
		{
			 date_default_timezone_set('Asia/Kolkata');
			 $timestamp = time();
			  $date_time = date("Y-m-d  H:i:s", $timestamp);
			return $date_time;
		}

		function feedback()
		{
			$result["data"]=$this->model_admin->feedback();
			$this->load->view("feedback",$result);
		}
		function testimonial()
		{
			$result["data"]=$this->model_admin->testimonial();
			$this->load->view("testimonial",$result);	
		}


		function isapproved()
		{
				$id=$this->input->get("id");
				$status=$this->input->get("status");
				if($status==1)
				{
					$status1=0;
				}
				else
				{
					$status1=1;
				}
				$data = array('IsApproved' => $status1 );
				$this->model_admin->isactive("tbltestimonial",$data,$id,"TestimonialId");
				redirect(base_url()."others/testimonial");
		}		


		function banner()
		{
				$result["data"]=$this->model_admin->getdata("tblbanner","BannerId");
				$this->load->view("banner",$result);
		}

		function isactive()
		{
				$id=$this->input->get("id");
				$status=$this->input->get("status");
				if($status==1)
				{
					$status1=0;
				}
				else
				{
					$status1=1;
				}
				$data = array('IsActive' => $status1 );
				$this->model_admin->isactive("tblbanner",$data,$id,"BannerId");
				redirect(base_url()."others/banner");
		}

		function addbanner()
		{
				if($this->input->post("btnaddbanner"))
				{
					//echo $this->input->post("filename");
					$config["allowed_types"]="jpg|png|jpeg";
					$config["upload_path"]="./banner_images/";
					$this->load->library("upload",$config);
					if($this->upload->do_upload("filename"))
					{
						//echo $this->input->post("filename");
						$filedata=$this->upload->data();
						echo $filedata["file_name"];
					}
					else
					{	
						print_r($this->upload->display_errors());
					}

					$date=$this->datetime();
					$data = array
					(
						'ImageName'=>$filedata["file_name"],
						'IsActive'=>1,
						'CreatedOn'=>$date
					);
					$this->model_admin->insert("tblbanner",$data);
					redirect(base_url()."others/banner");
				}
		}

		function deletebanner()
		{
				$id=$this->input->get("id");
				$where = array('BannerId' => $id );
				$result=$this->model_admin->selectone("tblbanner",$where);
				//print_r($result);
					if(file_exists("banner_images/".$result['ImageName']))
					{
						//echo $result["ImageName"];
						unlink("banner_images/".$result['ImageName']);
					}
				$this->model_admin->deletemain("tblbanner",$id,"BannerId");
				redirect(base_url()."others/banner");
		}

		function deleteselectedbanner()
		{
				//print_r($this->input->post("delete"));
				$result=$this->model_admin->getdata_in("tblbanner","BannerId",$this->input->post("delete"));
					//echo $value["ImageName"];
				//print_r($result);
					foreach ($result as $value) 
					{
						if(file_exists("banner_images/".$value['ImageName']))
						{
							//echo $value["ImageName"];
							unlink("banner_images/".$value['ImageName']);
						}
					}
				$this->model_admin->deleteall("tblbanner",$this->input->post("delete"),"BannerId");

				redirect(base_url()."others/banner");
		}

		function inquiry()
		{
			$result["data"]=$this->model_admin->inquiry();
			$this->load->view("inquiry",$result);
		}

		function dataforinquiry()
		{
			$id=$this->input->post("inquiryid");
			$where = array('InquiryId' => $id );
			$result=$this->model_admin->inquiry($where);
			echo 'To :'.$result["EmailId"].'<hr> Subject : '.$result["Subject"].'<hr>   <textarea id="editor1" name="txtreply" rows="10" cols="80"></textarea>
			<button style="margin-top:10px;padding-left:30px;padding-right:30px" type="submit" class="btn btn-primary" name="btnreply"><i class="fa fa-paper-plane"></i></button>
			<input type="hidden" name="txtid" value="'.$result["InquiryId"].'">
                ';

		}

		function reply()
		{
			$id=$this->input->post("txtid");
			$where = array('InquiryId' => $id );
			$result=$this->model_admin->inquiry($where);
			// multiple recipients
			$to  = $result["EmailId"];
			// subject
			$subject =$result["Subject"];

			// message
			$message = $this->input->post("txtreply");

			// To send HTML mail, the Content-type header must be set
			$headers  = 'MIME-Version: 1.0' . "\r\n";
			$headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";

			// Additional headers
			$headers .= 'To:'.$result["PersonName"]." ".$result["EmailId"]. "\r\n";
			$headers .= 'From: Bookseize' . "\r\n";


			// Mail it
			if(mail($to, $subject, $message, $headers))
			{	
				echo "mail sent";
			}	

			$date=$this->datetime();

			//echo $this->input->post('txtid');
			$result = array
				('IsReplied' => 1,
				 'RepliedOn'=>$date,
				 'RepliedBy'=>$_SESSION["AdminName"],
				 'Reply'=>$this->input->post("txtreply"));
     			 $this->model_admin->update("tblbookinquiry",$this->input->post('txtid'),$result,"InquiryId");
				print_r($result);
				redirect(base_url()."others/inquiry");
		}

		function changepwd()
		{
			$this->load->view("changepwd");
		}
		function pwdupdate()
		{
		    $result = array
		    (
			'Password'=>$this->password_encryption->encrypt($this->input->post("txtconpwd"))			
		     );
		     $this->model_admin->update("tbladmin",$_SESSION["AdminId"],$result,"AdminId");
				print_r($result);
				session_destroy();
				redirect(base_url()."admin_c");

		}
		function checkpwd()
		{
			$pwd=$this->password_encryption->encrypt($this->input->post("curpwd"));
			$where = array('AdminId' => $_SESSION["AdminId"] );
			$result=$this->model_admin->selectone("tbladmin",$where);
			if($result["Password"]!=$pwd)
			{
				echo " * Password does not match!";
			}
			else
			{
				echo "";
			}
		}

		function report()
		{
			$string='[';
			
			$result=$this->model_admin->getdatachart();

			foreach ($result as $value) {
				if($value["Month"]=="01")
				{
					$string.='{y:"jan",a:'.$value["Total"].'},';
				}
				if($value["Month"]=="02")
				{
					$string.='{y:"feb",a:'.$value["Total"].'},';
				}
				if($value["Month"]=="03")
				{
					$string.='{y:"march",a:'.$value["Total"].'},';
				}
				if($value["Month"]=="04")
				{
					$string.='{y:"april",a:'.$value["Total"].'},';
				}
				if($value["Month"]=="05")
				{
					$string.='{y:"may",a:'.$value["Total"].'},';
				}
				if($value["Month"]=="06")
				{
					$string.='{y:"jun",a:'.$value["Total"].'},';
				}
				if($value["Month"]=="07")
				{
					$string.='{y:"july",a:'.$value["Total"].'},';
				}
				if($value["Month"]=="08")
				{
					$string.='{y:"aug",a:'.$value["Total"].'},';
				}
				if($value["Month"]=="09")
				{
					$string.='{y:"sep",a:'.$value["Total"].'},';
				}
				if($value["Month"]=="10")
				{
					$string.='{y:"oct",a:'.$value["Total"].'},';
				}
				if($value["Month"]=="11")
				{
					$string.='{y:"nov",a:'.$value["Total"].'},';
				}
				if($value["Month"]=="12")
				{
					$string.='{y:"dec",a:'.$value["Total"].'}';
				}
				
			}
			$string.=']';
			$book['result'] = $string;
		
			$this->load->view("report",$book);
		}
	}
?>

