<?php
    require_once("database.php");
    session_start();
?>
<html>
<body>
    <form method="post" enctype="multipart/form-data">
        <table>
            <tr>
                <td>Upload Gambar</td>
                <td><input type="file" name="gambar" accept="image/*"></td>
            </tr>
            <tr>
                <td>Komentar</td>
                <td><textarea name="komen" rows="4"></textarea></td>
            </tr>
            <tr>
                <td><input type="submit" name="submit" value="Post"></td>
            </tr>
            <tr>
                <td><a href="home.php">HOME</a></td>
            </tr>
        </table>
    </form>
    </center>
</body>
</html>

<?php
    if (isset($_POST['komen'])) {
        $post = $_POST['komen'];
        $gambar = $_FILES['gambar']['name'];
        $tmp = $_FILES['gambar']['tmp_name'];
        $dir = "upload/";
        $file = $dir.$gambar;
        $nim = $_SESSION['nim'];
    
        $uploadgambar = move_uploaded_file($tmp, $file);
        if(!$uploadgambar){
            die("Gagal!");
        }

        $sql = "INSERT INTO post(komen, gambar, nim) VALUES ('$post', '$dat', '$nim')";
        if (mysqli_query($koneksi, $sql)) {
            echo "<center>Berhasil</center>";
        }
        else {
            echo "Error: " . $sql . "<br?" . mysqli_error($koneksi);
        }
        mysqli_close($koneksi);
    }
?>