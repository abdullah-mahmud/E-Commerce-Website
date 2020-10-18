<?php include 'inc/header.php';?>

<?php 

if (isset($_GET['delwlist'])) {
	       $proid = $_GET['delwlist'];
	       $delWlist = $pd->DelWlistData($proid,$cmrId);

}

?>
 <div class="main">
    <div class="content">
    	<div class="cartoption">		
			<div class="cartpage">
			    	<h2>Your Wish List</h2>
			    	<?php 
if (isset($delWlist)) {
	echo $delWlist;
}
			    	?>
			    	
						<table class="tblone">
							<tr>
							<th >No.</th>
								<th >Product Name</th>
								<th>Price</th>
								<th >Image</th>
								<th >Action</th>
								
								
							</tr>
							<?php 
					
							$getpro = $pd->CheckWlist($cmrId);
							if ($getpro) {
								$i = 0;
							
								while ($result = $getpro->fetch_assoc()) {
									$i++;
							

							?>
							<tr>
	<td><?php echo $i;?></td>

			<td><?php echo $result['productName'];?></td>
				<td><?php echo $result['price']." Tk";?></td>
		<td><img src="admin/<?php echo $result['image'];?>" alt="pic"/></td>
		
<td><a href="details.php?proid=<?php echo $result['productId']; ?>">Buy Now</a> || 
								
	<a href="?delwlist=<?php echo $result['productId']; ?>"> X</a></td>
								<?php 	} }else 
								{
									header("Location:index.php");
									} ?>
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