<?php 
    include "Header.php";
    include "CSS/index.css";
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title>Title</title>
    
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" /> -->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous"/> -->
    
    <link rel = "stylesheet" type="text/css" href = "CSS/index.css">

    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" /> -->
</head>

<body>
    <div >
        <h1 style = "text-algin : center; margin-top : 100px; margin-left: 48%" >Favourites</h1>
        <div class = "container-favorite-allItem">

            <div class="d-flex">
                <div class="mr-5 item-favorite">
                    <img src="https://images.nike.com/is/image/DotCom/CT1682_002_A_PREM?align=0,1&cropN=0,0,0,0&resMode=sharp&fmt=jpg&bgc=f5f5f5" alt="" />
                    <div>
                        <p>Name</p>
                        <span> Cost </span>
                    </div>

                    <button class="toBad btn-addBag-favorite">add to bad</button>
                </div>

                <div class="mr-5 item-favorite">
                    <img src="https://images.nike.com/is/image/DotCom/CT1682_002_A_PREM?align=0,1&cropN=0,0,0,0&resMode=sharp&fmt=jpg&bgc=f5f5f5" alt="" />
                    <div>
                        <p>Name</p>
                        <span> Cost</span>
                    </div>

                    <button class="toBad">add to bad</button>
                </div>

                <div style = "float : left;" class="mr-5 item-favorite">
                    <img src="https://images.nike.com/is/image/DotCom/CT1682_002_A_PREM?align=0,1&cropN=0,0,0,0&resMode=sharp&fmt=jpg&bgc=f5f5f5" alt="" />
                    <div>
                        <p>Name</p>
                        <span> Cost</span>
                    </div>

                    <button class="toBad">add to bad</button>
                </div>

            </div>
        </div>

    </div>
    <!-- <div>
        <div class="owl-carousel owl-theme">
            <div class="item">
                <h4>1</h4>
            </div>
            <div class="item">
                <h4>2</h4>
            </div>
            <div class="item">
                <h4>3</h4>
            </div>
            <div class="item">
                <h4>4</h4>
            </div>
            <div class="item">
                <h4>5</h4>
            </div>
            <div class="item">
                <h4>6</h4>
            </div>
            <div class="item">
                <h4>7</h4>
            </div>
            <div class="item">
                <h4>8</h4>
            </div>
            <div class="item">
                <h4>9</h4>
            </div>
            <div class="item">
                <h4>10</h4>
            </div>
            <div class="item">
                <h4>11</h4>
            </div>
            <div class="item">
                <h4>12</h4>
            </div>
        </div> -->
    </div>

    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

    

    <script>
        $('.owl-carousel').owlCarousel({
            loop: true,
            margin: 10,
            nav: true,
            responsive: {
                0: {
                    items: 1,
                },
                600: {
                    items: 3,
                },
                1000: {
                    items: 5,
                },
            },
        });
    </script>
</body>
<?php include "footer.php" ?>
</html>