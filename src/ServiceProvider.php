<?php

namespace Serverking\Weather;

use Serverking\Weather\Weather;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{

    protected $defer = true;

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(Weather::class, function(){
            return new Weather(config('services.weather.key'));
        });

        $this->app->alias(Weather::class, 'weather');

        

        // 合并配置文件到 Laravel 的配置中心
        $this->mergeConfigFrom(__DIR__ . '/../config/services.php', 'services');
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config/services.php' => config_path('services.php'),
        ], 'services');

        return [Weather::class, 'weather'];

    }
}
