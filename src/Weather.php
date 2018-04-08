<?php


namespace Nfq\Weather;


class Weather
{
    private $temperature;


    public function setTemperature(float $temperature)
    {
        $this->temperature = $temperature;
    }

    public function getTemperature()
    {
        return $this->temperature;
    }
}