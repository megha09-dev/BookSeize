<?php
	function authcheck()
	{
		if(!isset($_SESSION["AdminId"]))
		{
			redirect(base_url()."admin_c");
		}
	} 
?>