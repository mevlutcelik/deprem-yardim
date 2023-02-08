<?php
$domain = $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER["HTTP_HOST"];
$url = $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER["HTTP_HOST"] . $_SERVER['REQUEST_URI'];
date_default_timezone_set("Europe/Istanbul");
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
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.2/css/jquery.dataTables.min.css">
</head>

<body>
<?php include __DIR__ . "/components/nav.php" ?>


<div class="container my-5">
    <section>
        <div class="container bg-dark py-5" style="overflow-x: auto;">
            <div class="row">
                <div class="col-md-8 col-xl-6 text-center mx-auto">
                    <h2 class="fw-bold text-success mb-2">Enkaz Altında Kalan Kişilerin Konumları</h2>

                </div>
            </div>


                    <table class="table" id="myTable">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Ad</th>
                            <th scope="col">Soyad</th>
                            <th scope="col">İletişim Numarası</th>
                            <th scope="col">Adres</th>
                            <th scope="col">Tarih</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php

                        try {

                            $baglanti = new PDO("mysql:host=localhost;dbname=depremyardim_me", "depremyardim_me", "AxgjT7Kz4Mbg");
                            $baglanti->exec("SET NAMES utf8");
                            $baglanti->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                            $sorgu = $baglanti->prepare("SELECT * FROM yardim_cagrisi");
                            $sorgu->execute();


                            while ($cikti = $sorgu->fetch(PDO::FETCH_OBJ)) {


                                ?>
                                <tr>
                                    <th scope="row"><?= $cikti->id ?></th>
                                    <td><?= $cikti->user_name ?></td>
                                    <td><?= $cikti->user_surname ?></td>
                                    <td><?= $cikti->telephone ?></td>
                                    <td><?= $cikti->address ?></td>
                                    <td><?= $cikti->date_mc ?></td>
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
<script>
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