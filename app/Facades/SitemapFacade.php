<?php
 
namespace App\Facades;
 
use Illuminate\Support\Facades\Facade;
 
class SitemapFacade extends Facade
{
    public static function getFacadeAccessor()
    {
        return 'sitemap';
    }
}