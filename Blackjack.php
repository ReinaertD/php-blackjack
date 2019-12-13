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
        $this->hand= [];
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
    function pickCard($deckofcards){
        array_push($this->hand, $deckofcards->chooseCard());

    }

    function stand()
    {
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
        $this->halt = false;
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
        while (($this->score >= 15 && $this->score < 21) && $this->halt == false) {
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

class Carddeck
{
    function __construct()
    {
        $this->cardDeck = array(1, 2, 3, 4);
        foreach ($this->cardDeck as &$suit) {
            $suit = array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13);
        }
    }

    function chooseCard()
    {
        $taken = "no";
        do{
        $deckchoice = rand(0, 3);
        $cardchoice = rand(0, 12);
        if ($this->cardDeck[$deckchoice][$cardchoice] == "taken") {
            $taken = "yes";
        } else {
            $this->cardDeck[$deckchoice][$cardchoice] = "taken";
            return "[$deckchoice] [$cardchoice]";
        }
    
    
    } while($taken == "yes");

    }
}



//////////////////////////////////////////////
/*

Array with all the cards

*/
