<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Disperdagin</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
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
            background-color: #5cb281;
            overflow: hidden;
            height: 80px;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
        }
        .navbar img {
            width: 80px;
            height: auto;
            position: absolute;
            left: 20px;
            bottom: 1px;
        }
        .navbar .menu {
            display: flex;
            align-items: center;
        }
        .navbar a {
            margin-left: 15px;
            color: #f2f2f2;
            text-align: center;
            padding: 14px 20px;
            text-decoration: none;
            font-family: Arial, sans-serif;
        }
        .navbar a:hover {
            background-color: #4a9b6e;
            color: white;
            border-radius: 15px;
        }
        .navbar .login {
            background-color: #4a9b6e;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 15px;
            cursor: pointer;
            text-decoration: none;
            position: absolute;
            right: 20px;
        }
        .navbar .login:hover {
            background-color: #6dbd86;
        }
        .container {
            padding: 20px;
        }
        .header-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }
        .search-container {
            display: flex;
            align-items: center;
        }
        .search-container input {
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            margin-right: 5px;
            width: 200px;
        }
        .search-container button {
            padding: 8px 15px;
            background-color: #5cb281;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .content-container {
            display: flex;
            gap: 20px;
        }
        .table-container {
            flex: 1;
        }
        .detail-container {
            flex: 1;
            margin-top: 0;
        }
        /* Styling untuk tabel */
        table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
            border: 1px solid #ddd;
            border-radius: 8px;
            overflow: hidden;
        }
        th, td {
            padding: 15px;
            border-bottom: 1px solid #ddd; /* Garis bawah untuk semua sel (optional) */
        }
        th {
            background-color: #f8f9fa;
            text-align: center;
            font-weight: 600;
            color: #333;
        }
        th:first-child, td:first-child {
            text-align: center;
            border-right: 1px solid #ddd; 
        }
        td {
            background-color: white;
        }
        /* Menghilangkan garis bawah pada baris terakhir */
        tr:last-child td {
            border-bottom: none;
        }
        /* Styling untuk link nama perusahaan */
        table a {
            color: #333;
            text-decoration: none;
            transition: color 0.3s ease;
            cursor: pointer;
        }
        table a:hover {
            color: #5cb281;
        }
        /* Styling untuk informasi perusahaan */
        .company-post {
            background-color: white;
            border-radius: 8px;
            border: 1px solid #ddd;
            padding: 20px;
        }
        .company-post h3 {
            color: #333;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 2px solid #5cb281;
        }
        .company-post p {
            margin: 12px 0;
            line-height: 1.6;
            display: flex;
            align-items: flex-start;
        }
        .company-post strong {
            min-width: 200px;
            display: inline-block;
            color: #666;
        }
        .company-post img {
            max-width: 300px;
            max-height: 300px;
            display: block;
            margin: 15px 0;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .pagination {
            margin-top: 20px;
            display: flex;
            justify-content: flex-end;
            gap: 5px;
        }
        .pagination a {
            padding: 8px 12px;
            border: 1px solid #5cb281;
            color: #5cb281;
            text-decoration: none;
            border-radius: 4px;
            transition: all 0.3s ease;
        }
        .pagination a:hover {
            background-color: #5cb281;
            color: white;
        }
        .footer {
            background-color: #5cb281;
            padding: 40px;
            display: flex;
            justify-content: space-around;
            align-items: flex-start;
            flex-wrap: wrap;
            margin-top: 20px;
        }
        .footer .contact-item {
            text-align: center;
            margin: 10px 20px;
            font-weight: bold;
        }
        .footer .contact-item img {
            display: block;
            margin: 0 auto 10px;
            width: 30px;
            height: auto;
        }
        .footer .contact-item p, 
        .footer .contact-item a {
            margin: 0;
            color: #333;
            text-decoration: none;
        }
        
        /* Hover effect untuk rows tabel */
        tbody tr:hover {
            background-color: #f8f9fa;
        }
        
        @media (max-width: 768px) {
            .content-container {
                flex-direction: column;
            }
            .header-container {
                flex-direction: column;
                gap: 10px;
            }
            .search-container {
                width: 100%;
            }
            .search-container input {
                width: 100%;
            }
            .company-post strong {
                min-width: 150px;
            }
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        function showDetail(id) {
            console.log("showDetail called with id:", id); // Debugging log
            $.ajax({
                url: "<?php echo site_url('daftar/get_industri_info'); ?>",
                type: "GET",
                data: {Id: id},
                success: function(response) {
                    $('#detail-info').html(response);

                    const alamat = $('#detail-info').find('#alamat-usaha').text().trim();
                    console.log("Alamat ditemukan:", alamat);

                    if (alamat) {
                        const mapUrl = `https://www.google.com/maps?q=${encodeURIComponent(alamat)}&output=embed`;
                        $('#map-container').html(
                            `<iframe
                                width="100%"
                                height="300"
                                style="border:0"
                                loading="lazy"
                                allowfullscreen
                                src="https://www.google.com/maps?q=${encodeURIComponent(alamat)}&output=embed">
                            </iframe>`
                        );
                    } else {
                        console.log("Alamat tidak ditemukan atau kosong.");
                        $('#map-container').html('<p>Alamat tidak tersedia.</p>');
                    }
                },
                error: function() {
                    alert('Gagal mengambil data.');
                }
            });
        }
    </script>
</head>
<body>
    <div class="navbar">
        <div>
            <img src="/disperdagin/assets/image/logo.png">
        </div>
            <a href="<?php echo site_url('home'); ?>">Home</a>
            <a href="<?php echo site_url('daftar'); ?>">Daftar Industri</a>
            <a href="<?php echo site_url('about'); ?>">About Us</a>
            <a class="login" href="<?php echo site_url('login'); ?>">Login</a>
    </div>

    <div class="container">
        <div class="header-container">
            <h2>DAFTAR INDUSTRI</h2>
            <div class="search-container">
                <form action="<?php echo site_url('daftar/search'); ?>" method="get">
                    <input type="text" name="query" placeholder="Cari...">
                    <button type="submit">Cari</button>
                </form>
            </div>
        </div>

        <div class="content-container">
            <div class="table-container">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Perusahaan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $Id = $start_number; ?>
                        <?php if (!empty($data_industri)): ?>
                        <?php foreach ($data_industri as $industri): ?>
                            <tr>
                                <td><?php echo $Id++; ?></td>
                                <td>
                                    <a href="javascript:void(0)" onclick="showDetail(<?php echo $industri->Id; ?>)">
                                        <?php echo $industri->Nama_Perusahaan; ?>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="4">Data tidak tersedia.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
                <div class="pagination">
                    <?php echo $pagination; ?>
                </div>
            </div>

            <div class="detail-container" id="detail-info">
                <!-- Detail perusahaan akan ditampilkan di sini -->
                 <div id="map-container">
                        <!-- detail google maps-->
                        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                        <script>
                            function showDetail(id) {
                                console.log("showDetail called with id:", id); 
                                $.ajax({
                                    url: "<?php echo site_url('daftar/get_industri_info'); ?>",
                                    type: "GET",
                                    data: {Id: id},
                                    success: function(response) {
                                        $('#detail-info').html(response);

                                        const alamat = $(response).find('#alamat-usaha').text().trim();

                                        $('#map-container').html(
                                            `<iframe
                                                width="100%"
                                                height="300"
                                                style="border:0"
                                                loading="lazy"
                                                allowfullscreen
                                                src="https://www.google.com/maps?q=${encodeURIComponent(alamat)}&output=embed">
                                            </iframe>`
                                        );
                                    },
                                    error: function() {
                                        alert('Gagal mengambil data.');
                                    }
                                });
                            }
                        </script>

                 </div>
            </div>
        </div>
    </div>

    <div class="footer">
        <div class="contact-item">
            <img src="/disperdagin/assets/image/telepon.png" alt="Phone">
            <p>022-5891691/1183</p>
        </div>
        <div class="contact-item">
            <img src="/disperdagin/assets/image/alamat.png" alt="Location">
            <p> Jl. Raya Soreang Km. 17 Soreang, </p>
            <p> Kab. Bandung, Jawa Barat, Indonesia</p>
        </div>
        <div class="contact-item">
            <img src="/disperdagin/assets/image/email.png" alt="Email">
            <p><a href="mailto:pdkiindagkabbdg@gmail.com">pdkiindagkabbdg@gmail.com</a></p>
        </div>
        <div class="contact-item">
            <img src="/disperdagin/assets/image/ig.png" alt="Instagram">
            <p><a href="https://www.instagram.com/disperdagin_kabbdg?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw==" target="_blank">disperdagin_kabbdg</a></p>
        </div>
        <div class="contact-item">
            <img src="/disperdagin/assets/image/fb.png" alt="Facebook">
            <p><a href="https://www.facebook.com/disperindagkabbdg/" target="_blank">Disperindag Kabbdg</a></p>
        </div>
        <div class="contact-item">
            <img src="/disperdagin/assets/image/tiktok.png" alt="Tiktok">
            <p><a href="https://www.tiktok.com/@disperdagin_kabbdg" target="_blank">disperdagin_kabbdg</a></p>
        </div>
    </div>
</body>
</html>