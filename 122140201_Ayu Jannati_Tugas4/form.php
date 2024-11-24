<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pendaftaran Modern</title>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(to bottom, #83a4d4, #b6fbff);
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: flex-start;
            min-height: 100vh;
        }

        .container {
            width: 100%;
            max-width: 500px;
        }

        h2 {
            text-align: center;
            color: #333;
            font-weight: 600;
            margin: 0;
            position: sticky;
            top: 0;
            background: white;
            padding: 10px;
            z-index: 1;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .form-container {
            background: linear-gradient(to right, #a8e063, #f3d250);
            padding: 60px 30px 30px; 
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
            margin-top: 20px;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            margin-bottom: 5px;
            font-weight: 400;
            color: #555;
        }

        input, select, button, .file-preview {
            width: 100%;
            max-width: 400px;
            padding: 10px 15px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 16px;
            font-family: 'Poppins', sans-serif;
            box-sizing: border-box;
        }

        .file-preview {
            height: auto;
            min-height: 50px;
            background: #f9f9f9;
            color: #333;
            overflow-y: auto;
        }

        button {
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s ease;
            font-weight: 600;
        }

        button:hover {
            background-color: #45a049;
        }

        .error-message {
            color: red;
            font-size: 12px;
            margin-top: -10px;
            margin-bottom: 10px;
            display: none;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Form Pendaftaran</h2>
    <form action="process.php" method="POST" enctype="multipart/form-data">
        <div class="form-container">
            <!-- Masukkan Nama Lengkap -->
            <div class="form-group">
                <label for="name">Nama Lengkap</label><br>
                <input type="text" name="name" id="name" required><br>
                <div id="name-error" class="error"></div>
            </div>

            <!-- Masukkan Email -->
            <div class="form-group">
                <label for="email">Email</label><br>
                <input type="email" name="email" id="email" required><br><br>
            </div>

            <!-- Masukkan Asal Kota -->
            <div class="form-group">
                <label for="city">Asal Kota</label><br>
                <input type="text" name="city" id="city" required><br><br>
            </div>

            <!-- Memilih Jenis Kelamin atau Gender -->
            <div class="form-group">
                <label for="gender">Jenis Kelamin</label><br>
                <select name="gender" id="gender" required>
                    <option value="">Pilih Jenis Kelamin</option>
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select><br><br>
            </div>

            <!-- Upload File berupa Teks -->
            <div class="form-group">
                <label for="file">Upload File Teks</label><br>
                <input type="file" name="file" id="file" accept=".txt" required><br><br>
            </div>

            <!-- Preview File yang Diupload -->
            <div id="preview">Preview file akan ditampilkan di sini.</div><br>

            <!-- Tombol Submit -->
            <button type="submit">Submit</button>
        </div>
    </form>
</div>

<script>
    // Preview file yang diupload sebelum disubmit
    document.getElementById('file').addEventListener('change', function(event) {
        const file = event.target.files[0];
        const previewDiv = document.getElementById('preview');
        if (file && file.type === 'text/plain') {
            const reader = new FileReader();
            reader.onload = function(e) {
                previewDiv.innerHTML = '<h3>Preview File:</h3><pre>' + e.target.result + '</pre>';
            };
            reader.readAsText(file);
        } else {
            previewDiv.innerHTML = 'Pilih file teks (.txt) untuk preview';
        }
    });
</script>
</body>
</html>