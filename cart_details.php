<?php
    include 'lib_db.php';
    include 'connect.php';
    session_start();
    $id = isset($_POST["id"]) ? $_POST["id"] : 0;
    $sql = " SELECT * FROM sanpham WHERE id={$id}" ;
    if($id){
        $sql = " SELECT * FROM sanpham WHERE id={$id}" ;
        $result = mysqli_query($conn,$sql);
        $row = mysqli_fetch_row($result);
        // print_r($sql).exit();
        if(!isset($_SESSION["carts"])){
            $carts[$id] = array(
                'id' => $id,
                'name' => $row[2],
                'img' => $row[3],
                'text' => $row[5],
                'number' => 1,
                'price' => $row[4]
            );

        }else{
            $carts = $_SESSION["carts"];
            if(array_key_exists($id,$carts)){
                $carst[$id] = array(
                    'id' => $id,
                    'name' => $row[2],
                    'img' => $row[3],
                    'text' => $row[5],
                    'number' => (int)$carts[$id]["number"] + 1,
                    'price' => (int)$carts[$id]["price"] + $row[4]
                );
            }else{
                $carts[$id] = array(
                    'id' => $id,
                    'name' => $row[2],
                    'img' => $row[3],
                    'text' => $row[5],
                    'number' => 1,
                    'price' => $row[4]
                );
            }

        }

        $_SESSION["carts"] = $carts;
        // echo "prE";
        print_r($carts);
    }

?>