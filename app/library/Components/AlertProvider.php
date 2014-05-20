<?php namespace Components;
use Illuminate\Support\ServiceProvider;
use Illuminate\Foundation\AliasLoader;
class AlertProvider extends ServiceProvider {
    public function register()
    {
        $this->registerAlert();
        $this->setAliases();
    }
    public function registerAlert()
    {
        $this->app->bind('alert', function($app)
        {
            return new Alert($app['session.store'], $app['view']);
        });
    }
    public function setAliases()
    {
        $this->app->booting(function ()
        {
            $loader = AliasLoader::getInstance();
            // Facades
            $loader->alias('Alert', 'Components\AlertFacade');
        });
    }
}