<?php
$domain = $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER["HTTP_HOST"];
$url = $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER["HTTP_HOST"] . $_SERVER['REQUEST_URI'];
date_default_timezone_set("Europe/Istanbul");
$time = time();
$date_mc = strval(date('d.m.Y H:i:s'));
function getIP()
{
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    if (strstr($ip, ",")) {
        $ip = explode(",", $ip);
        $ip = $ip[0];
    }
    return strval($ip);
}

$get_ip_address = getIP();
?>
<!DOCTYPE html>
<html lang="tr-TR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Deprem - Yardım</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Inter:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&amp;display=swap">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.2/css/jquery.dataTables.min.css">
    <style>
        .dataTables_wrapper .dataTables_length, .dataTables_wrapper .dataTables_filter, .dataTables_wrapper .dataTables_info, .dataTables_wrapper .dataTables_processing, .dataTables_wrapper .dataTables_paginate {
            font-size: 12px;
            color: #4e5d78;
        }
    </style>
    <style>
        .dataTables_wrapper .dataTables_length, .dataTables_wrapper .dataTables_filter, .dataTables_wrapper .dataTables_info, .dataTables_wrapper .dataTables_processing, .dataTables_wrapper .dataTables_paginate{
            font-size: 12px !important;
            color: #657a9f !important;
        }
        .dataTables_wrapper .dataTables_length select{
            border-radius: 0.5rem !important;
            border-color: #454450 !important;
            color: #fff !important;
        }
        .dataTables_wrapper .dataTables_length option{
            background: #454450 !important;
        }
        .dataTables_wrapper .dataTables_filter input {
            border-radius: 0.5rem !important;
            border-color: #454450 !important;
            outline: 0 !important;
            color: #fff !important;
        }
        table.dataTable thead>tr>th.sorting, table.dataTable thead>tr>th.sorting_asc, table.dataTable thead>tr>th.sorting_desc, table.dataTable thead>tr>th.sorting_asc_disabled, table.dataTable thead>tr>th.sorting_desc_disabled, table.dataTable thead>tr>td.sorting, table.dataTable thead>tr>td.sorting_asc, table.dataTable thead>tr>td.sorting_desc, table.dataTable thead>tr>td.sorting_asc_disabled, table.dataTable thead>tr>td.sorting_desc_disabled{
            font-size: 12px !important;
        }
        table.dataTable tbody th, table.dataTable tbody td{
            font-size: 12px !important;
        }
    </style>
</head>

<body>
<?php include __DIR__ . "/components/nav.php" ?>


<div class="container my-5">
    <section>
        <div class="container bg-dark py-5  mb-4" style="overflow-x: auto">
            <form action="" method="POST">
                <?php
                if (isset($_POST["post-help-number"])) {
                    $company = trim(filter_input(INPUT_POST, 'company', FILTER_SANITIZE_STRING));
                    $location = trim(filter_input(INPUT_POST, 'location', FILTER_SANITIZE_STRING));
                    $telephone = trim(filter_input(INPUT_POST, 'telephone', FILTER_SANITIZE_STRING));
                    $subject = trim(filter_input(INPUT_POST, 'subject', FILTER_SANITIZE_STRING));
                    if (empty($company) || empty($location) || empty($telephone) || empty($subject)) {
                        $is_invalid = true;
                        ?>
                        <div class="alert alert-warning" role="alert">
                            Lütfen boş alan bırakmayın!
                        </div>
                        <?php
                    } else {

                        try {

                            $db = new PDO("mysql:host=localhost;dbname=depremyardim_me", "depremyardim_me", "AxgjT7Kz4Mbg");
                            $db->exec("SET NAMES utf8");
                            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                            $ekle = $db->prepare("INSERT INTO acil_numaralar SET time=?,date_mc=?, company=?, location=?, telephone=?, subject=?, ip_address=?");
                            $insert = $ekle->execute([
                                $time,
                                $date_mc,
                                $company,
                                $location,
                                $telephone,
                                $subject,
                                $get_ip_address
                            ]);

                            if ($insert) {


                                ?>
                                <div class="alert alert-success" role="alert">
                                    Tebrikler! Başarılı bir şekilde yardım çağrınız alındı.
                                </div>
                                <?php
                            } else {
                                echo "sorun var";
                            }

                        } catch (PDOException $e) {
                            echo $e->getMessage();
                        }

                    }
                }
                ?>
                <div class="input-group mb-3">

                    <input type="text" class="form-control bg-dark text-white <?= isset($is_invalid) && $is_invalid === true ? "is-invalid" : null ?>" name="company" placeholder="Ad Soyad veya Firma">
                    <input type="text" class="form-control bg-dark text-white <?= isset($is_invalid) && $is_invalid === true ? "is-invalid" : null ?>" name="location" placeholder="Konum">
                </div>

                <div class="input-group mb-3">

                    <input type="text" name="telephone" class="form-control bg-dark text-white <?= isset($is_invalid) && $is_invalid === true ? "is-invalid" : null ?>"
                           placeholder="Telefon Numarası">
                    <input type="text" class="form-control bg-dark text-white <?= isset($is_invalid) && $is_invalid === true ? "is-invalid" : null ?>" name="subject" placeholder="Yardım edilecek Konu">
                </div>


                <button class="btn btn-primary shadow btn-m d-block w-100" name="post-help-number">Listeye Ekle
                </button>
            </form>
        </div>
    </section>
    <section>
        <div class="container bg-dark py-5">
            <div class="row">
                <div class="col-md-8 col-xl-6 text-center mx-auto">
                    <h2 class="fw-bold text-success mb-2">Yardımcı Kişilerin Numaraları</h2>

                </div>
            </div>


            <table class="table" id="myTable">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Ad Soyad veya Firma</th>
                    <th scope="col">Konum</th>
                    <th scope="col">Numara</th>
                    <th scope="col">Yardımcı Olacağı Konu</th>
                </tr>
                </thead>
                <tbody>
                <?php

                try {

                    $baglanti = new PDO("mysql:host=localhost;dbname=depremyardim_me", "depremyardim_me", "AxgjT7Kz4Mbg");
                    $baglanti->exec("SET NAMES utf8");
                    $baglanti->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                    $sorgu = $baglanti->prepare("SELECT * FROM acil_numaralar");
                    $sorgu->execute();


                    while ($cikti = $sorgu->fetch(PDO::FETCH_OBJ)) {


                        ?>
                        <tr>
                            <th scope="row"><?= $cikti->id ?></th>
                            <td><?= $cikti->company ?></td>
                            <td><?= $cikti->location ?></td>
                            <td><?= $cikti->telephone ?></td>
                            <td><?= $cikti->subject ?></td>
                        </tr>
                        <?php


                    }

                } catch (PDOException $e) {
                    die($e->getMessage());
                }

                $baglanti = null;

                ?>

                </tbody>
            </table>
        </div>
    </section>
</div>

<?php require __DIR__ . "/components/footer.php" ?>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/js/bold-and-dark.js"></script>
<script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
<script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
<script src="https://rawgit.com/RobinHerbots/jquery.inputmask/3.x/dist/jquery.inputmask.bundle.js"></script>
<script>
    $('input[name="telephone"]').inputmask("(999) 999 99 99");
    $(document).ready( function () {
        $('#myTable').DataTable({
            language: {
                searchPlaceholder: "Kayıt ara...",
                emptyTable: "Tabloda henüz veri yok",
                info: "_TOTAL_ kayıttan _START_ ile _END_ aralığı gösteriliyor.",
                infoEmpty: "",
                lengthMenu: "Sayfada _MENU_ kayıt göster",
                loadingRecords: "Yükleniyor...",
                search: "Kayıt ara...",
                paginate: {
                    first: "İlk",
                    last: "Son",
                    next: "Sonraki",
                    previous: "Önceki"
                },
                zeroRecords: "Sonuç bulunamadı!",
                infoFiltered: "(_MAX_ kayıt içerisinde filtrelendi)",
            }
        });
    } );
</script>
<style>
    .dataTables_wrapper .dataTables_paginate .paginate_button.current, .dataTables_wrapper .dataTables_paginate .paginate_button.current:hover{
        background-color: #06a0b2 !important;
        border-radius: 0.5rem !important;
        color: #fff !important;
    }
    .dataTables_wrapper .dataTables_paginate .paginate_button.current, .dataTables_wrapper .dataTables_paginate .paginate_button.current:hover{
        color: #fff;
    }
</style>
</body>

</html>
