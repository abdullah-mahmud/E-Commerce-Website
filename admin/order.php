<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php 
$filepath = realpath(dirname(__FILE__));

include_once ($filepath.'/../classes/Cart.php');
include_once ($filepath.'/../helpers/Format.php');

?>
<style>
	#remove a {color:red;}
	#shift a {color:green;}

</style>
<?php 
$ct = new Cart();
$fm = new Format(); 

if (isset($_GET['shifId'])) {
	$id = $_GET['shifId'];
	$time = $_GET['time'];
	$price = $_GET['price'];
	$shift = $ct->getProShifted($id,$time,$price);
}

?>
<?php if(isset($_GET['delorder']))
          {      $id = $_GET['delorder']; 
                $confirm = $ct->delOrderbyId($id);
             } ?>

        <div class="grid_10">
            <div class="box round first grid">
                <h2>Order Details</h2>
                <?php
if (isset($shift)) {
	echo $shift;
}

                ?>
                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Order No.</th>
							<th>Product Id</th>
							
							<th>Product Name</th>
							<th>Customer Id</th>
							<th> Qunatity</th>
							<th>Price</th>
							<th>Order Date</th>
							<th>Address</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
					<?php 
						
						$getPro = $ct->getAllOrderList();
						if ($getPro) {
							$i = 0;
							while ($result = $getPro->fetch_assoc()) {
								$i++;
					
	

					?>
						<tr class="odd gradeX">
	<td> <?php echo $i;?> </td>
	<td><?php echo $result['productId'];?></td>
	
	<td><?php echo $result['productName'];?></td>
	<td><?php echo $result['cmrId'];?></td>
	<td><?php echo $result['quantity'];?></td>
	<td><?php echo $result['price']." Tk";?></td>
	<td><?php echo $fm->formatDate($result['date']);?></td>
	<td><a href="customer.php?custId=<?php echo $result['cmrId'];?>">View Details</a></td>
							<?php 
if ($result['status']==0) { ?>
								<td id="shift"><a href="?shifId=<?php echo $result ['cmrId'] ?>&price=<?php echo $result['price']?>&time=<?php echo $result['date']?>">Shifting</a></td>	
								<?php } elseif($result['status']==1) { ?>
<td>Pending..</td>

								 <?php } else { ?><td id="remove"><a href="?delorder=<?php echo $result['id'] ?>">Remove</a></td>   <?php  } ?>

							
							
						</tr>
							<?php	} } ?>
					</tbody>
				</table>
               </div>
            </div>
        </div>
<script type="text/javascript">
    $(document).ready(function () {
        setupLeftMenu();

        $('.datatable').dataTable();
        setSidebarHeight();
    });
</script>
<?php include 'inc/footer.php';?>
