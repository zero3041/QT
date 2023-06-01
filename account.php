<?php
    include('lib_db.php');
    // include('check_login.php');
    session_start();


?>
<!DOCTYPE html>
<html lang="vn">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Products</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=M+PLUS+1p:wght@100;300;400;500;700;800;900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="js/jquery-3.6.0.min.js"></script>
    <script>
            $(document).ready(function(){
                $('.btn-log').click(function(e){
                    e.preventDefault();
                    $.ajax({
                        url: "login_submit.php",
                        method: 'post',
                        dataType: 'json',
                        data: {
                            username: $('[name="username"]').val(),
                            password: $('[name="password"]').val(),
                            submit_dangnhap: 1,
                            ajax: 1
                        }
                        }).done(function(res) {
                            
                            if(res.success){
                                window.location= "index.php";
                            }else{
                                alert(res.mes);
                                return;
                            }
                            
                        });
                })
                })
        </script>
</head>

<body>
    
    <div class="container">
        <div class="navbar">
            <div class="logo">
                <a href="index.php"><img src="images/logo.png" alt="" width="125px"></a>
            </div>
            <nav>
                <ul id="MenuItems">
                    <li><a href="index.php">Trang chủ</a></li>
                    <li><a href="products.php">Sản phẩm</a></li>
                    <li><a href="">Về chúng tôi</a></li>
                    <li><a href="">Liên hệ</a></li>
                    <?php
                        if(!isset($_COOKIE['username'])){
                            echo '<li><a href="account.php">Tài khoản</a></li>';
                        }
                        else{
                            echo '<li><a href="">'; echo $_COOKIE['username']; echo '</a></li>';
                            echo '<li><a href="logout.php">Đăng Xuất</a></li>';
                        }
                        
                    ?>
                    
                </ul>
            </nav>
            <a href="cart.php"><img src="images/cart.png" width="30px" height="30px" alt=""></a>
            <img src="images/menu.png" onclick="menutoggle()" class="menu-icon">
        </div>
    </div>
    <!-- \ -->

    <div class="account-page">
        <div class="container">
            <div class="row">
                <div class="col-2">
                    <img src="images/image1.png" width="100%" alt="">
                </div>
                <div class="col-2">
                    <div class="form-container">
                        <div class="form-btn">
                            <span onclick="login()" style="width: 105px;">Đăng nhập</span>
                            <span onclick="register()">Đăng ký</span>
                            <hr id="Indicator">
                        </div>

                        <form id="LoginForm" class="log" action="login_submit.php" method="POST">
                            <input name="username" type="text" placeholder="Username">
                            <input name="password" type="password" placeholder="Password">
                            <button name="submit_dangnhap" type="submit" class="btn btn-log submit-dangnhap">Đăng nhập</button>
                            <a href="">Quên mật khẩu?</a>
                        </form>

                        <form id=RegForm class="reg" action="register_submit.php" method="POST">
                            <input name="username" type="text" placeholder="Username">
                            <input name="email" type="email" placeholder="Email">
                            <input name="password" type="password" placeholder="Password">
                            <button name="submit-reg" type="submit" class="btn btn-reg submit-reg">Đăng ký</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- footer -->
    <div class="footer">
        <div class="container">
            <div class="row">
                <div class="footer-col-1">
                    <h3>Tải App</h3>
                    <p>Tải ứng dụng về máy của bạn</p>
                    <div class="app-logo">
                        <img src="images/play-store.png" alt="">
                        <img src="images/app-store.png" alt="">
                    </div>
                </div>
                <div class="footer-col-2">
                    <img src="images/logo-white.png" alt="">
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Laborum totam deserunt distinctio
                        mollitia vel repudiandae.</p>
                </div>
                <div class="footer-col-3">
                    <h3>Useful Links</h3>
                    <ul>
                        <li>Mã giảm giá</li>
                        <li>Bài viết</li>
                        <li>Chính sách hoàn trả</li>
                        <li>Đơn vị đồng hành</li>
                    </ul>
                </div>
                <div class="footer-col-4">
                    <h3>Theo dõi chúng tôi</h3>
                    <ul>
                        <li>Facebook</li>
                        <li>Twitter</li>
                        <li>Instagram</li>
                        <li>Youtube</li>
                    </ul>
                </div>
            </div>
            <hr>
            <p class="copyright">Copyright 2022 - By Nhom 8 61TH2</p>
        </div>
    </div>
    <!-- js -->

    <script>
        var MenuItems = document.getElementById("MenuItems");

        MenuItems.style.maxHeight = "0px";

        function menutoggle() {
            if (MenuItems.style.maxHeight == "0px") {
                MenuItems.style.maxHeight = "200px";
            }
            else {
                MenuItems.style.maxHeight = "0px";
            }
        }
    </script>

    <!-- js form -->
    <script>
        var LoginForm = document.getElementById("LoginForm");
        var RegForm = document.getElementById("RegForm");

        var Indicator = document.getElementById("Indicator");

            function register(){
                RegForm.style.transform = "translateX(0px)";
                LoginForm.style.transform = "translate(0px)";
                Indicator.style.transform = "translate(100px)";
            }

            function login(){
                RegForm.style.transform = "translateX(300px)";
                LoginForm.style.transform = "translate(300px)";
                Indicator.style.transform = "translate(0px)";
            }

    </script>

    <!--  -->
</body>

</html>