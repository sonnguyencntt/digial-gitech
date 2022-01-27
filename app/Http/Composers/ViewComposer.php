<?php

namespace App\Http\Composers;

use App\Repositories\category\CategoryRepositoryInterface;
use App\Repositories\Theme\ThemeRepositoryInterface;
use Illuminate\View\View;

class ViewComposer
{
    
    public function __construct(CategoryRepositoryInterface $categoryRepo,ThemeRepositoryInterface $themeRepo)
    {
        // Dependencies are automatically resolved by the service container...
        $this->categoryRepo = $categoryRepo->getAll();
        $this->themeRepo=$themeRepo->getAll();
    }

    /**
     * Bind data to the view.
     *
     * @param  \Illuminate\View\View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('count', $this->categoryRepo);
        
    }
}