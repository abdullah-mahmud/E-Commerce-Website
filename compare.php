<?php include 'inc/header.php';?>
<?php 
	$login = Session::get("custLogin");
	if ($login!=true) {
		header("Location:index.php");
	}

;?>
<style >
	
table.tblone img {
  height: 140px;
  width: 180px;
}	
</style>

 <div class="main">
    <div class="content">
    	<div class="cartoption">		
			<div class="cartpage">
			    	<h2>Compare Product</h2>
			    	
						<table class="tblone">
							<tr>
							<th >No.</th>
								<th >Product Name</th>
								<th>Price</th>
								<th >Image</th>
								<th >Action</th>
								
								
							</tr>
							<?php 
						 $cmrId = Session::get("cmrID");
							$getpro = $pd->getprofromCompare($cmrId);
							if ($getpro) {
								$i = 0;
							
								while ($result = $getpro->fetch_assoc()) {
									$i++;
							

							?>
							<tr>
	<td><?php echo $i;?></td>

			<td><?php echo $result['productName'];?></td>
				<td><?php echo $result['price'];?></td>
		<td><img src="admin/<?php echo $result['image'];?>" alt="pic"/></td>
		
<td><a href="details.php?proid=<?php echo $result['productId']; ?>">View</a></td>
								<?php 	} } ?>
							</tr>


						</table>
						
					</div>
					<div class="shopping" style="width:100px;text-align:center;">
						<div class="shopleft">
							<a href="index.php"> <img src="images/shop.png" alt="" /></a>
						</div>
					
					</div>
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>
<?php include 'inc/footer.php';?>