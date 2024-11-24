<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Mengambil data dari form pendaftaran
    $name = $_POST['name'];
    $email = $_POST['email'];
    $city = $_POST['city'];
    $gender = $_POST['gender'];
    
    // Validasi form pendaftaran
    if (empty($name) || empty($email) || empty($city) || empty($gender)) {
        echo "Semua kolom harus diisi!";
        exit();
    }

    // Memproses file yang diupload
    $file = $_FILES['file'];
    if ($file['error'] == 0) {
        $fileTmpPath = $file['tmp_name'];
        $fileName = $file['name'];
        $filePath = $fileName; 
        
        // Pindahkan file ke server
        if (move_uploaded_file($fileTmpPath, $filePath)) {
            // Mengarahkan ke result.php 
            header("Location: result.php?name=$name&email=$email&city=$city&gender=$gender&file=$fileName");
            exit();
        } else {
            echo "Terjadi kesalahan saat meng-upload file.";
            exit();
        }
    } else {
        echo "Tidak ada file yang di-upload.";
        exit();
    }
}
?>