<?php
include 'koneksi.php';
session_start();
?>

<html>
<head>
    <title>Membuat Desain Form Login Dengan CSS</title>
    <link rel="stylesheet" href="/admin/assets/css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="styles.css" >
</head>
<body>
    <h1>Membuat Desain Form Login Dengan CSS <br /> www.latihan1.com</h1>
    <div class="kotak_login">
        <p class="tulisan_login">Silahkan login</p>
        <form method="POST">
            <label>Email</label>
            <input type="email" name="email" class="form_login" placeholder="Email .." value="user1@gmail.com">
            <label>Password</label>
            <input type="password" name="password" class="form_login" placeholder="Password .." value="123456">

            <input type="submit" class="tombol_login" value="LOGIN">
            <br />
            <br />
            <center>
                <a class="link" href="https://www.latihan1.com">kembali</a>
                <hr />
                <p>Email & Password sudah terisi silahkan klik LOGIN</p>

            </center>
        </form>

        <?php
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    $email = mysqli_real_escape_string($koneksi, $_POST['email']);
    $password = mysqli_real_escape_string($koneksi, md5($_POST['password']));
    $query = "SELECT * FROM tugas WHERE email_tugas= '$email' AND password_tugas = '$password'";
    $queryDB = mysqli_query($koneksi, $query);
    $check = mysqli_num_rows($queryDB);
    if ($check > 0)
    {
        // ambil data users
        $getData = mysqli_fetch_array($queryDB);
        // set session
        $_SESSION['tugas'] = $getData;
        $_SESSION['tugas'] = true;
        //header('location: index.php');
        echo "<div class='alert alert-info'>Login Sukses . . .</div>";
        echo '<META HTTP-EQUIV="Refresh" Content="1; URL=index.php">';
    }
    else
    {
        echo "<div class='alert alert-danger'>Email atau password yang anda masukkan salah</div>";
    }
}
else
{
    return "Anda tidak di ijinkan";
} ?>

    </div>
</body>
</html>
