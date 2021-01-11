<?php

if(isset($_POST['trade']))
{
    $trade = $_POST['trade'];
  
    $db = new PDO('mysql:host=localhost;dbname=doan_ltw1;charset=utf8', 'root', 'admin');

    $stmt = $db->prepare("SELECT * FROM Item where trademark = ?;");
    $stmt->execute(array($trade));
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if($data == null)
    {
        echo '
        <div style = "margin : auto; height : 400px; width : 100%; ">

            <h1 style = "color : red;">NO ITEM IN FAVORITE</h1>

        </div>
        ';
    }
    else
    {
        for($i = 0; $i < 16; $i++)
        {
            $item = $data[$i];


            echo '<div style = "margin-left : 20px;" class="item-Main">
            <img class = "item-img" src="./SRC-Img/shoes/'. $item['img'] .'.jpg" alt="">
            
            <div style = "width : 50px; height : 50px; margin-left : 10px; float : left;" >
                <form method = "POST">
                    <button  name = "add-item-favorite" value = "'. $item['IDItem'] .'" class="btn-favorite">
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-heart-fill icon-favorite-img" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z"/>
                        </svg>
                    </button>
                </form>
                
            </div>


            <h4 style="text-align: center; margin-top: 0px;">$'. $item['Price'] .' USD</h4>
            <h3 style="text-align: center; margin-top: -5px; color: #000;" ><a style = "text-decoration : none; color : black;" href = "InformationDetail.php">'. $item['NameItem'] .'</a></h3>
            
            <div class = "form-add-detail">

                <form method = "POST">

                    <button type = "submit" style = " margin-left : -30px; width : 90%; " class = "btn-ID-add" name = "id-item-add-bag"  value = "'. $item['IDItem'] .'" >Add Bag</button>

                </form>



                <form action = "InformationDetail.php" method = "POST">
                
                    <button type = "submit"  style = " margin-left : -30px; width :100%;" class = "btn-ID-add" name = "id-Detail"  value = "'. $item['IDItem'] .'">Detail</button>

                </form>
            </div>
           

            </div>';
        

        }
    }
    


}


?>