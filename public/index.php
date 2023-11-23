<?php

class Bottle
{
    private array $colours;
    private int $opacity = 0;
    private int $filledLevel = 0;
    private bool $open = false;
    public function __construct($colours = ["black"])
    {
        $this->colours = $colours;
    }
    public function drink($amount)
    {
        if ($this->open === false) {
            echo "you have to open the bottle first<br/><br/>";
            return;
        } else if ($this->open === true) {
            if ($amount > $this->filledLevel) {
                $this->filledLevel = 0;
                return $this->filledLevel;
            } else {
                $this->filledLevel = $this->filledLevel - $amount;
                return $this->filledLevel;
            }
        }
    }

    public function fill($amount)
    {
        if ($this->open === false) {
            echo "you have to open the bottle first<br/><br/>";
            return;
        } else if ($this->open === true) {
            if ($amount + $this->filledLevel > 100) {
                $this->filledLevel = 100;
                return $this->filledLevel;
            } else {
                $this->filledLevel = $this->filledLevel + $amount;
                return $this->filledLevel;
            }
        }

    }

    public function open()
    {
        if ($this->open === false) {
            $this->open = true;
            return $this->open;
        } else if ($this->open === true) {
            echo "bottle is already open<br/><br/>";
            return;
        }
    }


    public function close()
    {
        if ($this->open === true) {
            $this->open = false;
            return $this->open;
        } else if ($this->open === false) {
            echo "bottle is already closed<br/><br/>";
            return;
        }
    }


    public function changeColour(array $newColour): array
    {
        $this->colours = $newColour;
        return $this->colours;
    }


    public function bottleStatus()
    {
        echo "the bottle is filled $this->filledLevel %<br/>\n";
        if ($this->open === false) {
            $currentOpen = "closed";
        } else if ($this->open === true) {
            $currentOpen = "open";
        }
        echo "the bottle is $currentOpen<br/>\n";
    }

    public function completeStatus()
    {
        $colourAmount = count($this->colours);
        echo "the $colourAmount colours for this bottle are:";
        foreach ($this->colours as $key => $val) {
            echo " ", $val;
        }
        echo "<br/>\n";
        echo "the opacity is $this->opacity <br/>\n";
        echo "the bottle is filled $this->filledLevel %<br/>\n";
        if ($this->open === false) {
            $currentOpen = "closed";
        } else if ($this->open === true) {
            $currentOpen = "open";
        }
        echo "the bottle is $currentOpen<br/>\n";
    }

    public function changeOpacity(int $newOpacity): int
    {
        if ($newOpacity < 0) {
            $this->opacity = 0;
        } else if ($newOpacity > 100) {
            $this->opacity = 100;
        } else {
            $this->opacity = $newOpacity;
        }
        return $this->opacity;
    }

    public function hello(){
        echo "hello";
    }

}

$newBottle = new Bottle(["blue", "black"]);

$newBottle->completeStatus();
echo "<br/>";

$newBottle->changeOpacity(80);

$newBottle->changeColour(["red", "yellow", "black"]);

$newBottle->completeStatus();
echo "<br/>";

$newBottle->fill(20);


$newBottle->open();

$newBottle->fill(100);

$newBottle->bottleStatus();
echo "<br/>";

$newBottle->drink(31);

$newBottle->bottleStatus();
echo "<br/>";

$newBottle->close();

$newBottle->bottleStatus();
echo "<br/>";


class Thermos extends Bottle{
    private string $heatLevel = "cold";
    private $bottle;
    public function __construct($bottle){
        $this->bottle = $bottle;
    }
    public function thermosStatus(){
        $this->bottle->completeStatus();
        echo "the heatlevel is ", $this->heatLevel;
        echo "<br/>";
        
    }

    public function heatLevelChange(){
        if($this->heatLevel == "cold"){
            $this->heatLevel = "warm";
            return $this->heatLevel;
        } else if($this->heatLevel == "warm"){
            $this->heatLevel = "cold";
            return $this->heatLevel;
        }
    }
}

$thermos = new Thermos($newBottle);
$thermos->thermosStatus();
echo "<br/>";
$thermos->heatLevelChange();
$thermos->thermosStatus();
echo "<br/>";
