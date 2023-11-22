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
    public function drink($amount): int
    {
        if ($amount > $this->filledLevel) {
            $this->filledLevel = 0;
            return $this->filledLevel;
        } else {
            $this->filledLevel = $this->filledLevel - $amount;
            return $this->filledLevel;
        }
    }

    public function fill($amount): int
    {
        if ($amount + $this->filledLevel > 100) {
            $this->filledLevel = 100;
            return $this->filledLevel;
        } else {
            $this->filledLevel = $this->filledLevel + $amount;
            return $this->filledLevel;
        }
    }

    public function checkFilled(): int
    {
        return $this->filledLevel;
    }

    public function open()
    {
        if ($this->open = false) {
            $this->open = true;
            return $this->open;
        } else {
            return "bottle is already open";
        }
    }

    public function close()
    {
        if ($this->close = true) {
            $this->open = false;
            return $this->open;
        } else {
            return "bottle is already closed";
        }
    }

    public function changeColour(array $newColour): array
    {
        $this->colours = $newColour;
        return $this->colours;
    }


    public function status()
    {
        $colourAmount = count($this->colours);
        echo  "the $colourAmount colours for this bottle are:";
        foreach ($this->colours as $key => $val) {
            echo " ",$val;
        }
        echo "<br/>";
        echo "the opacity is $this->opacity <br/>";
        echo "the bottle is filled $this->filledLevel %<br/>";
        if($this->open = false) {
            $currentOpen = "closed";
        } else {
            $currentOpen = "open";
        }
        echo "the bottle is $currentOpen";
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

}

$newBottle = new Bottle(["blue", "black"]);

$newBottle->status();

?>