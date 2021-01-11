<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.css" />
<link rel="stylesheet" href="https:// <div style="width: 500px; height: 700px" class="swiper-container">
   
   
<?php
include "Header.php";
include "Function.php";


    $IDItem = $_POST['id-Detail'];


    if(isset($_POST['btn-comment']))
    {
        $GLOBALS['IDItem'] = $_POST['btn-comment'];
        $comment = $_POST['input-comment'];
        $date = date("Y-m-d");

        

        $db1 = new PDO('mysql:host=localhost;dbname=doan_ltw1;charset=utf8', 'root', 'admin');
        $stmt1 = $db1->prepare("INSERT INTO comments (IDCustomer, IDItem, COMMENT, dateComment) value (?, ?, ?, ?);");
        $stmt1->execute(array($_COOKIE['IDCustomer'] , $GLOBALS['IDItem'], $comment, $date));
    }

    
    $db = new PDO('mysql:host=localhost;dbname=doan_ltw1;charset=utf8', 'root', 'admin');
    $stmt = $db->prepare("SELECT * FROM Item where IDItem = ?");
    $stmt->execute(array($IDItem));

    // lấy toàn bộ data
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
   
    $item = $data[0];

   

    AddToBag();

    AddFavorite();

?>

<!DOCTYPE html>
<html lang="en">

<link ref = "stylesheet" type = "text/css" href = "./CSS/MainApp.css">


<body>



    <div style  = "margin-top : 0px;  background-color : #f7f6f6; height : 800px;" class="ID-container">

        <div style = "height : 600px; background-color : #f7f6f6; margin-top : 80px;" class="ID-container-Left">


            <div style="width: 700px; height: 900px" class="swiper-container">
                <div class="swiper-wrapper">


                <?php
    echo '
    <div class="swiper-slide">
        <img style = "width : 600px; height : 500px;" class="d-block w-100" src="./SRC-Img/shoes/'.  $item['img'] .'.1.jpg" alt="Third slide" />
    </div>
    <div class="swiper-slide">
        <img style = "width : 600px; height : 500px;" class="d-block w-100" src="./SRC-Img/shoes/'.  $item['img'] .'.2.jpg" alt="Third slide" />
    </div>
    <div class="swiper-slide">
        <img style = "width : 600px; height : 500px;" class="d-block w-100" src="./SRC-Img/shoes/'.  $item['img'] .'.3.jpg" alt="Third slide" />
    </div>
    <div class="swiper-slide">
        <img style = "width : 600px; height : 500px;" class="d-block w-100" src="./SRC-Img/shoes/'.  $item['img'] .'.4.jpg" alt="Third slide" />
    </div>';


                ?>
                    
                </div>
                <!-- Add Arrows -->
                <div style="margin-left: 150px" class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
                    
            </div>


        </div>


        <div style = "height : 500px; margin-top : 10px; background-color : #f7f6f6 "  class="ID-container-Right">


            <?php

                echo '
                <h1 style="text-align: center; margin-top: 100px;">'. $item['NameItem'] . '</h1>
                <h3 style="text-align: center; margin-top: 40px;">'. $item['trademark'] . '</h3>';


            ?>

            <h5 style = "margin-top: 40px;" >Fit Predictor Calculate your size</h5>

            <div style = "width:100%; height: 50px;">
                <select style = "width:100%; height: 50px; border-radius: 5px; font-size: 20px;">
                  <option value="0">Select size adidas</option>
                  <option value="7">7 US</option>
                  <option value="8.5">8.5 US</option>
                  <option value="10.5">10.5 US</option>
                  <option value="11.5">11.5 US</option>
                </select>
            </div>

            <?php  
                echo   
                '
                <form method = "POST">

                    <button class="btn-ID-add" name = "id-item-add-bag" value = "'. $item['IDItem'] .'">Add to bag</button>

                </form>
                <form action = "InformationDetail.php" method = "POST">

                    <button class="btn-ID-WishList" name = "add-item-favorite" value = "'. $item['IDItem'] .'" >Add to favorite</button>

                </form>';
    
    
            ?>
            


            <?php 
            
            echo '<div style = "margin-left : 0px; width : 100%; margin-top : 50px; text-algin : center;" class="ID-Footer-Left">

                <h3>
                    '. $item['NameItem'] .'
                </h3>

                <h5>
                '. $item['infomation'] .'
                </h5>
            </div>';

        ?>


        </div>

        <div style = "width : 100%; margin-top : 50px; text-algin : center; margin-left : 0px;" class="ID-Footer">




            <?php

            include "comment.php";
            include "Footer.php";
             ?>

        </div>


    </div>
</body>
</html>


 <!-- Initialize Swiper -->
 <script type="module">
    import Swiper from 'https://unpkg.com/swiper/swiper-bundle.esm.browser.min.js'; var swiper = new Swiper('.swiper-container', { navigation: { nextEl: '.swiper-button-next', prevEl: '.swiper-button-prev', }, });
</script>
<!-- Swiper JS -->
<script src="../package/swiper-bundle.min.js"></script>
<script src="https://unpkg.com/swiper/swiper-bundle.js"></script>
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>unpkg.com/swiper/swiper-bundle.min.css" />

