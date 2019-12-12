<?php
declare(strict_types=1);
include 'Blackjack.php';


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blackjack</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body>
    <div class="container d-flex justify-content-center">
    <h1> Blackjack </h1>
    </div>
  <div class="container">  
      <div class="d-flex justify-content-center">
            <div>
                <h2>Player</h2>
            </div>
            <div>
                <h2>Dealer</h2>
            </div>
      </div>
    <form class="d-flex justify-content-center" method="POST">
        <fieldset>
            <button name="hit">Hit</button>
            <button name="stand">Stand</button>
            <button name="surrender">Surrender</button>
        </fieldset>
</form>
</div>
<div class="container">
<form class="d-flex justify-content-center" method="POST">
        <fieldset>
            <button name="start">Deal again</button>
        </fieldset>
    </form>
</div>
</body>

</html>
<?php
    echo '<h2>$_GET</h2>';
    var_dump($_GET);
    echo '<h2>$_POST</h2>';
    var_dump($_POST);
    echo '<h2>$_SESSION</h2>';
    var_dump($_SESSION)
?>