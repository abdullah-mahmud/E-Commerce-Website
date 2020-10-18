<?php 
$filepath = realpath(dirname(__FILE__));

include_once ($filepath.'/../helpers/Format.php');
include_once ($filepath.'/../lib/Database.php');


?>



<?php
class Brand 
{
	
	private $db;
	private $fm;

   public  function __construct(){
	
      $this->db =  new Database();
       $this->fm  = new Format();

	}

	public function brandInsert($brandName)
	{

		$brandName = $this->fm->validation($brandName);
        $brandName = mysqli_real_escape_string($this->db->link,$brandName);
		if (empty($brandName)) {
		$msg = "<span class='error'>Please Insert Brand Name !!</span>";
		return $msg;
		}else
		{
			$query = "  insert into tbl_brand (brandName) values ('$brandName')  ";
			$brandinsert = $this->db->insert($query);
			if ($brandinsert) {
 $msg = "<span class='success'>Brand Name  Successfully Inserted !!</span>";
 return $msg;

}
else
{
	$msg = "<span class='error'>Brand Name Not Inserted !!</span>";
	return $msg;
}

	}



}

public function getallbrand()
{

	$query = "select * from tbl_brand order by brandId desc";
	$result = $this->db->select($query);
	return $result;
            
}

public function getbrandbyId($id)
{

	$query = "select * from tbl_brand where brandId = '$id' ";
	$result = $this->db->select($query);
	return $result;
            
}

	public function brandUpdate($brandName,$id)
	{

		$brandName = $this->fm->validation($brandName);
        $brandName = mysqli_real_escape_string($this->db->link,$brandName);
        $id = mysqli_real_escape_string($this->db->link,$id);
		if (empty($brandName)) {
		$msg = "<span class='error'>Please Insert Brand Name !!</span>";
		return $msg;
		}else
		{
			$query = " update tbl_brand 

						set 
						brandName = '$brandName'
						where 
						brandId = '$id'

			 ";
			$brandupdate = $this->db->update($query);
			if ($brandupdate) {
 $msg = "<span class='success'>Brand Name Successfully Updated !!</span>";
 return $msg;

}
else
{
	$msg = "<span class='error'>Brand Name Not Updated !!</span>";
	return $msg;
}

	}



}


public function delbrandbyId($id)
{

	$query = "delete from tbl_brand where brandId = '$id'";
	$result = $this->db->delete($query);
	if($result)
	{
		$msg = "<span class='success'>Brand Name Successfully Deleted !!</span>";
		return $msg;
	}
	else
{
	$msg = "<span class='error'>Brand Name Not Deleted !!</span>";
	return $msg;
}
}






}


?>


