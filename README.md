# LaraSitemap

A very simple sitemap generator for Laravel 5 following [`Sitemaps XML format`](https://www.sitemaps.org/protocol.html)

## Installation

```bash
composer require fuxu/larasitemap
```

## Register

Add the following line to array `providers` in `config/app.php`

```php
FuXu\LaraSitemap\SitemapServiceProvider::class,
```

## API
### Sitemap

```php
void add(string $loc, string $lastmod, double $priority, string $changefreq)
```
| Type | Parameter | | Description |
|------| ---- | -- | -------|
| string | $loc | required | URL of the page. This URL must begin with the protocol (such as http) and end with a trailing slash, if your web server requires it. This value must be less than 2,048 characters. |
| string | $lastmod | optional | The date of last modification of the file. This date should be in [`W3C Datetime format`](http://www.w3.org/TR/NOTE-datetime). This format allows you to omit the time portion, if desired, and use YYYY-MM-DD. Note that this tag is separate from the If-Modified-Since (304) header the server can return, and search engines may use the information from both sources differently. |
| double | $priority | optional | The priority of this URL relative to other URLs on your site. Valid values range from 0.0 to 1.0. |
| string | $changefreq | optional | How frequently the page is likely to change. This value provides general information to search engines and may not correlate exactly to how often they crawl the page. Valid values are: `always`, `hourly`, `daily`, `weekly`, `monthly`, `yearly`, `never`. |


```php 
Response render($format)
```
| Type | Parameter | | Description |
|------| ---- | -- | -------|
| string | $format | optional | The output format. The default value is `urlset`. Valid values are: `urlset`, `sitemapindex`. |


## Example

```php
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

use FuXu\LaraSitemap\Sitemap;

class SitemapController extends BaseController
{
    public function __construct(Sitemap $sitemap)
    {
        $this->sitemap = $sitemap;
    }

    /**
     * Generate sitemapindex format
     *
     */
    public function index(Request $request)
    {
        $this->sitemap->add(URL::to('sitemap/urlset'));

        return $this->sitemap->render('sitemapindex');
    }

    /**
     * Generate urlset format
     *
     */

    public function urlset(Request $request)
    {
        $this->sitemap->add(URL::to('welcome'));

        return $this->sitemap->render();
    }

}
```
