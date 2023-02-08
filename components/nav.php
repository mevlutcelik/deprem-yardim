<?php
if(!isset($domain)){
    $domain = $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER["HTTP_HOST"];
}
?>
<nav class="navbar navbar-dark navbar-expand-md sticky-top py-3" id="mainNav">
    <div class="container"><a class="navbar-brand d-flex align-items-center" href="#"><span>Deprem Yardım</span>
        </a><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-1">
            <span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navcol-1">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item"><a class="nav-link" href="<?= $domain ?>">Ana Sayfa</a></li>
                <li class="nav-item"><a class="nav-link" href="<?= $domain ?>/yardim-isteyenler.php">Yardım İsteyenler</a></li>
<!--                <li class="nav-item"><a class="nav-link" href="--><?//= $domain ?><!--/bagis-kurumlari.php">Bağış Kurumları</a></li>-->
<!--                <li class="nav-item"><a class="nav-link" href="--><?//= $domain ?><!--/acil-numaralar.php">Acil Numaralar</a></li>-->
            </ul>
            <a class="btn btn-primary shadow" role="button" href="<?= $domain ?>/yardim-cagrisi.php">Yardım çağır</a>
        </div>
    </div>
</nav>
