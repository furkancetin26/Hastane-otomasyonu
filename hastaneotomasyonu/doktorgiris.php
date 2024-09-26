<!DOCTYPE html>
<html lang="tr">
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
        <style>
            span{
                display: inline-block;
                width: 100%;
                height: 800px;
                margin: 6px;
                background-color: white;
            }
        </style>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/style.css" rel="stylesheet">
    </head>
    <body>
        <?php
        include("baglanti.php");
        if(isset($_POST["gonder"])) {
        $tcno = $_POST["tcno"];
        $parola = $_POST["parola"];


        if(isset($tcno) && isset($parola)){ 
            $secim = "SELECT * FROM kullanicilar WHERE tc_no = '$tcno'";
            $calistir = mysqli_query($baglanti,$secim);
            $kayitsayisi = mysqli_num_rows($calistir);  
            
            
            if($kayitsayisi > 0)
            {
                $ilgilikayit = mysqli_fetch_assoc($calistir);
                $hashlisifre = $ilgilikayit["parola"];
                if(password_verify($parola, $hashlisifre))
                {
                    session_start();
                    $_SESSION["tcno"] = $ilgilikayit["tc_no"];
                    $_SESSION["isim"] = $ilgilikayit["İsim"];
                    $_SESSION["Soyad"] = $ilgilikayit["Soyad"];
                    $_SESSION["email"] = $ilgilikayit["email"];
                    header("location:profile.php");
                    exit;
                }
            
        else{
            echo '<div class="container mt-4">
                <div class="alert alert-danger" role="alert">
                    parola yanlış
                </div>
            </div>'; 
        }
        }
        else{
            echo '<div class="container mt-4">
                <div class="alert alert-danger" role="alert">
                    tc no yanlış
                </div>
            </div>';
        }
        mysqli_close($baglanti);
    }   
    
}
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
                                    <a class="nav-link" href="doktorgiris.html" target="_blank" aria-current="page"><i class="bi bi-box-arrow-in-right m-1"></i>Doktor Giriş</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="hastagiris.html" target="_blank"><i class="bi bi-box-arrow-in-right m-1"></i>Hasta Giriş</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="hastaneyonetimigiris.html" target="_blank"><i class="bi bi-box-arrow-in-right m-1"></i>Hastane Yönetimi Giriş</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#doktorlarimiz">Doktorlarımız</a>
                                </li>
                                <li class="nav-item">
                                <a class="nav-link" href="profile.php">Profilim</a>
                                </li>
                            </ul>
                            
                        </div>
                  </div>
                </nav>
            </div>
        </div>
    
        <div class="row">
            <div class="col-sm-12 bg-secondary" style="height: 900px;">

                <div class="container ">
                    <span class="rounded-5 mt-5">
                        <form action="doktorgiris.php" method="POST" class="was-validated">
                            <div class="mb-3 mt-4 m-5">
                                <h1>DOKTOR GİRİŞ</h1>
                              <label for="uname" class="form-label">T.C Kimlik No:</label>
                              <input type="text" class="form-control" id="uname" placeholder="T.C Kimlik No Giriniz" name="tcno" required>
                              <div class="valid-feedback">Geçerli</div>
                              <div class="invalid-feedback">Lütfen bu alanı doldurun</div>
                            </div>
                            <div class="mb-3 mt-3 m-5">
                              <label for="pwd" class="form-label">Şifre:</label>
                              <input type="password" class="form-control" id="pwd" placeholder="Şifrenizi Giriniz" name="parola" required>
                              <div class="valid-feedback">Geçerli</div>
                              <div class="invalid-feedback">Lütfen bu alanı doldurun</div>
                            </div>
                            <div class="form-check mb-3 mt-4 m-3">
                              <input class="form-check-input m-3" type="checkbox" id="myCheck"  name="remember" required>
                              <label class="form-check-label" for="myCheck">Sözleşmeyi kabul ediyorum</label>
                              <div class="valid-feedback">Geçerli</div>
                              <div class="invalid-feedback">Devam etmek için onay kutusunu işaretleyin</div>
                            </div>
                            <div class="m-5 mt-0">
                            <button type="submit" class="btn btn-primary" name = "gonder">Gönder</button>
                            <a role="button" href="uyeol.php" target="_blank" class="btn btn-primary">Üye Ol</a>
                            </div>
                          
                          </form>
                    </span>
                </div>
                        
                
                
            </div>
        </div>
        
    </body>
</html>