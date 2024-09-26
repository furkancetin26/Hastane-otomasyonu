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
        if( isset($_POST["kaydet"])){
            $name = $_POST["isim"];
            $soyad = $_POST["soyad"];
            $tcno = $_POST["tcno"];
            $email = $_POST["email"];
            $password = password_hash($_POST["parola"],PASSWORD_DEFAULT);
            $ekle = "INSERT INTO kullanicilar (İsim, Soyad, tc_no, email, parola ) VALUES ('$name','$soyad','$tcno','$email','$password')";
            $calistir = mysqli_query($baglanti,$ekle);
            if($calistir){
                echo '<div class="container mt-4">
                <div class="alert alert-success" role="alert">
                    İşlem başarıyla gerçekleştirildi!
                </div>
            </div>';
            }
             else{
                echo '<div class="container mt-4">
                <div class="alert alert-danger" role="alert">
                    İşlem başarıyla gerçekleştirilemedi!
                </div>
            </div>';
            }
            mysqli_close($baglanti);
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
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Doktorlarımız</a>
                                    <div class="dropdown-menu" aria-labelledby="dropdownId">
                                        <a class="dropdown-item" href="#">Doktor 1</a>
                                        <a class="dropdown-item" href="#">Doktor 2</a>
                                    </div>
                                </li>
                            </ul>
                            
                        </div>
                  </div>
                </nav>
            </div>
        </div>
    
        <div class="row">
            <div class="col-sm-12 bg-secondary">

                <div class="container ">
                    <span class="rounded-5">
                        <form action="uyeol.php" method="POST" class="was-validated">
                            <div class="mb-3 mt-4 m-5">
                                <h1>ÜYE OL</h1>
                              <label for="uname" class="form-label">İsim:</label>
                              <input type="text" class="form-control" id="uname" placeholder="İsim Giriniz" name="isim" required>
                              <label for="uname" class="form-label">Soyad:</label>
                              <input type="text" class="form-control" id="uname" placeholder="Soyad Giriniz" name="soyad" required>
                              <label for="uname" class="form-label">T.C Kimlik No:</label>
                              <input type="text" class="form-control" id="uname" placeholder="T.C Kimlik No Giriniz" name="tcno" required>
                              <label for="uname" class="form-label">Email:</label>
                              <input type="text" class="form-control" id="uname" placeholder="Email Giriniz" name="email" required>
                              <div class="valid-feedback">Geçerli</div>
                              <div class="invalid-feedback">Lütfen bu alanı doldurun</div>
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
                            <button type="submit" class="btn btn-primary" name= "kaydet">Gönder</button>
                            </div>
                          
                          </form>
                    </span>
                </div>
                        
                
                
            </div>
        </div>
        
    </body>
</html>