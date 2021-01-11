<link rel = "stylesheet" href = "CSS/cart.css">






<?php



function GetUserByID($IDCustomer)
{
    $db = new PDO('mysql:host=localhost;dbname=doan_ltw1;charset=utf8', 'root', 'admin');
    $stmt = $db->prepare("SELECT * FROM users where IDCustomer = ?");
    $stmt->execute(array($IDCustomer));
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $item = $data[0];
    return $item;
}


function CheckSession()
{

    session_start();
    if($_SESSION)
    {

    }
}


function LogoutSession()
{

    session_start();
    unset($_SESSION['email']);
}



function carousel($classify)
{

    
    AddToBag();


    $db = new PDO('mysql:host=localhost;dbname=doan_ltw1;charset=utf8', 'root', 'admin');
    $stmt = $db->prepare("SELECT * FROM top where classify = ?");
    $stmt->execute(array( $classify));
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo '<div class="owl-carousel owl-theme">';
    for($i = 0; $i < sizeof($data); $i++)
    {
        $item = $data[$i];
        echo '
        <div class="item">
            <img style = "width : 260px; height : 250px;" src="./SRC-Img/shoes/'. $item['img'] .'.jpg" alt="">
            <div  style = "margin-right : 40px;" class="btnCarousel"> 
                <form method = "POST" style = "width : 100%;">

                    <button style = "width : 100%; margin-right : 5px;" class="btn-ID-add" name = "id-item-add-bag" value = "'. $item['IDItem'] .'">add to card</button> 

                </form>
                <form action = "InformationDetail.php" style = "width : 100%;" method = "POST">

                    <button style = "width : 100%; margin-left : 5px;" class="btn-ID-add" name = "id-Detail" value = "'. $item['IDItem'].'" >Detail</button>

                </form>
            </div>
        </div>
        ';
    }
    echo '</div>';
   
}

function LoadItemMain()
{


    $db = new PDO('mysql:host=localhost;dbname=doan_ltw1;charset=utf8', 'root', 'admin');
    $stmt = $db->query("SELECT * FROM Item;");

    // lấy toàn bộ data
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);


    AddToBag();



    AddFavorite();



    echo '<div class = "show-item-for-main">';
    for($i = 0; $i < sizeof($data); $i++)
    {   
        $item = $data[$i];
        var_dump($item);
            echo '<div style = "margin-left : 20px;" class="item-Main">
            <img name = "id-Detail" class = "item-img" src="./SRC-Img/shoes/'. $item['img'] .'.jpg" alt="InformationDetail.php">

            <div style = "width : 50px; height : 50px; margin-left : 10px; float : left;" >
                <form method = "POST">
                    <button  name = "add-item-favorite" value = "'. $item['IDItem'] .'" class="btn-favorite">
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-heart-fill icon-favorite-img" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z"/>
                        </svg>
                    </button>
                </form>
                
            </div>
            
            
            <h4 style="text-align: center; margin-top: 10px; color : black;">$'. $item['Price'] .' USD</h4>

            <h3 style="text-align: center; margin-top: 10px; color: #000;" ><a style = "text-decoration : none; color : black;" name = "id-item" value = "'. $item['IDItem'] .'">'. $item['NameItem'] .'</a></h3>
            
            <div class = "form-add-detail" style = "margin-top : 25px; margin-left : 12px;">
                
                <form method = "POST">

                    <button type = "submit" style = " margin-left : -30px; width : 90%; " class = "btn-ID-add" name = "id-item-add-bag"  value = "'. $item['IDItem'] .'" >Add Bag</button>

                </form>
            

                <form action = "InformationDetail.php" method = "POST">

                    <button type = "submit"  style = " margin-left : -30px; width :100%;" class = "btn-ID-add" name = "id-Detail"  value = "'. $item['IDItem'] .'">Detail</button>

                </form>
                
            </div>
            
            </div>';
        // }

    }

    echo '</div>';
}



function LoadItem($gender)
{
    $db = new PDO('mysql:host=localhost;dbname=doan_ltw1;charset=utf8', 'root', 'admin');
    $stmt = $db->prepare("SELECT * FROM Item where gender = ?");
    $stmt->execute(array( $gender));
    // lấy toàn bộ data
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);



    AddToBag();



    AddFavorite();




    //global $users;
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

            <h4 style="text-align: center; margin-top: 10px;">$'. $item['Price'] .' USD</h4>
            <h3 style="text-align: center; margin-top: 10px; color: #000;" ><a style = "text-decoration : none; color : black;" href = "InformationDetail.php">'. $item['NameItem'] .'</a></h3>
            
            <div class = "form-add-detail" style = "margin-top : 25px; margin-left : 12px;">

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


function LoadItemTrademark($trademark)
{
    $db = new PDO('mysql:host=localhost;dbname=doan_ltw1;charset=utf8', 'root', 'admin');
    $stmt = $db->query("SELECT * FROM Item where trademark = '. $trademark .'; ");
    // lấy toàn bộ data
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

    AddToBag();

    AddFavorite();

    //global $users;
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



function LoadItemFavorite()
{
    
    AddToBag();


    ClearItemFavorite();


    $db = new PDO('mysql:host=localhost;dbname=doan_ltw1;charset=utf8', 'root', 'admin');
    $stmt = $db->query("SELECT * FROM favourite;");
    // lấy toàn bộ data
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
         //global $users;
        for($i = 0; $i < sizeof($data); $i++)
        {   
            $item = $data[$i];
            echo '
            
            <div style = "margin-left : 40px;  margin-top : 40px; " class="item-Main">
                <img style = "margin-left : 0%;" class = "item-img" src="./SRC-Img/shoes/'. $item['img'] .'.jpg" alt="">
                <h4 style="text-align: center; margin-top: 20px;">$'. $item['Price'] .' USD</h4>
                <form method = "POST">

                    <h3 style="text-align: center; margin-top: 5px; color: #000;" ><a style = "text-decoration : none; color : black;" name = "id-item" value = "'. $item['IDItem'] .'" ">'. $item['NameItem'] .'</a></h3>


                    <button style = "width :40%;" class = "btn-ID-add" name = "id-item-add-bag"  value = "'. $item['IDItem'] .'" >Add Bag</button>

                    <button type = "submit"  style = "width :40%;" class = "btn-ID-add" name = "id-item-clear"  value = "'. $item['IDItem'] .'"  >clear</button>

                </form>
                
                </div>
            
            ';

        }
    }

   
}


function LoadItemCart()
{

    removeItemCart();


    $db = new PDO('mysql:host=localhost;dbname=doan_ltw1;charset=utf8', 'root', 'admin');
    $stmt = $db->query("SELECT * FROM cart;");
    // $stmt->execute(array($id));

    // lấy toàn bộ data

    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

    

    for($i = 0; $i < sizeof($data); $i++)
    {
        $item = $data[$i];
        echo '

        <div class="product">
            <div class="product-image">
                <img src="./SRC-Img/shoes/'. $item['img'] .'.jpg">
            </div>
            <div class="product-details">
                <div class="product-title">'.  $item['NameItem'] .'</div>
                <p class="product-description">'.  $item['information'] .'</p>
            </div>
            <div class="product-price">'.  $item['price'] .'</div>

           

            <div class="product-quantity">   

                <input style = "padding : 0px; width : 70px; height : 50px; text-align : center;" id = "input-quantity" type="number" value="'. $item['quantity'] .'" min="1">

            </div>

            <div class="product-removal">
                <form method = "POST">
                    <button class="remove-product" name = "id-Remove-item" value = "'. $item['IDItem'] .'" >
                        Remove
                    </button>
                </form>
                
            </div>

            <div class="product-line-price" id = "totalPrice"  value = "" >'. $item['price'] .'</div>

        </div>

        
        ';
    }
}


function Checkout()
{

    if(isset($_COOKIE['IDCustomer']))
    {

        if( $GLOBALS['sub'] == 0)
        {
            $GLOBALS['shipping'] = 0;
            $GLOBALS['total'] = 0;
        }
        echo '
        <div class="totals">
            <div class="totals-item">
                <label>Subtotal</label>
                <div class="totals-value" id="cart-subtotal">'. $GLOBALS['sub'] .'</div>
            </div>
            <div class="totals-item">
                <label>Tax (5%)</label>
                <div class="totals-value" id="cart-tax">'. $GLOBALS['tax'] .'</div>
            </div>
            <div class="totals-item">
                <label>Shipping</label>
                <div class="totals-value" id="cart-shipping">'. $GLOBALS['shipping'] .'</div>
            </div>
            <div class="totals-item totals-item-total">
                <label>Grand Total</label>
                <div class="totals-value" id="cart-total">'. $GLOBALS['total'] .'</div>
            </div>
        </div>

        <form method = "POST" action = "MainApp.php">

            <button class="checkout" onclick = "checkoutCart()" >Checkout</button>
        
        </form>
        
        
        ';

    }
    else
    {

        echo '
        <div style = "margin : auto; height : 400px; width : 100%; margin-top : 300px; ">
    
            <h1 style = "color : red;"> You Should login Before Checkout </h1>
    
        </div>
        ';

        

    }
    
}



function removeItemCart()
{

    if(isset($_POST['id-Remove-item']))
    {
        $IDItem = $_POST['id-Remove-item'];


        $db1 = new PDO('mysql:host=localhost;dbname=doan_ltw1;charset=utf8', 'root', 'admin');
        $stmt1 = $db1->prepare("DELETE FROM cart where IDItem = ?");
        $stmt1->execute(array($IDItem));
    }


}




function AddFavorite()
{
    if(isset($_POST['add-item-favorite']))
    {
        $IDItem = $_POST['add-item-favorite'];


        $db = new PDO('mysql:host=localhost;dbname=doan_ltw1;charset=utf8', 'root', 'admin');
        $stmt = $db->prepare("SELECT * FROM Item where IDItem = ?");
        $stmt->execute(array($IDItem));

        // lấy toàn bộ data
        $data1 = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
        $item1 = $data1[0];
        $GLOBALS['item'] = $data1[0];

       
        $stmt = $db->prepare("INSERT INTO favourite (IDItem, NameItem, Price, img) value (? , ?, ?, ?);" );
        $stmt->execute(array($item1['IDItem'], $item1['NameItem'], $item1['Price'], $item1['img']));
    
    }

}


function AddToBag()
{
    if(isset($_POST['id-item-add-bag']))
    {
        $IDItem = $_POST['id-item-add-bag'];


        $db1 = new PDO('mysql:host=localhost;dbname=doan_ltw1;charset=utf8', 'root', 'admin');
        $stmt1 = $db1->prepare("SELECT * FROM Item where IDItem = ?");
        $stmt1->execute(array($IDItem));

        // lấy toàn bộ data

        $data1 = $stmt1->fetchAll(PDO::FETCH_ASSOC);
    
        $item1 = $data1[0];

        $GLOBALS['item'] = $data1[0];



        $stmt = $db1->prepare("INSERT INTO cart(IDItem, NameItem, price, quantity, total, img, information) value (?, ?, ?, 1, ?, ?, ?);" );
        $stmt->execute(array($item1['IDItem'], $item1['NameItem'], $item1['Price'], $item1['Price'], $item1['img'], $item1['infomation']));
    
    
        $stmt = $db1->prepare("DELETE FROM favourite where IDItem = ?;" );
        $stmt->execute(array($IDItem));
      
    
    }


}



function ClearItemFavorite()
{
    if(isset($_POST['id-item-clear']))
    {
        $IDItem = $_POST['id-item-clear'];

        $db = new PDO('mysql:host=localhost;dbname=doan_ltw1;charset=utf8', 'root', 'admin');


        $stmt = $db->prepare("DELETE FROM favourite where IDItem = ?;" );
        $stmt->execute(array($IDItem));
      

    }
}


function Temp()
{

    echo '
    
    <div class="container text-center my-3">
    <h2>Our Certifications</h2>
    <div class="row mx-auto my-auto">
        <div id="recipeCarousel" class="carousel slide w-100" data-ride="carousel">
            <div class="carousel-inner w-100" role="listbox">
                <div class="carousel-item active">
                    <img width="900" height="1200" class="d-block col-3 img-fluid" src="https://cdn.shopify.com/s/files/1/2304/9095/files/NMSDC.png?10873">
                </div>
                <div class="carousel-item">
                    <img class="d-block col-3 img-fluid" src="https://cdn.shopify.com/s/files/1/2304/9095/files/DBE-ACDBE-logo.png?10873">
                </div>
                <div class="carousel-item">
                    <img class="d-block col-3 img-fluid" src="https://cdn.shopify.com/s/files/1/2304/9095/files/MBE_LOGO.png?10873">
                </div>
                <div class="carousel-item">
                    <img class="d-block col-3 img-fluid" src="https://cdn.shopify.com/s/files/1/2304/9095/files/2018_WBENC_logo_text_gray.png?10873">
                </div>
                <div class="carousel-item">
                    <img class="d-block col-3 img-fluid" src="http://novel-mg.com/assets/cert_logo.png">
                </div>
                <div class="carousel-item">
                    <img class="d-block col-3 img-fluid" src="https://www.kriaanet.com/wp-content/uploads/2019/02/300ppi-feat-logo_feat_logo-EDWOSB.png">
                </div>
            </div>
            <a class="carousel-control-prev" href="#recipeCarousel" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#recipeCarousel" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
</div>
    ';
}


function SearchItem($nameSearch, $gender)
{
    
    $db = new PDO('mysql:host=localhost;dbname=doan_ltw1;charset=utf8', 'root', 'admin');
    $stmt = $db->prepare("SELECT * FROM Item where NameItem = ? and gender = ?;");
    $stmt->execute(array($nameSearch, $gender));
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    if($data == null)
    {
        echo '
        <div>
        </div>
            <div >

                <h1 style = "color : red; margin-left : 40%;">NO RESULTS</h1>

            </div>
            <div>
        </div>
        <div>
        </div>

        ';
    }
    else
    {
        for($i = 0; $i < sizeof($data); $i++)
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

            <h4 style="text-align: center; margin-top: 10px;">$'. $item['Price'] .' USD</h4>
            <h3 style="text-align: center; margin-top: 10px; color: #000;" ><a style = "text-decoration : none; color : black;" href = "InformationDetail.php">'. $item['NameItem'] .'</a></h3>
            
            <div class = "form-add-detail" style = "margin-top : 25px; margin-left : 12px;">

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