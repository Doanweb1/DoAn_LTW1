






<?php 
include "Header.php";
include "navigationChose.php";
include "Function.php";


?>





<script>


function AddToCart()
    {
        var id = document.getElementById("Btn-Add-To-Cart").value;
        $(document).ready(function()
        {

            console.log("da vao trong mainApp");
            $.ajax({
                url: "AddToBag.php",
                method: "POST",
                data: {id: id},
                success: function(response) { console.log(response); }
            });
        });

        
    }


    

</script>



<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href = "CSS/MainApp.css">

<body>

    <div id = "background-first-main">

    </div>

    <div class = "background-second-main">

        <div class = "background-second-main-left">
            <img style = "height : 500px;" src = "./SRC-Img/background21.jpg">
            <h3>GIÀY PHARRELL WILLIAMS HU NMD</h3>
            <a src = "InformationDetail.php"><button style = "width :20%; margin-left : 10%; " class = "btn-ID-add" >Detail</button></a>
        </div>


        <div class = "background-second-main-right">
            <img style = "height : 500px;"src = "./SRC-Img/background22.jpg">
            <h3>FEEL THE BOOST</h3>
            <h4>Bold. Bright. Full of energy. The latest Ultraboost DNA in Color. Exclusively through adidas.</h4>
            <a src = "InformationDetail.php"><button style = "width :25%; margin-left : 10%; margin-top : -100px; " class = "btn-ID-add" >Detail</button></a>

        </div>
    </div>
    

    
        <?php 

            LoadItemMain();

        ?>


    
    

    <div class = "background-third-main">
        

    </div>


    <div class = "background-fourth-main">

        <div class = "background-fourth-main-left">
            <img style = "width : 95%; height : 500px; margin-right : 30px;" src = "./SRC-Img/background41.jpg">
        </div>


        <div class = "background-fourth-main-right">
        <img style = "height : 500px; margin-left : 10px;" src = "./SRC-Img/background42.jpg">

        </div>

    </div>

<?php include "Footer.php"; ?>
</body>
</html>