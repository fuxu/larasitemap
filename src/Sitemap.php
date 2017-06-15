<?php

namespace FuXu\LaraSitemap;

/**
 * Class Sitemap
 * 
 * @author Fu Xu ( fuxu@fuxu.name )
 */
class Sitemap
{

    protected $items = [];

    /**
     * Add new sitemap item to $items array
     *
     * @param string $loc
     * @param string $lastmod
     * @param double $priority
     * @param string $changefreq (options: always, hourly, daily, weekly, monthly, yearly, never)
     *
     * @return void
     */
    public function add($loc, $lastmod = null, $priority = null, $changefreq = null)
    {
        $this->items[] = [
            'loc'        => $loc,
            'lastmod'    => $lastmod,
            'priority'   => $priority,
            'changefreq' => $changefreq,
        ];
    }

    /**
     * Generate view response in given format
     *
     * @param string $format (options: urlset(default), sitemapindex)
     *
     * @return Response
     */
    public function render($format = 'urlset')
    {
        return response()
            ->view('sitemap::' . $format, [
                'items' => $this->items
            ])
            ->header('Content-Type', 'application/xml');
    }
    

}
