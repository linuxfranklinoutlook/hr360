<?php

namespace App\Providers;

use App\View\Composers\MonthsComposer;
use App\View\Composers\YearsComposer;
use Carbon\Carbon;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
		View::composer('*', YearsComposer::class);
		View::composer('*', MonthsComposer::class);
		View::composer('*', function($view) {
			return $view->with(['emp_types' => ['Full Time','Intern','Contract'] ]);
		});
		View::composer('*', function($view) {
			return $view->with(['emp_locations' => ['Remote','Client On-site','On-site'] ]);
		});
    }
}
