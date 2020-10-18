	<?php 
if (isset($_GET['proid'])) {
	$id = $_GET['proid'];
	$addCart = $ct->addToCart(1,$id);

}

	?>


	<div class="header_bottom">
		<div class="header_bottom_left">
			<div class="section group">
			<?php 

$query = "select * from tbl_product order by rand() limit 4";
$getpro = $db->select($query);

if ($getpro) {
  while ($result = $getpro->fetch_assoc()) {
  	 


				?>
				<div class="listview_1_of_2 images_1_of_2">

				
					<div class="listimg listimg_2_of_1">
						<a href="details.php?proid=<?php echo $result['productId']; ?>"><img src="admin/<?php echo $result['image'];?>" alt="pic" /></a>
					</div>
				    <div class="text list_2_of_1">
						<h2><?php echo $result['productName']?></h2>
						 <p><?php echo $fm->shortentext($result['body'],30);?></p>
						<div class="button"><span><a value="<?php echo $result['productId']?>" name="addcart" href="?proid=<?php echo $result['productId']; ?>">Add to cart</a></span></div>
				   </div>
				   
			   </div>
			   <?php  } } ?>			
				
			</div>
	
		  <div class="clear"></div>
		</div>
			 <div class="header_bottom_right_images">
		   <!-- FlexSlider -->
             
			<section class="slider">
				  <div class="flexslider">
					<ul class="slides">
						<li><img src="images/1.jpg" alt=""/></li>
						<li><img src="images/2.jpg" alt=""/></li>
						<li><img src="images/3.jpg" alt=""/></li>
						<li><img src="images/4.jpg" alt=""/></li>
				    </ul>
				  </div>
	      </section>
<!-- FlexSlider -->
	    </div>
	  <div class="clear"></div>
  </div>	
