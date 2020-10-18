<?php include 'inc/header.php';?>
<?php 
	$login = Session::get("custLogin");
	if ($login==false) {
		header("Location:login.php");
	}
?>
<?php





?>
<style>
.Psuccess{ width: 500px; min-height: 200px; text-align: center; border: 1px solid #ddd; margin: 0 auto;padding:50px; }
.Psuccess h2 {
  border-bottom: 1px solid;
  margin-bottom: 80px;
  padding-bottom: 10px;
}
.Psuccess a {

}

</style>

 <div class="main">
    <div class="content">
    	<div class="section group">
    	<div class="Psuccess">
    		<h2> Payment Successfully </h2>
        <?php 
      $cmrID = session::get("cmrID");
$getprice = $ct->GetPricefromorder($cmrID);
if ($getprice) {
  $sum = 0;
  while ($result = $getprice->fetch_assoc()) {
    $price = $result['price'];
    $sum = $sum+$price;
  }
}
else 
{
  $sum = 0;
}

      ?>
 
    	<p>Thanks for purchase! Your total Amount is :Tk. 
      <?php
       $vat = $sum*0.07; 
       $sum = $sum+$vat;
       echo $sum;
       ?>
         
       </p>
      <p>For Visit Your Order List <a href="order.php">Click Here</a></p>



    	</div>

    		
		</div>		
 	</div>
	</div>
<?php include 'inc/footer.php';?>