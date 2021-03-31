<?php
  
  class User_c extends CI_Controller
  {
    
    function __construct()
    {
      parent::__construct();
      $this->load->helper('url');
      $this->load->model("model_user");
      $this->load->library("cart");
      $this->load->library("session");
      $this->load->library('Password_encryption');

    }
    private function datetime()
    {
       date_default_timezone_set('Asia/Kolkata');
       $timestamp = time();
       $date_time = date("Y-m-d  H:i:s", $timestamp);
       return $date_time;
    }

    function catsubcat()
    {
      $where=array('IsActive' => 1 );
       $result=$this->model_user->getdata("tblcategory","CategoryName",$where);
        //$result["subcat"]=$this->model_user->getdata("tblsubcategory","SubCategoryId",$where);
        return $result;
    }

    function cartdata()
    {
      if(isset($_SESSION["UserId"]))
      {
        $where = array('tblcart.UserId' => $_SESSION["UserId"] );
        $result=$this->model_user->viewcartdata($where);
        return $result;
      }
    }

    function index()
    {
       $result["cat"]= $this->catsubcat();
       $result["cart"]= $this->cartdata();
      // echo $_SESSION["UserId"];
       //print_r($result);
       $result["book"]=$this->model_user->topbooks();
       $where = array('IsActive' => 1 );
       $result["banner"]=$this->model_user->getdata("tblbanner","BannerId",$where);
       //print_r($result);
       $this->load->view("user/allcategories",$result);
    }
    function shopcategories()
    {
         $result["cat"]= $this->catsubcat();
         $result["cart"]= $this->cartdata();
         $result["book"]=$this->model_user->topbooks();
         $this->load->view("user/allcategories",$result);
    }

    function viewsubcategory()
    {
      if(!isset($_SESSION["UserId"]))
      {
         $id=base64_decode($this->input->get("id"));
          $where=array('CategoryId' => $id);
          $where1=array('CategoryId' => $id,'Qty>'=>0);

         if(isset($_GET["fl"]) && $_GET["fl"]=="old")
        {
          $where1=array('CategoryId' => $id,'IsNew' => 0 ,'Qty>'=>0);

        }
         if(isset($_GET["fl"]) && $_GET["fl"]=="new")
        {
          $where1=array('CategoryId' => $id,'IsNew' => 1,'Qty>'=>0);

        }
        $r=$this->model_user->getdata("tblbook","BookName",$where1);

        if(isset($_GET["showmore"]))
        {
          $result["book"]=$this->model_user->getdata("tblbook","BookName",$where1,$_GET["showmore"]);
        }
        else
        {
          $result["book"]=$this->model_user->getdata("tblbook","BookName",$where1,6);

        }
        $result["cat"]= $this->catsubcat();
        $result["cart"]= $this->cartdata();
        $result["data"]=$this->model_user->getdata("tblsubcategory","SubCategoryName",$where);
        $result["catname"]=$this->model_user->selectone("tblcategory",$where);
        $limit="9";

        if(count($r)==count($result["book"]))
        {
          $result["showmore"]=0;
        }
        else
        {
          $result["showmore"]=1;
        }
        $this->load->view("user/allsubcategories",$result); 
      }
      else
      {
        $id=base64_decode($this->input->get("id"));

       $where1=array('CategoryId' => $id);

       $where = array('CategoryId' => $id,'UserId!='=>$_SESSION["UserId"] );



       $where2=array('CategoryId' => $id,'UserId!='=>$_SESSION["UserId"] ,'Qty>'=>0);
        if(isset($_GET["fl"]) && $_GET["fl"]=="old")
        {
          $where2=array('CategoryId' => $id,'UserId!='=>$_SESSION["UserId"],'IsNew' => 0,'Qty>'=>0 );

        }
         if(isset($_GET["fl"]) && $_GET["fl"]=="new")
        {
          $where2=array('CategoryId' => $id,'UserId!='=>$_SESSION["UserId"],'IsNew' => 1,'Qty>'=>0);

        }

        $r=$this->model_user->getdata("tblbook","BookName",$where2);

        if(isset($_GET["showmore"]))
        {
          $result["book"]=$this->model_user->getdata("tblbook","BookName",$where2,$_GET["showmore"]);

        }
        else
        {
          $result["book"]=$this->model_user->getdata("tblbook","BookName",$where2,6);

        }
       $result["cat"]= $this->catsubcat();

       $result["cart"]= $this->cartdata();
       $result["data"]=$this->model_user->getdata("tblsubcategory","SubCategoryName",$where1);
       $result["catname"]=$this->model_user->selectone("tblcategory",$where1);
       $limit="9";
       if(count($r)==count($result["book"]))
        {
          $result["showmore"]=0;
        }
        else
        {
          $result["showmore"]=1;
        }
       $this->load->view("user/allsubcategories",$result);
     }
    }

    function booksofsubcat()
    {
      if(!isset($_SESSION["UserId"]))
      {
        $id=base64_decode($this->input->get("id"));
        $cid=base64_decode($this->input->get("cid"));

        $where = array('CategoryId' => $cid );
        $where1 = array('SubCategoryId' => $id,'Qty>'=>0);

         if(isset($_GET["fl"]) && $_GET["fl"]=="old")
        {
          $where1=array('SubCategoryId' => $id,'IsNew' => 0 ,'Qty>'=>0);

        }
         if(isset($_GET["fl"]) && $_GET["fl"]=="new")
        {
          $where1=array('SubCategoryId' => $id,'IsNew' => 1,'Qty>'=>0);

        }
        $r=$this->model_user->getdata("tblbook","BookName",$where1);

        if(isset($_GET["showmore"]))
        {
          $result["book"]=$this->model_user->getdata("tblbook","BookName",$where1,$_GET["showmore"]);

        }
        else
        {
          $result["book"]=$this->model_user->getdata("tblbook","BookName",$where1,6);

        }
        $result["cat"]= $this->catsubcat();
        $result["cart"]= $this->cartdata();
        $result["data"]=$this->model_user->getdata("tblsubcategory","SubCategoryName",$where);
        $result["catname"]=$this->model_user->selectone("tblcategory",$where);
        $result["subcat"]=$this->model_user->selectone("tblsubcategory",$where1);
        if(count($r)==count($result["book"]))
        {
          $result["showmore"]=0;
        }
        else
        {
          $result["showmore"]=1;
        }
        $this->load->view("user/subcategories",$result);
      }
      else
      {
        $id=base64_decode($this->input->get("id"));
        $cid=base64_decode($this->input->get("cid"));
        $where = array('CategoryId' => $cid );
        $where2=array('SubCategoryId' => $id,'UserId!='=>$_SESSION["UserId"] ,'Qty>'=>0);
        if(isset($_GET["fl"]) && $_GET["fl"]=="old")
        {
          $where2=array('SubCategoryId' => $id,'UserId!='=>$_SESSION["UserId"],'IsNew' => 0,'Qty>'=>0 );

        }
         if(isset($_GET["fl"]) && $_GET["fl"]=="new")
        {
          $where2=array('SubCategoryId' => $id,'UserId!='=>$_SESSION["UserId"],'IsNew' => 1,'Qty>'=>0);

        }

        $where1 = array('SubCategoryId' => $id );
        $r=$this->model_user->getdata("tblbook","BookName",$where2);

        if(isset($_GET["showmore"]))
        {
          $result["book"]=$this->model_user->getdata("tblbook","BookName",$where2,$_GET["showmore"]);

        }
        else
        {
          $result["book"]=$this->model_user->getdata("tblbook","BookName",$where2,6);

        }
        $result["cat"]= $this->catsubcat();
        $result["cart"]= $this->cartdata();
       // $result["book"]=$this->model_user->getdata("tblbook","BookName",$where2);
        $result["data"]=$this->model_user->getdata("tblsubcategory","SubCategoryName",$where);
        $result["catname"]=$this->model_user->selectone("tblcategory",$where);
        $result["subcat"]=$this->model_user->selectone("tblsubcategory",$where1);
        // print_r($result);
        //print_r($r);
        //print_r($result["book"]);
        if(count($r)==count($result["book"]))
        {
          $result["showmore"]=0;
        }
        else
        {
          $result["showmore"]=1;
        }
        $this->load->view("user/subcategories",$result);
      }
    }

    function dataforinquiry()
    {
      $id=$this->input->post("bid");
      $where = array('BookId' => $id );
      $result=$this->model_user->dataview($where);
    }

    function bookview()
    {
      $bid=$this->input->post("bid");
      $where = array('BookId' => $bid );
      $result["rating"]=$this->model_user->avgrate($where);
      $result["book"]=$this->model_user->quickview($where);
      $this->load->view("user/quickview",$result);
      //print_r($result);
    }

    function moredetails()
    {
      $bid=base64_decode($this->input->get("id"));
      //echo $bid;
      $result["cat"]= $this->catsubcat();
      $result["cart"]= $this->cartdata();
      $where = array('BookId' => $bid );
      $where1 = array('BookId' => $bid ,'Qty>'=>0);
      $result["review"]=$this->model_user->feedback($where);
      $result["rating"]=$this->model_user->avgrate($where);
      $result["book"]=$this->model_user->quickview($where1);
      //print_r($result["review"]);
      $this->load->view("user/moredetail",$result);
    }

    function showmore()
    {  
       //echo $_POST["limit"];
       $e=$_POST["e"];
       $limit=$_POST["limit"];
       //echo $limit;
       $catid=$_POST["catid"];
      
       $result["book"]=$this->model_user->showmore($catid,$e,$limit); 
       $this->load->view("user/showmore",$result);

       /*if($_POST["limit"])
        {
          $result=$this->model_user->showmore($catid,$e,$limit); 
          if(count($result)<=$limit)
          {
            echo "true";
          }
        }*/
      
    }

    function addtocart()
    {
      if($_SESSION["UserId"])
      {

        if(isset($_GET["bid"]))
        { 
       
        $where = array('BookId' => base64_decode($_GET["bid"] ));
        $result1=$this->model_user->selectone("tblcart",$where);
        if(count($result1)==0)
        {
          $result=$this->model_user->selectone("tblbook",$where);
          //print_r($result);
          $data = array(
            'UserId' => $_SESSION["UserId"],
            'BookId'  => base64_decode($_GET["bid"]),
            'Qty'     => 1,
            'Price'   => $result["SalePrice"],
            'Total'    => $result["SalePrice"],
            'CreatedOn' => $this->datetime()
          );
          $this->model_user->insert("tblcart",$data);
          $this->session->set_flashdata("tost2","true");

        }
        else
        {
          $this->session->set_flashdata("tost","true");
        }
          $url= $_SERVER['HTTP_REFERER'];
          if($url==base_url()."user_c")
          {
           redirect(base_url()."user_c");
          }
          elseif ($url==base_url()."validation_c/searchbook")
          {
            redirect(base_url()."user_c/viewcart");
          }
          else
          {
            redirect(base_url()."user_c/viewsubcategory?id=". $_GET["catid"]);
          }
        
        }
      
      elseif (isset($_POST["btnquickcart"]))
      {
        $where = array('BookId' => $this->input->post("txtid"));

        $result1=$this->model_user->selectone("tblcart",$where);

        if(count($result1)==0)
        {
            $data = array(
          'UserId' => $_SESSION["UserId"],
            'BookId'   => $this->input->post("txtid"),
            'Qty'     => $this->input->post("txtqty"),
            'Price'   => $this->input->post("txtprice"),
            'Total'    => ($this->input->post("txtqty"))*($this->input->post("txtprice")),
            'CreatedOn'=> $this->datetime()
            );
            $this->model_user->insert("tblcart",$data);
          $this->session->set_flashdata("tost2","true");

        }
        else
        {
          $this->session->set_flashdata("tost","true");

        }
         $url= $_SERVER['HTTP_REFERER'];
          if($url==base_url()."user_c")
          {
            redirect(base_url()."user_c");
          }
          elseif ($url==base_url()."validation_c/searchbook")
          {
            redirect(base_url()."user_c/viewcart");
          }
          else
          {
            redirect(base_url()."user_c/viewsubcategory?id=". base64_encode($this->input->post('txtcid')));
          }
        //print_r($data);
        
      }
      elseif(isset($_POST["btnmcart"]))
      {
        $where = array('BookId' => $this->input->post("txtid"));

        $result1=$this->model_user->selectone("tblcart",$where);

        if(count($result1)==0)
        {
          $data = array(
            'UserId' => $_SESSION["UserId"],
            'BookId'      => $this->input->post("txtid"),
            'Qty'     => $this->input->post("txtqty"),
            'Price'   => $this->input->post("txtprice"),
            'Total'    => ($this->input->post("txtqty"))*($this->input->post("txtprice")),
            'CreatedOn'=> $this->datetime()
            );
            $this->model_user->insert("tblcart",$data);
          $this->session->set_flashdata("tost2","true");

        }
        else
        {
          $this->session->set_flashdata("tost","true");
        }
        //print_r($data);
        //print_r($this->cart->contents());
        
        redirect(base_url()."user_c/moredetails?id=".base64_encode($this->input->post("txtid")));
      
      }
    }
      else
      {
        if(isset($_GET["bid"]))
        {
        $where = array('BookId' => base64_decode($_GET["bid"] ));
        $result=$this->model_user->selectone("tblbook",$where);
        //print_r($result);
        $data = array(
        'id'      => base64_decode($_GET["bid"]),
        'qty'     => 1,
        'price'   => $result["SalePrice"],
        'name'    => $result["BookName"],
        'img'     => $result["ImageName"]
        );
        $this->cart->insert($data);
       //print_r($data);
        //print_r($this->cart->contents());
        $url= $_SERVER['HTTP_REFERER'];
          if($url==base_url()."user_c")
          {
           redirect(base_url()."user_c");
          }
          elseif ($url==base_url()."validation_c/searchbook")
          {
            redirect(base_url()."user_c/viewcart");
          }
          else
          {
            redirect(base_url()."user_c/viewsubcategory?id=". $_GET["catid"]);
          }
       
      }
      elseif (isset($_POST["btnquickcart"]))
      {
        $data = array(
        'id'      => $this->input->post("txtid"),
        'qty'     => $this->input->post("txtqty"),
        'price'   => $this->input->post("txtprice"),
        'name'    => $this->input->post("txtname"),
        'img'     => $this->input->post("txtimg")
        );
        $this->cart->insert($data);
        //print_r($data);
        $url= $_SERVER['HTTP_REFERER'];
          if($url==base_url()."user_c")
          {
            redirect(base_url()."user_c");
          }
          elseif ($url==base_url()."validation_c/searchbook")
          {
            redirect(base_url()."user_c/viewcart");
          }
          else
          {
            redirect(base_url()."user_c/viewsubcategory?id=". base64_encode($this->input->post('txtcid')));
          }
        
      }
      elseif(isset($_POST["btnmcart"]))
      {
        $data = array(
        'id'      => $this->input->post("txtid"),
        'qty'     => $this->input->post("txtqty"),
        'price'   => $this->input->post("txtprice"),
        'name'    => $this->input->post("txtname"),
        'img'     => $this->input->post("txtimg")
        );
        $this->cart->insert($data);
        //print_r($data);
        //print_r($this->cart->contents());

        redirect(base_url()."user_c/moredetails?id=".base64_encode($this->input->post("txtid")));
      }
      }
    }

    function viewcart()
    {
      if(isset($_SESSION["UserId"]))
      {
        $result["cat"]= $this->catsubcat();
        $result["cart"]= $this->cartdata();
        $where = array('tblcart.UserId' => $_SESSION["UserId"] );
        $result["data"]=$this->model_user->viewcartdata($where);
       // print_r($result);
        $this->load->view("user/cart",$result);
      }
      else
      {
        $result["cat"]= $this->catsubcat();
        $this->load->view("user/cart",$result);
      }
    }

    function deletefromcart()
    {
      if(isset($_SESSION["UserId"]))
      {
        $id=base64_decode($_GET["id"]);
        $where = array('CartId' => $id );
        $this->model_user->delete("tblcart",$where);
        redirect(base_url()."user_c/viewcart");
      }
      else
      {
         $data = array(
        'rowid' => base64_decode($_GET["id"]),
        'qty'   => 0
      );
        $this->cart->update($data);
        redirect(base_url()."user_c/viewcart");
      }
     
    }

    function destroycart()
    {
      if(isset($_SESSION["UserId"]))
      {
        $where = array('UserId' => $_SESSION["UserId"]);
        $this->model_user->delete("tblcart",$where);
        $this->cart->destroy();
        redirect(base_url()."user_c/viewcart");
      }
      else
      {
        $this->cart->destroy();
        redirect(base_url()."user_c/viewcart");
      }
    }

    function updatecart()
    {
      if(isset($_SESSION["UserId"]))
      {
        $where = array('CartId' => $_GET["id"] );
        $result=$this->model_user->selectone("tblcart",$where);
        $data = array(
          'CartId' => $_GET["id"],
          'Qty'    => $_GET["qty"],
          'Total'  => $result["Price"]*$_GET["qty"]
          );
        $this->model_user->update("tblcart",$data,$where);
        redirect(base_url()."user_c/viewcart");
      }
      else
      {

         $data = array(
          'rowid' => $_GET["id"],
          'qty'   => $_GET["qty"]
          );
        $this->cart->update($data);
        redirect(base_url()."user_c/viewcart");
      }
    }

    function checkout()
    {
      $result["cat"]= $this->catsubcat();
      $result["cart"]= $this->cartdata();
      $where = array('UserId' => $_SESSION["UserId"] );
      $result["add"]=$this->model_user->addressdata($where);
      $result["state"]=$this->model_user->getdata("tblstate");
      $this->load->view("user/checkout",$result);
    }

    function login()
    {
      if(isset($_POST["btnlogin"]))
      {        
        //echo "ok";
        //if(isset($_POST["remember_me"]))
        {
          $cookie = array(
            'name'   => 'EmailId',
            'value'  => $this->input->post("txtemail"),
            'expire' => time()+1000,
            'path'   => '/',
            'secure' => TRUE
          );
          $cookie = array(
            'name'   => 'Password',
            'value'  => $this->input->post("txtpwd"),
            'expire' => time()+1000,
            'path'   => '/',
            'secure' => TRUE
          );
           

          $this->input->set_cookie($cookie);
           echo "jhsdhjsgdsh".$this->input->cookie('EmailId',true);
        }


          $where=array(
        'EmailId'=>$this->input->post("txtemail"),
        'Password'=>$this->password_encryption->encrypt($this->input->post("txtpwd")),
        'IsBlock'=>0,
        'IsVarified'=>1
        );
        $data=$this->model_user->selectone("tbluser",$where);
        
        if(!is_null($data))
        {
          $sessiondata=array(
          'UserId'=>$data["UserId"],
          'FirstName'=>$data["FirstName"],
          'LastName'=>$data["LastName"],
          'EmailId'=>$data["EmailId"],
          'ContactNo'=>$data["ContactNo"],
          'ImageUrl'=>$data["ImageUrl"],
          'CreatedOn'=>$data["CreatedOn"],
          'Balance'=>$data["Balance"]
          );
          $this->session->set_userdata($sessiondata);
          
          foreach ($this->cart->contents() as $value)
          {
            $data1 = array(
              'UserId' => $_SESSION["UserId"],
              'BookId' => $value["id"],
              'Qty'    =>$value["qty"],
              'Price'  =>$value["price"],
              'Total'  =>$value["subtotal"],
              'CreatedOn'=>$this->datetime()
              );
            $where = array('BookId' => $value["id"] );
            $result=$this->model_user->selectone("tblcart",$where);
            if(count($result)==0)
            {
              $this->model_user->insert("tblcart",$data1);
            }

          }

          $url= $_SERVER['HTTP_REFERER'];
          if($url==base_url()."user_c/viewcart")
          {
           redirect(base_url()."user_c/checkout");
          }
          else
          {
            redirect(base_url()."user_c");
          }
        }
        else
        {
          $this->session->set_flashdata("error",true);
          //redirect(base_url()."user_c/login");
                
        }
      }
         $result["cat"]= $this->catsubcat();
         $result["cart"]= $this->cartdata();
        $this->load->view("user/login",$result);
    }

    function register()
    {
      if(isset($_POST["btnregister"]))
      {
        $config["allowed_types"]="jpg|png|jpeg";
        $config["upload_path"]="./user_image/";
        $this->load->library("upload",$config);
        if($this->upload->do_upload("txtimg"))
        {
          $filedata=$this->upload->data();
          $img= $filedata["file_name"];
        }
        else
        {
          //print_r($this->upload->display_errors());
          $img="download.png";
        }
        $date=$this->datetime();

        $data = array(
          'FirstName'=>$this->input->post("txtfname"),
          'LastName'=>$this->input->post("txtlname"),
          'EmailId'=>$this->input->post("txtemail"),
          'ContactNo'=>$this->input->post("txtcno"),
          'Password'=>$this->password_encryption->encrypt($this->input->post("txtcpwd")),
          'ImageUrl'=>$img,
          'CreatedOn'=>$date,
          'IsVarified'=>0,
          'Balance'=>50,
          'IsBlock'=>0
         );

        $this->model_user->insert("tbluser",$data);
        $id=$this->db->insert_id();
        $_SESSION["Id"]=$id;
         
        $email=$this->input->post("txtemail");
         $where = array('EmailId' => $email );
        $result=$this->model_user->selectone("tbluser",$where);
        if($email==$result["EmailId"])
        {
          $to  = $result["EmailId"];
          $_SESSION['EmailId']=$result['EmailId'];
      // subject
      $subject ="Bookseize - User Varification";

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
    }


    function profile()
    {
      $result["cat"]= $this->catsubcat();
      $result["cart"]= $this->cartdata();
      $this->load->view("user/profile",$result);
    }

    function logout()
    {
        //unset($_SESSION["UserId"]);
        //unset($_SESSION["FirstName"]);
        //unset($_SESSION["LastName"]);
        session_destroy();
        redirect(base_url()."user_c");
    }

    function deleteaddress()
    {
      $id=base64_decode($_GET["id"]);
      $where = array('AddressId' => $id );
      $this->model_user->delete("tbladdress",$where);
      $url= $_SERVER['HTTP_REFERER'];
      if($url==base_url()."user_c/checkout")
      {
        redirect(base_url()."user_c/checkout");
      }
      else
      {
      redirect(base_url()."u_c/proaddress");
      }
    
    }


    function getcity()
    {
      $state= $_POST["state"];
      $where=array('StateId' => $state );
      $result=$this->model_user->getdata("tblcity"," CityId",$where);
      $output='<option selected="selected" disabled="" >Select City </option>';
      
      foreach ($result as  $value) {
        $output .='<option value="'.$value["CityId"].'" >'.$value["CityName"].'</option>';
                        
        }
      echo $output;
      //print_r($result);
    }

    function addaddress()
    {
      if(isset($_POST["btnadd"]))
      {
         $data = array(
        'UserId' => $_SESSION["UserId"],
        'AddressText'=>$this->input->post("txtarea"),
        'StateId'=>$this->input->post("ddstate"),
        'CityId'=>$this->input->post("ddcity"),
        'IsDefault'=>0
        );
        $this->model_user->insert("tbladdress",$data);
        $url= $_SERVER['HTTP_REFERER'];
        if($url==base_url()."user_c/checkout")
        {
          redirect(base_url()."user_c/checkout");
        }
        else
        {
          redirect(base_url()."u_c/proaddress");
        }
      }

      if(isset($_POST["continue"]))
      {
        // do whatever you want
        $_SESSION["AddressId"]=$_POST["radio"];
        $result['cart']= $this->cartdata();
        $this->load->view("user/checkoutpayment",$result);
      }
     
    }

    function aboutus()
    {
      $result["cart"]= $this->cartdata();
      $this->load->view("user/aboutus",$result);
    }
  }
?>