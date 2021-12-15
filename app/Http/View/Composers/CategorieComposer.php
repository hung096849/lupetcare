<?php

namespace App\Http\View\Composers;

use App\Models\CategoriesServices;
use Illuminate\View\View;

class CategorieComposer
{

    /**
     * Bind data to the view.
     *
     * @param View $view
     * @rerurn void
     */
    public function compose(View $view)
    {
        $categories = CategoriesServices::all();
        return $view->with(compact('categories'));
    }
}