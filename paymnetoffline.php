<?php include 'inc/header.php';?>
<?php 
	$login = Session::get("custLogin");
	if ($login==false) {
		header("Location:login.php");
	}

;?>
<?php 
if (isset($_GET['orderid']) && $_GET['orderid']=='order') {
 
$cmrID = session::get("cmrID");
$insertorder = $ct->orderProduct($cmrID);
$delData = $ct->delCustomerCart();
header("Location:success.php");
}

?>
<style>
.tblone{width: 500px;margin: 0 auto; border: 2px solid #ddd;}
.tblone tr td{text-align: justify;}
.division{width: 50%; float: left;}
.tbltwo{
  float: right;
  text-align: left;
  width: 60%;
  margin-right: 14px;
  margin-top: 12px;
  border: 2px solid #ddd;
}
.ordernow{padding-bottom: 30px;}
.ordernow a img{width:200px;margin: 20px auto 0;padding: 5px;display: block; }
.tbltwo tr td{text-align: justify; padding: 5px 10px;}
</style>

 <div class="main">
    <div class="content">
    	<div class="section group">
    
<div class="division">
              <table class="tblone">
              <tr>
              <th >No.</th>
                <th>Product</th>
          
                <th >Price</th>
                <th>Quantity</th>
                <th>Total</th>
                
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
                <td><?php echo "Tk.";echo $result['price'];?></td>
                <td><?php echo $result['quantity'];?></td>

                <td>
                <?php 
                  $totalPrice = $result['price']*$result['quantity'];
                  echo $totalPrice;

                ?>

                </td>

                    <?php 
                      $sum = $sum+$totalPrice;
                      $qty = $qty+$result['quantity'];


                    ?>

                <?php   } } ?>
              </tr>


            </table>
              <table  class="tbltwo" style="float:right;text-align:left;" width="40%">
              <tr >
                <td >Sub Total : </td>
                <td  class="color"><?php echo $sum." Tk";?></td>
              </tr>
              <tr >
                <td>VAT : </td>
                <td id="red">7% (<?php echo $sum*0.07;?>)</td>
              </tr>
               <tr >
                <td>Quantity : </td>
                <td ><?php echo $qty;?></td>
              </tr>
              <tr >
                <td>Grand Total :</td>
                <td  class="color"><?php  $vat = $sum*0.07;
                       $sum = $sum + $vat;
                       echo $sum." Tk";

                ?> </td>
              </tr>
             </table>

</div>
<div class="division">
          <?php 
          $id = Session::get("cmrID");
          $getdata = $cmr->getCustomerData($id);
          if ($getdata) {
            while ($result = $getdata->fetch_assoc()) {
    
        ?>
        <table class="tblone">
          <tr>
            <td colspan="3"><h2>Your Profile Details</h2></td>
            
          </tr>
          <tr>
            <td width="20%">Name</td>
            <td width="5%">:</td>
            <td><?php echo $result['name']; ?> </td>
          </tr>
          <tr>
            <td>Email</td>
            <td>:</td>
            <td><?php echo $result['email']; ?></td>
          </tr>
          <tr>
            <td>Address</td>
            <td>:</td>
            <td><?php echo $result['address']; ?></td>
          </tr>
          <tr>
            <td>City</td>
            <td>:</td>
            <td><?php echo $result['city']; ?></td>
          </tr>
          <tr>
            <td>Country</td>
            <td>:</td>
            <td><?php echo $result['country']; ?></td>
          </tr>
          <tr>
            <td>Zip</td>
            <td>:</td>
            <td><?php echo $result['zip']; ?></td>
          </tr>
          <tr>
            <td>Phone</td>
            <td>:</td>
            <td><?php echo $result['phone']; ?></td>
          </tr>
          <tr>
            <td></td>
            <td></td>
            <td><a href="editprofile.php">Update Details</a></td>
          </tr>
        </table>
        <?php } } ?>



</div>
    		
		</div>		
 	</div>
  <div class="ordernow">
    <a href="?orderid=order"><img src="images/ordernow.png" alt="" /></a>
  </div>
	</div>
<?php include 'inc/footer.php';?>