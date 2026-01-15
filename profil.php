<?php
    include "koneksi.php";
    include "upload_foto.php";

    $username = $_SESSION['username'];

    if (isset($_POST['simpan'])) {
    $password = $_POST['password'];
    $foto_lama = $_POST['foto_lama'];
    $foto_baru = '';

    if ($_FILES['foto']['name'] != '') {
        //panggil function upload_foto untuk cek detail file yg diupload user
        //function ini memiliki keluaran sebuah array yang berisi status dan message
        $cek_upload = upload_foto($_FILES["foto"]);

        //cek status upload file hasilnya true/false
        if ($cek_upload['status']) {
            //jika true maka message berisi nama file gambar
            $foto_baru = $cek_upload['message'];
            if ($foto_lama != 'default.jpg' && file_exists('img/' . $foto_lama)) {
                unlink('img/' . $foto_lama);
            }
        } else {
            //jika true maka message berisi pesan error, tampilkan dalam alert
            echo "<script>
                alert('" . $cek_upload['message'] . "');
                document.location='admin.php?page=profil';
            </script>";
            die;
        }
    }else {
        // Jika tidak upload foto baru, pakai foto lama
        $foto_baru = $foto_lama;
    }

    if (empty($password)) {
        // Jika password KOSONG, hanya update foto saja
        $stmt = $conn->prepare("UPDATE user SET foto = ? WHERE username = ?");
        $stmt->bind_param("ss", $foto_baru, $username);
    } else {
        $password_md5 = md5($password);
        $stmt = $conn->prepare("UPDATE user SET password = ?, foto = ? WHERE username = ?");
        $stmt->bind_param("sss", $password_md5, $foto_baru, $username);
    }

    $simpan = $stmt->execute();

    if ($simpan) {
        echo "<script>
            alert('Profil berhasil diperbarui!');
            document.location='admin.php?page=profil'; 
        </script>";
    } else {
        echo "<script>alert('Gagal memperbarui profil.');</script>";
    }
}
?>

<?php
    $sql = "SELECT * FROM user WHERE username = ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();

    $hasil = $stmt->get_result();
    $row = $hasil->fetch_assoc(); // Ambil data menjadi array

    // Cek apakah data ditemukan
    if ($row) {
    ?>

<div class="container">
    <div class="row">
        <form method="POST" action="" enctype="multipart/form-data">
            <input type="hidden" name="foto_lama" value="<?= $row["foto"] ?>">
            
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Username</label>
                <input class="form-control" type="text" value="<?= $row["username"] ?>" aria-label="Disabled input example" disabled>
            </div>
            <div class="mb-3">
                <label for="inputPassword5" class="form-label">Ganti Password</label>
                <input type="password" name="password" id="inputPassword5" class="form-control" aria-describedby="passwordHelpBlock" placeholder="Tuliskan Password baru jika ingin mengganti password saja">
                <div id="passwordHelpBlock" class="form-text">
                    Your password must be 8-20 characters long, contain letters and numbers, and must not contain spaces, special characters, or emoji.
                </div>
            </div>
            <div class="mb-3">
                <label for="formFileMultiple" class="form-label">Ganti Foto Profil</label>
                <input class="form-control" type="file" name="foto" id="formFileMultiple">
            </div>
            <div class="mb-3">
                <label class="form-label">Foto Profil Saat Ini:</label><br>
                <?php 
                    if ($row["foto"] != '' && file_exists('img/' . $row["foto"])) {
                        $img = $row["foto"];
                    } else {
                        $img = 'default.jpg';
                    }
                ?>
                <img src="img/<?= $img ?>" width="150" height="150" style="object-fit: cover;">
            </div>
            <div class="mb-3">
                <input type="submit" name="simpan" value="Simpan" class="btn btn-primary" style="margin-left: 30px;">
            </div>
        </form>
    </div>
</div>

<?php
    }
?>