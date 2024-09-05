<!-- main -->

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>main</title>
    <link rel="stylesheet" href="../bootstrap-local/css/bootstrap.min.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script> -->

    <style>

        /* slider banner */
        #card-item{
            margin-top: 65px;
        }

        /* box display */
        .category-card {
            text-align: center;
            margin: 10px;
        }

        .box-display-total-wisata{
            margin-top: 35px;
        }

        .box-total-display{
            font-family: Poppins-semibold;
        }

        .category-card .count {
            background-color: #005168;
            color: white;
            font-size: 1.5rem;
            border-radius: 15px;
            padding: 10px 20px;
            margin-top: 10px;
            display: inline-block;
            min-width: 60px;
        }

        /* text produk */
        .text-produk{
            font-family: Poppins-semibold;
            font-size: 36px;
            text-align: center;
            margin-top: 35px;
        }
    </style>

</head>
<body>

<?php include 'header.php'?>

<!-- slider banner -->

<div id="carouselExampleAutoplaying" class="carousel slide " data-bs-ride="carousel"
        style=" padding-top: 50px; padding-left: 68px; padding-top: 75px; padding-right: 68px;">
            <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="../assets/img/banner-slide1.svg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="../assets/img/banner-slide1.svg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="../assets/img/banner-slide1.svg" class="d-block w-100" alt="...">
            </div>
            </div>
            <!-- button previous -->
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
            </button>
            <!-- button next -->
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
            </button>
        </div>

    <!-- box display total wisata, kuliner dan transportasi -->

    <div class="container box-display-total-wisata">
            <div class="row justify-content-center box-total-display">
                <div class="col-md-1 category-card">
                    <div>Kuliner</div>
                    <div class="count">24</div>
                </div>
                <div class="col-md-1 category-card">
                    <div>Transportasi</div>
                    <div class="count">13</div>
                </div>
                <div class="col-md-1 category-card">
                    <div>Wisata</div>
                    <div class="count">41</div>
                </div>
            </div>
        </div>


<!-- text produk -->

<p class="text-produk">Produk</p>


<!-- item card -->
<main class="container">
    <div class="d-flex justify-content-center align-content-center " id="card-item" style="height: 100vh;"> <!-- make a all item in center -->
    <div class="row align-items-center" >
        <div class="col-lg-8 mx-auto">
            <div class="places-container mb-4">
                <div class="row">
                    <!-- card 1 -->
                    <div class="col-md-6 col-sm-12 mb-4" >
                        <div class="card place-card">
                            <img src="../assets/img/jembatan-ampera.jpg" alt="jembatan ampera" class="card-img-top img-fluid">
                            <div class="card-body">
                                <h5 class="card-title"> Jembatan Ampera</h5>
                                <p class="card-text"> deskripsi jembatan ampera</p>
                            </div>
                        </div>
                    </div>
                    <!-- /card 1 -->
                    <!-- card 2 -->
                    <div class="col-md-6 col-sm-12 mb-4">
                        <div class="card place-card">
                        <img src="../assets/img/museum.jpeg" alt="jembatan ampera" class="card-img-top img-fluid">
                            <div class="card-body">
                                <h5 class="card-title"> Museum Balaputra Dewa</h5>
                                <p class="card-text"> deskripsi museum</p>
                            </div>
                        </div>
                    </div>
                    <!-- /card 2 -->
                    <!-- card 3 -->
                    <div class="col-md-6 col-sm-12 mb-4">
                        <div class="card place-card">
                        <img src="../assets/img/pulau-kemaro.jpeg" alt="pulau kemaro" class="card-img-top img-fluid">
                            <div class="card-body">
                                <h5 class="card-title"> Pulau Kemaro</h5>
                                <p class="card-text"> deskripsi pulau Kemaro</p>
                            </div>
                        </div>
                    </div>
                    <!-- /card 3 -->
                    <!-- card 4 -->
                    <div class="col-md-6 col-sm-12 mb-4">
                        <div class="card place-card">
                        <img src="../assets/img/kawah-tengkurep.jpg" alt="pulau kemaro" class="card-img-top img-fluid">
                            <div class="card-body">
                                <h5 class="card-title"> Kawah Tengkurep</h5>
                                <p class="card-text"> ini adalah kawah tengkurep</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>


</main>

<script src="../bootstrap-local/js/bootstrap.bundle.min.js"></script>
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script> -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    
</body>
</html>