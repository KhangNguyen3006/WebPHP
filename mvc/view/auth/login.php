<?php 
if (isset($_SESSION['msg']))
{
    echo $_SESSION['msg'];
    unset($_SESSION['msg']);
}
?>

<form action="<?php echo BASE_URL ?>auth/adminLogin/" method =post>
    <table>
        <tr>
            <td>Username</td>
            <td><input type="text" name=inputUsername></td>
        </tr>
        <tr>
            <td>Password</td>
            <td><input type="password" name=inputPassword></td>
        </tr>
        <tr>
            <td colspan=2>
                <input type="submit" name='login' value="Login">
                <input type="Reset" value=Reset>
            </td>
        </tr>
    </table>
</form>