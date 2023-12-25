

<?php


$basePath = "http://$_SERVER[SERVER_NAME]$_SERVER[REQUEST_URI]";

// Get the path to the JSON file
$json_file_path = $basePath . 'assets/apple.json';

//echo $json_file_path;

$json_data = file_get_contents($json_file_path);
$jsonData = file_get_contents($json_file_path);

// Parse the JSON data
$decoded_data = json_decode($json_data, true);

// Check if decoding was successful
if ($decoded_data !== null) {
    //print_r($decoded_data);
} else {
    echo 'Error decoding JSON file.';
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apple-Store</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" 
    rel="stylesheet" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="assets/css/style.css">

    <script>
    function mobilemenu() {
      var x = document.getElementById("myTopnav");
      if (x.className === "topnav") {
        x.className += " responsive";
      } else {
        x.className = "topnav";
      }
    }
    </script>

</head>
<body>
    <section class="apple-header">
        <div class="container">
            <div class="header-main">   
                <div class="row">
                    <div class="mobile-menu">
                    <div class="col-sm-12 col-md-1 col-lg-1 text-center">
                        <img src="assets/images/header-logo.png">
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-11 header-menus pt-1">
                        <div class="topnav" id="myTopnav">
                        <a href="#store" class="active">Store</a>
                        <a href="#mac">Mac</a>
                        <a href="#ipad">iPad</a>
                        <a href="#iphone">iPhone</a>
                        <a href="#watch">Watch</a>
                        <a href="#airpods">AirPods</a>
                        <a href="#homepod">HomePod</a>
                        <a href="#accessories">Accessories</a>
                        <a href="#support">Support</a>
                        <a href="my-cart"><i class="fa-solid fa-bag-shopping"></i></a>

                        <a href="javascript:void(0);" class="icon" onclick="mobilemenu()">
                            <i class="fa fa-bars"></i>
                          </a>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="main-banner">
        <div class="container-fluid">
            <div class="top-banner">
                <div class="row">
                    <div class="col-12">
                        <p>iPhone 15 Pro</p>
                        <p class="sub-title text-center">Titanium. So strong. So light. So Pro.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="iphone-15">
        <div class="container-fluid">
            <div class="iphone15-banner">
                <div class="row">
                    <div class="col-12">
                        <div class="iphone15-img text-center">

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <p class="iphone15-sub-title">New camera. New design. Newphoria</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="store">
    <div class="menu">
        <div class="container-fluid">
            <div class="row">               
            <!--fetch  parent categories-->
                <?php 
                        foreach ($decoded_data['store'] as $store) {

                            echo ' <div class="col-sm-6 col-lg-2">';
                           
                            echo '<a href="#'.$store['name'].'">
                            <div class="item-menus">
                                <img src="/assets/images/' . $store['icon'] . '" alt="' . $store['name'] . '">
                                <p>' . $store['name'] . '</p>
                            </div>
                          </a>';
                            
                          echo '</div>';
                           
                        }
                    
                    ?>

                     <div class="col-sm-6 col-md-4 col-lg-2">
                            <a href="#homepod">
                                <div class="item-menus">
                                    <img src="assets/images/tv-menu.png">
                                    <p>HomePod</p>
                                </div>
                            </a>
                        </div>

            </div>
        </div>
    </div>
    </section>



        <?php 
               foreach ($decoded_data['store'] as $store) {
                echo '<section id="'. $store['name'] .'">';
                echo '<div class="mac-page pt-5">';
                echo '<div class="container">';
                echo '<div class="row">';
                echo '<div class="col-12">';
                echo '<p>' . $store['name']. '<span>Section</span></p>';
                echo '</div>';
                echo '</div>';
                echo '<div class="row mt-5">';
            
                foreach ($store['products'] as $product) {
                   

                    if (($store['name'] === 'iphone') ||  ($store['name'] === 'watch')) {
                        echo '<div class="col-sm-12 col-md-6 col-lg-3">';
                    } 
                     else {
                        echo '<div class="col-sm-12 col-md-6 col-lg-4">';
                    }

                    echo '<a href="#">';
                    echo '<div class="mac-cart text-center">';
                    echo '<img src="assets/images/' . $product['icon'] . '" alt="' . $product['name'] . '">';
                    echo '<p>' . $product['name'] . '</p>';
                    echo '<p>From Rs' . $product['price'] . '.00</p>';
                    echo '<button>BUY NOW</button>';
                    echo '</div>';
                    echo '</a>';
                    echo '</div>';
                }
            
                echo '</div>';
                echo '</div>';
                echo '</div>';
                echo '</section>';
            }
        ?>


<section id="homepod">
    <div class="mac-page pt-5">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <p>HomePod<span>Section</span></p>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-lg-6">
                    <div class="homepad-bars text-center mt-5 pt-5">
                        <a href="#">
                            <span>HomePod</span>
                            <p>Profound sound</p>
                            <span>Rs32900.00</span> <br>
                            <button>BUY NOW</button>
                            <img src="assets/images/homepod.jpg">
                        </a>
                    </div>
                </div>
                <div class="col-sm-12 col-lg-6">
                    <div class="homepadmini-bars text-center mt-5 pt-5">
                        <a href="#">
                            <span>HomePod</span>
                            <p>Profound sound</p>
                            <span>Rs10900.00</span> <br>
                            <button>BUY NOW</button>
                            <img src="assets/images/homepod-mini.jpeg">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </section>
    
    <section id="accessories">
    <div class="mac-page pt-5">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <p>Accessories</p>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-sm-12 col-md-6 col-lg-2">
                    <a href="#">
                        <div class="mac-cart text-center">
                            <img src="assets/images/ac1.png">
                            <div class="ac-p">
                                <p>FineWoven Case</p>
                                <p>From Rs5900.00</p>
                            </div>
                            <div class="ac-button">
                                <button>BUY NOW</button>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-2">
                    <a href="#">
                        <div class="mac-cart text-center">
                            <img src="assets/images/ac2.jpeg">
                            <div class="ac-p">
                                <p>Sport Loop</p>
                            <p>From Rs4500.00</p>
                            </div>
                            <div class="ac-button">
                                <button>BUY NOW</button>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-2">
                    <a href="#">
                        <div class="mac-cart text-center">
                            <img src="assets/images/ac3.jpeg">
                            <div class="ac-p">
                                <p>Apple Pencil</p>
                                <p>From Rs7900.00</p>
                            </div>
                            <div class="ac-button">
                                <button>BUY NOW</button>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-2">
                    <a href="#">
                        <div class="mac-cart text-center">
                            <img src="assets/images/ac4.jpeg">
                            <div class="ac-p">
                                <p>Power Adapter</p>
                                <p>From Rs1900.00</p>
                            </div>
                            <div class="ac-button">
                                <button>BUY NOW</button>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-2">
                    <a href="#">
                        <div class="mac-cart text-center">
                            <img src="assets/images/ac5.jpeg">
                            <div class="ac-p">
                                <p>FineWoven Key</p>
                                <p>From Rs3900.00</p>
                            </div>
                            <div class="ac-button">
                                <button>BUY NOW</button>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-2">
                    <a href="#">
                        <div class="mac-cart text-center">
                            <img src="assets/images/ac6.jpeg">
                            <div class="ac-p">
                                <p>Buy Apple TV 4K</p>
                                <p>From Rs16900.00</p>
                            </div>
                            <div class="ac-button">
                                <button>BUY NOW</button>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    </section>
    <section id="support">
    <div class="support-page">
        <div class="container">
            <div class="row">
                <div class="col-1">
                    <div class="support-title text-center">
                        <img src="assets/images/logo-footer.png">
                    </div>
                </div>
                <div class="col-11">
                    <div class="support-title pt-1">
                        --Support--
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-6 col-lg-3">
                    <div class="product-support">
                        Product Support
                        <p>iPhone</p>
                        <p>Mac</p>
                        <p>iPad</p>
                        <p>Watch</p>
                        <p>AirPods</p>
                        <p>HomePod</p>
                        <p>TV</p>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-3">
                    <div class="product-support">
                        Service and Repair
                        <p>Apple Repair Options</p>
                        <p>Service and Repair Information</p>
                        <p>AppleCare Products</p>
                        <p>Hardware Warranties</p>
                        <p>Software License Agreements</p>
                        <p>Complimentary Support</p>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-3">
                    <div class="product-support">
                        Resources
                        <p>My Support</p>
                        <p>Downloads</p>
                        <p>Manuals</p>
                        <p>Tech Specs</p>
                        <p>Accessibility</p>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-3">
                    <div class="product-support">
                        Connect
                        <p>Contact Us</p>
                        <p>Phone Numbers</p>
                        <p>Support app</p>
                        <p>Apple Communities</p>
                        <p>Apple Support Videos</p>
                        <p>@AppleSupport</p>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-12">
                    <div class="footer-policy text-center">
                        <a href="#">Copyright © 2023 Apple Inc. All rights reserved.</a>
                        <a href="#">Privacy Policy</a>
                        <a href="#">Terms of Use</a>
                        <a href="#">Site Map</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </section>
</body>
</html>