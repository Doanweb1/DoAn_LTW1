<?php   

include "Header.php";
include "Function.php";


if(isset($_COOKIE['IDCustomer']))
{
    
    $db = new PDO('mysql:host=localhost;dbname=doan_ltw1;charset=utf8', 'root', 'admin');
    $stmt = $db->prepare("SELECT * FROM bill where IDCustomer = ?");
    $stmt->execute(array($_COOKIE['IDCustomer']));
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $i = sizeof($data) - 1;
    $item = $data[$i];

    $user = GetUserByID($_COOKIE['IDCustomer']);


    if(sizeof($item) == 0)
    {
        echo '
        <div style = "margin : auto; height : 400px; width : 100%; margin-top : 300px; ">
    
            <h1 style = "color : red;"> Nothing On The Bill</h1>
    
        </div>
        ';

    }
    else
    {


        
    echo '
    

    
    <style>
    body{margin-top:20px;}
    </style>
    
    
    <div   class="container">
    
        <div  style = "margin-top : 120px;" class="row">
            <div class="col-12">
                <table class="body-wrap" style="font-family: Helvetica Neue,Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; width: 100%; background-color: #f6f6f6; margin: 0;" bgcolor="#f6f6f6">
                    <tbody><tr style="font-family: Helvetica Neue,Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                        <td style="font-family: Helvetica Neue,,Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0;" valign="top"></td>
                        <td class="container" width="600" style="font-family: Helvetica Neue,Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; display: block !important; max-width: 600px !important; clear: both !important; margin: 0 auto;" valign="top">
                            <div class="content" style="font-family: Helvetica Neue ,Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; max-width: 600px; display: block; margin: 0 auto; padding: 20px;">
                                <table class="main" width="100%" cellpadding="0" cellspacing="0" style="font-family: Helvetica Neue,Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; border-radius: 3px;  margin: 0; border: none;">
                                    <tbody><tr style="font-family: Helvetica Neue,Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                        <td class="content-wrap aligncenter" style="font-family: Helvetica Neue,Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0;padding: 20px;border: 3px solid #1d1e3a;border-radius: 7px; background-color: #fff;" align="center" valign="top">
                                            <table width="100%" cellpadding="0" cellspacing="0" style="font-family: Helvetica Neue,Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                                <tbody><tr style="font-family: Helvetica Neue,Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                                    <td class="content-block" style="font-family: Helvetica Neue,Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 0 0 20px;" valign="top">
                                                        <h2 class="aligncenter" style="font-family: Helvetica Neue,Helvetica,Arial,Helvetica Neue,sans-serif; box-sizing: border-box; font-size: 24px; color: #000; line-height: 1.2em; font-weight: 400; text-align: center; margin: 40px 0 0;" align="center">Billing</h2>
                                                    </td>
                                                </tr>
                                                <tr style="font-family: Helvetica Neue,Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                                    <td class="content-block aligncenter" style="font-family: Helvetica Neue,Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; text-align: center; margin: 0; padding: 0 0 20px;" align="center" valign="top">
                                                        <table class="invoice" style="font-family: Helvetica Neue,Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; text-align: left; width: 80%; margin: 40px auto;">
                                                            <tbody><tr style="font-family: Helvetica Neue,Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                                                <td style="font-family: Helvetica Neue,Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 5px 0;" valign="top"><b>'. $user['username']  .'</b>
                                                                    <br style="font-family: Helvetica Neue,Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">'. $user['email'] .'
                                                                </td>
                                                            </tr>
                                                            <tr style="font-family: Helvetica Neue,Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                                                <td style="font-family: Helvetica Neue,Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 5px 0;" valign="top">
                                                                    <table class="invoice-items" cellpadding="0" cellspacing="0" style="font-family: Helvetica Neue,Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; width: 100%; margin: 0;">
                                                                        <tbody><tr style="font-family: Helvetica Neue,Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                                                            <td style="font-family: Helvetica Neue,Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; border-top-width: 1px; border-top-color: #eee; border-top-style: solid; margin: 0; padding: 5px 0;" valign="top">SubTotal
                                                                            </td>
                                                                            <td class="alignright" style="font-family: Helvetica Neue,Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; text-align: right; border-top-width: 1px; border-top-color: #eee; border-top-style: solid; margin: 0; padding: 5px 0;" align="right" valign="top">'. $item['subTotal'] .'
                                                                            </td>
                                                                        </tr>
                                                                        <tr style="font-family: Helvetica Neue,Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                                                            <td style="font-family: Helvetica Neue,Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; border-top-width: 1px; border-top-color: #eee; border-top-style: solid; margin: 0; padding: 5px 0;" valign="top">Tax
                                                                            </td>
                                                                            <td class="alignright" style="font-family: Helvetica Neue,Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; text-align: right; border-top-width: 1px; border-top-color: #eee; border-top-style: solid; margin: 0; padding: 5px 0;" align="right" valign="top">'. $item['tax'] .'
                                                                            </td>
                                                                        </tr>
                                                                        <tr style="font-family: Helvetica Neue,Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                                                            <td style="font-family: Helvetica Neue,Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; border-top-width: 1px; border-top-color: #eee; border-top-style: solid; margin: 0; padding: 5px 0;" valign="top">Shipping
                                                                            </td>
                                                                            <td class="alignright" style="font-family: Helvetica Neue ,Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; text-align: right; border-top-width: 1px; border-top-color: #eee; border-top-style: solid; margin: 0; padding: 5px 0;" align="right" valign="top">'. $item['shipping'] .'
                                                                            </td>
                                                                        </tr>
                                                                        <tr class="total" style="font-family: Helvetica Neue ,Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                                                            <td class="alignright" width="80%" style="font-family: Helvetica Neue,Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; text-align: right; border-top-width: 2px; border-top-color: #333; border-top-style: solid; border-bottom-color: #333; border-bottom-width: 2px; border-bottom-style: solid; font-weight: 700; margin: 0; padding: 5px 0;" align="right" valign="top">Total
                                                                            </td>
                                                                            <td class="alignright" style="font-family: Helvetica Neue,Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; text-align: right; border-top-width: 2px; border-top-color: #333; border-top-style: solid; border-bottom-color: #333; border-bottom-width: 2px; border-bottom-style: solid; font-weight: 700; margin: 0; padding: 5px 0;" align="right" valign="top">'. $item['grandTotal'] .'
                                                                            </td>
                                                                        </tr>
                                                                    </tbody></table>
                                                                </td>
                                                            </tr>
                                                        </tbody></table>
                                                    </td>
                                                </tr>
                                                <tr style="font-family: Helvetica Neue,Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                                    <td class="content-block aligncenter" style="font-family: Helvetica Neue ,Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; text-align: center; margin: 0; padding: 0 0 20px;" align="center" valign="top">
                                                        Shoes Inc. Always live av, 72823
                                                    </td>
                                                </tr>
    
                                                <tr style="font-family: Helvetica Neue ,Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                                    <td class="content-block" style="text-align: center;font-family: Helvetica Neue ,Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 0;" valign="top">
                                                        © 2020 Shoes
                                                    </td>
                                                </tr>
                                            </tbody></table>
                                        </td>
                                    </tr>
                                </tbody></table>
                            </div>
                        </td>
                    </tr>
                </tbody></table>
            </div>
        </div>
    </div>
    
    
    
        
        ';



    }




}
else
{
    echo '
    <div style = "margin : auto; height : 400px; width : 100%; margin-top : 300px; ">

        <h1 style = "color : red;"> You are not logged in</h1>

    </div>
    ';
}




?>


<?php  include "Footer.php"  ?>