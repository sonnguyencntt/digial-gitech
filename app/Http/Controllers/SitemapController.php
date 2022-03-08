<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Theme\ThemeRepositoryInterface;

class SitemapController extends Controller
{

    protected $themeRepo;
    public function __construct(ThemeRepositoryInterface $themeRepo)
    {
        $this->themeRepo = $themeRepo;
    }



    public function xml($domain)
    {
        $theme = $this->themeRepo->getByDomain($domain);
        if ($theme)
            return \Illuminate\Support\Facades\Redirect::to('sitemap/' . $theme->domain . '.xml');
        return \response()->view("errors.404", ["msg" => "Trang web tạm thời không hoạt động, vui lòng quay lại sau"], 403);
    }

    public function robots($domain)
    {
        $theme = $this->themeRepo->getByDomain($domain);
        if ($theme)
        return response(view('pages.robots')->with(["domain"=>$theme->domain]), 200, [
            'Content-Type' => 'text/plain'
        ]);
        return \response()->view("errors.404", ["msg" => "Trang web tạm thời không hoạt động, vui lòng quay lại sau"], 403);
    }
}
