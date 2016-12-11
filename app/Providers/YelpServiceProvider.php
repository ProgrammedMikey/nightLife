<?php
namespace App\Providers;

use Stevenmaguire\Yelp\Client;
use Illuminate\Support\ServiceProvider;

class YelpServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $configuration = array(
        'consumerKey' => 'kYMWJF2dWTRz7RIZr8EaSw',
        'consumerSecret' => '1c69bmnZbUp2_rqcIIh523noG6U',
        'token' => 'hxX12uYjf03q_rbyBNsk24pAvu1TGC-H',
        'tokenSecret' => '--nGNu2Sgg2UYJKBh0nT0JDofHU',
        'apiHost' => 'api.yelp.com' // Optional, default 'api.yelp.com'
    );
        $this->app->singleton('stevenmaguire', function($app) use ($configuration) {
            return new Client($configuration);
        });
    }

    public function provides()
    {
        return 'stevenmaguire';
    }
}