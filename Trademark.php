<?php 
include "Header.php";
include "navigationChose.php";
include "Function.php";

?>

<!DOCTYPE html>
<html lang="en">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">





<body>
<div style = "margin : 0px; margin-right: 0px; padding : 0px;">


    <form style = "margin-top : 50px; margin-left : 40%;" class="example" action="action_page.php">
        <div style = "width:30%; height: 50px; margin-top: 40px; color : black;">
            <select style = "width:100%; height: 50px; border-radius: 5px; font-size: 20px;" id = "Search-trademark" onchange = "getSelectValue()">
              <!-- <option value="gender">Trademark</option> -->
              <option value="adidas"> Adidas</option>
              <option value="nike"> Nike</option>
              <option value="Balenciaga"> Balenciaga</option>
              <option value="ananas"> Ananas</option>
              <option value="Bitis"> Bitis</option>
              <option value="Puma"> Puma</option>
              <option value="Converse"> Converse</option>
              <option value="Vans"> Vans</option>
              <option value="Muzino"> Muzino</option>

            </select>
                <!-- <button style = "float : left;" name="btn-search-women"  type="submit"style = "background-color : black; width : 50px; height : 45px;" ><i class="fa fa-search"></i></button> -->

            <!-- <input type = "text"  id = "input-trade"/> -->
        </div>
    </form>


    


<script>

function getSelectValue()
{
    var selectedValue = document.getElementById("Search-trademark").value;

    $.ajax({
        url: "FindTrademark.php",
        method : "POST",
        data: {trade : selectedValue},
        success: function(response) {
            
            document.getElementById("Item-Trademark").innerHTML =   response;
            // console.log(response);
        }
    });

    console.log(selectedValue);
} 


</script>

    <div class="container-right" id = "Item-Trademark">


    <?php 

        if(isset($_POST['trade']))
        {
            $trade = $_POST['trade'];
          
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
                    <img class = "item-img" src="./SRC-Img/item'. $item['img'] .'.jpg" alt="">
                    
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

    </div>


    <ul class="pagination modal-5">
        <li><a href="#" class="prev fa fa-arrow-left"> </a></li>
        <li> <a href="#">1</a></li>
        <li> <a href="#">2</a></li>
        <li> <a href="#">3</a></li>
        <li> <a href="#">4</a></li>
        <li><a href="#" class="active">5</a></li>
        <li> <a href="#">6</a></li>
        <li> <a href="#">7</a></li>
        <li> <a href="#">8</a></li>
        <li> <a href="#">9</a></li>
        <li><a href="#" class="next fa fa-arrow-right"></a></li>
        </ul>
    <br> 
    
    <?php include "Footer.php" ?>
</div>


</body>
</html>