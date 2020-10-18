<?php include 'inc/header.php';?>
<style >
	.buttON{width: 100px;float: left;margin-right: 40px;}
</style>
<?php
$brand = new Brand();
if(isset($_GET['proid']))
{
     
 $id = $_GET['proid'];
}

if ($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['submit'])) {
          
          $quantity =   $_POST['quantity'];
          if ($quantity<=0) {
          	$msg = "<span class='error'>Qunatity Invalid !!</span>";
          }
          else
          {
          $addCart = $ct->addToCart($quantity,$id);
      }
         
}



?>
<?php
    $cmrId = Session::get("cmrID");
    if ($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['wlist'])) {
    
         $insertWlistPd = $pd->InsertWlistProduct($id,$cmrId);
                         
    }
?>
<?php
    $cmrId = Session::get("cmrID");
    if ($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['compare'])) {
    	$cmprId =   $_POST['productId'];
         $insertcmprPd = $pd->InsertCompareProduct($cmrId,$cmprId);
                         
    }
?>

 <div class="main">
    <div class="content">
  
    	<div class="section group">
				<div class="cont-desc span_1_of_2">
				<?php
				$getPd = $pd->getSingleProduct($id);
				if ($getPd) {
					while ($result = $getPd->fetch_assoc()) {
			
			
				?>				
					<div class="grid images_3_of_2">
						<img src="admin/<?php echo $result['image'];?>" alt="pic"/>
					</div>
				<div class="desc span_3_of_2">
					<h2><?php echo $result['productName'];?> </h2>
									
					<div class="price">
						<p>Price: <span><?php echo $result['price']." Tk"?></span></p>
						<p>Category: <span><?php echo $result['catName'];?></span></p>
						<p>Brand:<span><?php echo $result['brandName'];?></span></p>
					</div>
				<div class="add-cart">
					<form action="" method="post">
						<input type="number" class="buyfield" name="quantity" value="1"/>
						<input type="submit" class="buysubmit" name="submit" value="Buy Now"/>
					</form>				
				</div>
				<span style="color:red;font-size:18px;">  <?php 

if (isset($addCart)) {
	echo $addCart;
}
if (isset($msg)) {
	echo $msg;
}
    ?> </span>

    <?php 
    	if (isset($insertcmprPd)) {
    		echo $insertcmprPd;
    	}
    	if (isset($insertWlistPd)) {
    		echo $insertWlistPd;
    	}

    ?>
    <?php 
	$login = Session::get("custLogin");
	if ($login==true) { ?>
  <div class="add-cart">
  <div class="buttON">
					<form action="" method="post">
						<input type="hidden" class="buyfield" name="productId" value="<?php echo $result['productId']?>"/>
						<input type="submit" class="buysubmit" name="compare" value="Add to Compare"/>
						</div>
						
					</form>
					<div class="buttON">
						<form action="" method="post">
					
						<input type="submit" class="buysubmit" name="wlist" value="Save WishList"/>
						
					</form>	
					</div>				
				</div>
				<?php } ?>
			</div>
			<div class="product-desc">
			<h2>Product Details</h2>
			<p><?php echo $result['body'];?></p>
	    
	    </div>

		<?php 	} } ?>
		
	</div>
				<div class="rightsidebar span_3_of_1">
					<h2>CATEGORIES</h2>
					<?php 
							$getcat = $cat->getAllfromCat();
							if ($getcat) {
								while ($rresult=$getcat->fetch_assoc()) {
								
							


					?>
					<ul>
				      <li><a href="productbycat.php?catId=<?php echo  $rresult['catId']?>"><?php echo $rresult['catName'];?></a></li>
				      
    				</ul>
    				<?php	} } ?>
    	
 				</div>
 		</div>
 	</div>
	</div>
<?php include 'inc/footer.php';?>