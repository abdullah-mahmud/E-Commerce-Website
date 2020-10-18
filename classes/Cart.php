<?php 
$filepath = realpath(dirname(__FILE__));

include_once ($filepath.'/../helpers/Format.php');
include_once ($filepath.'/../lib/Database.php');


?>



<?php

class Cart 
{
	
	private $db;
	private $fm;

   public  function __construct(){
	
       $this->db =  new Database();
       $this->fm  = new Format();

	}

	public function addToCart($quantity,$id)
	{
		
		$quantity  = $this->fm->validation($quantity);
      $quantity = mysqli_real_escape_string($this->db->link,$quantity);
      $productId = mysqli_real_escape_string($this->db->link,$id);
      $sId = session_id();
      $selectpd = "select * from tbl_product where productId = '$productId'";

   $result = $this->db->select($selectpd)->fetch_assoc();
    
    $productName = $result['productName'];
    $price = $result['price'];
    $image = $result['image'];
    $checkQ = "select * from tbl_cart where productId = '$productId' and sId = '$sId'";
    $getresult = $this->db->select($checkQ);
    if ($getresult) {
    	$msg = "Sorry Product Already Added To Your Cart!!";
    	return $msg;
    }
    else
    {

    $insertQ = "insert into 
    tbl_cart (sId,productId,productName,price,quantity,image) values ('$sId','$productId','$productName','$price','$quantity','$image')";
    $succesInsert = $this->db->insert($insertQ);
    if ($succesInsert) {
    	header("Location:cart.php");
    }
    else 
    {
    	header("Location:404.php");
    }

}

	}
public function getCartitem()
{
	$sId = session_id();
	$query = "select * from tbl_cart where sId = '$sId'"; 
	$result = $this->db->select($query);
	return $result;

}
public function UpdateCartQuantity($quantity,$cartId)
{
	 $quantity        = $this->fm->validation($quantity);

$quantity = mysqli_real_escape_string($this->db->link,$quantity);


$query = " update tbl_cart 

						set 
						quantity = '$quantity'
						where 
						cartId = '$cartId'

			 ";
			$cartupdate = $this->db->update($query);
			if ($cartupdate) {
 
  header("Location:cart.php");


}
else
{
	$msg = "<span class='error'>Quantity Not Updated !!</span>";
	return $msg;
}

}

public function delCartbyId($id)
{
	$delQ = "delete from tbl_cart where cartId = '$id'";
	$result = $this->db->delete($delQ);
if ($result) {

 header("Location:cart.php");
 return $msg;
}
else
{
	$msg = "<span class='error'>Product Item Not Deleted !!</span>";
	return $msg;
}




}
public function cartCheck()
{
	$sId = session_id();

	$query = "select * from tbl_cart where sId = '$sId'";
	$result = $this->db->select($query);
	return $result;
	
	}
	 public function delCustomerCart(){
		$sId = session_id();
		$query= "DELETE FROM tbl_cart WHERE sId = '$sId'";
		$this->db->delete($query);
 		}
 		public function orderProduct($cmrID)
 		{
 			$sId = session_id();
 			$query = "select * from tbl_cart where sId = '$sId'";
	$getPro = $this->db->select($query);
	if ($getPro) {
		while ($result = $getPro->fetch_assoc()) {
			
			$productId = $result['productId'];
			$productName = $result['productName'];
			$quantity = $result['quantity'];
			$price = $result['price'] * $quantity;
			$image = $result['image'];
			$insertQ = "insert into 
    tbl_order (cmrId,productId,productName,quantity,price,image) values ('$cmrID','$productId','$productName','$quantity','$price','$image')";
    $succesInsert = $this->db->insert($insertQ);
		}
	}

 		}
 		public function GetPricefromorder($cmrID)
 		{
 $query = "select price from tbl_order where cmrId = '$cmrID' and date = now()";
	$result = $this->db->select($query);
	return $result;
 			
 		}
 		public function getProfromOrder($cmrID)
 		{
 			$query = "select * from tbl_order where cmrId = '$cmrID' order by date desc";
	$result = $this->db->select($query);
	return $result;
 		}
 		public function orderCheck($cmrID)
 		{
 			$query = "select * from tbl_order where cmrId = '$cmrID'";
	$result = $this->db->select($query);
	return $result;
 			
 		}
 		public function getAllOrderList ()
 		{
 			$query = "select * from tbl_order order by date";
	$result = $this->db->select($query);
	return $result;
 			
 		}
 		public function getProShifted($id,$time,$price)
 		{
 			$id   = $this->fm->validation($id);
 			$time   = $this->fm->validation($time);
 			$price   = $this->fm->validation($price);

		$id = mysqli_real_escape_string($this->db->link,$id);
		$time = mysqli_real_escape_string($this->db->link,$time);
		$price = mysqli_real_escape_string($this->db->link,$price);
		$query = " update tbl_order 

						set 
						status = '1'
						where 
						cmrId = '$id'
						and
						price = '$price'
						and
						date = '$time'

			 ";
			$Orderupdate = $this->db->update($query);
			if (isset($Orderupdate)) {
				$msg = "<span class='success'> Product Has been Shifted !!</span>";
	return $msg;
			}
			else
			{
				$msg = "<span class='error'> Product Has not  been Shifted !!</span>";
	return $msg;

			}
			




 		}
 		public function delOrderbyId($id)
 		{
 			$query = "delete from tbl_order where id = '$id'";
 			$Orderdelete = $this->db->delete($query);
			if ($Orderdelete) {

 header("Location:order.php");

}
else
{
	 echo "<span class='error'>Product Item Not Deleted !!</span>";
	
}
			

 		}
 		public function UpdateORderbyId($upid)
 		{
 			$query = " update tbl_order 

						set 
						status = '2'
						where 
					id = '$upid'

			 ";
			$Orderupdate = $this->db->update($query);
			if ($Orderupdate) {

 header("Location:order.php");

}
else
{
	 echo "<span class='error'>Some Went Wrong with this product!!</span>";
	
}

 		}


}

?>