<?php 
include "Header.php";
include "navigationChose.php";
?>

<!DOCTYPE html>
<html lang="en">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<body>
<div style = "margin : 0px; margin-right: 0px; padding : 0px;">


    <form style = "margin-top : 50px; margin-left : 40%;" class="example" action="action_page.php">
        <div style = "width:30%; height: 50px; margin-top: 40px; color : black;">
            <select style = "width:100%; height: 50px; border-radius: 5px; font-size: 20px;">
              <option value="gender">Trademark</option>
              <option value="man"> Adidas</option>
              <option value="women"> Nike</option>
              <option value="women"> Balenciaga</option>
              <option value="women"> Ananas</option>
              <option value="women"> Bitis</option>
              <option value="women"> Puma</option>
              <option value="women"> Converse</option>
              <option value="women"> Vans</option>
              <option value="women"> Muzino</option>

            </select>
        </div>
    </form>

    <div class="container-right">


    <?php 
        LoadItemTrademark('adidas');
    ?>

    </div>


    <div class = "btn-next-prev">
           
        <button class = 'btn-transform1' >previous</button>
        <h4 style = "color : black;" class = "page">2</h4>
        <button class = 'btn-transform2'>next</button>
        
            
            
    </div>

    <?php include "Footer.php" ?>
</div>



</body>
</html>