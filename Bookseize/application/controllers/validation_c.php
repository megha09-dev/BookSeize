<?php

  class validation_c extends CI_Controller
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

    function checkmail()
    {
        $email=$_POST["email"];
        $where = array('EmailId' => $email );
        $result=$this->model_user->checkrecord("tbluser",$where);
        if($result=="true")
        {
          echo "EmailId Already Exist!";
        }
        else
        {
          echo "";
        }
    }

    function checkcno()
    {
        $cno=$_POST["cno"];
        $where = array('ContactNo' => $cno );
        $result=$this->model_user->checkrecord("tbluser",$where);
        if($result=="true")
        {
          echo "ContactNo Already Exist!";
        }
        else
        {
          echo "";
        }
    }

    function searchbook()
    {
        if(!is_null($this->input->post("site_search")))
        {
            $name=$this->input->post("site_search");
            $where = array('BookName' => $name );
            $result["book"]=$this->model_user->search($name);
            $this->load->view("user/search",$result);
        }
        else
        {
            redirect(base_url()."user_c");
        }
        
    }
  }
?>