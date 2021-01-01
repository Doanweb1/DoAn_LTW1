<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" type = "text/css"  href="./CSS/MainApp.css">
    <title>Shoes</title>

    
		<link rel="stylesheet" type="text/css" href="css/normalize.css">
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<link rel="stylesheet" type="text/css" href="css/layout.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css" integrity="sha512-OTcub78R3msOCtY3Tc6FzeDJ8N9qvQn1Ph49ou13xgA9VsH9+LRxoFU6EqLhW4+PKRfU+/HReXmSZXHEkpYoOA==" crossorigin="anonymous" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous"></script>
        
        <meta name="viewport" content="width=device-width, initial-scale=1">

	</head>
	<body>

    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse"data-target="#myNavbar">
                    <span class="glyphicon glyphicon-menu-hamburger"></span>
                </button>
           
          
                <div class="navbar-left logo"> 
                    <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 291 385.3" style="enable-background:new 0 0 291 385.3;" xml:space="preserve">
                        <style type="text/css">
                            .st0{fill:#000;}
                        </style>

                        <polygon class="st0" points="82.1,12 7.4,138.7 38.7,237.3 "/>
                        <polygon class="st0" points="92.7,5.3 199.4,8.7 223.4,82.7 "/>
                        <polygon class="st0" points="89.4,8.7 223.4,86.7 42.1,237.3 "/>
                        <polygon class="st0" points="206.1,15.3 262.7,66 228.1,82.7 "/>
                        <polygon class="st0" points="262.7,70 228.1,86 266.4,175.3 "/>
                        <polygon class="st0" points="228.1,92.7 262.7,179.3 173.4,328 "/>
                        <polygon class="st0" points="223.4,92.7 44.7,240 167.7,336 "/>
                        <polygon class="st0" points="252.1,210.3 184.4,380.3 170.7,339.7 "/>
                        <polygon class="st0" points="60.1,260.3 167.4,341 180.4,380.3 "/>


                    </svg>


                </div>

		        <h1 class="brand brand-name navbar-left"><div class = "navbar-left"><a style = "color : black; text-decoration : none;" href = "MainApp.php">Shoes</a></div></h1>
            </div>

            <div class="collapse navbar-collapse navbar-right" id="myNavbar">
                <ul class="nav navbar-nav">
                    <li><a style = "font-size: 25px; font-family: 'Lobster Two', cursive; " href="MainApp.php">Home</a></li>
                    <li><a style = "font-size: 25px; font-family: 'Lobster Two', cursive; " href="profile.php">Profile</a></li>
                </ul>

                <a href = "Favorite.php" style = "background-color:#f8f8f8; border : none; color : black;">

                    <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-heart-fill icon-favorite" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z"/>
                    </svg>

                </a>

                <a href = "Cart.php" style = "background-color:#f8f8f8; border : none; color : black;">
                    <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-cart4 icon-cart" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l.5 2H5V5H3.14zM6 5v2h2V5H6zm3 0v2h2V5H9zm3 0v2h1.36l.5-2H12zm1.11 3H12v2h.61l.5-2zM11 8H9v2h2V8zM8 8H6v2h2V8zM5 8H3.89l.5 2H5V8zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z"/>
                    </svg>
                </a> 



                

                <div style = "margin-left : 110%; margin-top : -25px;">
                    <form>

                      <button >Login</button>

                    </form>
                </div>

            </div>  

            

        </div>


        

    </nav>



</head>
