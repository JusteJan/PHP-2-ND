<?php
/**
 * Created by PhpStorm.
 * User: Juste
 * Date: 2018-04-05
 * Time: 22:05
 */

namespace Nfq\Weather;


class YahooWeatherProvider implements WeatherProviderInterface
{

    public function fetch(Location $location): Weather
    {
        $lat = $location->getLat();
        $lon = $location->getLon();

        $baseUrl = 'http://query.yahooapis.com/v1/public/yql';
        $yql = "select * from weather.forecast where woeid in (select woeid from geo.places(1) where 
        text=\"($lat, $lon)\") and u=\"c\"";
        $queryUrl = $baseUrl . "?q=" . urlencode($yql) . "&format=json";

        $dataJson = @file_get_contents($queryUrl);
        $data = json_decode($dataJson);

        if (strpos($http_response_header[0], "200 OK" !== false)) {
            throw new WeatherProviderException("Could not get current weather data from Yahoo Weather.\n");
        }

        if (!isset($data->query->results->channel->item->condition->temp)) {
            throw new WeatherProviderException("Could not get current weather data from Yahoo Weather.\n");
        }

        $temperature = $data->query->results->channel->item->condition->temp;

        $weather = new Weather();
        $weather->setTemperature($temperature);

        return $weather;
    }
}