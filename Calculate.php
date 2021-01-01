



<?php

if(isset($_POST['subtotal']))
{
  $sub = $_POST['subtotal'];
  $tax = $_POST['tax'];
  $shipping = $_POST['shipping'];
  $total = $_POST['total'];

  if($sub == 0)
  {

  
  }
  else
  {

    $db = new PDO('mysql:host=localhost;dbname=doan_ltw1;charset=utf8', 'root', 'admin');     

    $stmt = $db->prepare("INSERT INTO bill (id, IDBill, IDCustomer, subTotal, tax, shipping, grandTotal) value (1 , '1', '1', ?, ?, ?, ?);" );
    $stmt->execute(array($sub, $tax, $shipping, $total));
  
  
    $stmt = $db->query("SELECT * FROM cart;");
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

    for($i = 0; $i < sizeof($data); $i++)
    {
      $item = $data[$i];
      $stmt = $db->prepare("DELETE FROM cart where id = ?;");
      $stmt->execute(array($item['id']));
    } 
  
    

  }


    
 
}



// var_dump($sub + $tax + $shipping + $total);

// $db = new PDO('mysql:host=localhost;dbname=doan_ltw1;charset=utf8', 'root', 'admin');     

// $stmt = $db->prepare("INSERT INTO bill (id, IDBill, IDCustomer, subTotal, tax, shipping, grandTotal) value (1 , '1', '1', ?, ?, ?, ?);" );
// $stmt->execute(array($sub, $tax, $shipping, $total));




?>

