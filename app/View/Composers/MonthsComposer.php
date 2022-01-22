<?php

namespace App\View\Composers;

use App\Repositories\UserRepository;
use Illuminate\View\View;

class MonthsComposer
{
    /**
     * The user repository implementation.
     *
     * 
     */
    protected $months;

    /**
     * Create a new profile composer.
     *
     * 
     * @return void
     */
    public function __construct()
    {
        // Dependencies are automatically resolved by the service container...
        $this->months = ['01','02','03', '04','05','06','07','08','09','10','11','12'];
    }

    /**
     * Bind data to the view.
     *
     * @param  \Illuminate\View\View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('months', $this->months);
    }
}
