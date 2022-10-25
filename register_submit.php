<?php
    session_start();
    include 'connect.php';
    //print_r( $_POST['submit-reg']).die();
    if( isset($_POST['submit-reg']) && $_POST['username'] != '' && $_POST['email'] != '' && $_POST['password'] != ''){

        //print_r( $_POST['submit-reg']).die();
        // xu ly nguoi dung dang ky
        $username = $_POST['username'];
        $email =$_POST['email'];
        $password = $_POST['password'];

        $level = 0;
        $sql = "SELECT * FROM user WHERE username='$username'";
        $old = mysqli_query($conn,$sql);
        $password = md5($password);
        if( mysqli_num_rows($old) > 0){
            $_SESSION["thongbao"] = "Tên tài khoản tồn tại";
            header("location:account.php");
            die();
        }
        $sql = "INSERT INTO user (username,email,password,level) VALUES ('$username','$email','$password','$level')";
        mysqli_query($conn,$sql);
        $_SESSION["thongbao"] = "Bạn đã đăng ký thành công";
        //header('location:account.php');
        // echo("Đã đăng ký thành công");
    }else{
        $_SESSION["thongbao"] = "Vui lòng nhập đầy đủ thông tin";
        //header("location:account.php");
    }
?>