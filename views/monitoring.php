<?php
    $pageTitle = "Monitoring"; // Set title jika diperlukan
    include('header.php'); // Menyertakan file header.php
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Monitoring Resiko</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    
    <!-- Styles -->
    <link href="<?php echo base_url('assets/bower_components/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet" />
    <link href="<?php echo base_url('assets/bower_components/font-awesome/css/font-awesome.min.css'); ?>" rel="stylesheet" />
    <link href="<?php echo base_url('assets/bower_components/Ionicons/css/ionicons.min.css'); ?>" rel="stylesheet" />
    <link href="<?php echo base_url('assets/dist/css/AdminLTE.min.css'); ?>" rel="stylesheet" />
    <link href="<?php echo base_url('assets/dist/css/skins/_all-skins.min.css'); ?>" rel="stylesheet" />

    <style>
        .table th.no-column, .table td.no-column {
            width: 5%; 
            font-size: 1em; 
            padding: 5px; 
            text-align: center; 
            vertical-align: middle;
        }
        .table thead tr {
            background-color: #5cb281;
            color: white;
        }
        .table th, .table td {
            color: black; 
            text-align: center; 
            vertical-align: middle; 
        }
        .inline-row {
            display: none;
            background-color: #f9f9f9;
        }
        .inline-row td {
            padding: 15px;
        }
        .jenis-risiko-link {
            color: black;
        }
        .jenis-risiko-link:hover {
            color: black;
        }
        .jenis-risiko-link:focus, .jenis-risiko-link:active {
            color: black;
            text-decoration: none;
        }

    </style>
    
    <script src="<?php echo base_url('assets/bower_components/jquery/dist/jquery.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/bower_components/bootstrap/js/bootstrap.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/dist/js/adminlte.min.js'); ?>"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.jenis-risiko-link').on('click', function() {
                var jenis_risiko = $(this).data('risiko');
                var $row = $(this).closest('tr');
                
                // Cek jika sudah ada row inline, hapus atau tampilkan ulang (toggle)
                if ($row.next().hasClass('inline-row')) {
                    $row.next().toggle(); // Toggle tampilan baris inline jika sudah ada
                    return;
                }

                // AJAX request untuk mendapatkan data perusahaan
                $.ajax({
                    url: "<?php echo site_url('monitoring/getPerusahaanByRisikoAjax'); ?>",
                    type: "POST",
                    data: { jenis_risiko: jenis_risiko },
                    dataType: "json",
                    success: function(data) {
                        var companyData = '<tr class="inline-row"><td colspan="3"><table class="table table-bordered"><thead><tr><th>No</th><th>NIB</th><th>Nama Perusahaan</th><th>Status Penanaman Modal</th><th>Jenis Perusahaan</th><th>Risiko Proyek</th><th>Nama Proyek</th><th>Skala Usaha</th><th>Alamat Usaha</th><th>Kecamatan Usaha</th><th>Kelurahan Usaha</th><th>KBLI</th><th>Judul KBLI</th><th>Nama User</th><th>No. Identitas User</th><th>Email</th><th>No. Telp</th></tr></thead><tbody>';

                        if (data.length > 0) {
                            $.each(data, function(index, perusahaan) {
                                companyData += '<tr>' +
                                    '<td>' + (index + 1) + '</td>' +
                                    '<td>' + (perusahaan.Nib || '') + '</td>' +
                                    '<td>' + (perusahaan.Nama_Perusahaan || '') + '</td>' +
                                    '<td>' + (perusahaan.Uraian_Status_Penanaman_Modal || '') + '</td>' +
                                    '<td>' + (perusahaan.Uraian_Jenis_Perusahaan || '') + '</td>' +
                                    '<td>' + (perusahaan.Uraian_Risiko_Proyek || '') + '</td>' +
                                    '<td>' + (perusahaan.nama_proyek || '') + '</td>' +
                                    '<td>' + (perusahaan.Uraian_Skala_Usaha || '') + '</td>' +
                                    '<td>' + (perusahaan.Alamat_Usaha || '') + '</td>' +
                                    '<td>' + (perusahaan.kecamatan_usaha || '') + '</td>' +
                                    '<td>' + (perusahaan.kelurahan_usaha || '') + '</td>' +
                                    '<td>' + (perusahaan.Kbli || '') + '</td>' +
                                    '<td>' + (perusahaan.Judul_Kbli || '') + '</td>' +
                                    '<td>' + (perusahaan.Nama_User || '') + '</td>' +
                                    '<td>' + (perusahaan.Nomor_Identitas_User || '') + '</td>' +
                                    '<td>' + (perusahaan.Email || '') + '</td>' +
                                    '<td>' + (perusahaan.Nomor_Telp || '') + '</td>' +
                                '</tr>';
                            });
                        } else {
                            companyData += '<tr><td colspan="17">Tidak ada perusahaan untuk risiko ini.</td></tr>';
                        }

                        companyData += '</tbody></table></td></tr>';
                        
                        // Tambahkan baris inline setelah baris risiko yang diklik
                        $row.after(companyData);
                        $row.next().slideDown();
                    },
                    error: function() {
                        alert('Gagal mengambil data perusahaan.');
                    }
                });
            });
        });
    </script>
</head>

<body>    
    <div class="content-wrapper">
        <section class="content-header">
            <h1>Monitoring Risiko Industri</h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo base_url('Dashboard'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Monitoring</li>
            </ol>
        </section>

        <!-- Main Content -->
        <section class="content">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Tabel Monitoring Risiko Industri</h3>
                </div>
                <div class="box-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th class="no-column">No</th>
                                    <th>Jenis Resiko</th>
                                    <th>Jumlah Industri</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($risikoList)): ?>
                                    <?php foreach ($risikoList as $index => $r): ?>
                                        <tr>
                                            <td><?php echo $index + 1; ?></td>
                                            <td>
                                                <a href="javascript:void(0);" class="jenis-risiko-link" data-risiko="<?php echo $r->jenis_risiko; ?>">
                                                    <?php echo $r->jenis_risiko; ?>
                                                </a>
                                            </td>
                                            <td><?php echo $r->jumlah_perusahaan; ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="3" class="text-center">Data risiko tidak tersedia.</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    </div>
</body>
</html>
