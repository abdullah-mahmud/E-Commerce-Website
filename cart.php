<?php include 'inc/header.php';?>
<?php 
if(isset($_GET['delcart']))
          {      $id = $_GET['delcart']; 
                $delcart = $ct->delCartbyId($id);
             }

?>
<?php 
if ($_SERVER['REQUEST_METHOD']=='POST') {
          
          $quantity =   $_POST['quantity'];
          $cartId =   $_POST['cartId'];
          if ($quantity<=0) {
          	$msg = "<span class='error'>Qunatity Invalid !!</span>";
          }
          else
          {
          $updateCart = $ct->UpdateCartQuantity($quantity,$cartId);
      }
         
}


?>
<?php
if (!isset($_GET['id'])) {
	echo "<meta http-equiv='refresh' content = '0,URL=?id=live'/>";
}


?>

<style >
.color{color: green;}	
#red{color: red;}
</style>
 <div class="main">
    <div class="content">
    	<div class="cartoption">		
			<div class="cartpage">
			    	<h2>Your Cart</h2>
			    	<?php 
if (isset($updateCart)) {
   echo $updateCart;
}
if (isset($delcart)) {
	echo $delcart;
}
if (isset($msg)) {
	echo $msg;
}

			    	?>
						<table class="tblone">
							<tr>
							<th width="5%">No.</th>
								<th width="30%">Product Name</th>
								<th width="10%">Image</th>
								<th width="15%">Price</th>
								<th width="20%">Quantity</th>
								<th width="10%">Total Price</th>
								<th width="10%">Action</th>
							</tr>
							<?php 

							$getcart = $ct->getCartitem();
							if ($getcart) {
								$i = 0;
								$sum = 0;
								$qty = 0;
								while ($result = $getcart->fetch_assoc()) {
									$i++;
							

							?>
							<tr>
							<td><?php echo $i;?></td>
								<td><?php echo $result['productName'];?></td>
								<td><img src="admin/<?php echo $result['image'];?>" alt="pic"/></td>
								<td><?php echo "Tk.";echo $result['price'];?></td>
								<td>
									<form action="" method="post">

<input type="hidden" name="cartId" value="<?php echo $result['cartId'];?>"/>

										<input type="number" name="quantity" value="<?php echo $result['quantity'];?>"/>
										<input type="submit" name="submit" value="Update"/>
									</form>
								</td>
								<td>
								<?php 
									$totalPrice = $result['price']*$result['quantity'];
									echo $totalPrice;

								?>

								</td>
								<td><a onclick = "return confirm ('Are you sure delete?');" href="?delcart=<?php echo $result['cartId'] ?>">X</a></td>
										<?php 
											$sum = $sum+$totalPrice;
											$qty = $qty+$result['quantity'];
											session::set("sum",$sum);
											session::set("qty",$qty);

										?>

								<?php 	} } ?>
							</tr>


						</table>
						<br/>
						<?php 
						$getCart = $ct->cartCheck();
									if($getCart)
									{


						?>
						<table  style="float:right;text-align:left;" width="40%">
							<tr >
								<th >Sub Total : </th>
								<td  class="color"><?php echo $sum." Tk";?></td>
							</tr>
							<tr >
								<th>VAT : </th>
								<td id="red">7%</td>
							</tr>
							<tr >
								<th>Grand Total :</th>
								<td  class="color"><?php  $vat = $sum*0.07;
								       $sum = $sum + $vat;
								       echo $sum." Tk";

								?> </td>
							</tr>
					   </table>
					   <?php } else {
                            header("Location:index.php");
					   	//echo "<span class='error'>Please Buy Shop Now!!</span>";
					   	} ?>
					</div>
					<div class="shopping">
						<div class="shopleft">
							<a href="index.php"> <img src="images/shop.png" alt="" /></a>
						</div>
						<div class="shopright">
							<a href="payment.php"> <img src="images/check.png" alt="" /></a>
						</div>
					</div>
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>
<?php include 'inc/footer.php';?>