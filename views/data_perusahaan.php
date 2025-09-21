<?php
    $pageTitle = "Daftar Industri"; 
    include('header.php');

    $Id =1;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Industri</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.4 -->
    <link href="<?php echo base_url('assets/bower_components/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet" type="text/css" />
    <!-- FontAwesome 4.3.0 -->
    <link href="<?php echo base_url('assets/bower_components/font-awesome/css/font-awesome.min.css'); ?>" rel="stylesheet" type="text/css" />
    <!-- Ionicons 2.0.0 -->
    <link href="<?php echo base_url('assets/bower_components/Ionicons/css/ionicons.min.css'); ?>" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="<?php echo base_url('assets/dist/css/AdminLTE.min.css'); ?>" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins -->
    <link href="<?php echo base_url('assets/dist/css/skins/_all-skins.min.css'); ?>" rel="stylesheet" type="text/css" />

    <style>
        .pagination-wrapper {
            text-align: center;
            margin-top: 20px;
            margin-bottom: 20px;
        }
        .pagination-wrapper a {
            color: #526046;
            padding: 10px 20px;
            text-decoration: none;
            border: 1px solid #ddd;
            border-radius: 4px;
            margin: 0 5px;
            transition: background-color 0.3s, color 0.3s;
            display: inline-block;
        }
        .pagination-wrapper a.active {
            background-color: #526046;
            color: white;
        }

        .pagination-wrapper a:hover {
            background-color: #5cb281;
            color: white;
        }
        .btn-action {
            margin-right: 10px;
            display: inline-block;
            width: 100px;
            text-align: center;
            padding: 8px 12px;
            font-size: 14px;
        }

        .btn-warning.btn-sm, .btn-danger.btn-sm {
            width: 100px;
            margin-top: 5px;
        }

        .btn-action:hover {
            opacity: 0.8;
        }
        .table thead tr {
            background-color: #5cb281;
            text-align: center;
        }
        .table th {
            text-align: center;
        }
        .box-tools {
            margin-top: 10px;
        }
        .box-tools form {
            margin-bottom: 10px;
        }
        .form-inline .form-group {
            margin-right: 10px;
        }
        .box-tools.pull-right {
            display: flex;
            justify-content: flex-end; 
            align-items: center;
            margin-bottom: 20px; 
            margin-top: 10px;
        }
        .box-tools a.btn-primary {
            margin-right: 10px; 
        }
        .box-tools form {
            margin-bottom: 10px;
            display: flex;
            align-items: center;
        }
        .table {
            margin-top: 20px; 
        }


    </style>

    <script src="<?php echo base_url('assets/bower_components/jquery/dist/jquery.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/bower_components/bootstrap/js/bootstrap.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/dist/js/adminlte.min.js'); ?>"></script>
    <script type="text/javascript">
        var baseURL = "<?php echo base_url(); ?>";
    </script>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-custom sidebar-mini">
    <div class="content-wrapper">
        <section class="content-header">
            <h1>Data Industri</h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo base_url(); ?>dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Data Industri</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Tabel Data Industri</h3>
                    <div class="box-tools pull-right">
                    <!-- Tombol Tambah Data -->
                    <a href="<?php echo site_url('Data_Perusahaan/tambah'); ?>" class="btn btn-primary btn-sm" style="margin-bottom: 10px;">Tambah Data</a>

                    <!-- Form pencarian -->
                    <form action="<?php echo site_url('Data_Perusahaan'); ?>" method="get" class="form-inline" style="margin-bottom: 10px;">
                        <div class="input-group">
                            <input type="text" name="query" class="form-control" placeholder="Cari Nama Perusahaan, Kecamatan, atau Desa..." 
                                value="<?php echo htmlspecialchars($this->input->get('query') ?? '', ENT_QUOTES, 'UTF-8'); ?>">
                            <span class="input-group-btn">
                                <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                            </span>
                        </div>
                    </form>

                    <!-- Form dropdown filter -->
                    <form method="get" action="<?php echo site_url('Data_Perusahaan/index'); ?>" class="form-inline" style="margin-bottom: 10px;">
                        <div class="form-group">
                            <select name="kecamatan_usaha" class="form-control" onchange="this.form.submit()">
                                <option value="">Semua Kecamatan</option>
                                <?php foreach ($kecamatan_list as $kecamatan): ?>
                                    <option value="<?php echo $kecamatan['kecamatan_usaha']; ?>" 
                                        <?php echo ($kecamatan['kecamatan_usaha'] == $filter_kecamatan) ? 'selected' : ''; ?>>
                                        <?php echo $kecamatan['kecamatan_usaha']; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </form>
                </div>


                <div class="box-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nib</th>
                                    <th>Nama Perusahaan</th>
                                    <th>Status Penanaman Modal</th>
                                    <th>Jenis Perusahaan</th>
                                    <th>Klasifikasi Risiko</th>
                                    <th>Nama Proyek</th>
                                    <th>Skala Usaha</th>
                                    <th>Alamat Usaha</th>
                                    <th>Kecamatan Usaha</th>
                                    <th>Kelurahan Usaha</th>
                                    <th>Kode Kbli</th>
                                    <th>Judul Kbli</th>
                                    <th>Nama Pemilik</th>
                                    <th>Nomor Identitas</th>
                                    <th>Email</th>
                                    <th>Nomor Telepon</th>
                                    <th>Jumlah Investasi</th>
                                    <th>Foto</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($perusahaan)): ?>
                                <?php foreach ($perusahaan as $item): ?>
                                    <tr>
                                        <td><?php echo htmlspecialchars($Id++, ENT_QUOTES, 'UTF-8'); ?></td>
                                        <td><?php echo htmlspecialchars($item->Nib ?? '-', ENT_QUOTES, 'UTF-8'); ?></td>
                                        <td><?php echo htmlspecialchars($item->Nama_Perusahaan ?? '-', ENT_QUOTES, 'UTF-8'); ?></td>
                                        <td><?php echo htmlspecialchars($item->Uraian_Status_Penanaman_Modal ?? '-', ENT_QUOTES, 'UTF-8'); ?></td>
                                        <td><?php echo htmlspecialchars($item->Uraian_Jenis_Perusahaan ?? '-', ENT_QUOTES, 'UTF-8'); ?></td>
                                        <td><?php echo htmlspecialchars($item->Uraian_Risiko_Proyek ?? '-', ENT_QUOTES, 'UTF-8'); ?></td>
                                        <td><?php echo htmlspecialchars($item->nama_proyek ?? '-', ENT_QUOTES, 'UTF-8'); ?></td>
                                        <td><?php echo htmlspecialchars($item->Uraian_Skala_Usaha ?? '-', ENT_QUOTES, 'UTF-8'); ?></td>
                                        <td><?php echo htmlspecialchars($item->Alamat_Usaha ?? '-', ENT_QUOTES, 'UTF-8'); ?></td>
                                        <td><?php echo htmlspecialchars($item->kecamatan_usaha ?? '-', ENT_QUOTES, 'UTF-8'); ?></td>
                                        <td><?php echo htmlspecialchars($item->kelurahan_usaha ?? '-', ENT_QUOTES, 'UTF-8'); ?></td>
                                        <td><?php echo htmlspecialchars($item->Kbli ?? '-', ENT_QUOTES, 'UTF-8'); ?></td>
                                        <td><?php echo htmlspecialchars($item->Judul_Kbli ?? '-', ENT_QUOTES, 'UTF-8'); ?></td>
                                        <td><?php echo htmlspecialchars($item->Nama_User ?? '-', ENT_QUOTES, 'UTF-8'); ?></td>
                                        <td><?php echo htmlspecialchars($item->Nomor_Identitas_User ?? '-', ENT_QUOTES, 'UTF-8'); ?></td>
                                        <td><?php echo htmlspecialchars($item->Email ?? '-', ENT_QUOTES, 'UTF-8'); ?></td>
                                        <td><?php echo htmlspecialchars($item->Nomor_Telp ?? '-', ENT_QUOTES, 'UTF-8'); ?></td>
                                        <td>Rp <?php echo isset($item->Jumlah_Investasi) && $item->Jumlah_Investasi != '' ? number_format($item->Jumlah_Investasi, 0, ',', '.') : '-'; ?></td>
                                        <td>
                                        <?php if (!empty($item->foto)): ?>
                                            <img src="<?php echo base_url('uploads/' . $item->foto); ?>" alt="Foto" style="width: 100px; height: auto;">
                                                <?php else: ?>
                                                    Tidak ada foto
                                                <?php endif; ?>
                                        </td>
                                        <td>
                                            <a href="<?php echo site_url('Data_Perusahaan/edit/' . $item->Id); ?>" class="btn btn-warning btn-sm">Edit</a>
                                            <a href="javascript:void(0);" 
                                                class="btn btn-danger btn-action btn-delete" 
                                                data-url="<?php echo base_url('Data_Perusahaan/hapus_data/' . $item->Id); ?>">
                                                Hapus
                                            </a>
                                        </td>
                                    </tr>
                                        <?php endforeach; ?>
                                        <?php else: ?>
                                    <tr>
                                        <td colspan="20" class="text-center">Tidak ada data yang ditemukan.</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                        <div class="pagination-wrapper">
                            <?= str_replace('&per_page=', '&' . http_build_query(['query' => $query ?? '']) . '&per_page=', $pagination); ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

<!-- Modal Konfirmasi Hapus -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Konfirmasi Hapus</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Apakah Anda yakin ingin menghapus data ini?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="button" id="confirmDeleteButton" class="btn btn-primary">Hapus</button>
            </div>
        </div>
    </div>
</div>

<!-- Script untuk Proses Hapus -->
<script type="text/javascript">
    $(document).on('click', '.btn-delete', function(e) {
        e.preventDefault();
        var deleteUrl = $(this).data('url'); 
        if (deleteUrl) {
            $('#confirmDeleteButton').data('url', deleteUrl); 
            $('#deleteModal').modal('show'); 
        } else {
            alert('URL untuk penghapusan tidak ditemukan!');
        }
    });

    $('#confirmDeleteButton').on('click', function(e) {
        e.preventDefault();
        var deleteUrl = $(this).data('url'); 
        if (deleteUrl) {
            $.ajax({
                url: deleteUrl,
                type: 'POST',
                dataType: 'json', 
                success: function(response) {
                    if (response.status === 'success') {
                        $('#deleteModal').modal('hide'); 
                        location.reload(); 
                    } else {
                        alert('Gagal menghapus data: ' + (response.message || ''));
                    }
                },
                error: function(xhr, status, error) {
                    alert('Terjadi kesalahan: ' + xhr.responseText);
                }
            });
        } else {
            alert('URL untuk penghapusan tidak valid!');
        }
    });
</script>

<!-- Script dropdown kecamatan -->
<script type="text/javascript">
    $(document).ready(function() {
        $('#kecamatanUsaha').on('change', function() {
            var kecamatan = $(this).val(); // Ambil nilai kecamatan yang dipilih
            $.ajax({
                url: baseURL + 'Data_Perusahaan/filter_by_kecamatan', // URL ke controller
                type: 'GET',
                data: { kecamatan_usaha: kecamatan },
                dataType: 'html',
                success: function(response) {
                    $('.table-responsive').html(response); // Update tabel dengan data baru
                },
                error: function(xhr, status, error) {
                    alert('Terjadi kesalahan: ' + xhr.responseText);
                }
            });
        });
    });
</script>
</body>
</html>
