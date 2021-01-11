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


    <form style = "margin-top : 50px; margin-left : 40%;" class="example" action="Children.php" method = "POST">
        <input  name="input-search-children" style = "width : 250px; color : black;" type="text" placeholder="Search...">
        <button name="btn-search-children"  type="submit"style = "background-color : black; width : 50px; height : 45px;" ><i class="fa fa-search"></i></button>
    </form>

    <div class="container-right">


        <?php 


        if(isset($_POST['btn-search-children']))
        {
            $NameSearch = $_POST['input-search-children'];
            $gender = "Children";
            SearchItem($NameSearch, $gender);
        }
        else
        {
            LoadItem("Children");

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