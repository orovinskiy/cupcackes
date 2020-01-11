<?php
/**
 * @author Oleg Rovinskiy
 * @date 1/9/2020
 * @url https://github.com/orovinskiy/cupcackes
 * Pair Programing 1
 */
session_start();
    //error reporting..
    //ini_set("display_errors",1);
    //error_reporting(E_ALL);

    //associate array for building the checkboxes for flavor
    $_SESSION['mainArray'] = array('grasshopper'=>'The Grasshopper',
                         'maple'=>'Whiskey Maple Bacon',
                         'carrot'=>'Carrot Walnut',
                         'carmel'=>'Salted Caramel Cupcake',
                         'velevt'=>'Red Velvet',
                         'lemon'=>'Lemon Drop',
                         'tiramisu'=>'Tiramisu');

    //variables from thankYou page to creat sticky page
    $name = $_SESSION['name'];
    $flavorPost = $_SESSION['flavor'];
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="styles/index.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Cupcakes</title>
</head>
<body>
<div class="container">
    <header>
        <div class="jumbotron">
            <h1 class="display-4">Cupcakes</h1>
        </div>
    </header>
    <form id="cupcakeForm" action="thankYou.php" method="post">
        <div class="form-group">
            <label for="getName">Your Name:</label> <span id="textErr">*<?php echo $_SESSION['nameErr'];?></span>
            <input class="Err form-control mb-4"
                    <?php echo "value='$name'";?> maxlength="80" type="text" placeholder="Enter Your Name Here" id="getName" name="getName">
        </div>

        <div class="form-group">
            <p class="mb-2">Choose Your Flavors:  <span id="boxErr">*<?php echo $_SESSION['flavorErr'];?></span></p>
            <?php
            //prints out checkboxes as well as checks the ones which were already picked
            foreach ($_SESSION['mainArray'] as $value=>$flavor){
                $checked = '';
                if(isset($flavorPost) && in_array($value,$flavorPost)){
                    $checked = 'checked';
                }
                echo "<div class='form-check'>
                        <input class='form-check-input' $checked id='$flavor' value='$value' type='checkbox' name='flavors[]'>
                        <label class='form-check-label' for='$flavor'>$flavor</label>
                    </div>";
            }
            ?>
        </div>

        <button id="submit" type="submit" class="btn btn-primary ">
            Order
        </button>
    </form>
</div>
<!-- jQuery first, then Popper.js, Bootstrap JS then personal validation script-->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="scripts/validation.js"></script>

<?php
//to unset all the session variables
unset( $_SESSION['nameErr']);
unset( $_SESSION['flavorErr']);
unset($_SESSION['change']);
unset($_SESSION['name']);
unset($_SESSION['flavor']);
?>
</body>
</html>