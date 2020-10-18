<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/Product.php';?>
<?php include '../classes/Brand.php';?>
<?php include '../classes/Category.php';?>
<?php
$pd = new Product();
if(!isset($_GET['proid'])|| $_GET['proid']==NULL)
{
     echo "<script> window.location ='productlist.php' ;</script>";

}
else
{ $id = $_GET['proid'];

if ($_SERVER['REQUEST_METHOD']=='POST') {
          

            $updateproduct = $pd->productUpdatebyId($_POST,$_FILES,$id);
         
}

}

?>

<div class="grid_10">
    <div class="box round first grid">
        <h2>Add New Product</h2>
        <div class="block"> 
        <?php 
if (isset($updateproduct)) {
    echo $updateproduct;
}

        ?>   
<?php 
$getpd = $pd->getProductbyId($id);
                        if($getpd)
                        {   
                            while ($value = $getpd->fetch_assoc()) {
                              
                        

                    ?>


         <form action="" method="post" enctype="multipart/form-data">
            <table class="form">
               
                <tr>
                    <td>
                        <label>Product Name</label>
                    </td>
                    <td>
                        <input  type="text" name="productName" class="medium" value="<?php 
                        echo $value['productName'];?>" />
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Category</label>
                    </td>
                    <td>
                        <select  id="select" name="catId">
                        
                            <?php 
                            $cat = new Category();
                            $getcat = $cat->getallCat();
                        if($getcat)
                        {   
                            while ($result = $getcat->fetch_assoc()) {
           ?>
                            <option 
                            <?php 
                            if ($value['catId']==$result['catId']) {  ?>
                               selected = "selected"
                           <?php } ?>

                            value="<?php echo $result['catId'];?>"><?php echo $result['catName'];?></option>
                           <?php } } ?>
                        </select>
                       
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Brand Name</label>
                    </td>
                    <td>
                        <select id="select" name="brandId">
                          
                        <?php 
                        $brand = new Brand();
                            $getbrand = $brand->getallbrand();
                        if($getbrand)
                        {  
                            while ($result = $getbrand->fetch_assoc()) {
                               
                        

                    ?>
                            <option 
                            <?php 
                            if ($value['brandId']==$result['brandId']) {  ?>
                               selected = "selected"
                           <?php } ?>

                            value="<?php echo $result['brandId'];?>"><?php echo $result['brandName'];?></option>

                            <?php } } ?>
                            
               
                        </select>
                    </td>
                </tr>
				
				 <tr>
                    <td style="vertical-align: top; padding-top: 9px;">
                        <label>Description</label>
                    </td>
                    <td>
                        <textarea class="tinymce"  name="body">
                            <?php echo $value['body'];?>
                        </textarea>
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Price</label>
                    </td>
                    <td>
                        <input name="price" type="text" value="<?php echo $value['price'];?>" />
                    </td>
                </tr>
            
                <tr>
                    <td>
                        <label>Upload Image</label>
                    </td>
                    <td>
                    <img <img height="80px" width="100px" 
                    src="<?php echo $value['image']; ?> "/>
                    <br/>
                        <input type="file" name="image" />
                    </td>
                </tr>
				
				<tr>
                    <td>
                        <label>Product Type</label>
                    </td>
                    <td>
                        <select id="select" name="type">
                           
                            <?php 
                            if ($value['type']==0) { ?>
                             <option selected="selected" value="0">Featured</option>
                            <option value="1">General</option>
                           <?php } else { ?>
                            <option value="0">Featured</option>
                            <option selected="selected" value="1">General</option>
                            <?php } ?>
                        </select>
                    </td>
                </tr>

				<tr>
                    <td></td>
                    <td>
                        <input type="submit" name="submit" Value="Save" />
                    </td>
                </tr>
            </table>
            </form>
            <?php } } ?>
        </div>
    </div>
</div>
<!-- Load TinyMCE -->
<script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function () {
        setupTinyMCE();
        setDatePicker('date-picker');
        $('input[type="checkbox"]').fancybutton();
        $('input[type="radio"]').fancybutton();
    });
</script>
<!-- Load TinyMCE -->
<?php include 'inc/footer.php';?>


