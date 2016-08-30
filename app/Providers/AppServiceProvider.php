<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Relations\Relation;
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
        Relation::morphMap([
			'post' => \App\Post::class,
			'masjid' => \App\Masjid::class,
		]);

        view()->share([
			'menuLeft'       => Menu::ofPlacement('left')->get(),
			'menuRight'      => Menu::ofPlacement('right')->get(),
			'menuFooter1'    => Menu::ofPlacement('footer1')->get(),
			'menuFooter2'    => Menu::ofPlacement('footer2')->get(),
			'menuFooter3'    => Menu::ofPlacement('footer3')->get(),
			'menuCopyright'  => Menu::ofPlacement('copyright')->get(),
		]);
    }

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
