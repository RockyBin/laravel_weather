<h1 align="center"> weather扩展包</h1>

<p align="center"> 一个laravel weather扩展包</p>



[![Test](https://github.com/serverking/weather/actions/workflows/test.yml/badge.svg)](https://github.com/serverking/weather/actions/workflows/test.yml)
[![Latest Stable Version](http://poser.pugx.org/serverking/weather/v/stable.svg)](https://packagist.org/packages/serverking/weather) [![Total Downloads](http://poser.pugx.org/serverking/weather/downloads)](https://packagist.org/packages/serverking/weather)
[![Latest Unstable Version](https://poser.pugx.org/serverking/weather/v/unstable.svg)](https://packagist.org/packages/serverking/weather)
[![License](https://poser.pugx.org/serverking/weather/license.svg)](https://packagist.org/packages/serverking/weather)


## 使用帮助
### 1、首先安装serverking/weather
```language
	composer require serverking/weather -vvv
```
### 2、发布配置文件,运行如下命令后会生成/config/weathers.php配置文件
```language
php artisan vendor:publish --provider="Serverking\Weather\ServiceProvider" --tag="weathers"

```

### 3、编辑.env文件，添加如下配置
```language
WEATHER_API_KEY="高德开放接口中天气预报的key密钥"

```

### 4、调用方式
```language
//注入方式：
public function index(Request $request, Weather $weather, $city){
	return $weather->getWeather($city,'base');
}

//容器方式：
public function index(Request $request, Weather $weather, $city){
    return app('weather')->getWeather($city,'base');
}

```

### 5、添加路由
```language
Route::get('/weather/{city}', [\App\Http\Controllers\WeatherController::class, 'index']);
```

### 6、方问接口进行读取接口
```language
//访问接口：
http://localhost/weather/上海
http://localhost/weather/上海区号

//返回的数据：
{"status":"1","count":"1","info":"OK","infocode":"10000","lives":[{"province":"上海","city":"上海市","adcode":"310000","weather":"多云","temperature":"35","winddirection":"北","windpower":"≤3","humidity":"51","reporttime":"2025-08-08 16:01:17","temperature_float":"35.0","humidity_float":"51.0"}]}

```

## License

MIT