<?php
	class book_c extends CI_Controller
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

		private function datetime()
		{
			 date_default_timezone_set('Asia/Kolkata');
			 $timestamp = time();
			 $date_time = date("Y-m-d  H:i:s", $timestamp);
			 return $date_time;
		}

		function publisher()
		{
			$result["data"]=$this->model_admin->getdata("tblpublisher");
			$this->load->view("publisher",$result);
		}

		function addpublisher()
		{
			if($this->input->post("btnaddpub"))
			{
				$date=$this->datetime();
				$data = array
				('PublisherName' => $this->input->post("txtname") ,
				  'CreatedBy'=>$_SESSION["AdminId"],
				  'CreatedOn'=>$date);
				$this->model_admin->insert("tblpublisher",$data);
				redirect(base_url()."book_c/publisher");
			}
		}

		function checkpub()
			{
				$pub=$_POST["pub"];
				$where = array('PublisherName' => $pub );
				$result=$this->model_admin->checkrecord("tblpublisher",$where);
				if($result=="true")
				{
					echo "Publisher Already Exist!";
				}
				else
				{
					echo "";
				}
			}

		function editpubdata()
		{
				$pubid = $_POST["pubid"];

				$where = array('PublisherId' => $pubid );

				$data=$this->model_admin->selectone("tblpublisher",$where);

				echo ' <input type="text" class="form-control" name="txtname" placeholder="Enter Publisher Name" value="'.$data["PublisherName"].'">
                  <input type="hidden" name="pubid" id="pubid" value='.$data["PublisherId"].'" >';
		}

		function updatepub()
		{
				$result = array
				('PublisherName' => $this->input->post("txtname") );
				$this->model_admin->update("tblpublisher",$this->input->post('pubid'),$result,"PublisherId");
				redirect(base_url()."book_c/publisher");

		}

		function deleteselectedpub()
		{
				//print_r($this->input->post("delete"));
				$this->model_admin->deleteall("tblpublisher",$this->input->post("delete"),"PublisherId");

				redirect(base_url()."book_c/publisher");
		}

		function deletepublisher()
		{
				$id=$this->input->get("id");
				$this->model_admin->deletemain("tblpublisher",$id,"PublisherId");
				redirect(base_url()."book_c/publisher");
		}

		function addbook()
		{
			$result["cat"]=$this->model_admin->getdata("tblcategory","CategoryId");
			$result["pub"]=$this->model_admin->getdata("tblpublisher","PublisherId");
			$this->load->view("BookForm",$result);
		}

		function book()
		{
			$result["data"]=$this->model_admin->getdata("tblbook");
			$this->load->view("book",$result);
		}

		function getsubcategory()
		{
			$cat= $_POST["catid"];
			$where=array('CategoryId' => $cat );
			$result=$this->model_admin->getdata("tblsubcategory","SubCategoryId",$where);
			$output='<option selected="selected" disabled="" >Select Sub Category </option>';
			
			foreach ($result as  $value) {
				$output .='<option value="'.$value["SubCategoryId"].'" >'.$value["SubCategoryName"].'</option>';
                        
	     	}
			echo $output;
			//print_r($result);
			
		}

		function addbookdata()
		{
			if($this->input->post("btnaddbook"))
			{
				$config["allowed_types"]="jpg|png|jpeg";
				$config["upload_path"]="./Images/";
				$this->load->library("upload",$config);
				if($this->upload->do_upload("filebook"))
				{
					$filedata=$this->upload->data();
					#echo $filedata["file_name"];
				}
				else
				{
					print_r($this->upload->display_errors());
				}

				if($this->input->post("chknew")==true)
				{
					$new=1;
				}
				else
				{
					$new=0;
				}

				$data=array(
					'BookName'=>$this->input->post("txtbname"),
					'CategoryId'=>$this->input->post("ddcat"),
					'SubCategoryId'=>$this->input->post("ddsubcat"),
					'Author'=>$this->input->post("txtauthor"),
					'PublisherId'=>$this->input->post("ddpub"),
					'Language'=>$this->input->post("ddlang"),
					'Edition'=>$this->input->post("txtedition"),
					'Qty'=>$this->input->post("txtqty"),
					'OriginalPrice'=>$this->input->post("txtoprice"),
					'SalePrice'=>$this->input->post("txtsprice"),
					'ISBNno'=>$this->input->post("txtisbn"),
					'ImageName'=>$filedata["file_name"],
					'Description'=>$this->input->post("txtdesc"),
					'Qty'=>$this->input->post("txtqty"),
					'IsNew'=>$new,
					'UserId'=>1		
				);
				$this->model_admin->insert("tblbook",$data);
				redirect(base_url()."book_c/book");
				
			}
		}

		function viewallbookdetails()
		{
			$id=$this->input->get("id");
			$result["data"]=$this->model_admin->bookalldata($id);
			/*$where = array('UserId' => $result["UserId"] );
			$result["user"]=$this->model_admin->selectone("tbluser",$where);*/
			$this->load->view("bookalldetails",$result);
			//print_r($result);
		}

		/*function deletebook()
		{
				$id=$this->input->get("id");
				$where = array('BookId' => $id );
				$result=$this->model_admin->selectone("tblbook",$where);
				//print_r($result);
					if(file_exists("Images/".$result['ImageName']))
					{
						//echo $result["ImageName"];
						unlink("Images/".$result['ImageName']);
					}
				$this->model_admin->deletemain("tblbook",$id,"BookId");
				redirect(base_url()."book_c/book");
		}*/

		/*function deleteselectedbook()
		{
				$result=$this->model_admin->getdata_in("tblbook","BookId",$this->input->post("delete"));
					//echo $value["ImageName"];
				//print_r($result);
					foreach ($result as $value) 
					{
						if(file_exists("Images/".$value['ImageName']))
						{
							//echo $value["ImageName"];
							unlink("Images/".$value['ImageName']);
						}
					}
					
			$this->model_admin->deleteall("tblbook",$this->input->post("delete"),"BookId");

			redirect(base_url()."book_c/book");
		}*/

		/*function dataforedit()
		{

			$id=$this->input->get("id");
			$where = array('BookId' => $id );
			$result["data"]=$this->model_admin->selectone("tblbook",$where);
			$result["cat"]=$this->model_admin->getdata("tblcategory","CategoryId");
			$result["pub"]=$this->model_admin->getdata("tblpublisher","PublisherId");

			$where=array('CategoryId' => $result["data"]["CategoryId"] );

			$result["subcat"]=$this->model_admin->getdata("tblsubcategory","SubCategoryId",$where);

			$this->load->view("BookForm",$result);
		}*/

		/*function editbookdata()
		{

			if($this->input->post("btneditbook"))
			{
				$id=$this->input->post("editid");
				$where = array('BookId' => $id );
				$result=$this->model_admin->selectone("tblbook",$where);
				print_r($result);
				if($_FILES["filebook"]["name"]!= null){
					if(file_exists("Images/".$result['ImageName']))
					{
						//echo $result["ImageName"];
						unlink("Images/".$result['ImageName']);
					}
			
					$config["allowed_types"]="jpg|png|jpeg";
					$config["upload_path"]="./Images/";
					$this->load->library("upload",$config);
					if($this->upload->do_upload("filebook"))
					{
						$filedata=$this->upload->data();
						$file_name=$filedata["file_name"];
					}
					else
					{

						print_r($this->upload->display_errors());
					}
				}
				else
				{
					$file_name=$result["ImageName"];
				}
					

				if($this->input->post("chknew")==true)
				{
					$new=1;
				}
				else
				{
					$new=0;
				}

				
				$data=array(
					'BookName'=>$this->input->post("txtbname"),
					'CategoryId'=>$this->input->post("ddcat"),
					'SubCategoryId'=>$this->input->post("ddsubcat"),
					'Author'=>$this->input->post("txtauthor"),
					'PublisherId'=>$this->input->post("ddpub"),
					'Language'=>$this->input->post("ddlang"),
					'Edition'=>$this->input->post("txtedition"),
					'Qty'=>$this->input->post("txtqty"),
					'OriginalPrice'=>$this->input->post("txtoprice"),
					'SalePrice'=>$this->input->post("txtsprice"),
					'ISBNno'=>$this->input->post("txtisbn"),
					'ImageName'=>$file_name,
					'Description'=>$this->input->post("txtdesc"),
					'Qty'=>$this->input->post("txtqty"),
					'IsNew'=>$new,
					'AdminId'=>$_SESSION["AdminId"]			
				);
				$this->model_admin->update("tblbook",$this->input->post("editid"),$data,"BookId");
				redirect(base_url()."book_c/book");
			
		}
	}*/

	/*function adminbooks()
	{
		$where= array('AdminId' => $_SESSION['AdminId']);
		$result["data"]=$this->model_admin->getdata("tblbook","BookId",$where);
		$this->load->view("book",$result);		
	}*/
}
?>
