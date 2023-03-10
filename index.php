<?php
date_default_timezone_set("Europe/Istanbul");
?>
<!DOCTYPE html>
<html lang="tr-TR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Deprem - Yardım</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&amp;display=swap">
</head>

<body>
    <?php include __DIR__ . "/components/nav.php" ?>

  <section>
    <div class="container bg-dark py-5 mb-2">
        <div class="row">
            <div class="col px-4">
        <p>Yardım çağrısında bulunmak isteyen vatanadaşlarımız veya bir yakınının enkaz altında olduğunu yaymak için butona basarak bildiri oluşturabilirsiniz.</p>
    </div>
    <div class="col">
        <a href="/yardim-cagrisi.php" class="btn btn-primary shadow btn-lg d-block w-100 float-right">Yardım Çağrısı</a>
    </div>
    </div>
    </div>
  </section>
    <section>
        <div class="container bg-dark py-5" style="display: flex; flex-direction: column;">
            <div class="row">
                <div class="col-md-8 col-xl-6 text-center mx-auto">
                    <h2 class="fw-bold text-success mb-2">Enkaz Altında Kalan Kişilerin Konumları</h2>
                   
                </div>
            </div>
            <a class="btn btn-primary shadow" role="button" href="/yardim-isteyenler.php">Listeyi görüntüle</a>
<!--            <div class="py-5 p-lg-5">-->
<!--                <div class="row row-cols-1 row-cols-md-2 mx-auto" style="max-width: 900px;">-->
<!--                    <div class="col mb-5">-->
<!--                        <div class="card shadow-sm">-->
<!--                            <div class="card-body px-2 py-3 px-md-5">-->
<!--                                <div class="bs-icon-lg d-flex justify-content-center align-items-center mb-3 bs-icon" style="top: 1rem;right: 1rem;position: absolute;"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-bell text-success">-->
<!--                                        <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zM8 1.918l-.797.161A4.002 4.002 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4.002 4.002 0 0 0-3.203-3.92L8 1.917zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5.002 5.002 0 0 1 13 6c0 .88.32 4.2 1.22 6z"></path>-->
<!--                                    </svg></div>-->
<!--                                <h5 class="fw-bold card-title">Muhammed Bayar&nbsp;</h5>-->
<!--                                <p class="text-muted card-text mb-4">Gaziantep/İslahiye Hacı Ali Öztürk Mahallesi eski SGK karşıs.</p>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--           -->
<!--                  -->
<!--                    -->
<!--                </div>-->
<!--            </div>-->
        </div>
    </section>

    <section class="py-5 mt-5">
        <div class="container py-5">
            <div class="row mb-5">
                <div class="col-md-8 col-xl-6 text-center mx-auto">
                    <p class="fw-bold text-success mb-2">Tavsiyeler</p>
                    <h2 class="fw-bold"><strong>Ülkemizdeki Profesörlerden Tavsiyeler</strong></h2>

                </div>
            </div>
            <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-3 d-sm-flex justify-content-sm-center">
                <div class="col mb-4">
                    <div class="d-flex flex-column align-items-center align-items-sm-start">
                        <p class="bg-dark border rounded border-dark p-4">Deprem bölgesindeki arkadaşlar, arabalarınızı kullanıp, trafiği kilitlemeyin. Sağlıklı iseniz evinizi terk edin varsa toplanma bölgelerine gidin. Evden çıkmadan elektriği, doğal gazı, suyu kapatın. Telf’lara sarılmayın, interneti tercih edin.</p>
                        <div class="d-flex"><img class="rounded-circle flex-shrink-0 me-3 fit-cover" width="50" height="50" src="naci.jpg">
                            <div>
                                <p class="fw-bold text-primary mb-0">
                                    Prof. Dr. Naci Görür</p>
                                <p class="text-muted mb-0">Vatandaşlara Uyarısı</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col mb-4">
                    <div class="d-flex flex-column align-items-center align-items-sm-start">
                        <p class="bg-dark border rounded border-dark p-4">6.6 şiddetine kadar artçılar yaşanabilir. Deprem riski kesinlikle geçmiş değil. Evde veya iş yerinde sakın bulunmayın.</p>
                        <div class="d-flex"><img class="rounded-circle flex-shrink-0 me-3 fit-cover" width="50" height="50" src="celal.jpg">
                            <div>
                                <p class="fw-bold text-primary mb-0">Celal Şengör</p>
                                <p class="text-muted mb-0">Vatandaşlara Uyarısı</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col mb-4">
                    <div class="d-flex flex-column align-items-center align-items-sm-start">
                        <p class="bg-dark border rounded border-dark p-4">Millete olan borcunuzu ödeme zamanı. Başta inşaat şirketleri olmak üzere tekstil firmaları, ilaç firmaları, büyük marketler, jeneratör firmaları, gıda ve içecek şirketleri acilen tüm imkanlarıyla seferber olmalı. Gün bugün.</p>
                        <div class="d-flex"><img class="rounded-circle flex-shrink-0 me-3 fit-cover" width="50" height="50" src="ilber.jpg">
                            <div>
                                <p class="fw-bold text-primary mb-0">İlber Ortaylı</p>
                                <p class="text-muted mb-0">Halka Çağrı</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="py-5">
        <div class="container">
            <div class="row mb-5">
                <div class="col-md-8 col-xl-6 text-center mx-auto">
                    <h3 class="fw-bold text-success mb-2">Bizimle İletişime Geç</h3>
                    
                </div>
            </div>
            <div class="row d-flex justify-content-center">
<!--                <div class="col-md-6 col-xl-4">-->
<!--                    <div>-->
<!--                        <form class="p-3 p-xl-4" method="post">-->
<!--                            <div class="mb-3"><input class="form-control" type="text" id="name-1" name="name" placeholder="İsim"></div>-->
<!--                            <div class="mb-3"><input class="form-control" type="email" id="email-1" name="email" placeholder="E-posta"></div>-->
<!--                            <div class="mb-3"><textarea class="form-control" id="message-1" name="message" rows="6" placeholder="Mesaj"></textarea></div>-->
<!--                            <div><button class="btn btn-primary shadow d-block w-100" type="submit">Gönder </button></div>-->
<!--                        </form>-->
<!--                    </div>-->
<!--                </div>-->
                <div class="col-md-4 col-xl-4 col-md-12 col-xl-12 d-flex justify-content-center justify-content-xl-start">
                    <div class="d-flex flex-wrap flex-md-column justify-content-md-start align-items-md-start h-100">
<!--                        <div class="d-flex align-items-center p-3">-->
<!--                            <div class="bs-icon-md bs-icon-circle bs-icon-primary shadow d-flex flex-shrink-0 justify-content-center align-items-center d-inline-block bs-icon bs-icon-md"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-telephone">-->
<!--                                    <path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"></path>-->
<!--                                </svg></div>-->
<!--                            <div class="px-2">-->
<!--                                <h6 class="fw-bold mb-0">Telefon</h6>-->
<!--                                <p class="text-muted mb-0">+000000000</p>-->
<!--                            </div>-->
<!--                        </div>-->
                        <div class="d-flex align-items-center p-3">
                            <div class="bs-icon-md bs-icon-circle bs-icon-primary shadow d-flex flex-shrink-0 justify-content-center align-items-center d-inline-block bs-icon bs-icon-md"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-envelope">
                                    <path fill-rule="evenodd" d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z"></path>
                                </svg></div>
                            <div class="px-2">
                                <h6 class="fw-bold mb-0">E-posta</h6>
                                <p class="text-muted mb-0">info@mevlutcelik.com</p>
                            </div>
                        </div>
                        <div class="d-flex align-items-center p-3">
                            <div class="bs-icon-md bs-icon-circle bs-icon-primary shadow d-flex flex-shrink-0 justify-content-center align-items-center d-inline-block bs-icon bs-icon-md"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-envelope">
                                    <path fill-rule="evenodd" d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z"></path>
                                </svg></div>
                            <div class="px-2">
                                <h6 class="fw-bold mb-0">E-posta</h6>
                                <p class="text-muted mb-0">huseyin@huseyingms.com</p>
                            </div>
                        </div>
                      
                    </div>
                </div>
            </div>
        </div>
    </section>
 
    <?php require __DIR__ . "/components/footer.php" ?>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bold-and-dark.js"></script>
</body>

</html>