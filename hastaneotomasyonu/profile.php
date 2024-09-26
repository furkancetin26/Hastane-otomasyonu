<!DOCTYPE html>
<html lang="tr">
<head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <title>Profil Ekranı</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
    <?php
    session_start();
    if(isset($_SESSION["isim"])) {
        $isim = $_SESSION["isim"];
        $soyad = $_SESSION["Soyad"];
        $tcno = $_SESSION["tcno"];
        $email = $_SESSION["email"];
    ?>
    <div class="row">
        <div class="col-sm-12">
            <nav class="navbar navbar-expand-sm navbar-light bg-light">
                <div class="container">
                    <a class="navbar-brand" href="index.html"><i class="bi bi-hospital"></i>
                        Hastane Otomasyonu</a>
                    <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavId" aria-controls="collapsibleNavId"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="" id="collapsibleNavId">
                        <ul class="navbar-nav me-auto mt-2 mt-lg-0">
                            <li class="nav-item">
                                <a class="nav-link" href="doktorgiris.php" target="_blank" aria-current="page"><i class="bi bi-box-arrow-in-right m-1"></i>Doktor Giriş</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="hastagiris.php" target="_blank"><i class="bi bi-box-arrow-in-right m-1"></i>Hasta Giriş</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="hastaneyonetimigiris.php" target="_blank"><i class="bi bi-box-arrow-in-right m-1"></i>Hastane Yönetimi Giriş</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#doktorlarimiz">Doktorlarımız</a>
                            </li>
                        </ul>
                        
                    </div>
              </div>
            </nav>
        </div>
    </div>
    <div class="container mt-5">
        <div class="card">
            <div class="card-body">
                <h3 class="card-title">Profil Bilgileriniz</h3>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><strong>İsim:</strong> <?php echo $isim; ?></li>
                    <li class="list-group-item"><strong>Soyad:</strong> <?php echo $soyad; ?></li>
                    <li class="list-group-item"><strong>T.C. Kimlik No:</strong> <?php echo $tcno; ?></li>
                    <li class="list-group-item"><strong>Email:</strong> <?php echo $email; ?></li>
                </ul>
                <a href="cikis.php" class="btn btn-danger mt-3">Çıkış Yap</a>
            </div>
        </div>
    </div>
    <?php
    } else {
        echo "Bu sayfayı görüntüleme yetkiniz yoktur";
    }
    ?>
    
    <div class="row">
            <div class="col-sm-12 text-center bg-light mt-3 p-3 social-icons" style="font-size: 2rem;">
                <i class="bi bi-facebook mx-3"></i>
                <i class="bi bi-instagram mx-3"></i>
                <i class="bi bi-twitter-x mx-3"></i>
                <i class="bi bi-youtube mx-3"></i>
            </div>
        </div>
</body>
</html>
