<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo isset($perusahaan->nama_perusahaan) ? $perusahaan->nama_perusahaan : 'Form Daftar Perusahaan'; ?></title>
    <style>
        *, html {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .navbar {
            background-color: #526046;
            overflow: hidden;
            height: 80px;
            display: flex;
            align-items: center; 
            justify-content: center;
        }
        .navbar img {
            position: relative;
            right: 724px;
            width: 80px; 
            height: auto;
        }
        .content {
            padding: 20px;
            text-align: left;
        }
        .perusahaan-detail {
            border: 1px solid #ddd;
            padding: 20px;
            background-color: #f9f9f9;
        }
        .perusahaan-detail img {
            width: 100%;
            height: auto;
        }
        .back {
            display: flex;
            align-items: left; 
            justify-content: left; 
            margin: 20px; 
            text-decoration: none; 
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .back img {
            width: 40px; 
            height: auto;
        }
        .upper {
            display: flex;
            align-items: center; 
            justify-content: center; 
            margin: 20px 20px; 
        }

        .upper div {
            display: flex;
            align-items: center;
        }

        .upper div img {
            height: 45px;
            margin-right: 15px;
        }

        .upper div b {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            font-size: 24px;
        }

        .form-container {
            width: 40%;
            margin: 0 auto;
            background-color: #fff;
            padding: 50px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        .form-container form {
            text-align: left;
        }

        .form-container label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        .form-container input[type="text"],
        .form-container input[type="file"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        .form-container button {
            padding: 10px 20px;
            background-color: #526046;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
            display: block;
            margin: 0 auto;
        }

        .form-container button:hover {
            background-color: #3e4a3b;
        }

    </style>
</head>
<body>
    <div class="navbar">
        <div>
            <img src="/disperdagin/assets/image/logo.png" >
        </div>
    </div>
    <a class="back" href="<?php echo site_url('home'); ?>">
        <img src="/disperdagin/assets/image/back.png">
    </a>
    <div class="upper">
        <div>
            <b>Form Daftar Perusahaan</b>
        </div>
    </div>

    <div class="form-container">
        <?php echo isset($error) ? $error : ''; ?>
        <form method="post" action="<?php echo site_url('FormDaftar/simpan'); ?>" enctype="multipart/form-data">
            <label for="nama_perusahaan">Nama Perusahaan</label>
            <input type="text" id="nama_perusahaan" name="nama_perusahaan" required>
            
            <label for="alamat">Alamat</label>
            <input type="text" id="alamat" name="alamat" required>
            
            <label for="deskripsi">Deskripsi</label>
            <input type="text" id="deskripsi" name="deskripsi" required>
            
            <label for="gambar">Foto</label>
            <input type="file" id="gambar" name="gambar" accept="image/*">
            
            <button type="submit" name="submit">Daftar</button>
        </form>
    </div>
</body>
</html>
