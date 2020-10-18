<?php 
$filepath = realpath(dirname(__FILE__));

include_once ($filepath.'/../helpers/Format.php');
include_once ($filepath.'/../lib/Database.php');


?>


<?php
class Category 
{
	
	private $db;
	private $fm;

   public  function __construct(){
	
      $this->db =  new Database();
       $this->fm  = new Format();

	}

	public function catInsert($catName)
	{

		$catName = $this->fm->validation($catName);
        $catName = mysqli_real_escape_string($this->db->link,$catName);
		if (empty($catName)) {
		$msg = "<span class='error'>Please Insert Category !!</span>";
		return $msg;
		}else
		{
			$query = "  insert into tbl_category(catName) values ('$catName')  ";
			$catinsert = $this->db->insert($query);
			if ($catinsert) {
 $msg = "<span class='success'>Category Successfully Inserted !!</span>";
 return $msg;

}
else
{
	$msg = "<span class='error'>Category Not Inserted !!</span>";
	return $msg;
}

	}



}

public function getallCat()
{

	$query = "select * from tbl_category order by catId desc";
	$result = $this->db->select($query);
	return $result;
            
}

public function getCatbyId($id)
{

	$query = "select * from tbl_category where catId = '$id' ";
	$result = $this->db->select($query);
	return $result;
            
}

	public function catUpdate($catName,$id)
	{

		$catName = $this->fm->validation($catName);
        $catName = mysqli_real_escape_string($this->db->link,$catName);
        $id = mysqli_real_escape_string($this->db->link,$id);
		if (empty($catName)) {
		$msg = "<span class='error'>Please Insert Category !!</span>";
		return $msg;
		}else
		{
			$query = " update tbl_category 

						set 
						catName = '$catName'
						where 
						catId = '$id'

			 ";
			$catupdate = $this->db->update($query);
			if ($catupdate) {
 $msg = "<span class='success'>Category Successfully Updated !!</span>";
 return $msg;

}
else
{
	$msg = "<span class='error'>Category Not Updated !!</span>";
	return $msg;
}

	}



}


public function delCatbyId($id)
{

	$query = "delete from tbl_category where catId = '$id'";
	$result = $this->db->delete($query);
	if($result)
	{
		$msg = "<span class='success'>Category Successfully Deleted !!</span>";
		return $msg;
	}
	else
{
	$msg = "<span class='error'>Category Not Deleted !!</span>";
	return $msg;
}
}

public function getAllfromCat()
{
	$query = "select * from tbl_category";
	$result = $this->db->select($query);
	return $result;
}




}


?>


