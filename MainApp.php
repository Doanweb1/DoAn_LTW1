
<?php 
include "Header.php";
include "navigationChose.php";
include "Function.php";
include "controllers/authController.php";




if(isset($_GET['token'])){
    $passwordToken = $_GET['token'];
    var_dump($passwordToken);
    // resetPassword($passwordToken);
}
?>





<script>


$('#recipeCarousel').carousel({
  interval :2000
})

$('.carousel .carousel-item').each(function(){
    var next = $(this).next();
    if (!next.length) {
    next = $(this).siblings(':first');
    }
    next.children(':first-child').clone().appendTo($(this));
    
    for (var i=0;i<2;i++) {
        next=next.next();
        if (!next.length) {
        	next = $(this).siblings(':first');
      	}
        
        next.children(':first-child').clone().appendTo($(this));
    }
});


function AddToCart()
    {
        var id = document.getElementById("Btn-Add-To-Cart").value;
        $(document).ready(function()
        {

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


   
    </div>

      
    <h1 style="color:blue">Top 10 Sản Phẩm mới Nhất</h1>
    <?php 

        $classify = "MH";

        carousel($classify);
        
    ?>
    
</div>


<div>

 


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
            <a src = "InformationDetail.php"><button style = "width :20%; margin-left : 10%; margin-top : -30px; " class = "btn-ID-add" >Detail</button></a>
        </div>
    </div>
    

  
        

    <h1 style="color:blue">Top 10 Sản Phẩm Bán Chạy Nhất</h1>
    <?php 

        $classify = "BC";

        carousel($classify);

    ?>



    <div class = "background-third-main">


    </div>



    <h1 style="color:blue">Top 10 Sản Yêu Thích Nhất</h1>
    <?php 

        $classify = "YT";
        carousel($classify);
    ?>

    <div class = "background-fourth-main">

        <div class = "background-fourth-main-left">
            <img style = "width : 95%; height : 500px; margin-right : 30px;" src = "./SRC-Img/background41.jpg">
        </div>


        <div class = "background-fourth-main-right">
        <img style = "height : 500px; margin-left : 10px;" src = "./SRC-Img/background42.jpg">

        </div>

    </div>


    <!-- js carousel -->
    <script>
    $('.owl-carousel').owlCarousel({
    loop:true,
    margin:10,
    nav:true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:5
        }
    }
})</script>
<?php include "Footer.php"; ?>
</body>
</html>