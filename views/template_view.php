<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="utf-8">
	<title>Главная</title>
    <link rel="stylesheet" type="text/css" href="/css/style.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <a class="navbar-brand logo" href="/main/">Fitonia</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#">Delivery</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/contacts/">Contact Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../index.php">Profile</a>
                </li>
            </ul>
            <ul class="navbar-nav mr-right">
                <li class="nav-item">
                    <form class="form-inline my-2 my-lg-0">
                        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Search</button>
                    </form>
                </li>
                <li class="nav-item">
                    <a href="../index.php">
                        <button type="button" class="btn btn-primary">
                            <i class="fas fa-shopping-cart"></i> <span class="badge badge-light">4</span>
                        </button>
                    </a>
                </li>
            </ul>
        </div>
    </nav>
	<?php include 'views/'.$content_view; ?>
    <footer class="page-footer bg-primary font-small pt-4 footer">
        <div class="container-fluid text-center text-md-left text-white">
            <div class="row">
                <div class="col-md-5 mt-md-0 mt-3">
                    <h3>Fitonia</h3>
                    <h3>
                        <i class="fab fa-facebook-square"></i>
                        <i class="fab fa-instagram"></i>
                        <i class="fab fa-google-plus-square"></i>
                    </h3>
                </div>
                <hr class="clearfix w-100 d-md-none pb-3">
                <div class="col-md-3 mb-md-0 mb-3">
                    <h5 class="text-uppercase">Contacts</h5>
                    <ul class="list-unstyled">
                        <li>
                            <a href="#!"><i class="fas fa-map-marker-alt"></i>&nbsp;Ukraine, Kharkov, st. Shevchenko 2</a>
                        </li>
                        <li>
                            <a href="#!"><i class="fas fa-mobile-alt"></i>&nbsp;+38(098)-00-00-000</a>
                        </li>
                        <li>
                            <a href="#!"><i class="fas fa-at"></i>&nbsp;support@gmail.com</a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-2 mb-md-0 mb-3">
                    <h5 class="text-uppercase">Profile</h5>
                    <ul class="list-unstyled">
                        <li>
                            <a href="#!">My account</a>
                        </li>
                        <li>
                            <a href="#!">Order tracking</a>
                        </li>
                        <li>
                            <a href="#!">Help and support</a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-2 mb-md-0 mb-3">
                    <h5 class="text-uppercase">Home</h5>
                    <ul class="list-unstyled">
                        <li>
                            <a href="#!">Catalog</a>
                        </li>
                        <li>
                            <a href="#!">Payment and delivery</a>
                        </li>
                        <li>
                            <a href="#!">Discounts</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="footer-copyright text-center py-3 bg-primary-dark">
            <span class="light-blue-text">&#169; 2018 Copyright:</span>
            <a href="#" class="text-white"> Fitonia.com</a>
        </div>
    </footer>
    <script defer src="https://use.fontawesome.com/releases/v5.5.0/js/all.js" integrity="sha384-GqVMZRt5Gn7tB9D9q7ONtcp4gtHIUEW/yG7h98J7IpE3kpi+srfFyyB/04OV6pG0" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
</body>
</html>

