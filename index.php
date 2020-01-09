<?php
/**
 * @author Oleg Rovinskiy
 * @date 1/9/2020
 * @url https://github.com/orovinskiy/cupcackes
 * Pair Programing 1
 */

    //associate array for building the checkboxes for flavor
    $flavorArray = array('grasshopper'=>'The Grasshopper',
                         'maple'=>'Whiskey Maple Bacon',
                         'carrot'=>'Carrot Walnut',
                         'carmel'=>'Salted Caramel Cupcake',
                         'velevt'=>'Red Velvet',
                         'lemon'=>'Lemon Drop',
                         'tiramisu'=>'Tiramisu')     ;
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

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
    <form id="cupcakeForm" method="post">
        <div class="form-group">
            <label for="getName">Your Name:</label>
            <input class="form-control mb-4" type="text" placeholder="Enter Your Name Here" id="getName" name="getName">
        </div>

        <div class="form-group">
            <p class="mb-2">Choose Your Flavors:</p>
            <?php

            foreach ($flavorArray as $value=>$flavor){

                echo "<div class='form-check'>
                        <input class='form-check-input' value='$value' type='checkbox' name='flavors[]'>
                        <label class='form-check-label' for='getName'>$flavor</label>
                    </div>";
            }
            ?>
        </div>

        <button id="submit" type="submit" class="btn btn-primary ">
            Order
        </button>
    </form>
</div>
</body>
</html>