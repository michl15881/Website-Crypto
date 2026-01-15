<?php
//query untuk mengambil data article
$sql1 = "SELECT * FROM article ORDER BY tanggal DESC";
$hasil1 = $conn->query($sql1);

$sql2 = "SELECT * FROM gallery ORDER BY tanggal DESC";
$hasil2 = $conn->query($sql2);

//menghitung jumlah baris data article
$jumlah_article = $hasil1->num_rows; 
$jumlah_gallery = $hasil2->num_rows;

$username = $_SESSION['username'];
$sql_user = "SELECT * FROM user WHERE username = '$username'";
$hasil_user = $conn->query($sql_user);
$row_user = $hasil_user->fetch_assoc();

$foto_profil = 'default.jpg'; // Foto default
if (!empty($row_user['foto']) && file_exists('img/' . $row_user['foto'])) {
    $foto_profil = $row_user['foto'];
}
?>

<div class="row">
    <div class="col text-center pb-4 mb-4">
        <H5 class="fs-4">Selamat Datang,</H5>

        <h1 class="fw-bold text-danger display-4"><?php echo $username; ?></h1>
        <div class="mt-3">
            <img src="img/<?php echo $foto_profil; ?>" 
                class="rounded-circle shadow" 
                style="width: 250px; height: 250px; object-fit: cover;" 
                alt="Profile Picture">
        </div>
    </div>
</div>
<div class="row row-cols-1 row-cols-md-4 g-4 justify-content-center pt-4">
    <div class="col">
        <div class="card border border-danger mb-3 shadow" style="max-width: 18rem;">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div class="p-3">
                        <h5 class="card-title"><i class="bi bi-newspaper"></i> Article</h5> 
                    </div>
                    <div class="p-3">
                        <span class="badge rounded-pill text-bg-danger fs-2"><?php echo $jumlah_article; ?></span>
                    </div> 
                </div>
            </div>
        </div>
    </div> 
    <div class="col">
        <div class="card border border-danger mb-3 shadow" style="max-width: 18rem;">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div class="p-3">
                        <h5 class="card-title"><i class="bi bi-camera"></i> Gallery</h5> 
                    </div>
                    <div class="p-3">
                        <span class="badge rounded-pill text-bg-danger fs-2"><?php echo $jumlah_gallery; ?></span>
                    </div> 
                </div>
            </div>
        </div>
    </div> 
</div>

