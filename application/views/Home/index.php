
<body class="bg-gradient-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Selamat Datang</h1>
                                    </div>
                                    <form method="POST" action="<?= base_url("index.php/home/login")?>">
                                        <div class="form-group">
                                            <input autocomplete=off type="text" class="form-control" id="username" name="username" placeholder="masukkan username..." required>
                                        </div>
                                        <div class="form-group">
                                            <input autocomplete=off type="password" class="form-control" id="password" name="password" placeholder="masukkan password" required>
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-user btn-block">Masuk</button>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="forgot-password.html">Forgot Password?</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="register.html">Create an Account!</a>
                                    </div>
                                </div>
                
                    </div>
                </div>

            </div>

        </div>

    </div>
    <!-- Bootstrap core JavaScript-->
    <script src="<?=base_url("assets/vendor/jquery/jquery.min.js")?>"></script>
    <script src="<?=base_url("assets/vendor/jquery/jquery.mask.min.js")?>"></script>
    <script src="<?=base_url("assets/vendor/bootstrap/js/bootstrap.bundle.min.js")?>"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?=base_url("assets/vendor/jquery-easing/jquery.easing.min.js")?>"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?=base_url("assets/js/sb-admin-2.min.js")?>"></script>
</body>
</html>