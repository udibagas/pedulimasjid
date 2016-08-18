<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Menu;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
    //     view()->share([
	// 		'menuLeft'       => Menu::left()->get(),
	// 		'menuRight'      => Menu::right()->get(),
	// 		'menuFooter1'    => Menu::footer1()->get(),
	// 		'menuFooter2'    => Menu::footer2()->get(),
	// 		'menuFooter3'    => Menu::footer3()->get(),
	// 		'menuCopyright'  => Menu::copyright()->get(),
	// 	]);
    // }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
