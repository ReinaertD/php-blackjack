<?php
class Blackjack
{
    function __construct()
    {
        $this->score = 0;
        $this->wins = 0;
        $this->lost = false;
        $this->surrendered = false;
        $this->halt = false;
    }
    function hit()
    {
        $card = new Card();
        if ($card->cardNumber + $this->score <= 21) {
            $this->score += $card->cardNumber;
        } else {
            $this->lost = true;
            $this->score += $card->cardNumber;
        }
    }
    function stand(){
        $this->halt = true;
     }
    function surrender()
    {
        $this->lost = true;
        $this->surrendered = true;
    }
    function reset()
    {
        $this->score = 0;
        $this->lost = false;
        $this->surrendered = false;
        $this->halt=false;
    }
}


class Player extends BlackJack
{ }

class Dealer extends BlackJack
{
    function dealerTurn($opponent)
    {
        //DEALER BEHAVIOUR
        do {
            $this->hit();
        } while ($this->score < 15);
        while (($this->score >= 15 && $this->score < 21) && $this->halt == false ) {
            $randomChoice = rand(1, 10);
            // var_dump($randomChoice);
            // var_dump($this->halt);
            if ($randomChoice > 5) {
                $this->hit();
            } else {
                $this->halt = true;
            }
        }

    }
}

class Card
{
    function __construct()
    {
        $this->cardNumber = rand(1, 11);
    }
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
