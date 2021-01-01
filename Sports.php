<?php 
include "Header.php";
include "navigationChose.php";
include "Function.php";
?>

<!DOCTYPE html>
<html lang="en">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<link rel = "stylesheet" href = "./CSS/MainApp.css">

<body>
<div style = "margin : 0px; margin-right: 0px; padding : 0px;">


<form style = "margin-top : 50px; margin-left : 40%;" class="example" action="Sports.php" method = "POST">
        <input  name="input-search-sports" style = "width : 250px; color : black;" type="text" placeholder="Search...">
        <button name="btn-search-sports"  type="submit"style = "background-color : black; width : 50px;" ><i class="fa fa-search"></i></button>
    </form>

    <div class="container-right">


    <?php 
        if(isset($_POST['btn-search-sports']))
        {
            $NameSearch = $_POST['input-search-sports'];
            $gender = "Sports";
            SearchItem($NameSearch, $gender);
        }
        else
        {
            LoadItem("Sports");

        }

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