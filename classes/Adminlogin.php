<?php 
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/session.php');
include_once ($filepath.'/../helpers/Format.php');
include_once ($filepath.'/../lib/Database.php');
session::checklogin();

?>




<?php
/**
* Adminlogin class
*/
class Adminlogin 
{
	private $db;
	private $fm;

   public  function __construct(){
	
      $this->db =  new Database();
       $this->fm  = new Format();

	}

	public function adminlogin($adminUser,$adminPass)
	{

		$adminUser = $this->fm->validation($adminUser);
		$adminPass = $this->fm->validation($adminPass);
		$adminUser = mysqli_real_escape_string($this->db->link,$adminUser);
        $adminPass = mysqli_real_escape_string($this->db->link,$adminPass);
		if (empty($adminUser) || empty($adminPass)) {
		$loginmsg = "Username or Password Must not be Empty!!";
		return $loginmsg;
		}else
		{
			$query = "select * from tbl_admin where adminUser = '$adminUser' and 
			adminPass = '$adminPass' ";
			$result = $this->db->select($query);
			if ($result) {

				$value = $result->fetch_assoc();
				      session::set("adminlogin",true);
                		session::set("adminName",$value['adminName']);
                		session::set("adminId",$value['adminId']);
                        session::set("adminLevel",$value['level']);
                       header("Location:dashbord.php");

				
			}else
			{
				$loginmsg = "Incorrect Username or Password";
				return $loginmsg;
			}
		}
	}
}


?>