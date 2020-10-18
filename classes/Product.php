<?php 
$filepath = realpath(dirname(__FILE__));

include_once ($filepath.'/../helpers/Format.php');
include_once ($filepath.'/../lib/Database.php');


?>


<?php
class Product 
{
	
	private $db;
	private $fm;

   public  function __construct(){
	
      $this->db =  new Database();
       $this->fm  = new Format();

	}

	public function PdInsert($data,$file)
	{
         $productName = $this->fm->validation($data['productName']);
		 $catId       = $this->fm->validation($data['catId']);
		 $brandId     = $this->fm->validation($data['brandId']);
		 $body        = $this->fm->validation($data['body']);
		 $price	      = $this->fm->validation($data['price']);
		 $type        = $this->fm->validation($data['type']);

$productName = mysqli_real_escape_string($this->db->link,$data['productName']);
$catId       = mysqli_real_escape_string($this->db->link,$data['catId']);
$brandId     = mysqli_real_escape_string($this->db->link,$data['brandId']);
$body        = mysqli_real_escape_string($this->db->link,$data['body']);
$price       = mysqli_real_escape_string($this->db->link,$data['price']);
$type        = mysqli_real_escape_string($this->db->link,$data['type']);

    $permited  = array('jpg', 'jpeg', 'png', 'gif');
    $file_name = $file['image']['name'];
    $file_size = $file['image']['size'];
    $file_temp = $file['image']['tmp_name'];

    $div = explode('.', $file_name);
    $file_ext = strtolower(end($div));
    $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
    $uploaded_image = "upload/".$unique_image;
   if ($productName=="" || $catId=="" || $brandId=="" || $body=="" || $price=="" || $type=="" ) {
   $msg = "<span class='error'>Field Must Not be Empty !!</span>";
		return $msg;

   }
     elseif ($file_size >1048567) {
     $msg =  "<span class='error'>Image Size should be less then 1MB!
     </span>";
     return $msg;
    }

    elseif (in_array($file_ext, $permited) === false) {
    $msg =  "<span class='error'>You can upload only:-"
     .implode(', ', $permited)."</span>";
     return $msg;
    } 

   
    
   elseif (empty($file_name)) {
     $msg = "<span class='error'>Please Select any Image !!</span>";
		return $msg;
    }

else{
    move_uploaded_file($file_temp, $uploaded_image);
    $query = "INSERT INTO tbl_product (productName,catId,brandId,body,price,image,type)
    VALUES ('$productName','$catId','$brandId','$body','$price','$uploaded_image','$type')";

   $Productinsert = $this->db->insert($query);
    if ($Productinsert) {
     $msg = "<span class='success'>Pruduct Item Successfully Added!!</span>";
		return $msg;
    }else {
     $msg = "<span class='error'>Pruduct Item Can't Add!!</span>";
		return $msg;
    }
    }





		
	}

public function getAllProduct()
{
$query = "select tbl_product.*,tbl_category.catName,tbl_brand.brandName from tbl_product 
 inner join tbl_category
 using (catId)
  inner join tbl_brand
 using (brandId) 
order by productId desc";
$result = $this->db->select($query);
return $result;

}

public function getProductbyId($id)
{

	$query = "select * from  tbl_product where productId = '$id'";
 $result = $this->db->select($query);
return $result;

}

public function productUpdatebyId($data,$file,$id)
{
    
     $productName = $this->fm->validation($data['productName']);
		 $catId       = $this->fm->validation($data['catId']);
		 $brandId     = $this->fm->validation($data['brandId']);
		 $body        = $this->fm->validation($data['body']);
		 $price	      = $this->fm->validation($data['price']);
		 $type        = $this->fm->validation($data['type']);

$productName = mysqli_real_escape_string($this->db->link,$data['productName']);
$catId       = mysqli_real_escape_string($this->db->link,$data['catId']);
$brandId     = mysqli_real_escape_string($this->db->link,$data['brandId']);
$body        = mysqli_real_escape_string($this->db->link,$data['body']);
$price       = mysqli_real_escape_string($this->db->link,$data['price']);
$type        = mysqli_real_escape_string($this->db->link,$data['type']);

    $permited  = array('jpg', 'jpeg', 'png', 'gif');
    $file_name = $file['image']['name'];
    $file_size = $file['image']['size'];
    $file_temp = $file['image']['tmp_name'];

    $div = explode('.', $file_name);
    $file_ext = strtolower(end($div));
    $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
    $uploaded_image = "upload/".$unique_image;
   if ($productName=="" || $catId=="" || $brandId=="" || $body=="" || $price=="" || $type=="" ) {
   $msg = "<span class='error'>Field Must Not be Empty !!</span>";
		return $msg;

   }else
	   {  if(!empty($file_name)){

					 if ($file_size >1048567) {
					 $msg =  "<span class='error'>Image Size should be less then 1MB!
					 </span>";
					 return $msg;
					}

					elseif (in_array($file_ext, $permited) === false) {
					$msg =  "<span class='error'>You can upload only:-"
					 .implode(', ', $permited)."</span>";
					 return $msg;
					} 

   
    
			   elseif (empty($file_name)) {
			     $msg = "<span class='error'>Please Select any Image !!</span>";
					return $msg;
			    }

else{
    move_uploaded_file($file_temp, $uploaded_image);
    $query = "INSERT INTO tbl_product (productName,catId,brandId,body,price,image,type)
    VALUES ('$productName','$catId','$brandId','$body','$price','$uploaded_image','$type')";

    $query = "update 
    				tbl_product
    			set 
    			productName = '$productName',
    			catId = '$catId',
    			brandId = '$brandId',
    			body = '$body',
    			price = '$price',
    			image = '$uploaded_image',
    			type = '$type'
    			where productId = '$id'



    ";

   $Productupdate = $this->db->update($query);
    if ($Productupdate) {
     $msg = "<span class='success'>Pruduct Item Successfully Updated!!</span>";
		return $msg;
    }else {
     $msg = "<span class='error'>Pruduct Item Couldn't Updated!!</span>";
		return $msg;
    }
}
    }
    else 
    {
    	  move_uploaded_file($file_temp, $uploaded_image);
    $query = "INSERT INTO tbl_product (productName,catId,brandId,body,price,image,type)
    VALUES ('$productName','$catId','$brandId','$body','$price','$uploaded_image','$type')";

    $query = "update 
    				tbl_product
    			set 
    			productName = '$productName',
    			catId = '$catId',
    			brandId = '$brandId',
    			body = '$body',
    			price = '$price',
    			type = '$type'
    			where productId = '$id'



    ";

   $Productupdate = $this->db->update($query);
    if ($Productupdate) {
     $msg = "<span class='success'>Pruduct Item Successfully Updated!!</span>";
		return $msg;
    }else {
     $msg = "<span class='error'>Pruduct Item Couldn't Updated!!</span>";
		return $msg;
    }
    }
}



}


 public function delProbyId($id)
{   $queryimg = "select * from tbl_product where productId = '$id' " ;
   $getdata = $this->db->select($queryimg);
    if ($getdata) {
       while($result=$getdata->fetch_assoc())
       {   $delink = $result['image'];
             unlink($delink);
       }
    }



    $query = "delete from tbl_product where productId = '$id' ";
    $delpro = $this->db->delete($query);
    if ($delpro) {
        $msg = "<span class='success'>Pruduct Item Successfully Deleted!!</span>";
        return $msg;
    }
    else
    {
        $msg = "<span class='success'>Pruduct Item Not Deleted!!</span>";
        return $msg;
    }
}

public function getFeatureProduct()
{
   $query = "select * from tbl_product where type = '0' order by productId desc  limit 4"; 
    $fproduct = $this->db->select($query);

    return $fproduct;

}
public function getNEWProduct()
{
    $query = "select * from tbl_product  order by rand()  limit 4"; 
    $Nproduct = $this->db->select($query);

    return $Nproduct;
}
public function getSingleProduct($id)
{
    $query = "select tbl_product.*,tbl_category.catName,tbl_brand.brandName from tbl_product 
 inner join tbl_category
 using (catId)
  inner join tbl_brand
 using (brandId) where productId = '$id' ";
$result = $this->db->select($query);
return $result;

}
public function getProductBycat($id){
  $query = "select * from  tbl_product where catId = '$id'";
 $result = $this->db->select($query);
return $result;
}
public function InsertCompareProduct($cmrId,$cmprId)
    {
 $cmrId    = $this->fm->validation($cmrId);
  $productId    = $this->fm->validation($cmprId);

$cmrId = mysqli_real_escape_string($this->db->link,$cmrId);
$productId = mysqli_real_escape_string($this->db->link,$cmprId);
$Cquery = "select * from tbl_compare where productId = '$productId'and cmrId = '$cmrId'";
    $check = $this->db->select($Cquery);
    if ($check) {
       $msg = "<span class='error'>Already Added to Compare</span>";
        return $msg;
    }

    $query = "select * from tbl_product where productId = '$productId'";
    $result = $this->db->select($query)->fetch_assoc();
    if ($result) {
     
            
            $productId = $result['productId'];
            $productName = $result['productName'];
            $price = $result['price'] ;
            $image = $result['image'];
            $insertQ = "insert into 
    tbl_compare (cmrId,productId,productName,price,image) values ('$cmrId','$productId','$productName','$price','$image')";
    $succesInsert = $this->db->insert($insertQ);
    if ($succesInsert) {
        $msg = "<span class='success'>Add To Compare!!</span>";
        return $msg;
    }
    else
    {
        $msg = "<span class='error'>Can't Add</span>";
        return $msg;
    }
        
    }

        }
   
  public function getprofromCompare($cmrId)
        {
      $query = "select * from tbl_compare where cmrId = '$cmrId' order by id desc";
    $result = $this->db->select($query);
    return $result;
           
        }   
        public function delCustomercomp($cmrId )
          {
    $querycomp = "delete from  tbl_compare where cmrId = '$cmrId' " ;
   $getdata = $this->db->delete($querycomp);

          }  


          public function InsertWlistProduct($id,$cmrId)
     {  $Cquery = "select * from tbl_wlist where productId = '$id'and cmrId = '$cmrId'";
    $check = $this->db->select($Cquery);
    if ($check) {
       $msg = "<span class='error'>Already Added to WishList</span>";
        return $msg;
    }



            $query = "select * from tbl_product where productId = '$id'";
    $result = $this->db->select($query)->fetch_assoc();
    if ($result) {
     
            
            $productId = $result['productId'];
            $productName = $result['productName'];
            $price = $result['price'] ;
            $image = $result['image'];
            $insertQ = "insert into 
    tbl_wlist (cmrId,productId,productName,price,image) values ('$cmrId','$id','$productName','$price','$image')";
    $succesInsert = $this->db->insert($insertQ);
    if ($succesInsert) {
        $msg = "<span class='success'>Save  To Your  Wish List!!</span>";
        return $msg;
    }
    else
    {
        $msg = "<span class='error'>Can't Save  To Your  Wish List!!</span>";
        return $msg;
    }
        
              
          }
      }



public function CheckWlist($cmrId)

{
   $query = "select * from tbl_wlist where cmrId = '$cmrId'";
   $result = $this->db->select($query);
   return $result;

}
public function DelWlistData($proid,$cmrId)
{
    $query = "delete from tbl_wlist where productId = '$proid' and cmrId = '$cmrId'";
    $result = $this->db->delete($query);
    if ($result) {
        $msg = "<span class='success'>Deleted Product From Your  Wish List!!</span>";
        return $msg;
    }
    else
    {
        $msg = "<span class='error'>Not Deleted!!</span>";
        return $msg;
    }
        

}

}

?>




