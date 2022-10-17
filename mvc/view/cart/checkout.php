<div class="col-md-9">
<h2> CHECK OUT </h2>
<div class="row btn-success">
<?php 
    if(isset($_SESSION['msg'])){echo $_SESSION['msg'];unset($_SESSION['msg']);
}
?>
</div>
<div class="row">
<form  method=post action=' '>
<table>
<tr>
    <td class= col-md-3>
    <label for="inputProductName">Họ tên </label></td>
    <td><input type="text" name= inputFullname required></td>
</tr>
<tr>
    <td class= col-md-3>
    <label for="inputProductName">Địa chỉ  </label></td>
    <td><input type="text" name= inputAddress required></td>
</tr>
<tr>
    <td class= col-md-3>
    <label for="inputProductName">Số Điện Thoại </label></td>
    <td><input type="phone" name= inputPhone required></td>
</tr>
<tr>
    <td class= col-md-3>
    <label for="inputProductName">Email </label></td>
    <td><input type="email" name= inputEmail required></td>
</tr>
<tr>
    <td class= col-md-3>
    <label for="inputProductName">Ghi chú </label></td>
    <td><textarea name='inputNote' cols=50  rows=5></textarea></td>
</tr>
<tr>
<td><input type="submit" name="submit" values= Submit>
<input type= "reset" name="reset" values= Reset>
</td>
</tr>
</table>
</form>
</div>
</div>