<?php

  class U_c extends CI_Controller
  {
    
    function __construct()
    {
      parent::__construct();
    $this->load->helper('url');
    $this->load->model("model_user");
    $this->load->library("cart");
    $this->load->library("session");
    $this->load->library("password_encryption");
    }

        private function datetime()
    {
       date_default_timezone_set('Asia/Kolkata');
       $timestamp = time();
       $date_time = date("Y-m-d  H:i:s", $timestamp);
       return $date_time;
    }
    function cartdata()
    {
      if(isset($_SESSION['UserId']))
      {
      $where= array('tblcart.UserId' => $_SESSION['UserId'] );
      $result=$this->model_user->viewcartdata($where);
      return $result;
      }
    }

    function viewpayment()
    {
      $result['cart']= $this->cartdata();
      $this->load->view("user/checkoutpayment",$result);
    }

   function proaddress()
    {
      $result["cart"]= $this->cartdata();
      $where = array('UserId' => $_SESSION["UserId"] );
      $result["add"]=$this->model_user->addressdata($where);
      $result["state"]=$this->model_user->getdata("tblstate");
      $this->load->view("user/address",$result);
    }
    function review()
    {
       
      $result=$this->cartdata();
      $id=$_SESSION["UserId"];
     // print_r($result);
      $sum=0;
      foreach ($result as $value) 
      {
        $sum+=$value["Total"];
      }
      if($this->input->post("usewallet"))
      {
         $data = array(
        'UserId' => $id,
        'CreatedOn' =>$this->datetime(),
        'TotalAmount'=>$sum,
        'IsPaid'=>1,
        'Status'=>0,
        'AddressId'=>$_SESSION["AddressId"]
        );
      $this->model_user->insert("tblorder",$data);
      $id1=$this->db->insert_id();
      $_SESSION['OrderId']=$id1;
        $_SESSION["Price"]=$sum;
      foreach ($result as $value)
      {
        $data1 = array(
          'OrderId' => $id1,
          'BookId' =>$value["BookId"],
          'Quantity'=>$value["qty2"],
          'Price'=>$value["Price"],
          'Status'=> 'In Transit'
          );
        $this->model_user->insert("tblorderdetail",$data1);
        $where1 = array('BookId' => $value["BookId"] );
        $result1=$this->model_user->selectone("tblbook",$where1);
        //print_r($result1);
        //echo $value["qty2"];
        $data2 = array(
          'Qty' => $result1["Qty"] - $value["qty2"] 
          );
        $this->model_user->update("tblbook",$data2,$where1);
        $where = array('CartId' => $value["CartId"] );
        $this->model_user->delete("tblcart",$where);
      }
      $data1 = array('Balance' => $_SESSION['Balance']-$sum
      );
        $_SESSION['Balance']=$_SESSION['Balance']-$sum;
        $where = array('UserId' => $_SESSION['UserId'] );
        $this->model_user->update("tbluser",$data1,$where);
        $result["cart"]=$this->cartdata();
        $this->load->view("user/checkoutcomplete",$result);
      }
      else
      {
            $id=$_SESSION["UserId"];
      $result=$this->cartdata();
     // print_r($result);
      $sum=0;
      foreach ($result as $value) 
      {
        $sum+=$value["Total"];
      }
        $data = array(
        'UserId' => $id,
        'CreatedOn' =>$this->datetime(),
        'TotalAmount'=>$sum,
        'IsPaid'=>0,
        'Status'=>0,
        'AddressId'=>$_SESSION["AddressId"]
        );
      $this->model_user->insert("tblorder",$data);
      $id1=$this->db->insert_id();
      $_SESSION['OrderId']=$id1;
        $_SESSION["Price"]=$sum;
      foreach ($result as $value)
      {
        $data1 = array(
          'OrderId' => $id1,
          'BookId' =>$value["BookId"],
          'Quantity'=>$value["qty2"],
          'Price'=>$value["Price"],
          'Status'=> 'In Transit'
          );
        $this->model_user->insert("tblorderdetail",$data1);
        $where1 = array('BookId' => $value["BookId"] );
        $result1=$this->model_user->selectone("tblbook",$where1);
        //print_r($result1);
        //echo $value["qty2"];
        $data2 = array(
          'Qty' => $result1["Qty"] - $value["qty2"] 
          );
        $this->model_user->update("tblbook",$data2,$where1);
        $where = array('CartId' => $value["CartId"] );
        $this->model_user->delete("tblcart",$where);
      }
        redirect(base_url()."paytm");
      }
      
      
    }


 function complete()
  {
    foreach($_POST as $paramName => $paramValue) {
        if($paramName=="STATUS")
        {
          $Status=$paramValue;
        }
           // echo "<br/>" . $paramName . " = " . $paramValue;
        }
     
      if($Status=="TXN_SUCCESS")
      {
        $IsPaid=1;
      }
      else
      {
        $IsPaid=0;
      }
      $data = array('IsPaid' => $IsPaid );
      $where = array('OrderId' => $_SESSION["OrderId"] );
      $this->model_user->update("tblorder",$data,$where);
      $result["cart"]=$this->cartdata();
    $this->load->view("user/checkoutcomplete",$result);   
  }
  
  function myorders()
    {
      $result["cart"]=$this->cartdata();
      $where = array('UserId' => $_SESSION["UserId"] );
      $result["data"]=$this->model_user->getdata("tblorder","CreatedOn",$where);
      //print_r($result);
      $this->load->view("user/userorders",$result);
    }

    function myorderdetail()
    {
      $id=$this->input->post("oid");
      $where = array('OrderId' => $id );
      $result["data"]=$this->model_user->orderdetails($where);
      $result["cart"]=$this->cartdata();
      $result["OrderId"]=$id;
      $this->load->view("user/orderdetails",$result);
    }

     function getsubcategory()
    {
      $cat= $_POST["catid"];
      $where=array('CategoryId' => $cat );
      $result=$this->model_user->getdata("tblsubcategory","SubCategoryId",$where);
      $output='<option selected="selected" disabled="" >Select Sub Category </option>';
      
      foreach ($result as  $value) {
        $output .='<option value="'.$value["SubCategoryId"].'" >'.$value["SubCategoryName"].'</option>';
                        
        }
      echo $output;
      //print_r($result);
      
    }
    function sellform()
    {
      $result["cat"]=$this->model_user->getdata("tblcategory","CategoryId");
      $result["pub"]=$this->model_user->getdata("tblpublisher","PublisherId");
      $this->load->view("user/sellform",$result);
    }  

    function sellbookdata()
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
          'UserId'=>$_SESSION['UserId']   
        );
        $this->model_user->insert("tblbook",$data);
        redirect(base_url()."user_c");
      }
    }

    function mybooks()
    {
      $where = array('UserId' => $_SESSION["UserId"] );
      $result["cart"]=$this->cartdata();
      $result["data"]=$this->model_user->getdata("tblbook","BookId",$where);
      $this->load->view("user/mybooks",$result);
    }

    function mybookdetail()
    {
      $id=$this->input->post("bid");
      $where = array('BookId' => $id );
      $result["data"]=$this->model_user->selectone("tblbook",$where);
      $result["cart"]=$this->cartdata();
      $this->load->view("user/bookdetail",$result);
    }

    function deletemybook()
    {
      $id=base64_decode($this->input->get("id"));
      $where = array('BookId' => $id );
      $this->model_user->delete("tblbook",$where);
      redirect(base_url()."u_c/mybooks");
    }

    function myorderlist()
    {
      $result["cart"]=$this->cartdata();
      $where = array('tblbook.UserId' => $_SESSION["UserId"] );
      $result["data"]=$this->model_user->myorderlist($where);
      $this->load->view("user/myorder",$result);
    }


    function orderdetail()
    {
      $id=$this->input->post("oid");
      $where = array('OrderId' => $id,'tblbook.UserId'=> $_SESSION["UserId"]);
      $result["data"]=$this->model_user->orderdetails($where);
      $result["cart"]=$this->cartdata();
      $result["OrderId"]=$id;
      $this->load->view("user/orderdetails",$result);
    }

    function updateprofile()
    {
      if(isset($_POST["btnupdateprofile"]))
      {
        $id=$_SESSION["UserId"];
        $where = array('UserId' => $id );
        $data = array(
              'FirstName' => $this->input->post("txtfname"),
              'LastName' =>$this->input->post("txtlname"),
              'ContactNo'=>$this->input->post("txtphn"),
              );
        $this->model_user->update("tbluser",$data,$where);
        $result=$this->model_user->selectone("tbluser",$where);
        $_SESSION["FirstName"]=$result["FirstName"];
        $_SESSION["LastName"]=$result["LastName"];
        $_SESSION["ContactNo"]=$result["ContactNo"];

        redirect(base_url()."user_c/profile");
      }
    }

    function addCity()
    {
      if(isset($_POST['btnreview']))
      {
        $id=base64_decode($_GET['id']);
      $data=array(
        'UserId'=>$_SESSION['UserId'],
        'BookId'=>$id,
        'Rate'=>$this->input->post('ddrate'),
        'Feedback'=>$this->input->post('txtreview'),
        'CreatedOn'=>$this->datetime()
      );
      //print_r($data);
      $this->model_user->insert('tblfeedback',$data);
      redirect(base_url()."user_c/moredetails?id=".base64_encode($id));
    }
    }

    function testimonial()
    {


      $result['cart']=$this->cartdata();
      $where=array('IsApproved'=>1);
      $result['test']=$this->model_user->testimonial($where);
      $this->load->view("user/testimonial",$result);
       
    }
    function addtestimonialform()
    {
        $this->load->view("user/addtestimonial");
    }

    function addtestimonial()
    {
      if(isset($_POST["btntest"]))
      {
           $data = array(
              'UserId' => $_SESSION["UserId"],
              'Comment'=>$this->input->post("txtreview"),
              'IsApproved'=>0
        );
        $this->model_user->insert("tbltestimonial",$data);
        redirect(base_url()."u_c/testimonial");   
      }
     
    }

    function viewchangepwd()
    {


       $result["cart"]=$this->cartdata();
      $this->load->view("user/changepwd",$result);
    }

    function changepwd()
    {
        if(isset($_SESSION['UserId']))
        {
        $id=$_SESSION["UserId"];
        $where = array('UserId' => $id );
        $data = array(
              'Password' => $this->password_encryption->encrypt($this->input->post("txtcpwd"))
              );
        $this->model_user->update("tbluser",$data,$where);
        redirect(base_url()."user_c");
      }
      else
      {
        $id=$_SESSION["EmailId"];
        $where = array('EmailId' => $id );
        $data = array(
              'Password' => $this->password_encryption->encrypt($this->input->post("txtcpwd"))
              );
        $this->model_user->update("tbluser",$data,$where);
        session_destroy();
        redirect(base_url()."user_c/login"); 
      }
    }
    function wallet()
    {
      $result["cart"]=$this->cartdata();
      $this->load->view("user/wallet",$result);
    }
    function addmoney()
    {
      foreach($_POST as $paramName => $paramValue) {
        if($paramName=="STATUS")
        {
          $Status=$paramValue;
        }
           // echo "<br/>" . $paramName . " = " . $paramValue;
        }
     
      if($Status=="TXN_SUCCESS")
      {
        $Balance=$_SESSION["wallet"]+$_SESSION["Balance"];
        $data = array('Balance' => $Balance );
        $where= array('UserId' => $_SESSION["UserId"] );
        $this->model_user->update("tbluser",$data,$where);
        $result=$this->model_user->selectone("tbluser",$where);
        $_SESSION["Balance"]=$result["Balance"];
       
      }
       redirect(base_url()."u_c/wallet");
      
    }

    function inquiry()
    {
      $result["cart"]=$this->cartdata();
      $this->load->view("user/inquiry",$result);
    }

    function addinquiry()
    {
      if(isset($_POST['btninquiry']))
      {
        if(isset($_SESSION['UserId']))
        {
        $data=array(
          'UserId'=>$_SESSION['UserId'],
          'EmailId'=>$_SESSION["EmailId"],
          'Subject'=>$this->input->post("txtsub"),
          'Description'=>$this->input->post("txtdesc"),
          'CreatedOn'=>$this->datetime(),
          'IsReplied'=>0
        );
        $this->model_user->insert("tblbookinquiry",$data);
        redirect(base_url()."user_c");
        }
        else
        {
           $data=array(
           'PersonName'=>$this->input->post("txtname"),
          'EmailId'=>$this->input->post("txtsub"),
          'Subject'=>$this->input->post("txtsub"),
          'Description'=>$this->input->post("txtdesc"),
          'CreatedOn'=>$this->datetime(),
          'IsReplied'=>0
          );
        $this->model_user->insert("tblbookinquiry",$data);
        redirect(base_url()."user_c");
        
        }
      }
    }

    function forgotpwd()
    {
      $result["cart"]=$this->cartdata();
      $this->load->view("user/forgotpwd",$result);

    }

    function checkemail()
    {
      $email=$_POST["email"];
    $where = array('EmailId' => $email );
    $result=$this->model_user->checkrecord("tbluser",$where);
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
      $result=$this->model_user->selectone("tbluser",$where);
      if($email==$result["EmailId"])
      {
        $to  = $result["EmailId"];
        $_SESSION['EmailId']=$result['EmailId'];
      // subject
      $subject ="Bookseize - Forgot Password";

      // message
      $message = rand(1000,9999);
      $_SESSION["otp"]=$message;

      // To send HTML mail, the Content-type header must be set
      $headers  = 'MIME-Version: 1.0' . "\r\n";
      $headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";

      // Additional headers
      $headers .= 'To:'.$result["FirstName"]." ".$result["EmailId"]. "\r\n";
      $headers .= 'From: Bookseize' . "\r\n";


      // Mail it
      if(mail($to, $subject, $message, $headers))
      { 
        $this->load->view("user/otpverification");
      } 

      }
      else
      {
        echo "Invalid";
      }
    }

    function setpwd()
    {
      $url= $_SERVER['HTTP_REFERER'];
      if($url==base_url()."user_c/register")
      {
        if($_SESSION["otp"]==$this->input->post("txtotp"))
        {
          $data = array('IsVarified' => 1 );
          $where = array('UserId' => $_SESSION["Id"] );
          $this->model_user->update("tbluser",$data,$where);
          $this->session->set_flashdata("success",true);
          session_unset();
          redirect(base_url()."user_c/login");
        }
        else
        {
          $this->session->set_flashdata("error",true);
          $this->load->view("user/otpverification");
        }
      }
      else
      {
        if($_SESSION["otp"]==$this->input->post("txtotp"))
        {
          $this->load->view("user/changepwd");
        }
        else
        {
          $this->session->set_flashdata("error",true);
          $this->load->view("user/otpverification");
        }
      }
     
    }

    function changestatus()
    {
      $oid=$_POST["oid"];
      $id=$_SESSION["UserId"];
      $where=array('OrderId'=>$oid,'UserId'=>$id);
      $result=$this->model_user->changestatus($where);
      foreach ($result as $value) 
      {
        if($value["Status"]=='In Transit')
        {
          $data=array(
            'Status'=>'Dispatch'
          );

          $where=array(
            'OrderDetailId'=>$value["OrderDetailId"]
          );

          $this->model_user->update("tblorderdetail",$data,$where);
          echo "Dispatch";
        }
        else if($value["Status"]=='Dispatch')
        {
          $data=array(
            'Status'=>'Delivered'
          );
          $where=array('OrderDetailId'=>$value["OrderDetailId"]);
          $this->model_user->update("tblorderdetail",$data,$where);
          $where1 = array('OrderId' => $oid ,'Status!='=>'Delivered');
          $result=$this->model_user->changeorderstatus($where1);
          if(count($result)==0)
          {
            $where = array('OrderId' => $oid );
            $data = array('Status' => 1 );
            $this->model_user->update("tblorder",$data,$where);
          }
          $total = $this->model_user->get_order_wise_total($oid);

          $data = array(
            'Balance' => $_SESSION["Balance"] + $total["total"]
          );
          $where = array('UserId' => $_SESSION["UserId"] );
          $this->model_user->update("tbluser",$data,$where);
          $_SESSION["Balance"]=$_SESSION["Balance"] + $total["total"]; 

          echo "Delivered";
        }
      }
      
    }

    function addreview()
    {

      if(isset($_POST['btnreview']))
      {
        if(isset($_SESSION['UserId']))
        {

        $data=array(
          'UserId'=>$_SESSION['UserId'],
          'BookId'=>base64_decode($_GET["id"]),
          'Rate'=>$this->input->post("ddrate"),
          'Feedback'=>$this->input->post("txtreview"),
          'CreatedOn'=>$this->datetime()
        );
        $this->model_user->insert("tblfeedback",$data);
        redirect(base_url()."user_c/moredetails?id=".$_GET["id"]);
        }
        else
        {
           
          $data=array(
          'PersonName'=>$this->input->post("txtname"),
          'BookId'=>base64_decode($_GET["id"]),
          'Rate'=>$this->input->post("ddrate"),
          'Feedback'=>$this->input->post("txtreview"),
          'CreatedOn'=>$this->datetime()
        );
        $this->model_user->insert("tblfeedback",$data);
        redirect(base_url()."user_c/moredetails?id=".$_GET["id"]);
        
        }
      }
    }

}


?>