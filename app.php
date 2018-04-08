<?php

require_once __DIR__.'/vendor/autoload.php';

use Nfq\Weather\YahooWeatherProvider;
use Nfq\Weather\Location;
use Nfq\Weather\OpenWeatherMapWeatherProvider;
use Nfq\Weather\DelegatingWeatherProvider;


$loc = new Location(54, 25);
$yahoo = new YahooWeatherProvider();
$open = new OpenWeatherMapWeatherProvider();


$open->setApiKey('7bf471179d2772ee60ecd68ede58ff8f');

$all = [$yahoo, $open];
echo 'Yahoo Weather: ' . $yahoo->fetch($loc)->getTemperature() . "\n";
echo 'OpenWeatherMap: ' . $open->fetch($loc)->getTemperature() . "\n";

$delegating = new DelegatingWeatherProvider($all);
echo 'Delegating: ' . $delegating->fetch($loc)->getTemperature();
