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
                    <h2 class="fw-bold text-success mb-2">Mersin Şehir Hastanesinde Olan Yaralılar</h2>
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

        let dataSet = `
    1- Selma ALEV (Hatay) 50 yaş, sol kol kesilebilir, HT VAR.
    2- Gönül KARTAL (Hatay) 47 yaş, boyunda ağrı, ht yok.
    3- Zeynep YÜKSEK (K.Maraş) 75 yaş, sağ ayak kırık, ht yok.
    4- İsa ÇULHACI (Hatay) 51 yaş, göğüs ağrısı, ht yok.
    5- Sevgi HATİPOĞLU (Hatay) 30 yaş, kafa ve kollarda yara, ht yok.
    6- Yiğit Ali HATİPOĞLU (Hatay) 4 yaş, hafif sıyrıklar, ht yok.
    7- Gülbahar ÇULHACI (Hatay) 50 yaş, hafif sıyrıklar, ht yok.
    8- Yeliz KAYA (İskenderun) 44 yaş, hafif sıyrıklar, ht yok.
    9- Ökkeş ÇEKER (İskenderun) 52 yaş, hafif sıyrıklar, ht yok.
    10- Ali ALEV (Hatay) 50 yaş, hafif sıyrıklar, ht yok.
    11-Aleyna YILDIZ (İskenderun)15 yaş -sol bacak kırık hayati tehlike yok
    12-Mehmet KAYA (İskenderun)48 yaş.yüz ve baş bölgesi yara var .hayati tehlikesi yok
    13-Sema Nur Kaya (İskenderun) 18 yaş yüzde sıyrıklar ve bel ağrısı var.hayati tehlike yok
    14-Esma Nur Kaya (İskenderun) 22 yaş basit sıyrıklar ve göğüs ağrısı mevcut.hayati tehlike yok.
    15-Münevver Öztürk (İskenderun) 49 yaş basit sıyrıklar.hayati tehlike yok
    16-Türkan Durmaz (Hatay )61 yaş omuzda ağrı mevcut hayati tehlikesi yok
    17-Nahide Durmaz (Hatay )64 yaş göğüs ağrısı mevcut hayati tehlikesi yok.
    18-Günay Öztürk (İskenderun) 24 yaş basit siyrik ve ağrı mevcut hayati tehlikesi yok
    19-Yasin Yıldız ( Hatay )18 yaş bacakta ağrı Hayati tehlike yok
    20-Ömür keremoglu 14 yaş hayati tehlike yok (hatay)
    21-Sude Naz Demirel 15 yaş (Hatay )hayati tehlike yok
    22-Seyha Demirel 19 yaş sol ayak kırık ameliyat olacak (Hatay )
    23-Ayse Uygur (Hatay) 76 yaş göğüs ağrısı hayatı tehlike yok
    24-Ahmet Ali uygur 75 yaş (Hatay )ayakta ağrı Hayati tehlike yok
    25-hatice Nurdan Girik 39 yaş  (Hatay )vücutta ağrı Hayati tehlike yok
    26-Ümmü Şahin (Kırıkhan) 57 yaş belde ağrı Hayati tehlike yok
    27-Reyhan Açar(Hatay)17 yaş kol ve bacakta hasar Hayati tehlike yok
    28-Ömer Keremoglu (Hatay)14 yaş bacakta ağrı Hayati tehlike yok
    29- Mukaddes Çakır (Hatay) 24 yaş kol ve omuzda ağrı Hayati tehlike yok
    30-Ayse Karabulut (İskenderun) 57 yaş göğüs ağrısı Hayati tehlike yok
    31-Özgur Şah (İskenderun) 15 yaş kol ve bacakta ağrı Hayati tehlike yok
    32-irem Zeren Öztürk (Maraş)33 yaş bel ve göğüs ağrısı Hayati tehlike yok
    33-nigar aydın (İskenderun)15 yaş kol ve bacak hasar Hayati tehlike yok
    34-fatma yüzgeç (Hatay)15 yaş bacakta ağrı Hayati tehlike yok
    35-ebubekir Sıtkı Ayhan(Hatay)55 yaş kol ve bacakta yara mevcut Hayati tehlike yok
    36-Sidal Yıldız(İskenderun)17 yaş kol ve bacak ağrısı Hayati tehlike yok
    37-Mustafa Oktay(Hatay)55 yaş baş kısmı ve ayakta yara mevcut Hayati tehlike yok
    38-Zeynep Gucdemir (g.antep)66 yaş göğüs ağrısı Hayati tehlike yok
    39-Guler Şah (İskenderun)32 yaş kol ve bacakta ağrı Hayati tehlike yok
    40-irem Özcan (Hatay)23 yaş kol ve bacakta ağrı Hayati tehlike yok
    41-ekrem özcan (Hatay) 15 yaş kol ve bacakta ağrı Hayati tehlike yok
    42-Songül Özcan (Hatay)23 yaş kol ve bacak ağrısı Hayati tehlike yok
    43-Onder Yüzgeç (Hatay) 39 yaş kol ve bacakta ağrı Hayati tehlike yok
    44-gokhan yüzgeç (Hatay)24 yaş kol ve bacak ağrısı Hayati tehlike yok
    45-can Polat(İskenderun)15 yaş sağ bacak kırık hayati tehlikesi yok
    46-mert can şahin (İskenderun)13 yaş baş yüz ve ayakta yara izi mevcut. hayati tehlikesi bulunmuyor.
    47-bahar akçivi (Hatay)24 yaş ASTSUBAY gebe Hayati tehlike yok
    48-Yusuf Muhammet Aydoğdu (Hatay)20 yaş sağ ayak kırık hayati tehlike yok
    49-Levin Koyuncu (Mersin)25 yaş sağ el yaralı Hayati tehlike yok
    50-Gülay Şah (İskenderun) 28 yaş hayati tehlikesi yok
    51-GüngörTIPKI (Osmaniye ili)30 yaş 17:05 itibariyle EX
    52-Celile Sabancı (Hatay)50 yaş Hayati tehlike yok
    53-Meryem Sarı (Hatay)30 yaş hayati tehlikesi yok
    54-Adva Baslioglu(Hatay) 28 yaş HAYATİ TEHLİKE MEVCUT
    55-Akıl Baslioglu (Hatay)59 yaş Hayati tehlike yok
    56-Suleyman Demirkol (Hatay)21 yaş hayati tehlike yok kırıkları mevcut
    57-Kezban Demirkol (Hatay)40 Hayati tehlike yok
    58-Asif Demirkol (Hatay)23 yaş hayati tehlikesi yok
    59-Mehmet KILIÇ (Hatay)33 yaş hayati tehlikesi yok
    60-OzlemGoruroglu(Hatay)37 yaş hayati tehlikesi yok
    61-celal erdem (antakya ) 26 yaş hayati tehlikesi yok
    62=hasret faize şapsu (hatay) 33 hayati tehlikesi yok
    63-bebek kader Yıldız 0 yas (0smaniye) Hayati tehlikesi yok
    64-bebek susen 0 yaş (osmaniye) Hayati tehlike mevcut
    65-bebek el feridi 0 yaş (Osmaniye)
    66-bebek el misri 0 yaş (Osmaniye)hayati tehlike mevcut
    67-fatma keskin uysal 38 yas (hatay) Hayati tehlikesi yok
    68-eliz uysal 1 yaş (hatay) hayati tehlikesi yok
    69-emir uysal 6 yaş (hatay) Hayati tehlikesi yok
    70-izzet kaya 35 yas (hatay) hayati tehlikesi yok
    71-mertcan sahin (hatay ) 28 yaş hayati tehlikesi yok
    72-can polat şahin İskenderun Hayati tehlikesi yok
    73-ferhat kocadağ (iskenderun)Hayati tehlikesi mevcut
    74-y. Muhammed Aydoğdu yaş 23 (Kırıkhan) hayati tehlike yok
    75-suveyde ozsoy (Osmaniye) yas 76 Hayati tehlike mevcut
    76-ozkan uçar (hatay) hayati tehlikesi yok
    77- kimliksiz erkek bebek 1 (hatay) hayati tehlikesi mevcut
    78-kimliksiz erkek bebek 2 (Hatay) Hayati tehlike mevcut
    79-Asli veli Pasaoglu 21 yaş (osmaniye) Hayati tehlike yok
    80-cemre ekmekci (Hatay) hayati tehlike yok
    81-kimliksiz erkek bebek 3 (ISKENDERUN) Hayati tehlike mevcut
    82-kimliksiz bebek 4 (İskenderun) hayati tehlike mevcut
    83-akil Baslioglu 40 yas (hatay) hayati tehlikesi yok
    84-adva Baslioglu (hatay) hayati tehlikesi yok
    85-meryem sarı (hatay) Hayati tehlike yok
    86-merve avcı (iskenderun) Hayati tehlike yok
    87-celile Sabancı  yaş 50 (hatay) hayati tehlikesi yok
    88-asif demirkol 30 yaş (hatay) hayati tehlikesi yok
    89-kezban demirkol Yas 30 (hatay) Hayati tehlike yok
    90-suleyman  demirkol yas 30 (hatay) hayati tehlikesi yok
    91- m. Ali kutlay yaş 23 (hatay) hayati tehlikesi yok
    92-mehmet kilic yas 30 (hatay) hayati tehlikesi yok
    93-kimliksiz bebek enginar (hatay) hayati tehlikesi mevcut
    94-hamdi kuran yaş 30 (osmaniye) Hayati tehlike yok
    95-zeynep yarar yaş 10 (İskenderun) Hayati tehlike yok
    96-nilay uyanik yaş 27 (iskenderun) Hayati tehlikesi yok
    97-m. Ali uyanik yaş 33 (iskenderun) Hayati tehlikesi yok
    98- hacer tumkaya yas 41 (hatay) hayati tehlikesi yok
    99-ahmet tumkaya yas 12 (hatay) hayati tehlikesi yok
    100-zeynep Karakas yas 67 (malatya) hayati tehlikesi mevcut
    101-asel amine avcı  yaş 13 (Iskenderun) Hayati tehlikesi yok
    102-kadir avcı yas 11 (İskenderun) Hayati tehlike yok
    103-oktay karakas (hatay) hayati tehlikesi yok
    104-muzeyyen tutku yaş 58 (hatay) hayati tehlikesi yok
    105- bebek uyumaz (hatay) hayati tehlikesi yok
    106-yesim kanat (İskenderun) Hayati tehlike yok
    107-şimen kanat (iskenderun) Hayati tehlikesi yok
    108-elmas kanat yaş 65 (İskenderun) Hayati tehlike yok
    109- ahmet şah  Yaş 60 (hatay) hayati tehlikesi yok
    110-esra dönmez (hatay) Hayati tehlike mevcut
    111-meryem cetinkaya yaş 30 (hatay) hayati tehlikesi mevcut
    112-zeynep rukiye orak yas 25 (İskenderun) Hayati tehlike yok
    113-nisa gumus 22 (HATAY) hayati tehlikesi yok
    114-senanur car yas 28 (hatay) hayati tehlikesi yok
    115-ahmet sağrabi  Yas 48 (hatay) Hayati tehlike yok
    116-eser cagviroglu yas 32 (hatay) hayati tehlikesi mevcut
    117-reyhan elhasan yas 30 (hatay) hayati tehlikesi mevcut
    118-Abdurrahim arslan 33 yaş (antakya) ex
    119-vahap kimliksiz Yaş 30 (hatay) hayati tehlikesi mevcut
    120-zehra şahin yaş 38 (hatay) hayati tehlikesi mevcut
    121-baran dolaşan yaş 20 (hatay) EX
    122-perihan bayraktar yas 69 (hatay) hayati tehlikesi mevcut
    123-mehmet demirkol yaş 48 (hatay) hayati tehlikesi mevcut
    124-kimliksiz gümüş  Yaş 13 (hatay) hayati tehlikesi mevcut
    125-suzan yeşil yaş 61 (hatay)  hayati tehlikesi yok
    126-umit sevinç yaş 31 (hatay) hayati tehlikesi yok
    127-reis osman yaş 30 (hatay) hayati tehlikesi yok
    128-arzu yesil yaş 15 (hatay) hayati tehlikesi yok
    129-latife yeşil  yaş 36 (hatay) hayati tehlikesi yok
    130-mehmet sukru yesil yas 39 (hatay) hayati tehlikesi yok
    131-ayse sahan yas 40 (hatay) hayati tehlikesi yok
    132-adem sahan yas 44 ( hatay) hayati tehlikesi yok
    133-hasan gümüş Yaş 40 (hatay) hayati tehlikesi yok
    134-yakup soysal yas 13 (hatay) hayati tehlikesi yok
    135-shaam alaghja yas 24 (hatay) hayati tehlikesi mevcut
    136-seda şimşek  yas 32 (Maraş) hayati tehlikesi yok
    137-samet disçi yas 16 (nurdagi) hayati tehlikesi yok
    138-gullu ozkaya yaş 30 (antep) hayati tehlikesi yok
    139-yasemin ozkaya yaş 30 (Antep) hayati tehlikesi yok
    140-hasan kocaker yas 56 (maras) hayati tehlikesi yok
    141-okkes çelik yas 75 (osmaniye) Hayati tehlike yok
    142-fatime karkut yaş 32 (iskenderun)hayati tehlikesi mevcut
    143-ali okay yaş 57 (antakya) hayati tehlikesi yok
    144-nihat aydinlioglu yaş 30 (hatay) hayati tehlikesi yok
    145-celal erdem yaş 28 (antakya) hayati tehlike yok
    146-Hasret Faize Şapso Yaş 45 (Hatay) Hayati tehlike yok
    147-Semra Öncü yaş-31 (Hatay) hayati tehlikesi yok
    148-Hakan Keskin yaş-21 (Hatay) hayati tehlikesi yok
    149-Meryem Yumak yaş-24 (Hatay) Hayati tehlike yok
    150-Meryem Yıldız yaş-59 hayati tehlikesi yok
    151-Kimliksiz erkek şahıs yaş-30 (İskenderun) hayati tehlike mevcut
    152-Mediha Demirci yaş-30 (Hatay) hayati tehlikesi yok
    153-Esra Uysal yaş-34 hayati tehlike yok
    154-Abdurrahim Hallek yaş-30 (Hatay) hayati tehlike yok
    155-Nibel Hellak yaş-30 hayati tehlike yok
    156-sebnem celik kocadağ  yaş 41 (hatay) hayati tehlikesi yok
    157-sezai deniz kocadağ  yas 27 (İskenderun) Hayati tehlike yok
    158-esin boyraz yas 18 (İskenderun) osmaniye
    159-kimliksiz erkek yas 30 (osmaniye) Hayati tehlike yok
    160-murat kert yas 48 (İskenderun ) Hayati tehlike yok
    161-neslihan güler  yas 17 (İskenderun) Hayati tehlike mevcut
    162-ertugrul kadir karaca yas 30 (hatay antakya) hayati tehlikesi yok
    163-cagri emre yumak yaş 30 (hatay) hayati tehlikesi yok
    164-esraa abdul rahim yas 11 (hatay) hayati tehlikesi yok
    165-sude gokbulut yas 30 (hatay) hayati tehlikesi yok
    166-Ammar Abdul Rahım yaş-15 (Hatay) hayati tehlikesi yok
    167-Alaa Abdul Rahım yaş-16 (Hatay) hayati tehlikesi yok
    168-Nevinnaz Savi yaş-30 (İskenderun) hayati tehlikesi yok
    169-Nazer Alarbinieh yaş-24 (Hatay) hayati tehlikesi yok
    170-Mehmet Yıldız yaş-30 (Hatay) hayati tehlikesi yok
    171-Seda Kurt yaş-36 (İskenderun) hayati tehlikesi var
    172-Fatmanur Doğru yaş-30 (İskenderun) hayati tehlikesi var
    173-Bedriye BEKKUR yaş-30 (Hatay) hayati tehlikesi var
    174-Randa El Habboub yaş-68 (Hatay) hayati tehlikesi var
    175-Neval Bonca yaş yaş-67 (Hatay) hayati tehlikesi var
    176-Gülay Akyürek yaş-41 (Hatay) hayati tehlikesi var
    177-Meryem Çetinkaya yaş-25 (Hatay) hayati tehlikesi yok
    178-mehmet tasdelen yas 86 (osmaniye) Hayati tehlike mevcut
    179-kimliksiz erkek hasta yas 30 (nurdagi) hayati tehlikesi mevcut
    180-fatma sude gokbukut yas 14 (hatay) hayati tehlikesi yok
    181-majd abdul rahim yas 40 (hatay) hayati tehlikesi yok
    182-şıhmüslüm parlakci yas 60 (hatay) hayati tehlikesi yok
    183-ali bereket yas 30 (İskenderun) Hayati tehlike mevcut
    184-meryem cetinkaya yas 25 (hatay) hayati tehlikesi yok
    185-neziha disci yas 51(hatay)hayati tehlikesi yok
    186-safwan helal yas 40 (hatay)hayati tehlikesi yok
    187-yusuf aydiner yas 47 (hatay) hayati tehlikesi yok
    188-mustafa şahin yas 52 (hatay) hayati tehlikesi yok
    189-Özgül Karataş yaş-25 (Hatay) hayati tehlikesi yok
    190-Ozan Hacıoğulları yaş-30 (Hatay) hayati tehlikesi yok
    191-Baran Hacıoğulları yaş-30 (Hatay) hayati tehlikesi yok
    192-Zeynel Naki Canan yaş-27 (K.Maraş) hayati tehlikesi yok
    193-Davut Oğuz Kendir yaş-28 (Hatay) hayati tehlikesi yok
    194-Ali Bayraktaroğlu yaş-30 (Hatay) hayati tehlikesi yok
    195-Ahmet Furkan Karadağ yaş-30 (Hatay) hayati tehlikesi yok
    196-Eren Yeral yaş-19 (Hatay) hayati tehlikesi yok
    197-Hasniye Yılmaz yaş-57 (Hatay) hayati tehlikesi yok
    198-Nezir Cezairlioğlu yaş-66 (Hatay) hayati tehlikesi var
    199-Kimliksiz erkek hasta yaş-30 (Hatay) hayati tehlikesi var
    200-Fethiye ARSLAN yaş - 35 (Hatay) hayatı tehlikelisi yoktur
    201-Bebek Büşra KADDEM yaş -0 ( hatay) hayatı tehlikelisi yoktur
    202-bebek Fatma Ebusak yaş -0 (hayat) hayatı tehlikelisi yoktur
    203- bebek Fatma torun yaş -0 (Hatay) hayatı tehlikelisi yoktur
    204- bebek Cevahir Cihangir yaş -0 (Hatay) hayatı tehlikelisi yoktur
    205-bebek yerman kılıç yaş-0 (Hatay) hayatı tehlikelisi yoktur
    206- bebek yasemin Ali yaş -0 ( Hatay ) hayatı tehlikelisi yoktur
    207-bebek Fatma Güleryüz yaş -0 ( Hatay) hayatı tehlikelisi yoktur
    208-bebek Cemre karabiber yaş -0( Hatay) hayatı tehlikelisi yoktur
    209-bebek hece kimliksiz yaş -0(Hatay) hayatı tehlikelisi yoktur
    210- Eda gümüş yaş -35 Hatay , hayatı tehlikelisi yoktur
    211-halil Dumanoğlu yaş -0 Hatay, hayatı tehlikelisi yoktur
    212_kadife karataş yaş-58 (Adıyaman) hayatı tehlikesi yok
    213_sultan KELEŞ yaş-68 (Osmaniye) hayatı tehlikesi var
    214_abdulrahim arslan yaş-35 (Hatay) hayatı tehlikesi yok
    215_kütay Koyuncuoğlu yas-37 (Hatay) hayatı tehlikesi yok
    216_iklim buluç yaş -11(İskenderun) hayatı tehlikesi var
    217_hatice bilir komşu yas-59(Hatay)hayatı tehlikesi yok
    218_hasine afşin yas-22(İskenderun)hayatı tehlikesi var
    219_mansur komşu yaş_69(Hatay)hayatı tehlikesi var
    220_ecem naz Türkmen yas-3(Kırıkhan)hayatı tehlikesi yok
    221_şükran nizam yas_70(Kırıkhan)hayatı tehlikesi var
    222_eda yılmaz yas-33(Hatay) hayatı tehlikesi yok
    223_gökhan tırak yas- 44 (Hatay) hayatı tehlikesi var
    224-tugce karaoglu yas 30 (hatay kirikhan) hayati tehlikesi mevcut
    225-ferda dönmez yas 30 (İskenderun) hayati tehlike mevcut
    226-nurten sungur yas 30 (hatay) hayati tehlike mevcut
    227-muhammet emran bük yas 27 (hatay) hayati tehlikesi yok
    228-vasfi bük yas 35 (hatay) hayati tehlikesi yok
    229-bebek canimoglu yas 1 (hatay) hayati tehlikesi mevcut
    230-cigdem guven yas 23 (hatay) hayati tehlikesi yok
    231-canan belen yas 30 (hatay) hayati tehlikesi yok
    232-delal belen yaş 15 (hatay) hayati tehlikesi yok
    233-ganime bük yaş 17 (hatay) hayati tehlikesi yok
    234-emine yönel yas 40 (hatay) hayati tehlikesi mevcut
    235-yeter yaman yas 30 (hatay) hayati tehlikesi mevcut
    236- Fatma ejderha yaş -0 Kahramanmaraş, hayatı tehlikelisi yoktur
    237- ejder ejderha yaş 0 - Kahramanmaraş, hayatı tehlikelisi yoktur
    238- Kübra Nur ejderha yaş 0 Kahramanmaraş, hayatı tehlikelisi yoktur
    239- Büşra Nur aytürk yaş 25 Hatay , hayatı tehlikelisi yoktur
    240- Elif Nur akyürek yaş 0 Kahramanmaraş, hayatı tehlikelisi yoktur
    241- Leyla Gürkan yaş 31 Hatay, hayatı tehlikelisi yoktur
    242- Muhammet akyürek yaş 0 Kahramanmaraş, hayatı tehlikelisi yoktur
    243- Erva akyürek yaş 0 Kahramanmaraş, hayatı tehlikelisi yoktur
    244- Bahar sesli okuyucu yaş 30 Hatay, hayatı tehlikelisi vardır
    245- gönül kalın yaş 0 Hatay, hayatı tehlikelisi vardır
    246- gufran beylen yaş 0 Hatay, hayatı tehlikelisi vardır
    247_merve kablan yas-25 (Hatay) hayatı tehlikesi yok
    248_nizam kablan yas-43 (Hatay) hayatı tehlikesi yok
    249_perihan kablan yas-35 (Hatay)hayatı tehlikesi yok
    250_bebek bozkurt yas_34 hayatı tehlikesi var
    251_bebek arslan yaş-45(Hatay) hayatı tehlikesi var
    252_ekrem kablan yas_23 (Hatay) hayatı tehlikesi yok
    253_halime Nuray bağriaçık yas-21 (Hatay)hayatı tehlikesi var
    254_ökkeş yiğit yas-41(Osmaniye) hayatı tehlikesi var
    255_mehmet arslan yas-55(Hatay) hayatı tehlikesi yok
    256_gökhan kaynak yas_39 (maraş) hayatı tehlikesi yok
    257_muzaffer Kutay kaynak yas_15 (maraş) hayatı tehlikesi var
    258-Defne Memiş yaş-1 (Hatay) hayati tehlikesi var
    259-Ahmet İldem yaş-38 (Hatay) hayati tehlikesi var
    260-Emirhan Tozlu yaş-16 (Hatay) hayati tehlikesi var
    261-Fatma Yapıcı yaş-30 (Hatay) hayati tehlikesi var
    262-Hidayet Albayrak yaş-44 (Hatay) hayati tehlikesi yok
    263-Mehmet Altunay yaş-30 (Hatay) hayati tehlikesi yok
    264-Muhammed Mustafa Seydi yaş-17 (İslahiye) hayati tehlikesi yok
    265-Selahattin Berat Seydi yaş-22 (İslahiye) hayati tehlikesi yok
    266-Osman Elosman yaş-67 (Hatay) hayati tehlikesi var
    267-Kimliksiz hasta yaş-30 (Hatay) hayati tehlikesi var
    268-Sezin Yurttagül yaş-30 (Hatay) hayati tehlikesi var
    269- Ahmet tülüce yaş 69 Osmaniye, hayatı tehlikelisi vardır
    270- Bilal İbrahim Ağat yaş 0 Hatay, hayatı tehlikelisi yoktur
    271- emir Taha kurtulan yaş 11 Hatay, hayatı tehlikelisi vardır
    272- Dilber gümüş yaş 52 Hatay, hayatı tehlikelisi yoktur
    273- salahattin gümüş yaş 58 Hatay, hayatı tehlikelisi yoktur
    274- yasemin Şerefeddin yaş 36 Hatay, hayatı tehlikelisi vardır
    275- Ferhat susmaz yaş 58 Samandağ, hayatı tehlikelisi yoktur
    276- Salahaddin taç Yıldız yaş 43 Hatay, hayatı tehlikelisi yoktur
    277- Mediha taç Yıldız yaş 43 Hatay, hayatı tehlikelisi vardır
    278- Melike emir yaş 27 Hatay, hayatı tehlikelisi yoktur
    279- Selver Doğan yaş 64 Hatay, hayatı tehlikelisi vardır
    280_fehime bilmez yas-48 (Antakya) hayatı tehlikesi yok
    281_bilal fırtına yas_ 33 (maraş) hayatı tehlikesi yok
    282_bebek çağıl yas_45 (Osmaniye) hayatı tehlikesi var
    283_gülhanım kaya yaş -37 ( Hatay) hayatı tehlikesi yok
    284_elif elhüsiyin yaş-9(Hatay)hayatı tehlikesi yok
    285_ali emir aydınlıoğlu yaş-17 (Hatay) hayatı tehlikesi yok
    286_fatma uçar yaş_52 (Hatay) hayatı tehlikesi var
    287_bebek katıtaş yas_34(Hatay) hayatı tehlikesi var
    288_ali emir aydınlıoğlu yas-9 hayatı tehlikesi yok
    289_hasan cem aydınlıoğlu yaş 9(Hatay) hayatı tehlikesi yok
    290_filiz aşkar yaş _34 (Hatay) hayatı tehlikesi yok
    291- Rag brhn aga yaş 0 Hatay, hayatı tehlikelisi yoktur
    292- emel Verda ekmekçi yaş 51 Hatay, hayatı tehlikelisi yoktur
    293- Turgut akbaba yaş 27 Kahramanmaraş, hayatı tehlikelisi yoktur
    294- yavuz akbaba yaş 26 Kahramanmaraş, hayatı tehlikelisi yoktur
    295- Yusuf Can tarar yaş 0 Hatay, hayatı tehlikelisi yoktur
    296- bebek Gizem canım oğlu yaş 0 Hatay, hayatı tehlikelisi vardır
    297- hasan fırtına yaş 5 Kahramanmaraş, hayatı tehlikelisi yoktur
    298- Mehmet yakar yaş 42 Kahramanmaraş, hayatı tehlikelisi yoktur
    299- Halil Doğan yaş 39 Kahramanmaraş, hayatı tehlikelisi yoktur
    300- dönay yurtbekler yaş 65 Antakya,. Hayatı tehlikelisi vardır
    301- Şadiye bilmez yaş 24 Antakya, Hayatı tehlikelisi yoktur
    302-fehime bilmez yas 48 (antakya) hayati tehlikesi yok
    303-bilal firtina yas 33 (maras) hayati tehlike yok
    304-bebek çagil yas 1 (osmaniye) Hayati tehlike mevcut
    305-gulhanim kaya yas 0 (hatay) hayati tehlikesi mevcut
    306-elif elhuseyin yas 0 (hatay)hayati tehlikesi mevcut
    307-ali emir aydinlioglu Yaş 9 (hatay) hayati tehlikesi mevcut
    308-fatma uçar yas 52 (hatay) hayati tehlikesi mevcut
    309-bebek katitas yas 0 (hatay) hayati tehlikesi mevcut
    310-ali emir aydinlioglu yas 9 (hatay) hayati tehlikesi mevcut
    311-hasan cem aydinlioglu yas 7(hatay)hayati tehlikesi mevcut
    312-filiz aşkar yas 30 (hatay) hayati tehlikesi mevcut
    313-Mustafa Taş yaş-67 (G.Antep) hayati tehlikesi var
    314-Sibel Sultani yaş-51 (Hatay) hayati tehlikesi yok
    315-Cem Sultani yaş-23 (Hatay) hayati tehlikesi yok
    316-Bahriye Ezel yaş-30 (Hatay) hayati tehlikesi yok
    317-Yusuf Bayrakdar yaş-15 (Hatay) hayati tehlikesi yok
    318-Ayşe Bilmez yaş-25 (Hatay) hayati tehlikesi yok
    319-İbtissem Bauhhafra yaşayış-30 (Hatay) hayati tehlikesi yok
    320-Kübra Yel yaş-25 (Hatay) hayati tehlikesi yok
    321-Dürdane Seçkin Günal yaş-79 (Nurdağı) hayati tehlikesi yok
    322-Fatma Müğrebi yaş-30 (Hatay) hayati tehlikesi yok
    323_adel zouabı yas_ 44(Antakya) hayatı tehlikesi yok
    324_hikmet günal yas_78(Antakya) hayatı tehlikesi var
    325_azize ahmethan yas_21(Antakya) hayatı tehlikesi yok
    326_ömer ahmethan yas_3(Antakya) hayatı tehlikesi var
    327_davut ahmethan yas_30 hayatı tehlikesi yok
    328_gülseher türkmen yas_6(Antakya) hayatı tehlikesi yok
    329_seadet ummak yaş.-61(Antakya)hayatı tehlikesi yok
    330_egemen kurtulan yas_25 ( Antakya) hayatı tehlikesi yok
    331_dürdane tekel yas_60(Antakya) hayatı tehlikesi yok
    332_abd Allah alzouabı yas_45 (Hatay) hayatı tehlikesi yok
    333-Aytül yıldırım yaş 0 İslahiye, hayatı tehlikelisi yoktur
    334- Ömer özer yaş 67 İslahiye, hayatı tehlikelisi vardır
    335- Duygu Avşaroğlu yaş 29 Hatay, hayatı tehlikelisi yoktur
    336- kimliksiz şahıs yaş 0 Hatay, hayatı tehlikelisi vardır
    337- Servet güvenç yaş 67 Hatay, hayatı tehlikelisi vardır
    338- Öcal esmer yaş 47 İskenderun, hayatı tehlikelisi vardır
    339- derin kirmit yaş 0 Hatay, hayatı tehlikelisi yoktur
    340- nazlı Zorlu yaş 54 Hatay, hayatı tehlikelisi yoktur
    341- Aylin Lena belikırık  yaş 0 Kahramanmaraş, hayatı tehlikelisi yoktur
    342- yuğşan Kaan çevik yaş 0 Hatay , hayatı tehlikelisi yoktur
    343- Emirali kurşun yaş 25 Hatay, EKS olmuştur.
    344_ayse sözer yas_35(Hatay)hayatı tehlikesi yok
    345_enes sözer yaş_27(Hatay) hayatı tehlikesi yok
    346_adel zouabı yas_44 (Hatay) hayatı tehlikesi var
    347_beytullah türker yad_29(Osmaniye) hayatı tehlikesi var
    348_hakan ketizmen yas_44(Maraş) hayatı tehlikesi yok
    349_cansel hacıoğulları yas_23(Maraş) hayatı tehlikesi yok
    350_furkan candan yas_9(Maraş) hayatı tehlikesi var
    351_sema deliağa yas_34 (Hatay) hayatı tehlikesi yok
    352_yunus Ekrem başceken yas_12 (Hatay) hayatı tehlikesi yok
    353_hasan simsar yas_37 (Maraş) hayatı tehlikesi yok
    354_mehmet Ali başceken yas_45 (Maraş) hayatı tehlikesi yok
    355- Fatma Reyhan Alkan yaş 0 Hatay, hayatı tehlikelisi yoktur
    356- menevşe ekelik yaş 0 Hatay, hayatı tehlikelisi yoktur
    357-osman Aygün yaş 32 Nurdağı , hayatı tehlikelisi yoktur
    358- Eray biber yaş 0 Hatay, hayatı tehlikelisi yoktur
    359- Aykan aslan yaş 0 Hatay, hayatı tehlikelisi vardır
    360- Birsen biber yaş 0 Hatay, hayatı tehlikelisi yoktur
    361- Necmettin kurt yaş 0 Hatay, hayatı tehlikelisi yoktur
    362- Saliha kurt yaş 0 Hatay, hayatı tehlikelisi yoktur
    363- Meryem Sözer yaş 18 Hatay, hayatı tehlikelisi yoktur
    364- ümit dut yaş 38 Kahramanmaraş, hayatı tehlikelisi yoktur
    365-Abdulhalik cam  yaş 64 Hatay, hayatı tehlikelisi vardır
    366-Ahmet Elşehebi yaş-30 (Hatay) hayati tehlikesi yok
    367-Hamide Hamdeş yaş-33 (Hatay) hayati tehlikesi yok
    368-Aynur Yalçınkaya yaş-20 (Gaziantep) hayati tehlikesi yok
    369-Adil Akdoğan yaş-63 (Hatay) hayati tehlikesi var
    370-Bebek Katıtaş yaş-1 (Hatay) hayati tehlikesi var
    371-Süleyman Köseyener yaş-14 (Hatay) hayati tehlikesi yok
    372-Meral Onak yaş-47 (Nurdağı) hayati tehlikesi yok
    373-Beril Köse Yener yaş-30 (Gaziantep) hayati tehlikesi yok
    374-Atra Düzgün yaş-74 (Samandağ) hayati tehlikesi var
    375-Emine Sakar yaş-30 (Hatay) hayati tehlikesi yok
    376-Kimliksiz kadın şahıs yaş-30 (İskenderun) hayati tehlikesi var
    377- Kübra küçük yaş 0 Hatay, hayatı tehlikelisi yoktur
    378- Mehmet belikırık yaş 45 Hatay, hayatı tehlikelisi yoktur
    379- Hüseyin şahitoglu yaş 0 Hatay, hayatı tehlikelisi yoktur
    380-gazani şahitoglu yaş 0 Hatay, hayatı tehlikelisi yoktur
    381- gulfem baytak yaş 0 Hatay, hayatı tehlikelisi yoktur
    382- çınar Alp yurttagül yaş 0 Hatay, hayatı tehlikelisi yoktur
    383- Merve baytak yaş 0 Hatay, hayatı tehlikelisi yoktur
    384- Hüseyin şahutoglu yaş 54 Hatay, hayatı tehlikelisi vardır
    385- Hülya kıl yaş 49 Osmaniye, hayatı tehlikelisi vardır
    386- Ali baytak yaş 45 Hatay, hayatı tehlikelisi yoktur
    387- Orhan özdeniz yaş 32 Hatay, hayatı tehlikelisi yoktur
    388-zehra akdogan yas 58 (hatay) hayati tehlikesi yok
    389-nuray belikirik yas 43 (hatay) hayati tehlikesi yok
    390-sami baran yas 34 (hatay) hayati tehlikesi yok
    391-baris yanar yas 25 (hatay) hayati tehlikesi yok
    392-kerem alparslan yas 30 (hatay) hayati tehlikesi yok
    393-feras suayip yas 33 (hatay) hayati tehlikesi yok
    394-emrecan gök yas 30 (hatay iskenderun) Hayati tehlikesi yok
    395-ahmed dehnin yas 15 (hatay) hayati tehlikesi yok
    396-adile kuyucu yas 30 (hatay) hayati tehlikesi yok
    397-aya dehnin yas 24 (hatay) hayati tehlikesi yok
    398-halime çin yas 20 (hatay) hayati tehlikesi yok
    399- Mustafa Bayraktar yaş 50 Hatay, hayatı tehlikelisi yoktur
    400-ayşe Kara yaş 51 Hatay, hayatı tehlikelisi yoktur
    401- Saliha yıldız yaş 0 Hatay, hayatı tehlikelisi yoktur
    402- Nilay ölmez yaş 27 İskenderun, hayatı tehlikelisi vardır
    403- esen arı yaş 38 İskenderun, hayatı tehlikelisi vardır
    404- Mesude güneş yaş 40 Hatay, hayatı tehlikelisi vardır
    405- tahır selcavi yaş 0 Hatay, hayatı tehlikelisi vardır
    406-fatma bayraktar yaş 32 Hatay, hayatı tehlikelisi vardır
    407- şakir bayraktar yaş 33 , Hatay, hayatı tehlikelisi vardır
    408- Mehmet Kızıldağ yaş 0 Hatay, hayatı tehlikelisi vardır
    409- Onur kartal yaş 50 , Hatay, hayatı tehlikelisi vardır
    410- Ayşe hamut yaş 0 Hatay, hayatı tehlikelisi vardır
    411- burcu Türkmen yaş 23 Hatay, hayatı tehlikelisi yoktur
    412- Süheyla Kızıldağ yaş 0 Hatay, hayatı tehlikelisi vardır
    413- aya bahro yaş 0 Hatay, hayatı tehlikelisi vardır
    414- Esma gözükücük yaş 33 Hatay, hayatı tehlikelisi vardır
    415- Osman bozkan yaş 23 İskenderun hayatı tehlikelisi vardır
    416- Mustafa karağac yaş 0 Hatay, hayatı tehlikelisi vardır
    417- nehad alderea yaş 15 Hatay, hayatı tehlikelisi vardır
    418- Nurcan kefli yaş 0 Hatay, hayatı tehlikelisi vardır
    419- Fatih Sönmez yaş 0 Hatay, hayatı tehlikelisi vardır
    420- tahar secvavi yas30 (hatay) hayati tehlikesi yok
    421-gulcan kefli yas 30 (hatay) hayati tehlikesi yok
    422-muhammed halil yas 30 (hatay) hayati tehlikesi yok
    423-gokcen yasar yas 26 (hatay) hayati tehlikesi yok
    424-ihsan akgun yas 63 (hatay) hayati tehlikesi mevcut
    425-busra ozturk yas 26 (hatay) hayati tehlikesi mevcut
    426-munire çay yas 27 (hatay) hayati tehlikesi yok
    427-nurcan tan yas 27 (hatay) hayati tehlikesi yok
    428-sultan gokmen yas 42 (hatay) hayati tehlikesi yok
    429-hiba kasur yas 30 (antakya) hayati tehlikesi yok
    430-Halil Uyan yaş-30 (Hatay) hayati tehlike var
    431-Hayrettin Aslan yaş-35 (İskenderun) hayati tehlike var
    432-Mehe Mehen Bindavıl yaş-30 (Hatay) hayati tehlike var
    433-Nazife Yağar yaş-84 (Hatay) hayati tehlike var
    434-Hanel Buger yaş-30 (Hatay) hayati tehlike yok
    435-Halil Uyan yaş-30 (Hatay) hayati tehlike yok
    436-Fatmanur Kaçman yaş-25 (İskenderun) hayati tehlike var
    437-Aysel Çelik yaş-61 (Hatay) hayati tehlike yok
    438-Mehmet Talip Dönmez yaş-30 (Hatay) hayati tehlike yok
    439-Leyla Tekek yaş-61 (Hatay) hayati tehlike var
    440-Şemse Yeral yaş-30 (Hatay) hayati tehlike yok
    441-Muhammet Emin Dokuzoğlu yaş-22 (Hatay) hayati tehlike yok
    442-Nimet Yılmaz yaş-54 (Hatay) hayati tehlike var
    443-Ahmet Çiçek yaş-68 (Hatay) hayati tehlike var
    444-Cansel Öğütmen yaş-22 (Hatay) hayati tehlike var
    445-Atra Şenorak yaş-30 (Hatay) hayati tehlike var
    446-Ali Gür Atan yaş-30 (Hatay) hayati tehlike var
    447-Adnan Betar Sekiz yaş- (Hatay) hayati tehlike var
    448-Kimliksiz erkek şahıs yaş-30 (Hatay) hayati tehlike var
    449-Necmettin Calp yaş-22 (İskenderun) hayati tehlike var
    450-Sevgi Kasapçıoğlu yaş-30 (Hatay) hayati tehlike var
    451-Reşit Yıldırım yaş-30 (Hatay) hayati tehlike var
    452-sabiye koseyener yas 30 (antep islahiye) hayati tehlike yok
    453-lin beta yas 30 (hatay) hayati tehlikesi yok
    454-muhammed beta yas 20 (hatay) hayati tehlikesi yok
    455-ayse sadettin yas 30 (hatay) hayati tehlikesi yok
    456-dilek ergin yas 36 (nurdagi) hayati tehlikesi yok
    457-faruk Vişo yas 50 (hatay) hayati tehlikesi yok
    458-demet koseyener yas 42 (antep İslahiye) hayati tehlikesi yok
    459-mosa bakar yas 30 (hatay) hayati tehlikesi yok
    460-mehmet egel yas 30 (hatay) hayati tehlikesi mevcut
    461-mehmet havran tasçi yas 60 (hatay) hayati tehlikesi mevcut
    462-megmet aşan yas 30 (hatay) hayati tehlikesi mevcut
    463-Muayyed Bay yaş-30 (Hatay) hayati tehlike var
    464-Kimliksiz erkek şahıs yaş-30 (Hatay) hayati tehlike var
    465-Mecide Şerif yaş-30 (Hatay) hayati tehlike var
    466-Kimliksiz kadın şahıs yaş-11 (Hatay) hayati tehlike var
    467-Mouayad Baal yaş-17 (Hatay) hayati tehlike var
    468-Emre Özcan yaş-17 (Hatay) hayati tehlike var
    469-Kerem Alparslan yaş-30 (Hatay) hayati tehlike var
    470-Yusuf Zan yaş-30 (Hatay) hayati tehlike var
    471-Süleyman Köseyener yaş-14 (Hatay) hayati tehlike var
    472-Sibel Aslan yaş-25 (Adıyaman) hayati tehlike var
    473-Selma Barakoğlu yaş-48 (Hatay) hayati tehlike var
    474- busra duman yas 10 (hatay) hayati tehlikesi mevcut
    475-sude sule yas 30 (hatay İskenderun) Hayati tehlike mevcut
    476-sima aburaj yas 30 (hatay) hayati tehlikesi mevcut
    477-kimliksiz oniki hasta yas 30 (hatay) hayati tehlikesi mevcut
    478-havva seber yas 17 (hatay) hayati tehlikesi mevcut
    479-esad al mansor yas 14 (hatay)hayati tehlikesi mevcut
    480 -kimliksiz onuc yas 30 (hatay) hayati tehlikesi mevcut
    481-abide koral kaplan yas 40 (hatay) hayati tehlikesi mevcut
    482-kimliksiz on dort hasta yas 10 (hatay) hayati tehlikesi mevcut
    483-esma ozcam yas 16 (hatay) hayati tehlikesi yok
    484-bekir ozcam yas 54 (hatay) hayati tehlikesi yok
    485-Zehra Akdoğan yaş-58 (Hatay) hayati tehlike var
    486-Yunus Ekrem Başçeken yaş-12 (Hatay) hayati tehlike var
    487- Senem Kurt yaş-30 (K.Maraş) hayati tehlike var
    488-Ahmet Nizami Yurtbekler yaş-45 (Hatay) hayati tehlike var
    489-Miray Yürtbekler yaş-35 (Hatay) hayati tehlike var
    490-Arda Umut Kopuk yaş-30 (Hatay) hayati tehlike var
    491-Batuhan Yürtbekler yaş-30 (Hatay) hayati tehlike var
    492-Kimliksiz kadın şahıs yaş-14 (Hatay) hayati tehlike var
    493-Masal Altunay yaş-30 (Hatay) hayati tehlike yok
    494-Erol Atahan yaş-48 (Hatay) hayati tehlike yok
    495-Havva Seber yaş-17 (Hatay) hayati tehlike yok
    496-efla butar yas 30 (hatay) hayati tehlikesi yok
    497-seyma sahin yas 25 (hatay) hayati tehlikesi yok
    498-ayse celik yas 30 (maras) hayati tehlikesi mevcut
    499-diyap tumkaya yas 11 (hatay) hayati tehlikesi yok
    500-halit guler yas (hatay) hayati tehlikesi yok
    501-yusuf kirk yas 23 (hatay) hayati tehlikesi yok
    502-yusuf batun colak yas 30 (maras) hayati tehlikesi mevcut
    503-cemile ozbek yas 30 (hatay) hayati tehlikesi yok
    504- hamide dilvin sirma yas 30 (maras) hayati tehlikesi mevcut
    505-sultan kara yas 45 (maras) EX
    506-ahmed amid yas 30 (hatay) hayati tehlikesi mevcut
    507-Orhan Bal yaş-40 (Hatay) hayati tehlike mevcut
    508- Sıtkı Bal yaş-30 (Hatay) hayati tehlike mevcut
    509- Efe Nuh yaş-15 (Hatay) hayati tehlike mevcut
    510- Mehmet Ali Gezer yaş-30 (Hatay) hayati tehlike yok
    511- Muhammet Nurbaki Bilgi yaş-32 (Hatay) hayati tehlike mevcut
    512- Aynabad Pırıyeva yaş-27 (Hatay) hayati tehlike yok
    513- İlayda Yapıcı yaş-27 (Hatay) hayati tehlike mevcut
    514- Şükran Aslan yaş-60 (İskenderun ) hayati tehlike yok
    515- Elif Yatmaz  yaş-37 (Kahramanmaraş) hayati tehlike mevcut
    516- Zeynep Erdoğdun yaş-63 (Hatay) hayati tehlike mevcut
    517- Rukiye Erdoğdun yaş-30 (Osmaniye) hayati tehlike mevcut
    518- Azim Aslan yaş-30 (Hatay) hayati tehlike mevcut
    519- Gülizar Bağcılar yaş-40 (Hatay) hayati tehlike mevcut
    520- Raneem Ied yaş-20 (Hatay) hayati tehlike mevcut
    521- Orhan Ceylan yaş-40 (İskenderun) hayati tehlike yok
    522- Mehtap Arslan Pozan yaş-45 (İskenderun) hayati tehlike mevcut
    523- Mustafa Yanar yaş-44 (İskenderun) hayati tehlike mevcut
    524- Faize Nerkiz yaş-72 (Kırıkhan) hayati tehlike mevcut
    525- Derviş Sert yaş-82 (Hatay) hayati tehlike mevcut
    526- Veli Güzeloğlu yaş-28 (Kahramanmaraş) hayati tehlike mevcut
    527- Yusuf Aldemir yaş-18 (Hatay) hayati tehlike mevcut
    528-meeve yagmur calp yas 12 (İskenderun) Hayati tehlike mevcut
    529-okkes can gunes (maras)
    Yas 22 Hayati tehlike mevcut
    530-dogus samet calp yas 24 (iskenderun) Hayati tehlikesi yok
    531-sedat kalayci yas 37 (maras) hayati tehlikesi yok
    532-gulyaren kurt yas 30 (maras) hayati tehlikesi yok
    533-mustafa colak yas 56 (hatay) hayati tehlikesi mevcut
    534-faruk wisho yas 30 (Hatay) hayati tehlikesi yok
    535-buglem kalay yes 30 (maras) hayati tehlikesi yok
    536-umut kork.az yas 21 (maras) hayati tehlikesi yok
    537-dilan altindereyas 19 (hatay) hayati tehlikesi yok
    538-gulcN keser yas 68 (hatay) hayati tehlikesi mevcut
    539-Fahrettin KURŞUN KİMLİKSİZ-İskenderun, - H.T, mevcut
    540-İdiris ALMADI. YAŞ 70 İSKENDERUN. H. T MEVCUT
    541-FATMA ALMADI. YAŞ 71 İSKENDERUN. H. T. MEVCUT
    542-ALİ TUZCU YAŞ 58 İSKENDERUN H. T. MEVCUT
    543-BEHÇET ÖZKAYA. KİMLİKSİZ. İSKENDERUN. H. T. MEVCUT
    544-GONCA KALCAN. YAŞ 42.İSKENDERUN. H.T.MEVCUT
    545-İDRİS ARIGÜLOĞLU YAŞ 58.İSKENDERUN H. T. MEVCUT
    546-HAYRİYE KESER. KİMLİKSİZ. KAHRAMAN MARAŞ H. T. MEVCUT
    547-ZELİHA NAZ GÜVERCİN YAŞ 13 ANTAKYA HT. MEVCUT
    548-NEKLA DERİNKÖK YAŞ 22 ANTAKYA H. T MEVCUT
    549 -İLHAM HULAM KİMLİKSİZ. ANTAKYA. HT. MEVCUT
    550-FATİN AHMET KİMLİKSİZ. ANTAKYA. HT YOK.
    551-NECDET MICIK. YAŞ 80.İSKENDERUN ENTUBE.
    552-ESRA ARSLAN YAŞ 28 İSKENDERUN H. T. YOK
    553-MAHMUT ÇAM YAŞ 55 ANTAKYA HT. YOK
    554-NAZLI SEVİNÇ YILDIZ. KİMLİKSİZ. ANTAKYA. HT YOK
    555-ALİ TOY. YAŞ 67 İSKENDERUN HT. YOK
    556-MUTİA ATAR YAŞ 82. İSKENDERUN HT. YOK
    557-DİDEM YANAR YAŞ 35 HATAY HT. YOK
    558-KAMURAN ALTUN BÜKEN. KİMLİKSİZ. İSKENDERUN HT. YOK.
    559-ZEHRA YILDIZ KİMLİKSİZ HATAY. HT. YOK
    560-MEHMET BELLUR. YAŞ 72.HATAY.HT.YOK
    561-MUSTAFA GÜMÜŞ. YAŞ 60 İSKENDERUN. HT. YOK.
    562-KİMLİKSİZ 15 YAŞLARINDA BAYAN. İSKENDERUN. HT. VAR.
    563-MEHMET REŞİT. KİMLİKSİZ. İSKENDERUN. HT. YOK.
    564-HAKAN YILMAZ ÇAĞAN. YAŞ10 .İSKENDERUN. HT. YOK.
    565-DURU BALCI. KİMLİKSİZ. HATAY. HT. YOK.
    566-HATİCE ASLAN. KİMLİKSİZ. ANTAKYA. HT. YOK.
    567-MENEKŞE GÜL SEVİNÇ. YAŞ 40.HATAY. HT.YOK.
    568-PINAR MISRA. YAŞ 5 HATAY HT. YOK.
    569-FADİ ABDULHAY KİMLİKSİZ. HATAY. HT. YOK.
    570-YASİN KIRDİK. KİMLİKSİZ. HATAY. HT. YOK
    571-AHMET KANAT. YAŞ 61.HATAY.HT.YOK.
    572-BEDİA POLAT. Yaş 48.ADIYAMAN. HT. YOK
    573-ONUR ARSLAN. YAŞ 23.ADIYAMAN.HT.YOK
    574-ZEHRA ÇOĞUL YAŞ. 27.OSMANİYE
    575-SERPİL TAŞ YAŞ 50 iskenderun
    576-OKTAY PEKMEZ. YAŞ 25 HATAY. HT. YOK
    577-ŞÜKRAN KEMEÇ YAŞ 43 İSKENDERUN HT YOK
    578-AHMET KUŞ YAŞ 59 ANTAKYA
    579-HSSEN ALSABSABİ YAŞ 27 ANTAKYA
    580-ALAATTİN AFŞİN YAŞ 35 İSKENDERUN
    581-İKRA BAŞAK YAŞ 21 İSKENDERUN
    582-AHMET BAŞAK YAŞ 55 İSKENDERUN
    583-AHMET ALPASLAN BAŞAK YAŞ 58 İSKENDERUN
    584-BERFİN BAŞAK YAŞ 46 İSKENDERUN
    585-NEVAL ABDULMECİT YAŞ 8 HATAY
    586-AYŞE MUYRABİ YAŞ 51 İSKENDERUN
    587-HÜSEYİN ĞAZZUL YAŞ 18
    588-KİMLİKSİZ YAŞ 4.KIZ ÇOÇUĞU İSKENDERUN
    589-AYA BARBUÇ. YAŞ 26 ANTAKYA
    590-MUSTAFA CAN GÜRBOSTAN. YAŞ 21 KAHRAMAN MARAŞ.
    591-ENVER KANAT. YAŞ 47 İSKENDERUN
    592-FAYSAL RAMAZANOĞLU. YAŞ 63 KAHRAMANMARAŞ
    593-MİKDAT ÇETİN YAŞ 75 İSKENDERUN
    594-FATMA SİM YAŞ 66 HATAY
    595-FATMA HAMAD YAŞ 22 HATAY
    596-EMANİ KAKTİ YAŞ 27 HATAY
    597- NEJLA BAYGÜL YAŞ 65 İSKENDERUN
    598-MUNE REZOK. KİMLİKSİZ. 3 YAŞ İSKENDERUN
    599-SÜHEYLA BAĞDAYLIOĞLU YAŞ 63 ANTAKYA
    600-ABIR MUHAMMED. YAŞ 47 İSKENDERUN
    601-KEMAL ÖZTÜRK. YAŞ 18 İSKENDERUN
    602-MUHAMMED EL MINDIL. YAŞ 23 İSKENDERUN
    603-ŞEHİRE ÇAVDAR YAŞ  67 İSKENDERUN
    604-RAŞA CERRAH YAŞ 34 HATAY
    605-MUHAMMED  CERRAH YAŞ 7 HATAY
    606-HÜSEYİN DÖNMEZ YAŞ 37
    607-ENVER KANAT .YAŞ 47 İSKENDERUN
    608-""GUSTE AYU KADE ENDON YAŞ 33 İSKENDERUN
    609-MUSTAFA TİLLO HOCAOĞLU YAŞ 16 ANTAKYA
    610-ALİ TAZE YAŞ 65 ANTAKYA
    611 -ŞENAY TAZE YAŞ 64 HATAY
    612-ERHAN HOCAOĞLU YAŞ 41 ANTAKYA
    613-SEYCAN CALP YAŞ 48 İSKENDERUN.
    614-MURAT CALP. YAŞ 47 İSKENDERUN`;
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