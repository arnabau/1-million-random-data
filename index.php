<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
    <title>Generate 1 million random data</title>
</head>

<body>
    <!-- Header Nav bar -->
    <header>
        <div class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm gradient-nav-top">
            <div class="container">
                <a href="index.php" class="navbar-brand">Edurio test</a>
                <div class="nav-scroller py-1 mb-2">
                    <nav class="navbar navbar-expand-md bg-dark navbar-dark nav-buttons">
                        <!-- Toggler/collapsibe Button -->
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <!-- Navbar links -->
                        <div class="collapse navbar-collapse" id="collapsibleNavbar">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link" href="#">About</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Login</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Register</a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- End Header Nav bar -->

    <div class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false" id="spinnerModal">
        <div class="modal-dialog modal-dialog-centered text-center" role="document">
            <span class="fa fa-spinner fa-spin fa-3x w-100"></span>
        </div>
    </div>

    <!-- Main container -->
    <div class="container pt-4 pb-4">
        <div class="row shadow mx-auto p-3 mb-3 bg-white rounded">
            <div class="col-md-8 mx-auto">
                <form action="index.php" method="POST" class="needs-validation">
                    <div class="card-body">
                        <h4 class="card-title">Generate 1 million random data</h4>
                        <p>The process is optimized, even so, it will take a few seconds to complete.</p>
                        <p>You can use the console dev tools in chrome to see output details</p>
                        <div class="message alert alert-primary alert-dismissible fade show" style="display:none" role="alert">
                            ...
                        </div>
                        <ul class="list-group mt-4 mb-4">
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                ...
                                <span class="badge badge-primary badge-pill"># 0</span>
                            </li>
                        </ul>
                    </div>

                    <div class="paging d-flex p-2">
                        <ul class="pagination" id="pageList"></ul>
                    </div>

                    <div class="card-footer gradient-nav-top">
                        <div class="row">
                            <div class="col">
                                <button type="submit" class="form-get btn btn-primary btn-block">
                                    <i class="fab fa-algolia" aria-hidden="true"></i>&nbsp; Get data
                                </button>
                            </div>
                            <div class="col">
                                <button type="submit" class="form-send btn btn-primary btn-block">
                                    <i class="fab fa-algolia" aria-hidden="true"></i>&nbsp; Insert data
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End Main container -->

    <footer class="footer bg-dark">
        <div class="container">
            <ul class="social_footer_ul">
                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
                <li><a href="#"><i class="fab fa-instagram"></i></a></li>
            </ul>
            <hr>
            <p class="text-center">Made by <a href="">Arnaldo Baumanis</a>.
                <br>Using PHP, HTML, CSS, Javascript, MySQL | UI <a href="https://getbootstrap.com" rel="nofollow">Bootstrap</a>. Icons from <a href="http://fontawesome.io/" rel="nofollow">Font Awesome</a>. Web fonts from <a href="https://fonts.google.com/" rel="nofollow">Google</a>.</p>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/main.js"></script>
</body>

</html>