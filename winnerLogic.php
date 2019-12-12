<?php

//DEALS NEW CARDS, SHOULD ONLY BE ACTIVE IF NO GAME IS CURRENTLY RUNNING 


//IGNORE THE CONFUSING VARIABLES IN winnerLogic!
function winnerLogic($player,$dealer){
    if($player->surrendered == true){
        $dealer->wins += 1;
    } else if( $player->score == $dealer->score){
        // echo "No one wins";
    } else if( $player->lost == true && $dealer->lost == true ){
        // echo "Both lost";
    } else if( $player->lost == true || $dealer->lost == true){
        if($player->lost == true){
            // echo "Dealer wins!";
            $dealer->wins += 1;
        } else {
            // echo "Player wins!";
            $player->wins +=1;
        }
    } else if($player->score > $dealer->score){
        // echo "Player wins!";
        $player->wins +=1;
    } else if($player->score < $dealer->score){
            // echo "Dealer wins!";
            $dealer->wins += 1;
    } else {
        echo "ERROR IN WINNERLOGIC";
    }
}