﻿<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/Product.php';?>
<?php include '../classes/Brand.php';?>
<?php include '../classes/Category.php';?>

<?php
$pd = new Product();

if ($_SERVER['REQUEST_METHOD']=='POST') {
          

            $insertPd = $pd->PdInsert($_POST,$_FILES);
         
}



?>


<div class="grid_10">
    <div class="box round first grid">
        <h2>Add New Product</h2>
        <div class="block"> 
        <?php 
if (isset($insertPd)) {
    echo $insertPd;
}

        ?>              
         <form action="" method="post" enctype="multipart/form-data">
            <table class="form">
               
                <tr>
                    <td>
                        <label>Product Name</label>
                    </td>
                    <td>
                        <input type="text" name="productName" placeholder="Enter Product Name..." class="medium" />
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Category</label>
                    </td>
                    <td>
                        <select id="select" name="catId">
                            <option>Select Category</option>
                            <?php 
                            $cat = new Category();
                            $getcat = $cat->getallCat();
                        if($getcat)
                        {   
                            while ($result = $getcat->fetch_assoc()) {
           ?>
                            <option value="<?php echo $result['catId'];?>"><?php echo $result['catName'];?></option>
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
                            <option>Select Brand</option>
                        <?php 
                        $brand = new Brand();
                            $getbrand = $brand->getallbrand();
                        if($getbrand)
                        {  
                            while ($result = $getbrand->fetch_assoc()) {
                               
                        

                    ?>
                            <option value="<?php echo $result['brandId']?>"><?php echo $result['brandName']?></option>

                            <?php } } ?>
                            
               
                        </select>
                    </td>
                </tr>
				
				 <tr>
                    <td style="vertical-align: top; padding-top: 9px;">
                        <label>Description</label>
                    </td>
                    <td>
                        <textarea class="tinymce" name="body"></textarea>
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Price</label>
                    </td>
                    <td>
                        <input name="price" type="text" placeholder="Enter Price..." class="medium" />
                    </td>
                </tr>
            
                <tr>
                    <td>
                        <label>Upload Image</label>
                    </td>
                    <td>
                        <input type="file" name="image" />
                    </td>
                </tr>
				
				<tr>
                    <td>
                        <label>Product Type</label>
                    </td>
                    <td>
                        <select id="select" name="type">
                            <option>Select Type</option>
                            <option value="0">Featured</option>
                            <option value="1">General</option>
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


