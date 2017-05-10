<?php

namespace Components\Category;
use Illuminate\Support\ServiceProvider;
class CategoryServiceProvider extends ServiceProvider
{

  protected $defer = false;


    public function boot()
    {
        $nameSpace = $this->app->getNamespace();
        $this->app->router->group(['namespace' => $nameSpace . 'Http\Controllers'], function()
        {
            require __DIR__.'/Http/routes.php';
        });

        $this->loadViewsFrom(__DIR__.'/../views', 'components');
        $this->publishes([
            __DIR__.'/../views' => base_path('resources/views/vendor'),
        ]);

        $this->publishes([
               __DIR__.'/../database/migrations/' => database_path('migrations')
           ], 'migrations');

        $this->loadTranslationsFrom(__DIR__.'/../translations/category', 'category');

        $this->publishes([
	         __DIR__.'/../translations/category' => base_path('resources/lang/vendor/category'),
        ]);

        $this->publishes([
              __DIR__.'/../translations' => base_path('resources/lang/vendor')
          ], 'translations');

    }


    public function register()
    {
        //
    }
}
