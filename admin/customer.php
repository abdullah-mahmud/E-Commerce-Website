<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/Customer.php';?>
<?php
$cmr = new Customer();
if(!isset($_GET['custId'])|| $_GET['custId']==NULL)
{
     echo "<script> window.location ='order.php' ;</script>";

}
else
{ $id = $_GET['custId'];

if ($_SERVER['REQUEST_METHOD']=='POST') {
echo "<script> window.location ='order.php' ;</script>";
         
}

}

?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Customer Details</h2>


            
               <div class="block copyblock"> 
              
<?php 
$getcust = $cmr->getCustomerData($id);
                        if($getcust)
                        {   
                            while ($result = $getcust->fetch_assoc()) {
                              
                        

                    ?>


                 <form action="" method="post" >
                    <table class="form">					
                        <tr>
                        <td>Name:</td>
                            <td>
                                <input readonly="readonly" type="text" class="medium" value = "<?php echo $result['name'];?>"  />
                            </td>
                        </tr>
                          <tr>
                        <td>Address:</td>
                            <td>
                                <input readonly="readonly" type="text" class="medium" value = "<?php echo $result['address'];?>"  />
                            </td>
                        </tr>
                        <tr>
                        <td>City:</td>
                            <td>
                                <input readonly="readonly" type="text" class="medium" value = "<?php echo $result['city'];?>"  />
                            </td>
                        </tr>
                        <tr>
                        <td>Country:</td>
                            <td>
                                <input readonly="readonly" type="text" class="medium" value = "<?php echo $result['country'];?>"  />
                            </td>
                        </tr>
                        <tr>
                        <td>Zip:</td>
                            <td>
                                <input readonly="readonly" type="text" class="medium" value = "<?php echo $result['zip'];?>"  />
                            </td>
                        </tr>
                      
                        <tr>
                        <td>Phone:</td>
                            <td>
                                <input readonly="readonly" type="text" class="medium" value = "<?php echo $result['phone'];?>"  />
                            </td>
                        </tr>
                        <tr>
                        <td>Email:</td>
                            <td>
                                <input readonly="readonly" type="text" class="medium" value = "<?php echo $result['email'];?>"  />
                            </td>
                        </tr>
                      
						<tr> 
                            <td>
                                <input type="submit" name="submit" Value="Okay" />
                            </td>
                        </tr>
                    </table>
                    </form>
                      <?php } } ?>
                </div>
            </div>
        </div>
<?php include 'inc/footer.php';?>