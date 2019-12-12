<?php
declare(strict_types=1);
include 'Blackjack.php';
include 'winnerLogic.php';
session_start();

if (empty($_SESSION['player']) && empty($_SESSION['dealer'])) {
    $_SESSION['player'] = new Player();
    $_SESSION['dealer'] = new Dealer();
}

$dealer = $_SESSION['dealer'];
$player = $_SESSION['player'];
//////////////////////////////////////////////
//GAME LOGIC//
if (isset($_POST['start'])){
    $dealer->reset();
    $player->reset();
}

//PLAYER CHOICES, SHOULD ONLY BE ACTIVE IF A GAME IS CURRENTLY RUNNING
if (isset($_POST['hit'])) {
    // echo "Hit pressed";
    $player -> hit();
    if($player->score >= 21){
        $dealer -> dealerTurn($player);
       winnerLogic($player,$dealer); 
    }
}

if (isset($_POST['stand'])) {
    // echo "Stand pressed";
    $player -> stand();
    $dealer -> dealerTurn($player);
       winnerLogic($player,$dealer); 
}

if (isset($_POST['surrender'])) {
    // echo "Surrender pressed";
    $player -> surrender();
    $dealer -> dealerTurn($player);
       winnerLogic($player,$dealer); 
}

//DISABLES CONTROLS
$disabled = $player->lost == true || $player->halt == true || $player->surrendered == true ? "disabled='disabled'" : "";

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
            <div class="card">
                <h2 class="card-header">Player</h2>
                <div class="card-body">
                    <label>Hand </label>
                    <p><?php echo $player->score ?></p>
                    <label>Wins</label>
                    <p><?php echo $player->wins ?></p>
</div>
            </div>
            <div class="card">
                <h2 class="card-header">Dealer</h2>
                <div class="card-body">
                    <label>Hand </label>
                    <p><?php echo $dealer->score ?></p>
                    <label>Wins</label>
                    <p><?php echo $dealer->wins ?></p>
                </div>
            </div>
            
      </div>
    <form class="d-flex justify-content-center" method="POST">
        <fieldset>
            <button name="hit" <?php echo $disabled; ?>>Hit</button>
            <button name="stand"<?php echo $disabled; ?>>Stand</button>
            <button name="surrender"<?php echo $disabled; ?>>Surrender</button>
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

// echo '<h2>$_GET</h2>';
// var_dump($_GET);
// echo '<h2>$_POST</h2>';
// var_dump($_POST);
// echo '<h2>$_SESSION</h2>';
// var_dump($_SESSION);

?>