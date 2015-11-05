<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\AbstractPaginator;
use App\NewPaginationPresenter;
class YCAProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        date_default_timezone_set('PRC');
        Paginator::presenter(function (AbstractPaginator $paginator) {
            return new NewPaginationPresenter($paginator);
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
