<?php include 'Header.php';
include "Function.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./CSS/cart.css"/>

    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js" charset="utf-8"></script>
     
<script type="text/javascript">


$(document).ready(function() {
 
  /* Set rates + misc */
  var taxRate = 0.05;
  var shippingRate = 15.00; 
  var fadeTime = 300;
  
  
  /* Assign actions */
  $('.product-quantity input').change( function() {
    updateQuantity(this);
  });
  
  $('.product-removal button').click( function() {
    removeItem(this);
  });
  
  
  /* Recalculate cart */
  function recalculateCart()
  {
    var subtotal = 0;
    
    /* Sum up row totals */
    $('.product').each(function () {
      subtotal += parseFloat($(this).children('.product-line-price').text());

      console.log(parseFloat($(this).children('.product-line-price').text()));
    });
    
    /* Calculate totals */
    var tax = subtotal * taxRate;
    var shipping = (subtotal > 0 ? shippingRate : 0);
    var total = subtotal + tax + shipping;

    /* Update totals display */

    $('.totals-value').fadeOut(fadeTime, function() {
      $('#cart-subtotal').html(subtotal.toFixed(2));
      $('#cart-tax').html(tax.toFixed(2));
      $('#cart-shipping').html(shipping.toFixed(2));
      $('#cart-total').html(total.toFixed(2));
      if(total == 0){
        $('.checkout').fadeOut(fadeTime);
      }else{
        $('.checkout').fadeIn(fadeTime);
      }
      $('.totals-value').fadeIn(fadeTime);
    });
}
 


 
/* Update quantity */
function updateQuantity(quantityInput)
{

  console.log();

  /* Calculate line price */
  var productRow = $(quantityInput).parent().parent();
  var price = parseFloat(productRow.children('.product-price').text());
  var quantity = $(quantityInput).val();
  var linePrice = price * quantity;
   


  /* Update line price display and recalc cart totals */
  productRow.children('.product-line-price').each(function () {
    $(this).fadeOut(fadeTime, function() {
      $(this).text(linePrice.toFixed(2));
      recalculateCart();
      $(this).fadeIn(fadeTime);
    });
  });  
}
 
 
/* Remove item from cart */
function removeItem(removeButton)
{
  /* Remove row from DOM and recalc cart total */
  var productRow = $(removeButton).parent().parent();
  productRow.slideUp(fadeTime, function() {
    productRow.remove();
    recalculateCart();
  });
}
 
});
 
</script>


    <title>Nike. Shopping Cart</title>
</head>
<body style = "margin-top : 150px;">
    <h1 style = "text-align: center;" >Shopping Cart</h1>
 
<div style = "margin-top : 50px;" class="shopping-cart">
 
  <div class="column-labels">
    <label class="product-image">Image</label>
    <label class="product-details">Product</label>
    <label class="product-price">Price</label>
    <label class="product-quantity">Quantity</label>
    <label class="product-removal">Remove</label>
    <label class="product-line-price">Total</label>
  </div>


<script>

  function checkoutCart()
  {
   
    var subtotal = 0;
    $('.product').each(function () {
      subtotal += parseFloat($(this).children('.product-line-price').text());
    });
    
    /* Calculate totals */
    var tax = subtotal * 0.05;
    var shipping = 15.00;
    var total = subtotal + tax + shipping;


    $(document).ready(function() {

      console.log("da vao trong checkout");
      $.ajax({
        url: "Calculate.php",
        method: "POST",
        data: {subtotal: subtotal, tax : tax, shipping : shipping, total : total},
        success: function(response) { console.log(response); }
      });

    });
  }


</script>



  <?php 

  $db = new PDO('mysql:host=localhost;dbname=doan_ltw1;charset=utf8', 'root', 'admin');
  $stmt = $db->query("SELECT * FROM cart;");
  

  $data2 = $stmt->fetchAll(PDO::FETCH_ASSOC);

  $sub = 0;
  


  for($i = 0; $i < sizeof($data2); $i++)
  {
    $item = $data2[$i];
    $GLOBALS['sub'] = $GLOBALS['sub'] + $item['price'];
  }

  $tax = $sub * 0.05;
  $shipping = 15.00;
  $total = $sub + $tax + $shipping;


  LoadItemCart();
  Checkout();


  ?>
 
</div>
</body>
</html>

<?php include 'Footer.php'  ?>