<?php
namespace Serverking\Weather;

use GuzzleHttp\Client;
use Serverking\Weather\Exceptions\HttpException;
use Serverking\Weather\Exceptions\InvalidArgumentException;

class Weather{

    protected $key;
    public function __construct($key='')
    {
        $this->key = $key;
    }

    /**
     * 获取实时天气
     * @param $city
     * @param $format
     * @return mixed|string
     * @throws HttpException
     * @throws InvalidArgumentException
     */
    public function getWeatherLive($city='110101',$format='json'){
        return $this->getWeather($city,'base',$format);
    }

    /**
     * 获取天气预报
     * @param $city
     * @param $format
     * @return mixed|string
     * @throws HttpException
     * @throws InvalidArgumentException
     */
    public function getWeatherForecast($city='110101',$format='json'){
        return $this->getWeather($city,'all',$format);
    }

    public function getWeather($city='110101',$type='base',$format='json'){

        if(!in_array($format, ['json', 'xml'])){
            throw new InvalidArgumentException('无效的格式!');
        }

        if(!in_array($type, ['base', 'all'])){
            throw new InvalidArgumentException('无效的类型!');
        }

        $url = 'https://restapi.amap.com/v3/weather/weatherInfo';
        $params = [
            'query' =>[
                'city' => $city,
                'key' => $this->key,
                'output' => $format,
                'extensions' => $type
            ]
        ];

        try{
            $res = (new Client())->get($url, $params);
            $response = $res->getBody()->getContents();
            return $format == 'json' ? json_decode($response, true) : $response;
        }catch (\Exception $e){
            throw new HttpException($e->getMessage(), $e->getCode());
        }
    }
}