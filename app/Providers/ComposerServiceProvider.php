<?php namespace App\Providers;

use View;
use Illuminate\Support\ServiceProvider;
use Auth;

class ComposerServiceProvider extends ServiceProvider {

	/**
	 * Register bindings in the container.
	 *
	 * @return void
	 */
	public function boot()
	{
		// Using class based composers...
        View::composer('inc.specs', 'App\Http\ViewComposers\CurrentSpecsComposer');
        View::composer('inc.last_reviews', 'App\Http\ViewComposers\LastFeedbackComposer');
        View::composer(['inc.parts', 'popups.create-company', 'popups.company-signup'], 'App\Http\ViewComposers\SpecsComposer');
        View::composer('inc.footer', 'App\Http\ViewComposers\FooterComposer');
        View::composer('inc.menu', 'App\Http\ViewComposers\MenuComposer');
        View::composer(['inc.search', 'inc.feedback', 'inc.type', 'popups.create-company', 'popups.company-signup'], 'App\Http\ViewComposers\TypesComposer');
        View::composer(['popups.create-company', 'popups.company-signup'], 'App\Http\ViewComposers\CTypesComposer');
	}

	public function register()
	{
		//
	}

}