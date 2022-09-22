<?php 
      include 'db_conn.php';
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <!-- basic -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- mobile metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="viewport" content="initial-scale=1, maximum-scale=1" />
    <!-- site metas -->
    <title>Discount Book Crawlers</title>
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <!-- bootstrap css -->
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <!-- style css -->
    <link rel="stylesheet" href="css/style.css" />
    <!-- Responsive-->
    <link rel="stylesheet" href="css/responsive.css" />
    <!-- fevicon -->
    <link rel="icon" href="images/fevicon.png" type="image/gif" />
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css" />
    <!-- Tweaks for older IEs-->
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="style.css">
    <style>
        .main-bg {
            background-color: #02246a !important;
        }
    </style>
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script
    ><![endif]-->
</head>
<!-- body -->

<body class="main-layout">
    <!-- end loader -->
    <!-- header -->
    <header>
        <!-- header inner -->
        <div class="header main-bg p-2">
            <div class="container">
                <div class="row">
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col logo_section">
                        <div class="full">
                            <div class="center-desk">
                                <div class="logo">
                                    <a href="index.php"><img src="images/logo.png" alt="#" /></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9">
                        <nav class="navigation navbar navbar-expand-md navbar-dark">
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
                            <div class="collapse navbar-collapse" id="navbarsExample04">
                                <ul class="navbar-nav mr-auto">
                                    <li class="nav-item active">
                                        <a class="nav-link" href="index.php">Home</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="library.php">Library</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="about.html">About</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="service.html">Services</a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link" href="contact.html">Contact Us</a>
                                    </li>
                                    <li class="nav-item d_none">
                                        <a class="nav-link" href="search_page.php"><i class="fa fa-search" aria-hidden="true"></i
                      ></a>
                                    </li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- end header inner -->
    <!-- end header -->
    <!-- banner -->
    <section class="team">
        <div class="container">
            <?php
            if(isset($_POST['submit-search'])){
				
            	$search = mysqli_real_escape_string($conn, $_POST['search']);
				


                $sql = "SELECT books.book_id, books.title, books.b_authors AS author, new_book_shop.price AS new_book_shop_price, new_book_shop.quantity AS new_book_shop_quantity, old_book_shop.price AS old_book_shop_price, old_book_shop.quantity AS old_book_shop_quantity, individual_seller.price AS individual_seller_price, individual_seller.quantity AS individual_seller_quantity, individual_seller.contact AS individual_seller_contact
FROM books
INNER JOIN new_book_shop
ON books.book_id = new_book_shop.book_id 
INNER JOIN old_book_shop
ON new_book_shop.book_id = old_book_shop.book_id 
INNER JOIN individual_seller
ON old_book_shop.book_id = individual_seller.book_id 
WHERE books.book_id IN (SELECT book_id
                      FROM books
                      WHERE books.title LIKE '%$search%')";
	
            	$result = mysqli_query($conn, $sql);
            	$queryResult = mysqli_num_rows($result);
				
				if($queryResult > 0){
                          echo "<table class='table'>
             						  <tr> 
									      <th>ID</th> 
										  <th>Title</th>
                                     	  <th>Authors</th>								  
										  <th>New Book Shop Price</th> 
										  <th>New Book Shop Quantity</th> 
										  <th>Old Book Shop Price</th> 
										  <th>Old Book Shop Quantity</th> 
										  <th>Individual Seller Price</th> 
										  <th>Individual Seller Quantity</th>
										  <th>Individual Seller Conatct</th>
									 </tr>";
                                     // output data of each row. Alias name goes here $row[....]
                                     while($row = mysqli_fetch_assoc($result)){
                                                  echo "<tr>     
												            <td>" . $row["book_id"]. "</td>  
											   	            <td>" . $row["title"]. "</td> 
															<td>" . $row["author"]. "</td>
									   	                	<td>"  . $row["new_book_shop_price"]. "</td>    
															<td>"  . $row["new_book_shop_quantity"]. "</td>
												            <td>"  . $row["old_book_shop_price"]. "</td>     
															<td>"  . $row["old_book_shop_quantity"]. "</td>
												            <td>"  . $row["individual_seller_price"]. "</td>  
															<td>"  . $row["individual_seller_quantity"]. "</td>
															<td>"  . $row["individual_seller_contact"]. "</td>
															
												  </tr>"                 ;
                                     }
                          echo "</table>";
               } else {
                       echo "0 results";
                }
				
				
            }
     ?>
        </div>
    </section>
    <footer>
        <div class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                        <img class="logo1" src="images/logo.png" alt="#" />
                        <ul class="about_us">
                            <li>
                                dolor sit amet, consectetur<br /> magna aliqua. Ut enim ad <br />minim veniam, <br /> quisdotempor incididunt r
                            </li>
                        </ul>
                        <ul class="social_icon">
                            <li>
                                <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i
                  ></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i
                  ></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-linkedin-square" aria-hidden="true"></i
                  ></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i
                  ></a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                        <h3>Useful Link</h3>
                        <ul class="link_menu">
                            <li><a href="#">About Us</a></li>
                            <li><a href="#">About services</a></li>
                            <li><a href="#">About Departments</a></li>
                            <li><a href="#">Services</a></li>
                            <li><a href="#">Contact Us</a></li>
                        </ul>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                        <h3>The Services</h3>
                        <ul class="link_menu">
                            <li><a href="#">About Us</a></li>
                            <li><a href="#">About services</a></li>
                            <li><a href="#">About Departments</a></li>
                            <li><a href="#">Services</a></li>
                            <li><a href="#">Contact Us</a></li>
                        </ul>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                        <h3>Contact Us</h3>
                        <ul class="link_menu">
                            <li><a href="#">About Us</a></li>
                            <li><a href="#">About services</a></li>
                            <li><a href="#">About Departments</a></li>
                            <li><a href="#">Services</a></li>
                            <li><a href="#">Contact Us</a></li>
                        </ul>
                    </div>
                    <div class="col-md-8 offset-md-4">
                        <form class="bottom_form">
                            <h3>Newsletter</h3>
                            <input class="enter" placeholder="Enter your email" type="text" name="Enter your email" />
                            <button class="sub_btn">subscribe</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="copyright">
                <div class="container">
                    <div class="row">
                        <div class="col-md-10 offset-md-1">
                            <p>
                                © 2019 All Rights Reserved. Design by Discount Book Crawlers
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- end footer -->
    <!-- Javascript files-->
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/jquery-3.0.0.min.js"></script>
    <!-- sidebar -->
    <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="js/custom.js"></script>
</body>

</html>