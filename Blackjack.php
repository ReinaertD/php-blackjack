<?php
class Blackjack
{
    function __construct()
    {
        $this->score = 0;
        $this->wins = 0;
    }
    function hit()
    {
        $card = new Card();
        $this->score += $card->cardNumber;
    }
    function stand()
    { }
    function surrender()
    { }
}


class Card
{
    function __construct()
    {
        $this->cardNumber = rand(1, 11);
    }
}

//////////////////////////////////////////////
//GAME LOGIC//
session_start();
if (empty($_SESSION['player']) && empty($_SESSION['dealer'])) {
    $_SESSION['player'] = new Blackjack();
    $_SESSION['dealer'] = new Blackjack();
}


//PLAYER CHOICES, SHOULD ONLY BE ACTIVE IF A GAME IS CURRENTLY RUNNING
if (isset($_POST['hit'])) {
    echo "Hit pressed";
    $_SESSION['player']-> wins++;
}

if (isset($_POST['stand'])) {
    echo "Stand pressed";
}

if (isset($_POST['surrender'])) {
    echo "Surrender pressed";
}

//DEALS NEW CARDS, SHOULD ONLY BE ACTIVE IF NO GAME IS CURRENTLY RUNNING 
if (isset($_POST['start'])) {
    echo "Deal pressed";
}
//////////////////////////////////////////////
/*
1.Game starts

2.PLAYER and DEALER draw one card immediately.

3.PLAYER chooses hit/stand/surrender. 
    If Hit 
        PLAYER gets another card and the points get added to the PLAYER total.
            If above 21 PLAYER loses(5)
                AND sees the result of the DEALER(4)
            If 21 PLAYER automaticly stands 
                AND goes to DEALER(4)
            If lower than 21 PLAYER go back to (3)
    
    If Stand
        PLAYER doesn't continue and points stay the same. It's the DEALER's turn(4) 

    If Surrender
        PLAYER surrenders the game AND(5)
            Sees what happens if he didn't surrender. Sees the result of the DEALER(4)

4.DEALER CHOOSES hit/stand. 
    If Hit
        DEALER gets another card and the points get added to the DEALER total.
            If above 21 DEALER loses(5)
            If 21 DEALER automaticly stands and goes to result(5)
            If lower than 21 DEALER gets a random choice of (4) again
            If lower than 15 DEALER (4)hits again
    If Stand
        DEALER doesn't continue and points stay the same 
            AND Results are shown(5)

5.RESULT PHASE
    If PLAYER surrendered
        DEALER wins the game.
    
    If PLAYER AND/OR DEALER have higher than 21
        PLAYER AND/OR DEALER lose the game. 

    Else PLAYER AND DEALER SCORE ARE COMPARED
        If tied, no one wins
        Else highest number wins

6.RESTART GAME?
        

*/
