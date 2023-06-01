<?php
    include("lib_db.php");
	$id = isset($_REQUEST["id"]) ? $_REQUEST["id"] : 0;
	if ($id<  1) return ;
    $sql = "SELECT * FROM sanpham where id=$id";

    $result = select_one($sql);
    // print_r($result).die("ok");
    $cm = "SELECT * FROM danhmuc WHERE id={$result["gid"]}";
    $cmo = select_one($cm);


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

    <!-- single products -->


    <div class="small-container single-product">
        <div class="row">
            <div class="col-2">
                <img src="<?php echo $result['img'] ?>" id="ProductImg" width="100%">

                <div class="small-img-row">
                    <div class="small-img-col">
                        <img class="small-img" src="images/gallery-1.jpg" width="100%" alt="">
                    </div>
                    <div class="small-img-col">
                        <img class="small-img" src="images/gallery-2.jpg" width="100%" alt="">
                    </div>
                    <div class="small-img-col">
                        <img class="small-img" src="images/gallery-3.jpg" width="100%" alt="">
                    </div>
                    <div class="small-img-col">
                        <img class="small-img" src="images/gallery-4.jpg" width="100%" alt="">
                    </div>
                </div> 
            </div>
            <div class="col-2">
                

                <script>
                    $(document).ready(function(){
                        $('[name="btn_add_cart"]').click(function(){
                        $.ajax({
                            data:{
                            id: $('[name="id_get"]').val(),

                            },
                            method: 'post',
                            url: 'cart_details.php',
                        }).done(function(res){
                            alert('Đã thêm vào giỏ hàng');
                        });
                        })
                    });
                </script>
                <input type="hidden" name="id_get" value="<?php echo $id ?>">
                <p>Home / T-Shirt</p>
                <h1><?php echo $result['name'] ?></h1>
                <h4><?php echo $result['text'] ?></h4>
                <select name="" id="">
                    <option>Select Size</option>
                    <option>XXL</option>
                    <option>XL</option>
                    <option>L</option>
                    <option>M</option>
                </select>
                <input id="layid" type="number" value="1">
                <button name="btn_add_cart"  class="btn">Add to cart</button>
                <h3>Products Details <i class="fa fa-indent"></i></h3>
                <br>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Inventore repellendus delectus quo expedita fuga dolorem?</p>

            </div>
        </div>
    </div>

    <!-- title -->
    <div class="small-container">
        <div class="row row-2">
            <h2>Related Products</h2>
            <p>View More</p>
        </div>
    </div>


    <!-- product -->
    <div class="small-container">
        <div class="row">
            <div class="col-4">
                <img src="images/product-9.jpg" alt="">
                <h4>Red Printed T-Shirt</h4>
                <div class="rating">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-o"></i>
                </div>
                <p>250 000 đ</p>
            </div>
            <div class="col-4">
                <img src="images/product-10.jpg" alt="">
                <h4>Red Printed T-Shirt</h4>
                <div class="rating">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-o"></i>
                </div>
                <p>250 000 đ</p>
            </div>
            <div class="col-4">
                <img src="images/product-11.jpg" alt="">
                <h4>Red Printed T-Shirt</h4>
                <div class="rating">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-half-o"></i>
                </div>
                <p>250 000 đ</p>
            </div>
            <div class="col-4">
                <img src="images/product-12.jpg" alt="">
                <h4>Red Printed T-Shirt</h4>
                <div class="rating">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-o"></i>
                </div>
                <p>250 000 đ</p>
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

    <!-- products js -->

    <script>
        var ProductImg = document.getElementById("ProductImg");

        var SmallImg = document.getElementsByClassName("small-img");

        SmallImg[0].onclick = function(){
            ProductImg.src = SmallImg[0].src;
        }
        SmallImg[1].onclick = function(){
            ProductImg.src = SmallImg[1].src;
        }
        SmallImg[2].onclick = function(){
            ProductImg.src = SmallImg[2].src;
        }
        SmallImg[3].onclick = function(){
            ProductImg.src = SmallImg[3].src;
        }


    </script>

    <!--  -->
</body>

</html>