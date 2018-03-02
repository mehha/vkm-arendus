
<!DOCTYPE html>
<html lang="fi">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-114756864-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-114756864-1');
    </script>

    <meta name="description" content="VKM Trading OÜ">
    <meta name="keywords"
          content="VKM Trading OÜ">
    <meta name="author" content="FCR Media">
    <title>VKM Trading OÜ</title>
    <link rel="shortcut icon" href="favicon.ico">

    <!-- build:css -->
    <link rel="stylesheet" href="assets/css/main.css">
    <!-- endbuild -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">

</head>

<body class="pt-md-3">
<!-- Navigation -->
<nav class="navbar navbar-expand-lg">
    <div class="container">
        <div class="row w-100">
            <div class="col p-0">
                <a class="navbar-brand mb-3" href="./">
                    <img src="assets/img/logo.png" width="180px" height="auto" alt="">
                </a>
            </div>
            <div class="col p-0 text-right">
                <a class="mr-2" href="en.php"><span><img class="img-language position-relative" src="assets/img/en.png" alt=""></span></a>
                <a class="mr-md-2" href="./"><span><img class="img-language position-relative" src="assets/img/fi.png" alt=""></span></a>
                <a class="ml-auto d-block d-md-inline-block mr-md-1" href="./"><i class="fas fa-home"></i> Etusivu</a>
                <a class="d-block d-md-inline-block" href="yhteistiedote.php"><span class="m-0"><i class="fa fa-envelope fa-fw"></i> Yhteistiedote</span></a>
            </div>
        </div>
    </div>
</nav>

<section class="container">
    <div class="row text-center">
        <div class="col-md-6 p-3 p-lg-5">
            <img src="assets/img/no-image-woman-400x393.jpg" class="rounded mx-auto d-block img-thumbnail mb-4 w-sm-50" alt="">
            <p class="h2">Lea Poola</p>
            <p>Myynti- ja tuotepäällikkö</p>
            <p class="mb-1"><i class="fa fa-phone fa-fw"></i> +37253412423</p>
            <p><i class="fa fa-envelope fa-fw"></i><a href="mailto:lparcus@icloud.com"> lparcus@icloud.com</a></p>
        </div>
        <div class="col-md-6 p-3 p-lg-5">
            <img src="assets/img/toomas-400x393.jpg" class="rounded mx-auto d-block img-thumbnail mb-4 w-sm-50" alt="">
            <p class="h2">Toomas Tint</p>
            <p>Myyntipäällikkö</p>
            <p class="mb-1"><i class="fa fa-phone fa-fw"></i> +37258998845</p>
            <p><i class="fa fa-envelope fa-fw"></i><a href="mailto:toomas@starplast.ee"> toomas@starplast.ee</a></p>
        </div>
    </div>
</section>
<section class="bg-gray pt-5">
    <section class="container">
        <div class="row bg-gray row-grid">
            <div class="col-md-6 order-2 order-md-1 background-woman woman"></div>
            <div class="col-md-6 order-1 order-md-2 mb-md-5">
                <h4 class="text-center text-lg-right mb-4">Konsultoinnit</h4>
                <form id="contact-form" method="post" action="yhteistiedote.php#contact-form" role="form">
                    <div class="form-group">
                        <input type="text" class="form-control border-0" id="inputNimi" name="inputNimi" placeholder="Nimi">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control border-0" id="inputFirma" name="inputFirma" placeholder="Yritys">
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control border-0" id="email" name="email" placeholder="Sähköposti">
                    </div>
                    <div class="form-group">
                        <textarea class="form-control border-0" id="inputKonsultatsioon" name="inputKonsultatsioon" rows="5" placeholder="Kuulemisen sisältö"></textarea>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary float-right">Lähetä</button>
                </form>
                <p><strong>
                    <?php

                    use PHPMailer\PHPMailer\PHPMailer;
                    use PHPMailer\PHPMailer\Exception;

                    if(isset($_POST['submit'])) {
                        $message =
                            'Nimi:	' . $_POST['inputNimi'] . '<br />
Firma:	' . $_POST['inputFirma'] . '<br />
Email:	' . $_POST['email'] . '<br />
Konsultatsioon:	' . $_POST['inputKonsultatsioon'] . '
';

// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function


//Load composer's autoloader
                        require 'PHPMailer/src/PHPMailer.php';
                        require 'PHPMailer/src/SMTP.php';
                        require 'PHPMailer/src/Exception.php';

                        $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
                        try {
                            //Server settings
                            $mail->SMTPDebug = 2;                                 // Enable verbose debug output
//    $mail->isSMTP();                                      // Set mailer to use SMTP
                            $mail->Host = 'localhost';  // Specify main and backup SMTP servers
                            $mail->SMTPAuth = false;                               // Enable SMTP authentication
                            $mail->Username = '';                 // SMTP username
                            $mail->Password = '';                           // SMTP password
//    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
                            $mail->Port = 25;                                    // TCP port to connect to

                            //Recipients
                            $mail->SetFrom($_POST['email'], $_POST['inputNimi']);
                            $mail->addAddress('toomas@starplast.ee', 'Toomas Tint');     // Add a recipient
                            $mail->AddReplyTo($_POST['email'], $_POST['inputNimi']);
                            $mail->CharSet = "UTF-8";

                            //Content
                            // To load the French version
                            $mail->setLanguage('et', 'PHPMailer/language/phpmailer.lang-et.php');

                            $mail->isHTML(true);                                  // Set email format to HTML
                            $mail->Subject = 'Kiri VKM kodulehelt';
                            $mail->Body = 'This is the HTML message body <b>in bold!</b>';
                            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
                            $mail->MsgHTML($message);

                            $mail->send();
                            echo 'Viesti on lähetetty';
                        } catch (Exception $e) {
                            echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
                        }
                    }
                    ?>
                        </strong></p>
            </div>
        </div>
    </section>
</section>

<footer>
        <div class="container d-xl-flex align-items-center p-3">
            <p class="mb-xl-0">VKM TRADING OÜ</p>
            <p class="pl-xl-3 mb-xl-0 ml-auto"><i class="fa fa-phone fa-fw"></i>&nbsp; +372 6091403</p>
            <p class="pl-xl-3 mb-xl-0"><i class="fa fa-map-marker fa-fw"></i>&nbsp; Hansu MÜ, Uusküla küla Jõelähtme vald Harjumaa 74120</p>
            <p class="pl-xl-3 mb-xl-0"><i class="fa fa-envelope fa-fw"></i>&nbsp;<a href="mailto:info@starplast.ee">info@starplast.ee</a></p>
        </div>
</footer>

<!-- build:js -->
<script src="assets/js/main.js"></script>
<!-- endbuild -->
<script src="assets/js/fontawesome-all.min.js"></script>
<script src="assets/js/tilt.jquery.js"></script>

</body>

</html>
