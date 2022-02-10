<?php

namespace App\Jobs\User;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Repositories\Category\CategoryRepositoryInterface;
use App\Repositories\Banner\BannerRepositoryInterface;
use App\Repositories\Camera\CameraRepositoryInterface;
use App\Repositories\Internet\InternetRepositoryInterface;
use App\Repositories\Play\PlayRepository;
use App\Repositories\Posts\PostsRepository;
use App\Repositories\Theme\ThemeRepositoryInterface;
use App\AdminConfig;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class CreateSampleStore 
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $store_code;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($store_code)
    {
        $this->store_code = $store_code;
    }



    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(
        CategoryRepositoryInterface $cateRepo,
        BannerRepositoryInterface $bannerRepo,
        CameraRepositoryInterface $cameraRepo,
        InternetRepositoryInterface $internetRepo,
        PlayRepository $playRepo,
        PostsRepository $postsRepo,
        ThemeRepositoryInterface $themeRepo
    ) {
        $store_sample_code = AdminConfig::first()->store_sample_code;
        $store_code = $this->store_code;
        if ($store_sample_code) {
            $listCategory = $cateRepo->getAll($store_sample_code)->map(function ($module) {
                $module->store_code = $this->store_code;
                return $module;
            })->toArray();
            $listBanner = $bannerRepo->getAll($store_sample_code)->map(function ($module) {
                $module->store_code = $this->store_code;

                return $module;
            })->toArray();
            $listCamera = $cameraRepo->getAll($store_sample_code)->map(function ($module) {
                $module->store_code = $this->store_code;

                return $module;
            })->toArray();
            $listInternet = $internetRepo->getAll($store_sample_code)->map(function ($module) {
                $module->store_code = $this->store_code;

                return $module;
            })->toArray();
            $listPlay = $playRepo->getAll($store_sample_code)->map(function ($module) {
                $module->store_code = $this->store_code;

                return $module;
            })->toArray();
            $listPosts = $postsRepo->getAll($store_sample_code)->map(function ($module) {
                $module->store_code = $this->store_code;
                $module->image_url = "ads";
                return $module;
            })->toArray();
            $theme = $themeRepo->firstByStore($store_sample_code)->toArray();
            if($theme)
            $theme["store_code"] = $this->store_code;

            \dd($listPosts);

            try {
                DB::beginTransaction();
                if ($listCategory)
                    $cateRepo->createMultiRecord($listCategory);
                if ($listBanner)
                    $bannerRepo->createMultiRecord($listBanner);
                if ($listCamera)
                    $cameraRepo->createMultiRecord($listCamera);
                if ($listInternet)
                    $internetRepo->createMultiRecord($listInternet);
                if ($listPlay)
                    $playRepo->createMultiRecord($listPlay);
                if ($listPosts)
                    $postsRepo->createMultiRecord($listPosts);
                if ($theme)
                    $themeRepo->create($theme);

                DB::commit();

            } catch (\Throwable $th) {
                DB::rollBack();
                Log::channel('jobs')->info("Đã lỗi" . $th);
                throw $th;
            }
        }
    }
}
