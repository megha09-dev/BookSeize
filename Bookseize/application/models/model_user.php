<?php
	
	class model_user extends CI_Model
	{

		function __construct()
		{
			parent::__construct();
			$this->load->database();
		}

		function selectone($tablename,$where)
		{
			$result=$this->db->get_where($tablename,$where);
			return $result->row_array();
		}

		function topbooks()
		{
			$result=$this->db->query("SELECT o.BookId,BookName,CategoryId,ImageName,SalePrice,OriginalPrice, SUM(Quantity) AS TotalQuantity FROM tblorderdetail o,tblbook b where o.BookId=b.BookId  GROUP BY o.BookId ORDER BY SUM(Quantity) DESC LIMIT 12");
			return $result->result_array();
		}

		function delete($tablename,$where)
		{
			$this->db->delete($tablename,$where);
		}

		function showmore($catid,$e,$limit)
		{
		

			$query="select * from tblbook where CategoryId='$catid' order by BookId desc limit $limit  ";
			//echo $query;
			$result=$this->db->query($query);
					return $result->result_array();
		}

		function getdata($tablename,$fieldname="",$where="",$limit="")
		{
			if($where=="")
			{
				
					$result=$this->db->order_by($fieldname,"desc")
							->get($tablename);
					return $result->result_array();
				
				
			}
			else
			{
				if($limit=="")
				{
					$result=$this->db->order_by($fieldname,"aesc")
								->get_where($tablename,$where);
				return $result->result_array();
				}
				else
				{
					$result=$this->db->order_by($fieldname,"aesc")
							->limit($limit)

								->get_where($tablename,$where);
				return $result->result_array();
				}
				
			}
			
		}

		function insert($tablename,$data)
		{
			$this->db->insert($tablename,$data);
		}

		function dataview($where="")
		{

			if($where=="")
			{
				$result = $this->db->join('tbluser','tbluser.UserId=tblbookinquiry.UserId')
									->join('tblbook','tblbook.BookId=tblbookinquiry.BookId')			
									->get('tblbookinquiry');
				return $result->result_array();
			}
			else
			{
				$result = $this->db->join('tbluser','tbluser.UserId=tblbookinquiry.UserId')
									->join('tblbook','tblbook.BookId=tblbookinquiry.BookId')			
									->get_where('tblbookinquiry',$where);
				return $result->row_array();
			}
			
		}

		function quickview($where)
		{
			$result = $this->db->join('tblcategory','tblcategory.CategoryId=tblbook.CategoryId')

								->join('tblsubcategory','tblsubcategory.SubCategoryId=tblbook.SubCategoryId')
								
								->join('tblpublisher','tblpublisher.PublisherId=tblbook.PublisherId')

								->join('tbluser','tbluser.UserId=tblbook.UserId')

								->get_where('tblbook',$where);
			return $result->row_array();
		}

		function viewcartdata($where)
		{
			$result = $this->db->select("*,tblbook.Qty as qty1,tblcart.Qty as qty2 ,tblbook.UserId as u1,tblcart.UserId as u2")
								->join('tblbook','tblbook.BookId=tblcart.BookId')
								->get_where('tblcart',$where);
								//print_r( $result->result_array());
				return $result->result_array();
		}

		function update($tablename,$data,$where)
		{
			$this->db->where($where);
			$this->db->update($tablename,$data);
		}

		function addressdata($where)
		{
			$result = $this->db->join('tblstate','tblstate.StateId=tbladdress.StateId')
									->join('tblcity','tblcity.CityId=tbladdress.CityId')			
									->get_where('tbladdress',$where);
			return $result->result_array();
		}

		function orderdetails($where)
		{
			$result = $this->db->join('tblbook','tblbook.BookId=tblorderdetail.BookId')
								->get_where('tblorderdetail',$where);
								//print_r( $result->result_array());
			return $result->result_array();
		}

		function myorderlist($where)
		{
			$result = $this->db->select("*,tblorder.OrderId as oid ,tblbook.UserId as u1,tblorder.UserId as buyerid,tblorderdetail.status as st1,tblorder.status as st2")
								->join('tblorderdetail','tblorderdetail.BookId=tblbook.BookId')
								->join('tblorder','tblorderdetail.OrderId=tblorder.OrderId')
								->join('tbladdress','tblorder.AddressId=tbladdress.AddressId')
								->join('tbluser','tbluser.UserId=tblorder.UserId')
								->group_by("tblorderdetail.OrderId")
								->get_where('tblbook',$where);
							//	print_r( $result->result_array());
			return $result->result_array();
		}

		function feedback($where)
		{

			$result = $this->db->join('tbluser','tbluser.UserId=tblfeedback.UserId',"left")
									->get_where('tblfeedback',$where);
			return $result->result_array();
		}

		function avgrate($where)
		{
			$result=$this->db->select('round(avg(Rate),1) as rating')
							 ->get_where("tblfeedback",$where);
			return $result->row_array();
		}


		function testimonial($where)
		{
			$result = $this->db->join('tbluser','tbluser.UserId=tbltestimonial.UserId')
									->get_where('tbltestimonial',$where);
			return $result->result_array();
		}

		function checkrecord($tablename,$where)
		{
			$result=$this->db->get_where($tablename,$where);
			$array= $result->row_array();
			//print_r($array);
			if(is_array($array))
			{
				return "true";
				
			}
			else
			{
				return "false";

			}
		}

	    function changestatus($where)
	    {
		   $result = $this->db->join('tblbook','tblbook.BookId=tblorderdetail.BookId')
							->get_where('tblorderdetail',$where);

		   return $result->result_array();
    	}

    	function changeorderstatus($where)
		{
			$result=$this->db->get_where('tblorderdetail',$where);
			return $result->result_array();
		}

		function get_order_wise_total($orderid)
		{
			$query="select sum(Price) as total from tblorder join tblorderdetail on tblorder.OrderId = tblorderdetail.OrderId join tblbook on tblbook.BookId = tblorderdetail.BookId where tblbook.UserId = '".$_SESSION["UserId"]."'
			and tblorderdetail.OrderId='$orderid';
		 	";
			$result=$this->db->query($query);
			return $result->row_array();
		}

		function search($name)
		{
			$result=$this->db->query("select * from tblbook where BookName like '%$name%'");
			return $result->result_array();
		}

	}

?>
