<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=<, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Coba PHP</h1>
    <?php
        echo"Teks ini dengan PHP Echo";
    ?>
    <hr>
    <?= "<br>Teks ini dengan PHP tanpa echo"
    ?>
    <p>Selesai</p>
    <hr>
    <h2>Form login</h2>
    <?php
    $username = 'admin';
    $password = 'ambalabu';
    ?>
    <Form method="post">
        Username : <input type = "text" name = "user"><br>
        Password : <input type = "password" name = "pass">
        <br>
        <input type = "submit" value="login">
    </form>

    <?php
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        if($_POST['user'] == $username AND $_POST['pass']== $password){
            echo '<span style = "color:green">User ' .$_POST['user']. ' Berhasil login</span>';
        }else{
            echo '<span style = "color:red">User ' .$_POST['user']. ' Gagal login</span>';
        }
    }
    ?>
</body>
</html>