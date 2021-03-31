<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Password_encryption{
	public $encryp_key;
	function __construct(){
        $this->CI =& get_instance();
        $this->encryp_key = "book";
    }
	function encrypt($string) {
		$key = $this->encryp_key;
		$result = '';
		for($i=0; $i<8; $i++) {
			$char = substr($string, $i, 1);
			$keychar = substr($key, ($i % strlen($key))-1, 1);
			$char = chr(ord($char)+ord($keychar));
			$result.=$char;
		}
		return base64_encode($result);
	}

	function decrypt($string) {
		$key = $this->encryp_key;
		$result = '';
		$string = base64_decode($string);
		for($i=0; $i<8; $i++) {
			$char = substr($string, $i, 1);
			$keychar = substr($key, ($i % strlen($key))-1, 1);
			$char = chr(ord($char)-ord($keychar));
			$result.=$char;
		}
		return $result;
	}
}
?>