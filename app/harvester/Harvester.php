<?php

namespace App\Harvester;

class Harvester
{

    private $zone;

    private $realm;

    private $character;


    public function __construct($zone = 'ena', $realm = 'dva', $character = 'tri')
    {
        $this->zone = $zone;
        $this->realm = $realm;
        $this->character = $character;
    }


    public function fullChar()
    {
        return [$this->zone, $this->realm, $this->character];
    }
}