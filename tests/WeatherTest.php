<?php
namespace Serverking\Weather\Tests;

use PHPUnit\Framework\TestCase;
use Serverking\Weather\Exceptions\InvalidArgumentException;
use Serverking\Weather\Weather;

class WeatherTest extends TestCase
{
    public function testGetWeatherWithInvalidType()
    {
        $key = 'd20f414e81cb35b8d1ec18ed2c49ca18';

        $weather = new Weather($key);
        $w = $weather->getWeather('110101','base');
        //断言会抛出此类异常类
        //$this->expectException(InvalidArgumentException::class);
        //断言
        //$this->assertEquals(4, 2+2);
        //如果没有抛出异常，就会运行到这里
        //$this->fail('没有抛出异常');
        //print_r($w);
    }

    public function testPushAndPop(){
        $stack = array();
        $this->assertEquals(0,count($stack));
        array_push($stack,'foo');
        //断言插入数据到$stack数组后值是否等于1
        $this->assertEquals(1,count($stack));
    }

}