<?php
    session_start();
    include 'lib_db.php';
    include 'connect.php';
    if(isset($_SESSION['carts']))
        $cart = $_SESSION['carts'];
    else $cart = 0 ;
    $all = 0;
    //print_r($cart).die();
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
</head>

<body>
    
    <div class="container">
    <div class="navbar">
            <div class="logo">
                <a href="index.php"><img src="images/logo.png" alt="" width="125px"></a>
            </div>
            <nav>
                <ul id="MenuItems">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="products.php">Products</a></li>
                    <li><a href="">About</a></li>
                    <li><a href="">Contact</a></li>
                    <?php
                        if(!isset($_COOKIE['username'])){
                            echo '<li><a href="account.php">Account</a></li>';
                        }
                        else{
                            echo '<li><a href="">'; echo $_COOKIE['username']; echo '</a></li>';
                            echo '<li><a href="logout.php">Đăng Xuất</a></li>';
                        }
                        
                    ?>
                </ul>
            </nav>
            <a href="cart.html"><img src="images/cart.png" width="30px" height="30px" alt=""></a>
            <img src="images/menu.png" onclick="menutoggle()" class="menu-icon">
        </div>
    </div>
    <!-- \ -->

    <div class="small-container cart-page">
        <table>
            <tr>
                <th>Product</th>
                <th>Quantity</th>
                <th>Subtotal</th>
            </tr>
            <?php foreach($cart as $items) { $all = $all + $items['price'] ?>
            <tr>
                <td>
                    <div class="cart-info">
                        <img src="<?php echo $items['img'] ?>" alt="">
                        <div>
                            <p><?php echo $items['name'] ?></p>
                            <small>Price: <?php echo $items['text'] ?></small>
                            <br>
                            <a href="">Remove</a>
                        </div>
                    </div>
                </td>
                <td><?php echo $items['number'] ?></td>
                <td><?php echo $items['price'] ?></td>
            </tr>
            <?php } ?>
            <!-- <tr>
                <td>
                    <div class="cart-info">
                        <img src="images/buy-1.jpg" alt="">
                        <div>
                            <p>Ao T-Shirt đỏ</p>
                            <small>Price: 250 000 đ</small>
                            <br>
                            <a href="">Remove</a>
                        </div>
                    </div>
                </td>
                <td><input type="number" value="1"></td>
                <td>250 000 đ</td>
            </tr>
            <tr>
                <td>
                    <div class="cart-info">
                        <img src="images/buy-1.jpg" alt="">
                        <div>
                            <p>Ao T-Shirt đỏ</p>
                            <small>Price: 250 000 đ</small>
                            <br>
                            <a href="">Remove</a>
                        </div>
                    </div>
                </td>
                <td><input type="number" value="1"></td>
                <td>250 000 đ</td>
            </tr> -->
        </table>

        <div class="total-price">
            <table>
                <tr>
                    <td>Subtotal</td>
                    <td><?php echo $all ?> đ </td>
                </tr>
                <tr>
                    <td>Phí vận chuyển</td>
                    <td>150000 đ </td>
                </tr>
                <tr>
                    <td>Total</td>
                    <td><?php echo $all+150000 ?> đ</td>
                </tr>
            </table>

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



    <!--  -->
</body>

</html>