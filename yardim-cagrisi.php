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
    </head>

    <body>
    <?php include __DIR__ . "/components/nav.php" ?>


    <div class="container">
        <h1 class="mt-5">Yardım çağrısında bulun</h1>
        <form class="mt-4 mb-5" method="POST" autocomplete="">
            <?php
            if (isset($_POST["post-yardim-cagir"])) {
                $name = trim(filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING));
                $surname = trim(filter_input(INPUT_POST, 'surname', FILTER_SANITIZE_STRING));
                $telephone = trim(filter_input(INPUT_POST, 'telephone', FILTER_SANITIZE_STRING));
                $address = trim(filter_input(INPUT_POST, 'address', FILTER_SANITIZE_STRING));
                if (empty($name) || empty($surname) || empty($address)) {
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

                        $ekle = $db->prepare("INSERT INTO yardim_cagrisi SET time=?,date_mc=?, user_name=?, user_surname=?, telephone=?, address=?, ip_address=?");
                        $insert = $ekle->execute([
                            $time,
                            $date_mc,
                            $name,
                            $surname,
                            $telephone,
                            $address,
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
            if (!isset($insert) || !$insert) {
                ?>
                <div class="form-group mb-4">
                    <label for="exampleInputEmail1">Ad</label>
                    <input type="text"
                           class="form-control bg-dark text-white <?= isset($is_invalid) && $is_invalid === true ? "is-invalid" : null ?>"
                           name="name" id="exampleInputEmail1" aria-describedby="emailHelp"
                           placeholder="Ad" required>
                </div>
                <div class="form-group mb-4">
                    <label for="exampleInputEmail1">Soyad</label>
                    <input type="text"
                           class="form-control bg-dark text-white <?= isset($is_invalid) && $is_invalid === true ? "is-invalid" : null ?>"
                           name="surname" id="exampleInputEmail1" aria-describedby="emailHelp"
                           placeholder="Soyad" required>
                </div>
                <div class="form-group mb-4">
                    <label for="exampleInputEmail1">İletişim Numarası</label>
                    <input type="text"
                           class="form-control bg-dark text-white <?= isset($is_invalid) && $is_invalid === true ? "is-invalid" : null ?>"
                           name="telephone" id="exampleInputEmail1" aria-describedby="emailHelp"
                           placeholder="İletişim Numarası">
                </div>
                <div class="form-group mb-4">
                    <label for="exampleFormControlTextarea1">Adres</label>
                    <textarea
                            class="form-control bg-dark text-white <?= isset($is_invalid) && $is_invalid === true ? "is-invalid" : null ?>"
                            required name="address" placeholder="Adres" id="exampleFormControlTextarea1"
                            rows="3"></textarea>
                </div>
                <button type="submit" name="post-yardim-cagir" class="btn btn-primary">Yardım çağır</button>
            <?php } ?>
        </form>
    </div>


    <?php require __DIR__ . "/components/footer.php" ?>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bold-and-dark.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
    <script src="https://rawgit.com/RobinHerbots/jquery.inputmask/3.x/dist/jquery.inputmask.bundle.js"></script>
    <script>
        $('input[name="telephone"]').inputmask("(999) 999 99 99");
    </script>
    </body>

    </html>
<?php $db = null; ?>