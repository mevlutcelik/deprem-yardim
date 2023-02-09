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
                    <h2 class="fw-bold text-success mb-2">Ankara Şehir Hastanesinde Olan Yaralılar</h2>
                </div>
            </div>


            <table id="example" class="display" width="100%"></table>


        </div>
    </section>
</div>


<?php require __DIR__ . "/components/footer.php" ?>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/js/bold-and-dark.js"></script>
<script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
<script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function () {

        let dataSet = `KİMLİKSİZ ŞAHIS
"DİLARA ERBAŞ
HAMO COŞKUN"
KİMLİKSİZ ŞAHIS
AHMET KAYA
"FİLİZ KARACA
ZEYNEL YUMUŞAK"
KİMLİKSİZ ŞAHIS
KÜBRA TURAN
"YASEMİN REABER
MASAL ????*"
MEHMET ALİ ???
ESİN ŞAHİN
"SİNAN SERKAN ASLAN
KEZBAN AKKOÇ"
ABDULLAH YOLDAŞ
SALİH KAYA
"SEVGÜL ÇALIŞ
ORHUN TAŞ"
HACER ÇİFTÇİ
CANSU ÇAKILKAYA
"PELİN KIZIL
AHMET YASİN SÜZEN"
SEMİH OLGUN
KİMLİKSİZ ŞAHIS
"BARAN KILIÇ
İBRAHİM OLUR"
ALİ ZEBADİ
BAŞAK KAYA
"HATİCE TÜM SAVAŞ
KİMLİKSİZ ŞAHIS"
ABDULHEKİM BALBAY
ABDURRAHMAN ERTÜ
"NİLSU CEREN ERDEM
DEFNE ELİF BAYKARA"
İBRAHİM EFE ALTAN
ÖMER TOPRAK
"ZİN RATA
SEVGİ KAMIŞLI"
FURKAN KUŞLU
IRMAK KESKİN
EREN ATALAY
MEHMET GÜNAY
NEVZİYE AKUZUN
"FATMA KARAKUŞ
ZEYNEP ZEYTİN"
HÜSEYİN ABAKAY
İSA ÖZTÜRK
"HATİCE KARADUT
MURAT ALTINSOY"
SERPİL CAN
RABİA NAZARİ
"BARIŞ YAPICI
MEHMET NURİ"
FATMA DURMUŞ
ÖMER FARUK ALİOĞLU
"SEMRA ÇURUM
YUSUF ASAF AYAZ"
RABA ZABADİ
HÜLYA YILMAZ
"BAHATTİN GÖRMEZ
USEMA EL SUVEYT"
TUĞBA BİLGİÇ
BEDİRE ÇORAK
"HACI MEHMET ODUNC
İMAM HÜSEYİN KAMIŞL"
HAMDAN ÖZELCİ
SAFİYE AYAZ
"İLKER ÜMİT UYGUN
SEMİH VERTEMİR"
AYŞEGÜL ÖNCEBE
EROL ULAŞ
"KİMLİKSİZ ŞAHIS
ALİ ABDULLAH ZABADİ"
ZEYNEP GÖRMEZ
EFENDİ DEMİR
"SERKAN TAŞTAŞ
AYNUR ÖZGE GÜLSÜM"
MEHMET MUSTAFA KE
ÖMER FARUK EDİZ
"GÜLŞEN DEDE
HAVŞAN BAŞA"
MERT GAZİ İZEL
GÖNÜL KARAKAYA
HİKMET TAŞKIN
PERİHAN TUNÇ
DÜRDANE ARSLAN
KEVSER ŞİMİR
RABİA BİLGİÇ`;
        dataSet = dataSet.split("\n");
        dataSet = dataSet.map((item) => [item]);
        $('#example').DataTable({
            data: dataSet,
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
            },
            columns: [
                { title: 'Kayıt' },
            ],
        });
    });
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