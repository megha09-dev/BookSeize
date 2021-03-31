<?php

		class home extends CI_Controller
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

						/*if($this->uri->segment(2)!="index" && $this->uri->segment(2)!="")
						{
							if(!$this->session->userdata("AdminId"))
							{
								redirect(base_url()."index.php/home/");
							}
						}*/
						/*if($this->uri->segment(2)!="login")
						{
							if(!$this->session->userdata("AdminId"))
							{
								redirect(base_url()."home/login");
							}
-						}*/
				}

			function index()
			{
					//	$this->load->view("login_admin");
					$result["cat"]=$this->model_admin->counting("tblcategory","CategoryId");
					$result["user"]=$this->model_admin->counting("tbluser","UserId");
					$result["publisher"]=$this->model_admin->counting("tblpublisher","PublisherId");
					$result["inquiry"]=$this->model_admin->counting("tblbookinquiry","InquiryId");
					$result["order"]=$this->model_admin->counting("tblorder","OrderId");
					$result["book"]=$this->model_admin->counting("tblbook","BookId");

					$string='[';
					if(isset($_POST["btngo"]))
					{
						$_SESSION["year"]=$this->input->post("ddyear");
						$result1=$this->model_admin->getdatachart($this->input->post("ddyear"));
					}
					else
					{
						$result1=$this->model_admin->getdatachart();
					}
					
					foreach ($result1 as $value) 
					{
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
					$result['str'] = $string;
					//echo $string;
					$result["dd"]=$this->model_admin->ddchartdata();
					$this->load->view("index",$result);
			}	

				
			function logout()
			{
				session_destroy();
				redirect(base_url()."admin_c");
			}

			function category()
			{
				$result["data"]=$this->model_admin->getdata("tblcategory","CategoryId");
				$this->load->view("category",$result);
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
				$this->model_admin->isactive("tblcategory",$data,$id,"CategoryId");
				redirect(base_url()."home/category");
			}

			function isactivesub()
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
				$this->model_admin->isactive("tblsubcategory",$data,$id,"SubCategoryId");
				$where = array('SubCategoryId' => $id );
				$data=$this->model_admin->selectone("tblsubcategory",$where);

				redirect(base_url()."home/subcategory?id=".$data["CategoryId"]);
			}

			function subcategory()
			{
				$id=$this->input->get("id");
				$where=array('CategoryId' => $id );
				$result["data"]=$this->model_admin->getdata("tblsubcategory","SubCategoryId",$where);
				$result["catname"]=$this->model_admin->selectone("tblcategory",$where);

				$this->load->view("subcategory",$result);
			}


			function addcategory()
			{
				if($this->input->post("btnaddcat"))
				{
					$data = array
					('CategoryName' => $this->input->post("txtname") ,
					  'IsActive'=>1);
					$this->model_admin->insert("tblcategory",$data);
					redirect(base_url()."home/category");
				}
			}

			function addsubcategory()
			{
				if($this->input->post("btnaddsubcat"))
				{
					$data = array
					('SubCategoryName' => $this->input->post("txtname") ,
					  'CategoryId'=>$this->input->post("catid"),
					  'IsActive'=>1);
					//print_r($data);
					$this->model_admin->insert("tblsubcategory",$data);
					redirect(base_url()."home/category");
				}
			}


			function checkCat()
			{
				$cat=$_POST["catname"];
				$where = array('CategoryName' => $cat );
				$result=$this->model_admin->checkrecord("tblcategory",$where);
				if($result=="true")
				{
					echo "Category Already Exist!";
				}
				else
				{
					echo "";
				}
			}

			function checkSubCat()
			{
				$subcat=$_POST["subcatname"];
				$where = array('SubCategoryName' => $subcat );
				$result=$this->model_admin->checkrecord("tblsubcategory",$where);
				if($result=="true")
				{
					echo "SubCategory Already Exist!";
				}
				else
				{
					echo "";
				}
			}

			function deletecategory()
			{
				$id=$this->input->get("id");
				$this->model_admin->delete("tblcategory",$id,"CategoryId");
				redirect(base_url()."home/category");
			}

			function deletesubcategory()
			{
				$id=$this->input->get("id");
				$where = array('SubCategoryId' => $id );
				$data=$this->model_admin->selectone("tblsubcategory",$where);
				$this->model_admin->delete("tblsubcategory",$id,"SubCategoryId");
				redirect(base_url()."home/subcategory?id=".$data["CategoryId"]);
			}

			function deleteselectedcat()
			{
				//print_r($this->input->post("delete"));
				$this->model_admin->deleteall("tblcategory",$this->input->post("delete"),"CategoryId");

				redirect(base_url()."home/category");
			}

			function deleteselectedsubcat()
			{
				$this->model_admin->deleteall("tblsubcategory",$this->input->post("delete"),"SubCategoryId");
			
				redirect(base_url()."home/subcategory?id=".$this->input->post("categoryid"));
			}


			//ajax request 

			function editcatdata()
			{
				$catid = $_POST["categoryid"];

				$where = array('CategoryId' => $catid );

				$data=$this->model_admin->selectone("tblcategory",$where);

				echo ' <input type="text" class="form-control" name="txtname" placeholder="Enter Category Name" value="'.$data["CategoryName"].'">
                  <input type="hidden" name="catid" id="catid" value='.$data["CategoryId"].'" >';
			}

			function updatecat()
			{
				$result = array
				('CategoryName' => $this->input->post("txtname") );
				$this->model_admin->update("tblcategory",$this->input->post('catid'),$result,"CategoryId");
				redirect(base_url()."home/category");

			}

			function editsubcatdata()
			{
				$catid = $_POST["catid"];

				$where = array('SubCategoryId' => $catid );

				$data=$this->model_admin->selectone("tblsubcategory",$where);

				echo ' <input type="text" class="form-control" name="txtname" placeholder="Enter Category Name" value="'.$data["SubCategoryName"].'">
                  <input type="hidden" name="catid" id="catid" value='.$data["SubCategoryId"].'" >';
			}

			function updatesubcat()
			{
				$result = array
				('SubCategoryName' => $this->input->post("txtname") );
				$this->model_admin->update("tblsubcategory",$this->input->post('catid'),$result,"SubCategoryId");
				//echo $this->input->post("categoryid");
				$where=array('SubCategoryId' => $this->input->post('catid') );
				$data=$this->model_admin->selectone("tblsubcategory",$where);
				redirect(base_url()."home/subcategory?id=".$data["CategoryId"]);
			}

			function userdata()
			{
				$result["data"]=$this->model_admin->getdata("tbluser","UserId");
				$this->load->view("user",$result);
			}

			function isblock()
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
				$data = array('IsBlock' => $status1 );
				$this->model_admin->isactive("tbluser",$data,$id,"UserId");
				redirect(base_url()."home/userdata");
			}

			function order()
			{
				$result["data"]=$this->model_admin->getorders();
				$this->load->view("order",$result);
			}

			function viewallorderdetails()
			{
				$uid=$this->input->get("uid");
				$oid=$this->input->get("oid");

				$where = array('UserId' => $uid );
				$result["userdata"]=$this->model_admin->selectone("tbluser",$where);
				$where1 = array('OrderId' => $oid );
				$result["order"]=$this->model_admin->selectone("tblorder",$where1);
				$result["orderdata"]=$this->model_admin->getorderdetails($where1);
				//print_r($result["orderdata"]);
				$this->load->view("orderdetails",$result);
			}

		    function state()
		    {
		    	$result["data"]=$this->model_admin->getdata("tblstate","StateName");
				$this->load->view("state",$result);
			}

			function city()
			{
				$id=$this->input->get("id");
				$where=array('StateId' => $id );
				$result["data"]=$this->model_admin->getdata("tblcity","CityId",$where);
				$result["statename"]=$this->model_admin->selectone("tblstate",$where);

				$this->load->view("city",$result);
			}


			function addstate()
			{
				if($this->input->post("btnaddstate"))
				{
					$data = array
					('StateName' => $this->input->post("txtname"));
					$this->model_admin->insert("tblstate",$data);
					redirect(base_url()."home/state");
				}
			}

			function addcity()
			{
				if($this->input->post("btnaddcity"))
				{
					$data = array
					('CityName' => $this->input->post("txtname") ,
					  'StateId'=>$this->input->post("stateid"));
					//print_r($data);
					$this->model_admin->insert("tblcity",$data);
					redirect(base_url()."home/state");
				}
			}


			function checkstate()
			{
				$state=$_POST["statename"];
				$where = array('StateName' => $state );
				$result=$this->model_admin->checkrecord("tblstate",$where);
				if($result=="true")
				{
					echo "State Already Exist!";
				}
				else
				{
					echo "";
				}
			}

			function checkcity()
			{
				$city=$_POST["cityname"];
				$where = array('CityName' => $city );
				$result=$this->model_admin->checkrecord("tblcity",$where);
				if($result=="true")
				{
					echo "City Already Exist!";
				}
				else
				{
					echo "";
				}
			}

			function deletestate()
			{
				$id=$this->input->get("id");
				$this->model_admin->deletemain("tblstate",$id,"StateId");
				redirect(base_url()."home/state");
			}

			function deletecity()
			{
				$id=$this->input->get("id");
				$where = array('CityId' => $id );
				$data=$this->model_admin->selectone("tblcity",$where);
				$this->model_admin->deletemain("tblcity",$id,"CityId");
				redirect(base_url()."home/city?id=".$data["StateId"]);
			}

			function deleteselectedstate()
			{
				//print_r($this->input->post("delete"));
				$this->model_admin->deleteall("tblstate",$this->input->post("delete"),"StateId");

				redirect(base_url()."home/state");
			}

			function deleteselectedcity()
			{
				$this->model_admin->deleteall("tblcity",$this->input->post("delete"),"CityId");
			
				redirect(base_url()."home/city?id=".$this->input->post("stateid"));
			}


			//ajax request 

			function editstatedata()
			{
				$stateid = $_POST["stateid"];

				$where = array('StateId' => $stateid );

				$data=$this->model_admin->selectone("tblstate",$where);

				echo ' <input type="text" class="form-control" name="txtname" placeholder="Enter State Name" value="'.$data["StateName"].'">
                  <input type="hidden" name="stateid" id="stateid" value='.$data["StateId"].'" >';
			}

			function updatestate()
			{
				$result = array
				('StateName' => $this->input->post("txtname") );
				$this->model_admin->update("tblstate",$this->input->post('stateid'),$result,"StateId");
				redirect(base_url()."home/state");

			}

			function editcitydata()
			{
				$cityid = $_POST["cityid"];

				$where = array('CityId' => $cityid );

				$data=$this->model_admin->selectone("tblcity",$where);

				echo ' <input type="text" class="form-control" name="txtname" placeholder="Enter City Name" value="'.$data["CityName"].'">
                  <input type="hidden" name="cityid" id="cityid" value='.$data["CityId"].' >';
			}

			function updatecity()
			{
				$result = array
				('CityName' => $this->input->post("txtname") );
				$this->model_admin->update("tblcity",$this->input->post('cityid'),$result,"CityId");
				//echo $this->input->post("cityid");
				$where=array('CityId' => $this->input->post('cityid') );
				$data=$this->model_admin->selectone("tblcity",$where);
				//echo $data["StateId"];
				redirect(base_url()."home/city?id=".$data["StateId"]);
			}

		    
		}

?>