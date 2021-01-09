<?php include 'Header.php' ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset ="utf-8" name="viewport" content="width=device-width, initial-scale=1">
    <title>About me</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="./CSS/profile.css">
</head>

<body style = "margin-top : 120px;" >

    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>

<div class="wrapper">
    <div class="left">
        <img src="./SRC-Img/avartar.jpg" alt="user" width="400">
        <h4>GOLD MEMBER</h4>
    </div>
    <div class="right">
        <div class="info">
            <div class="name">
                <h3>LÊ TẤN ĐẠT</h3>
            </div>
            <div class="info_data">
                 <div class="data">
                    <h4>Email</h4>
                    <p>letandat18ck1@gmail.com</p>
                 </div>
                 <div class="data">
                   <h4>Phone</h4>
                    <p>0786133155</p>
              </div>
            </div>
        </div>
      
      <div class="projects">
        <div class="projects_data">
             <div class="data">
                <h4>Address</h4>
                <p>Long An, Việt Nam</p>
             </div>
             <div class="data">
               <h4>Date of birth</h4>
                <p>2000</p>
          </div>
        </div>
     </div>
     <div class="images-selector">
        <input type="radio" id="1" name="image" value="duck">
        <label for="1" class="img-card img1"></label>
        <input type="radio" id="2" name="image" value="dog">
        <label for="2" class="img-card img2"></label>
        <input type="radio" id="3" name="image" value="cat">
        <label for="3" class="img-card img3"></label>
      </div>
    </div>
</div>

<div style = "margin-top : 600px;">
      <?php include "Footer.php" ?>
    <div>
</body>
</html>

