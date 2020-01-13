<?php
session_start();

//gets all the post values
$name = $_POST['getName'];
$flavorPost = $_POST['flavors'];
$isValid = true;


//validates the name, flavor and makes sure it was not spoofed
//also creates session variables to keep errors and values sticky
if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(!isset($name) || preg_match('/^[a-zA-Z ]+$/',$name) !== 1 || $name !== htmlspecialchars($name)){
        $_SESSION['nameErr'] = 'Please Enter a Valid Name';
        $isValid = false;
    }
    else{
        $_SESSION['name'] = $name;
    }

    if(!isset($flavorPost)){
        $_SESSION['flavorErr'] = 'Please choose at least one option';
        $isValid = false;
    }
    else{
        foreach($flavorPost as $clientValue){
            if(!in_array($clientValue, $_SESSION['mainArray'])){
                $_SESSION['flavorErr'] = 'Please choose at least one option';
                $isValid = false;
            }
        }
        $_SESSION['flavor'] = $flavorPost;
    }

    //if validation fails goes back to index.php
    if(!$isValid){
        header('Location: index.php');
    }
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Confirmation</title>
</head>
<body>
    <header>
        <div class="jumbotron">
            <h1 class="display-4">Order Confirmation</h1>
        </div>
    </header>
    <div class="container">
        <h2>Thank you <?php echo $name?>, for your order!</h2>
        <p>Order Summary:</p>
        <ul>
            <?php
            foreach($flavorPost as $print){
                echo "<li>$print</li>";
            }
            ?>
        </ul>
        <p>Order Total: $<?php printf("%.2f",count($flavorPost)*3.5); ?></p>
    </div>
    <?php
    unset($_SESSION['mainArray']);
    ?>
</body>
</html>
