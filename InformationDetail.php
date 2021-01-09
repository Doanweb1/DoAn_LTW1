<?php
include "Header.php";
include "Function.php";


    $ID = $_POST['id-Detail'];


    if(isset($_POST['btn-comment']))
    {
        $GLOBALS['ID'] = $_POST['btn-comment'];
        $comment = $_POST['input-comment'];
        $date = date("Y-m-d");

        var_dump($GLOBALS['ID']);
        var_dump($comment);
        var_dump($date);

        $db1 = new PDO('mysql:host=localhost;dbname=doan_ltw1;charset=utf8', 'root', 'admin');
        $stmt1 = $db1->prepare("INSERT INTO comments (IDCustomer, IDItem, COMMENT, dateComment) value ('1', ?, ?, ?);");
        $stmt1->execute(array($GLOBALS['ID'], $comment, $date));
    }

    // var_dump($ID);
    $db = new PDO('mysql:host=localhost;dbname=doan_ltw1;charset=utf8', 'root', 'admin');
    $stmt = $db->prepare("SELECT * FROM Item where id = ?");
    $stmt->execute(array($ID));

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
    <div class="ID-container">

        <div class="ID-container-Left">
            <div>
                <img class = "ID-img-1" src = "./SRC-Img/ben.webp">
                <img class = "ID-img-1" src = "./SRC-Img/truoc.webp">
                <img class = "ID-img-1" src = "./SRC-Img/sau.webp">
                <img class = "ID-img-1" src = "./SRC-Img/duoi.webp">
            </div>
        </div>


        <div class="ID-container-Right">


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

                    <button class="btn-ID-add" name = "id-item-add-bag" value = "'. $item['id'] .'">Add to bag</button>

                </form>
                <form action = "InformationDetail.php" method = "POST">

                    <button class="btn-ID-WishList" name = "add-item-favorite" value = "'. $item['id'] .'" >Add to favorite</button>

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
        </div>
        
        
        
        <div style = "margin-left : 0px; width : 100%; margin-top : 50px; text-algin : center;"class="ID-Footer-Right">

                <h4>
                '. $item['detail'] .'
                </h4>

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

