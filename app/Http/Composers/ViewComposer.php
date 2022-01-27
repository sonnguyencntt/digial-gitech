<?php

namespace App\Http\Composers;

use App\Repositories\category\CategoryRepositoryInterface;
use App\Repositories\Theme\ThemeRepositoryInterface;
use Illuminate\View\View;

class ViewComposer
{
    protected $categoryRepo;
    protected $themeRepo;
    protected $request;
    public function __construct(CategoryRepositoryInterface $categoryRepo,ThemeRepositoryInterface $themeRepo)
    {
        $this->categoryRepo = $categoryRepo;
        $this->themeRepo=$themeRepo;
        $this->request= \request();

    }

    /**
     * Bind data to the view.
     *
     * @param  \Illuminate\View\View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $store_code = $this->request->store_code;
        $listCategories = $this->categoryRepo->getAll( $store_code);
        $theme=$this->themeRepo->getAll($store_code);
        $view->with('listCategories', $listCategories);
        
    }
}