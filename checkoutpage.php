<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <link rel="icon" type="image/png" href="./images/favicon.png"/>                      
    <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>       
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>   
    <link href='https://fonts.googleapis.com/css?family=Trispace' rel='stylesheet'>   
    <link href='https://fonts.googleapis.com/css?family=Nanum+Myeongjo' rel='stylesheet'>    
    <link href='https://fonts.googleapis.com/css?family=Heebo' rel='stylesheet'> 
    <link rel="stylesheet" href="CSS/index.css"> 
    <link rel="stylesheet" href="CSS/style.css">
    <title>Book Store</title>
</head>
<body>

    <header>                                                                            
        <div class="logo">                                                             
            <a href="index.html" ><img src="./images/logo.jpg" alt="logo" width="160" height="130"></img></a>
        </div>

        <div class="menu">                                                       
                <ul>
                    <li><a href="index.html">Home</a></li>
                    <li><a href="store.php">Books</a></li>
                </ul>
        </div>
    </header>

    <div class="container">
        <?php
        session_start();
        if(isset($_GET['book_name'])) {
            $_SESSION['book_name'] = $_GET['book_name'];
            $book_name = $_SESSION['book_name']; 
            echo "<h3 id='bname'>{$book_name}</h3>
                <span id='bs'>BEST SELLER!</span>";
        }
        
        ?>

        <form action="checkoutpage.php" method="POST" style=" font-size:1.4em; padding: 2em 0 0 3.4em;">
        
            <label for="first_name">First Name :</label>
            <input type="text" id="fname" name="first_name" value="<?php echo isset($_POST['first_name']) ? ($_POST['first_name']) : ''; ?>"><br><br>

            <label for="last_name">Last Name :</label>
            <input type="text" id="lname" name="last_name" value="<?php echo isset($_POST['last_name']) ? ($_POST['last_name']) : ''; ?>"><br><br>

            <label for="pay">Payment Method :</label>
            <select name="paymentoption">
                <option name="debit" value="Debit ">DEBIT</option>
                <option name="credit" value="Credit ">CREDIT</option>
                <option name="cash" value="Cash">CASH</option>
            </select>
            <input type="submit" id="sub" value="SUBMIT">

        </form>
        <h4 id="result" style="font-size: 1.3em; padding: 1em 0 0 3.3em;"></h4>
        <a href="store.php"><button style="font-size: 16px; margin: 0.5em 0 0 5em; background-color: #112b52;  cursor: pointer; border: none; color: white; padding: 20px;text-align: center;">Back to Store ?</button></a>
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

<?php
require("mysqli_connect.php");
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $book_name = $_SESSION['book_name'];
    $error = false;

    if((empty($_POST['first_name']))  ||  (empty($_POST['last_name'])) ||  (!isset($_POST['paymentoption']))){
        echo "<script>
                    document.getElementById('result').innerHTML='Some fields are empty! Re-submit form.';
                    document.getElementById('result').style.color = 'red';
                    document.getElementById('bname').innerHTML='Error! Please Try Again.';
                    
                </script>";
    $error = true;	
    }

    if($error == false){
            echo "<script>
                    document.getElementById('result').innerHTML='Order is placed Successfully!';
                    document.getElementById('result').style.color = 'green';
                    document.getElementById('bname').innerHTML='Thank You for buying!';
                    
                </script>";

            $first_name = mysqli_real_escape_string($dbc, $_POST['first_name']);
            $last_name = mysqli_real_escape_string($dbc, $_POST['last_name']);
            $paymentoption = mysqli_real_escape_string($dbc, $_POST['paymentoption']);
            if(isset($_POST['sub'])){
                if(isset($_POST['paymentoption'])){
                  $paymentoption=$_POST['paymentoption'];
                                     
                }
              }
            $user = "INSERT INTO bookinventoryorder(first_name,last_name,paymentoption,book_name) VALUES ('$first_name','$last_name','$paymentoption','$book_name')";
            $newquantity = "UPDATE bookinventory SET book_quantity=book_quantity-1 WHERE book_name='$book_name'";
            mysqli_query($dbc, $user);
            mysqli_query($dbc, $newquantity);
            mysqli_close($dbc);

    }
}

?>