<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Repositories\Category\CategoryRepositoryInterface;
use App\Repositories\Internet\InternetRepositoryInterface;
use App\Repositories\Posts\PostsRepositoryInterface;
use App\Repositories\Play\PlayRepositoryInterface;
use App\Repositories\Camera\CameraRepositoryInterface;
use App\Repositories\Theme\ThemeRepositoryInterface;
use Sitemap;
use URL;
use Carbon\Carbon;
use File;
use Storage;
class CreateSiteMap extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sitemap:create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'create sitemap';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle(
        CategoryRepositoryInterface $cateRepo,
        InternetRepositoryInterface $internetRepo,
        PostsRepositoryInterface $postRepo,
        PlayRepositoryInterface $playRepo,
        CameraRepositoryInterface $cameraRepo,
        ThemeRepositoryInterface $themeRepo
    ) {

        $themes = $themeRepo->all();

        foreach ($themes as $key => $theme) {
            if($theme->domain)
            {

                $sitemap = \App::make("sitemap");
                $sitemap->add("https://".$theme->domain, Carbon::now(), '1.0', 'daily');

                $store_code = $theme->store_code;
                $posts = $postRepo->getAll($store_code);
                $categories = $cateRepo->getAll($store_code);
                $cameras = $cameraRepo->getAll($store_code);
                $internets = $internetRepo->getAll($store_code);
                $plays = $playRepo->getAll($store_code);

                foreach ($posts as $post) {
                    $sitemap->add(route("posts.show" ,["domain" => $theme->domain  , "posts" => $post->id]), $post->created_at, '0.6', 'daily');
                }
                \Log::channel("jobs")->info($categories);
                foreach ($categories as $category) {
                    $sitemap->add("https://".$theme->domain."/".$category->link_url."/".$category->id, $post->created_at, '0.6', 'daily');
                }
       

           
                if(!File::isDirectory(public_path() . '/sitemap'))
                    File::makeDirectory(public_path() . '/sitemap');
                
        
                    $sitemap->store('xml', $theme->domain , public_path() . '/sitemap'  );
                if (File::exists(public_path() . '/sitemap/'.$theme->domain.'.xml')) {
                    chmod(public_path() . '/sitemap/'.$theme->domain.'.xml', 0777);
                }
            }
        }


     
    }
}
