<?php
require('mysqli_connect.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/all.min.css" class="css">   
    <link rel="icon" type="image/png" href="./images/favicon.png"/>                        
    <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>       
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'> 
    <link href='https://fonts.googleapis.com/css?family=Trispace' rel='stylesheet'>    
    <link href='https://fonts.googleapis.com/css?family=Nanum+Myeongjo' rel='stylesheet'>   
    <link href='https://fonts.googleapis.com/css?family=Heebo' rel='stylesheet'>   
    <link rel="stylesheet" href="CSS/index.css"> 
    <link rel="stylesheet" href="css/container.css">
    <title>Book Store</title>
</head>
<body>
    <header>                                                                            
        <div class="logo">                                                              <!--LOGO -->
        <a href="index.html" ><img src="./images/logo.jpg" alt="logo" width="160" height="130"></img></a>
        </div>

        <div class="menu">                                                               <!--MENU -->
                <ul>
                    <li><a href="index.html">Home</a></li>
                    <li><a href="store.php">Books</a></li>
                </ul>
        </div>
    </header>

    <div class="book-info">
            <div class="book-heading">
                <h2>Books available</h2>
                <span></span>
                <a href="#">Find out more<i class="fas fa-arrow-right"></i></a>
            </div>
            <div class="book-cards">
                <?php
                $query = "SELECT * FROM bookinventory";
                $result = @mysqli_query($dbc, $query);
            
                while ($card = mysqli_fetch_array($result)) {
                echo "<div class='card'>
                        
                        <h4>{$card['book_name']}</h4>
                        <span></span>
                        <a href='checkoutpage.php?book_name={$card['book_name']}'>In-stock: {$card['book_quantity']}</a>
                    </div>";
                }
                ?>
            </div>
    </div>

    <footer>
        <div class="copyright">
            <p>&#169; 2002 - 2021. The BOOKStore</p>
            <a href="">Privacy Policy</a>
            <a href="">Terms and Conditions</a>
        </div>
    </footer>

</body>
</html>