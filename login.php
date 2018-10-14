<?php
    session_start();
?>
<!DOCTYPE html>
<html>
<body>
    <form method="post">
        <table align="center">
            <tr>
                <center><h2>Login</h2></td></center>
            </tr>
            <tr>
                <td>Username</td>
                <td><input type="text" name="username"></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="password" name="password"></td>
            </tr>
            <tr>
                <td colspan="2" align="center"><input type="submit" name="login" value="Login"></td>
            </tr>
            <tr>
                <td align="left"><a href="daftar.php">Daftar</a></td>
            </tr>
        </table>
    </form>
    </center>
</body>
</html>
<?php
if(isset($_POST['username'])){
    require_once("database.php");
    $username = $_POST['username'];
    $password = $_POST['password'];
    $sql = mysqli_query($koneksi, "SELECT * FROM login WHERE username = '$username' AND password = '$password'");
    $row = mysqli_fetch_assoc($sql);
    $num = mysqli_num_rows($sql);
    $id = $row['id'];

    if ($num != 0) {
        $query = mysqli_query($koneksi, "SELECT nim FROM data WHERE id = '$id'");
        $data = mysqli_fetch_assoc($query);
        $_SESSION['nim'] = $data['nim'];
        header("location: halamanawal.php");
    }else{
        echo "<script>alert('Akun Belum Terdaftar'); location='login.php'</script>";
    }
    mysqli_close($koneksi);
}
?>