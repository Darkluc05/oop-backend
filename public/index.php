<?php

class Bottle
{
    private array $colours = ["black"];
    private int $opacity = 100;
    private int $filledLevel = 0;
    private bool $open = false;
    public function __construct()
    {

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
}

$newBottle = new Bottle();