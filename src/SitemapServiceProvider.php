<?php

namespace FuXu\LaraSitemap;

use Illuminate\Support\ServiceProvider;

/**
 * Class SitemapServiceProvider
 * @author Fu Xu ( fuxu@fuxu.name )
 */
class SitemapServiceProvider extends ServiceProvider
{

    /**
     * Bootstrap sitemap service provider
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__ . '/views', 'sitemap');
    }

    /**
     * Register sitemap service provider
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('sitemap', function ()
        {
            return new Sitemap();
        });

        $this->app->alias('sitemap', Sitemap::class);
    }
    
}

