<?php 
    $cats=$data['cats'];
    $oldcat=$data['oldcat'];
?>

<div class="col-md-9">
<h2>UPDATE CATEGORY</h2>

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
            <td class="col-md-3"><label>Category Name</label></td>
            <td><input type=text name=inputCatName required value='<?php echo $oldcat['catName']?>'></td>
        </tr>

        <tr>
            <td class="col-md-3"><label>Alias</label></td>
            <td><input type=text name='inputAlias' required value='<?php echo $oldcat['alias']?>'></td>
        </tr>

        <tr>
            <td class="col-md-3"><label>ParentId</label></td>
            <td><input type=number name='inputParentId' required value='<?php echo $oldcat['parentId']?>'></td>
        </tr>

        <tr>
            <td class="col-md-3"><label>Status</label></td>
            <td>
                <select name=inputStatus>
                    <option value=0 <?php if($oldcat['status']==0) echo "selected" ?>>Ẩn</option>
                    <option value=1 <?php if($oldcat['status']==1) echo "selected" ?>>Hiện</option>
                </select>
            </td>
        </tr>


        <tr>
            <td class="col-md-3"><label>Trash</label></td>
            <td>
                <select name=inputTrash>
                    <option value=0 <?php if($oldcat['trash']==0) echo "selected" ?>>Khong</option>
                    <option value=1 <?php if($oldcat['trash']==1) echo "selected" ?>>Trash</option>
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