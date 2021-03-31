<?php
	
	class model_admin extends CI_Model
	{

		function __construct()
		{
			parent::__construct();
			$this->load->database();
		}

		function getdatachart($post="")
		{
			if($post=="")
			{
				$query=$this->db->query('SELECT DATE_FORMAT(CreatedOn, "%m") AS Month, sum(TotalAmount) as Total FROM tblorder where Year(CreatedOn)=YEAR(CURDATE())  GROUP BY DATE_FORMAT(CreatedOn, "%m-%Y") ');
			
			return $query->result_array();
			}
			else
			{

			$query=$this->db->query('SELECT DATE_FORMAT(CreatedOn, "%m") AS Month, sum(TotalAmount) as Total FROM tblorder where Year(CreatedOn)='.$post.' GROUP BY DATE_FORMAT(CreatedOn, "%m-%Y") ');
			
			return $query->result_array();
			}

		}

		function ddchartdata()
		{
			$result=$this->db->query('SELECT DISTINCT YEAR(CreatedOn) AS Year from tblorder');
			return $result->result_array();
		}

		function checkrecord($tablename,$where)
		{
			$result=$this->db->get_where($tablename,$where);
			$array= $result->row_array();
			
			if(count($array)>0)
			{
				return "true";
				
			}
			else
			{
				return "false";

			}
		}

		function selectone($tablename,$where)
		{
			$result=$this->db->get_where($tablename,$where);
			return $result->row_array();
		}

		//fieldname for order by 

		function getdata($tablename,$fieldname="",$where="")
		{
			if($where=="")
			{
				$result=$this->db->order_by($fieldname,"desc")
							->get($tablename);
				return $result->result_array();
			}
			else
			{
				$result=$this->db->order_by($fieldname,"desc")
								->get_where($tablename,$where);
				return $result->result_array();
			}
			
		}

		function isactive($tablename,$data,$id,$field)
		{
			$this->db->where($field,$id);
			$this->db->update($tablename,$data);
		}
		
		/*function getdatasub($tablename,$id)
		{
			$where = array('tblcategory.CategoryId' => $id );
			$result=$this->db->select("*,tblsubcategory.IsActive as IA")
							->join("tblcategory","tblcategory.CategoryId=tblsubcategory.CategoryId")
							->get("tblsubcategory",$where);
			//$result=$this->db->get($tablename,$where);
			return $result->result_array();
		}*/

		function delete($tablename,$id,$field)
		{
			$where=array($field=>$id);
			$data=$this->db->get_where("tblsubcategory",$where);
			$result=$data->result_array();
			foreach ($result as  $value) {
				$where1=array('SubCategoryId' => $value["SubCategoryId"] );
				$this->db->delete("tblsubcategory",$where1);
			}

			$this->db->delete($tablename,$where);
		}

		function deletemain($tablename,$id,$field)
		{
			$where=array($field=>$id);
			$this->db->delete($tablename,$where);
		}

		function insert($tablename,$data)
		{
			$this->db->insert($tablename,$data);
		}

		function deleteall($tablename,$where,$fieldname)
		{
			$this->db->where_in($fieldname,$where)
			         ->delete($tablename);
		}

		function update($tablename,$id,$data,$fieldname)
		{
			$where = array($fieldname => $id );
			$this->db->where($where);
			$this->db->update($tablename,$data);
		}

		function bookalldata($id)
		{
			$where = array('tblbook.BookId' => $id);

			$result = $this->db->join('tblcategory','tblcategory.CategoryId=tblbook.CategoryId')

								->join('tblsubcategory','tblsubcategory.SubCategoryId=tblbook.SubCategoryId')
								
								->join('tblpublisher','tblpublisher.PublisherId=tblbook.PublisherId')

								->join('tbluser','tbluser.UserId=tblbook.UserId')

								->get_where('tblbook',$where);
			return $result->row_array();
		}

		function getdata_in($tablename,$fieldname,$array)
		{
			$data=$this->db->where_in($fieldname,$array)
							->get($tablename);

			return $data->result_array();
		}

		function getorders()
		{
			$result=$this->db->select("*,tblorder.UserId as uid")
							->join("tblorder","tblorder.UserId=tbluser.UserId")
							->order_by("OrderId",'desc')
							->get("tbluser");
			//$result=$this->db->get($tablename,$where);
			return $result->result_array();
		}

		function getorderdetails($where)
		{
			$result=$this->db->select("*")
							->join("tblbook","tblbook.BookId=tblorderdetail.BookId")
							->get_where("tblorderdetail",$where);
						//$r="select * from tblorderdetail join tblbook on tblbook.BookId = tblorderdetail.BookId where tblorderdetail.OrderId = '1' ";
						//$result=$this->db->query($r);
			return $result->result_array();
		}

		function feedback()
		{
			
			$result = $this->db->join('tbluser','tbluser.UserId=tblfeedback.UserId')

								->join('tblbook','tblbook.BookId=tblfeedback.BookId')
								
								->get('tblfeedback');
			return $result->result_array();
		}

		function testimonial()
		{

			$result = $this->db->join('tbluser','tbluser.UserId=tbltestimonial.UserId')	
								->get('tbltestimonial');
			return $result->result_array();
		}

		
		
		function inquiry($where="")
		{

			if($where=="")
			{
				$result = $this->db->join('tbluser','tbluser.UserId=tblbookinquiry.UserId')			
									->get('tblbookinquiry');
				return $result->result_array();
			}
			else
			{
				$result = $this->db->join('tbluser','tbluser.UserId=tblbookinquiry.UserId')		
									->get_where('tblbookinquiry',$where);
				return $result->row_array();
			}
			
		}

		function counting($tblname,$field)
		{
			$query="select count($field) as total from $tblname ";
			$result=$this->db->query($query);
			return $result->row_array();

		}



}
?>