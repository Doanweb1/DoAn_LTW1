<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css"> -->
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js"></script> -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"></script> -->
<?php

    

?>
<link rel = "stylesheet" type = "text/css" href = "./CSS/comment.css">

<div style = "width : 100%;">

    <div style = "width : 78%; margin-left : 25%;" class="container mt-5 ">
        <div class="row d-flex justify-content-center">
            <div class="col-md-8">
               


                <?php 
                    
                    $db = new PDO('mysql:host=localhost;dbname=doan_ltw1;charset=utf8', 'root', 'admin');     
  
                    $stmt = $db->query("SELECT * FROM comments;");
                    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

                    echo '
                    <div class="headings d-flex justify-content-between align-items-center mb-3">

                        <h2>Unread comments : '. sizeof($data) .' </h2>


                    </div>

                    ';


                    for($i = 0; $i < sizeof($data); $i++)
                    {
                        $item = $data[$i];

                        $db1 = new PDO('mysql:host=localhost;dbname=doan_ltw1;charset=utf8', 'root', 'admin');
                        $stmt1 = $db1->prepare("SELECT * FROM users where IDCustomer = ?");
                        $stmt1->execute(array( $item['IDCustomer']));
                        $data1 = $stmt1->fetchAll(PDO::FETCH_ASSOC);

                       
                        $item1 = $data1[0];
                        echo '
                        <div class="card p-3">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="user d-flex flex-row align-items-center">
                                    <img src="./SRC-Img/'. $item1['avartar'] .'.jpg" width="80" class="user-img rounded-circle mr-2">
                                    <span>
                                        <h3><small class="font-weight-bold text-primary">'. $item1['NAME']  .'</small></h3>
                                        <h4><small class="font-weight-bold">'. $item['COMMENT'] .'</small></h4>
                                    </span> 
                                </div>
                                <small>'.  $item['dateComment'] .'</small>
                            </div>
                            <div class="action d-flex justify-content-between mt-2 align-items-center">
                                <div class="reply px-4"> <small>Remove</small> <span class="dots"></span> <small>Reply</small> <span class="dots"></span> <small>Translate</small> </div>
                                <div class="icons align-items-center"> <i class="fa fa-star text-warning"></i> <i class="fa fa-check-circle-o check-icon"></i> </div>
                            </div>
                        </div>

                        
                        ';


                    }
                ?>



                <!-- <div class="card p-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="user d-flex flex-row align-items-center"> <img src="https://i.imgur.com/hczKIze.jpg" width="80" class="user-img rounded-circle mr-2"> <span><small class="font-weight-bold text-primary">james_olesenn</small> <small class="font-weight-bold">Hmm, This poster looks cool</small></span> </div> <small>2 days ago</small>
                    </div>
                    <div class="action d-flex justify-content-between mt-2 align-items-center">
                        <div class="reply px-4"> <small>Remove</small> <span class="dots"></span> <small>Reply</small> <span class="dots"></span> <small>Translate</small> </div>
                        <div class="icons align-items-center"> <i class="fa fa-star text-warning"></i> <i class="fa fa-check-circle-o check-icon"></i> </div>
                    </div>
                </div>
                <div class="card p-3 mt-2">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="user d-flex flex-row align-items-center"> <img src="https://i.imgur.com/C4egmYM.jpg" width="80" class="user-img rounded-circle mr-2"> <span><small class="font-weight-bold text-primary">olan_sams</small> <small class="font-weight-bold">Loving your work and profile! </small></span> </div> <small>3 days ago</small>
                    </div>
                    <div class="action d-flex justify-content-between mt-2 align-items-center">
                        <div class="reply px-4"> <small>Remove</small> <span class="dots"></span> <small>Reply</small> <span class="dots"></span> <small>Translate</small> </div>
                        <div class="icons align-items-center"> <i class="fa fa-check-circle-o check-icon text-primary"></i> </div>
                    </div>
                </div>
                <div class="card p-3 mt-2">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="user d-flex flex-row align-items-center"> <img src="https://i.imgur.com/0LKZQYM.jpg" width="80" class="user-img rounded-circle mr-2"> <span><small class="font-weight-bold text-primary">rashida_jones</small> <small class="font-weight-bold">Really cool Which filter are you using? </small></span> </div> <small>3 days ago</small>
                    </div>
                    <div class="action d-flex justify-content-between mt-2 align-items-center">
                        <div class="reply px-4"> <small>Remove</small> <span class="dots"></span> <small>Reply</small> <span class="dots"></span> <small>Translate</small> </div>
                        <div class="icons align-items-center"> <i class="fa fa-user-plus text-muted"></i> <i class="fa fa-star-o text-muted"></i> <i class="fa fa-check-circle-o check-icon text-primary"></i> </div>
                    </div>
                </div>
                <div class="card p-3 mt-2">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="user d-flex flex-row align-items-center"> <img src="https://i.imgur.com/ZSkeqnd.jpg" width="80" class="user-img rounded-circle mr-2"> <span><small class="font-weight-bold text-primary">simona_rnasi</small> <small class="font-weight-bold text-primary">@macky_lones</small> <small class="font-weight-bold text-primary">@rashida_jones</small> <small class="font-weight-bold">Thanks </small></span> </div> <small>3 days ago</small>
                    </div>
                    <div class="action d-flex justify-content-between mt-2 align-items-center">
                        <div class="reply px-4"> <small>Remove</small> <span class="dots"></span> <small>Reply</small> <span class="dots"></span> <small>Translate</small> </div>
                        <div class="icons align-items-center"> <i class="fa fa-check-circle-o check-icon text-primary"></i> </div>
                    </div>
                </div> -->



            </div>
        </div>
    </div>


    <div style = "margin-left : auto;" class="container pb-cmnt-container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel panel-info">
                    <div class="panel-body">

                      <?php 

                      echo '
                        <form class="form-inline" method = "POST" action = "InformationDetail.php">

                            <input name = "input-comment" class="pb-cmnt-textarea"   placeholder="Write your comment here!"/>


                            <button name = "btn-comment" class="btn btn-primary pull-right" type="submit" value = "'. $GLOBALS['ID'] .'">Share</button>

                        </form>
                        ';

                        ?>

                    </div>
                </div>
            </div>
        </div>
    </div>

</div>




