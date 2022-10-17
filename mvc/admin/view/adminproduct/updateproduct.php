<?php 
    $cats=$data['cats'];
    $brands=$data['brands'];
    $oldproduct=$data['oldproduct'];
?>

<div class="col-md-9">
<h2>UPDATE PRODUCT</h2>

<div class="row btn-success">
<?php 
    if(isset($_SESSION['msg']))
    {
    echo $_SESSION['msg'];
    unset($_SESSION['msg']);
    }
?>
</div>

<div class="row">
    <form method=post action='' enctype='multipart/form-data'>
    <table>
        <tr>
        <tr>
            <td class="col-md-3"><label>Product Name</label></td>
            <td><input type=text name=inputProductName required value='<?php echo $oldproduct['productName']?>'></td>
        </tr>

        <tr>
            <td class="col-md-3"><label>Alias</label></td>
            <td><input type=text name='inputAlias' required value='<?php echo $oldproduct['alias']?>'></td>
        </tr>

        <tr>
            <td class="col-md-3"><label>Category Name</label></td>
            <td>
                <select name=inputCatId>
                    <?php foreach($cats as $cat) {?>
                    <option value="<?php echo $cat['catId'] ?>" <?php if($oldproduct['catId']==$cat['catId']) echo "selected" ?> >
                        <?php echo $cat['catName'] ?>
                    </option>
                    <?php }?>
                </select>
            </td>
        </tr>

        <tr>
            <td class="col-md-3"><label>Brand Name</label></td>
            <td>
                <select name=inputBrandId>
                <?php foreach($brands as $brand) {?>
                    <option value="<?php echo $brand['brandId'] ?>"  <?php if($oldproduct['brandId']==$brand['brandId']) echo "selected" ?>>
                    <?php echo $brand['brandName'] ?>
                    </option>
                    <?php }?>
                </select>
            </td>
        </tr>

        <tr>
            <td class="col-md-3"><label>Chi tiết SP</label></td>
            <td><textarea name=inputDetail required cols=50 rows=20><?php echo $oldproduct['detail'] ?></textarea></td>
        </tr>

        <tr>
            <td class="col-md-3"><label>Price</label></td>
            <td><input type='number'  name=inputPrice max=8000 min=1 step='0.01' value='<?php echo $oldproduct['price']?>'></td>
        </tr>

        <tr>
            <td class="col-md-3"><label>Sale Price</label></td>
            <td><input type='number'  name=inputSalePrice max=7000 min=1 step='0.01' value='<?php echo $oldproduct['saleprice']?>'></td>
        </tr>

        <tr>
            <td><label for="inputFileUpload"> Image </label></td>
            <td><input type="file" name= "inputFileUpload">(Hình cũ: <?php echo $oldproduct['image']?>) </td>
        <tr>
            <td class="col-md-3"><label>Status</label></td>
            <td>
                <select name=inputStatus>
                    <option value=0 <?php if($oldproduct['status']==0) echo "selected" ?>>Ẩn</option>
                    <option value=1 <?php if($oldproduct['status']==1) echo "selected" ?>>Hiện</option>
                </select>
            </td>
        </tr>


        <tr>
            <td class="col-md-3"><label>Trash</label></td>
            <td>
                <select name=inputTrash>
                    <option value=0 <?php if($oldproduct['trash']==0) echo "selected" ?>>Khong</option>
                    <option value=1 <?php if($oldproduct['trash']==1) echo "selected" ?>>Trash</option>
                </select>
            </td>
        </tr>

        <tr>
        <td>
            <input type="submit" name="submit" values= Submit>
            <input type= "reset" name="reset" values= Reset>
        </td>
        </tr>
    </table>
    </form>
</div>
</div>