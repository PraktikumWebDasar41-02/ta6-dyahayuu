<?php
    require_once("database.php");
?>
<html>
<body>
    <form method="post">
        <table align="center">
           <tr>
                <center><h2>Daftar Akun</h2></td></center>
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
                <td>Nama</td>
                <td><input type="text" name="nama" maxlength="30"></td>
            </tr>
            <tr>
                <td>NIM</td>
                <td><input type="text" name="nim" maxlength="12" minlength="6" required></td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                <input type="submit" name="daftar" value="Daftar"></td>
            </tr>
        </table>
    </form>
</body>
</html>

<?php
    if (isset($_POST['username'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $nama = $_POST['nama'];
        $nim = $_POST['nim'];

        $sql = "INSERT INTO login(username, password) VALUES ('$username', '$password')";
        mysqli_query($koneksi, $sql);

        $sql_id = "SELECT id FROM login WHERE username = '$username'";
        $result = mysqli_query($koneksi, $sql_id);
        $row = mysqli_fetch_assoc($result);
        $id = $row['id'];

        $sql_data = "INSERT INTO data(nama, nim, id) VALUES ('$nama', '$nim', '$id')";

        if (mysqli_query($koneksi, $sql_data)) {
            echo "<center>Akun Berhasil Dibuat</center>";
        }
        else {
            echo "Gagal: " . $sql . "<br?" . mysqli_error($koneksi);
        }
        mysqli_close($koneksi);
        echo "<center> <a href='login.php'>Login</a> </center>";
    }
?>