<?php include 'inc/header.php';?>
<?php 
	$login = Session::get("custLogin");
	if ($login==false) {
		header("Location:login.php");
	}

?>
<?php 
if(isset($_GET['delorder']))
          {      $id = $_GET['delorder']; 
                $confirm = $ct->delOrderbyId($id);
             } ?>
             <?php
             if (isset($_GET['updateCon'])) {

             	$upid = $_GET['updateCon'];
             	$update = $ct->UpdateORderbyId($upid);
             } ?>




 <div class="main">
    <div class="content">
    	
	      <div class="section group">
	      
	     <div class="order">
	     	<h2>Order Details</h2>
	     	<table class="tblone">
							<tr>
			<th >No.</th>
				<th >Product Name</th>
				<th>Image</th>
				<th>Quantity</th>
				<th>Total Price</th>
				<th>Date</th>
				<th>Status</th>
				<th>Action</th>
			</tr>
					<?php 
					  $cmrID = session::get("cmrID");
							$getpro = $ct->getProfromOrder($cmrID);
							if ($getpro) {
								$i = 0;
								
								while ($result = $getpro->fetch_assoc()) {
									$i++;
							

							?>
							<tr>
							<td><?php echo $i;?></td>
								<td><?php echo $result['productName'];?></td>
								<td><img src="admin/<?php echo $result['image'];?>" alt="pic"/></td>
								<td><?php echo $result['quantity'];?></td>
								<td><?php echo "Tk.";echo $result['price'];?></td>
							<td><?php echo $fm->formatDate($result['date']);?></td>
							<td><?php
									if ($result['status']==0) {
										echo
								 "<span class='error'>Pending..</span>";
									}
									elseif ($result['status']==1) { ?>
										<a onclick = "return confirm ('Are you Sure to Get your Product?');" href="?updateCon=<?php echo $result['id'] ?>">Got it</a>
									
								<?php	} else
									{ 
 									
										echo "<span class='success' >Thank You</span>";
									 } ?>
							 </td>
							
				<?php 

if ($result['status']==2) { ?>
	<td><a onclick = "return confirm ('Are you sure delete?');" href="?delorder=<?php echo $result['id'] ?>">X</a></td>
									
								


										<?php }
									else {  ?>
									
										<td>Not Permitted</td>
								<?php 	}
				?>
										
											

										

								<?php 	} }else {header("Location:index.php");} ?>
							</tr>


						</table>

	     </div>
    		
    </div>
 </div>
 </div>
<?php include 'inc/footer.php';?>