<?php
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    // Mengambil data yang dikirimkan dari process.php
    $name = htmlspecialchars($_GET['name']);
    $email = htmlspecialchars($_GET['email']);
    $city = htmlspecialchars($_GET['city']);
    $gender = htmlspecialchars($_GET['gender']);
    $file = htmlspecialchars($_GET['file']);
    
    echo "<h2>Data Pendaftaran</h2>";
    
    // Menampilkan data dari input data pendaftaran
    echo "<table border='1' style='width: 100%; margin-bottom: 20px;'>
            <tr><th>Nama</th><td>$name</td></tr>
            <tr><th>Email</th><td>$email</td></tr>
            <tr><th>Asal Kota</th><td>$city</td></tr>
            <tr><th>Jenis Kelamin</th><td>$gender</td></tr>
            <tr><th>Nama File</th><td>$file</td></tr>
          </table>";
    
    echo "<h3>Isi File Teks:</h3>";
    // Tampilkan isi file yang diupload
    if (file_exists($file)) {
        echo "<pre>";
        echo htmlspecialchars(file_get_contents($file)); // Menampilkan isi file
        echo "</pre>";
    } else {
        echo "File tidak ditemukan.";
    }
}
?>