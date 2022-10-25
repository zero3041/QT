<?php
    $sql = "select * from sanpham limit 4";
    $resultOther = select_list($sql);
    //print_r($resultOther);exit(); 
?>


<?php foreach($resultOther as $items) { ?>
            
            <div class="col-4">
                <a href="product-details.php?id=<?php echo($items['id']) ?>"><img src="<?php echo($items['img']) ?>" alt=""></a>
                <a href="product-details.php?id=<?php echo($items['id']) ?>">
                    <h4><?php echo($items['name']) ?></h4>
                </a>
                <div class="rating">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-o"></i>
                </div>
                <p><?php echo($items['text']) ?></p>
            </div>
            
<?php } ?>