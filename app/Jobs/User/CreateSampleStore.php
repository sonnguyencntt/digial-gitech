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
use App\Category;
class CreateSampleStore implements ShouldQueue
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
                $module->overrideImageAttr = "ogrinal";

                return $module;
            })->toArray();

            $listCamera = $cameraRepo->getAll($store_sample_code)->map(function ($module) {
                $module->store_code = $this->store_code;
                $module->overrideImageAttr = "ogrinal";

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
                $module->overrideImageAttr = "ogrinal";
                return $module;
            })->toArray();
            $theme = $themeRepo->firstByStore($store_sample_code);
            $theme->overrideLogoAttr = "ogrinal";
            $theme = $theme->toArray();
            if ($theme)
                $theme["store_code"] = $this->store_code;
            Log::channel("jobs")->info($listCategory);
            try {
                DB::beginTransaction();
                if ($listCategory)
                    $cateRepo->createMultiRecord($listCategory);
                if ($theme)
                    $themeRepo->create($theme);
                if ($listBanner)
                    $bannerRepo->createMultiRecord($listBanner);
                if ($listPosts)
                    $postsRepo->createMultiRecord($listPosts);
                if ($listCamera)
                    $cameraRepo->createMultiRecord($listCamera , $this->store_code );
                if ($listInternet)
                    $internetRepo->createMultiRecord($listInternet , $this->store_code);
                if ($listPlay)
                    $playRepo->createMultiRecord($listPlay , $this->store_code);



                DB::commit();
            } catch (\Throwable $th) {
                DB::rollBack();
                Log::channel('jobs')->info("Đã lỗi" . $th);
                throw $th;
            }
        }
    }
}
