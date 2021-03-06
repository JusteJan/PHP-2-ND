<?php


namespace Nfq\Weather;


class Location
{
    public $lat;
    public $lon;

    public function __construct(float $lat, float $lon)
    {
        $this->lat = $lat;
        $this->lon = $lon;
    }

    public function getLat() : float
    {
        return $this->lat;
    }

    public function getLon() : float
    {
        return $this->lon;
    }
}