<?php

namespace App\Modules\Kagi\Providers;

use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\ServiceProvider;

use App;
use Config;
use Lang;
use View;


class KagiServiceProvider extends ServiceProvider
{


	/**
	 * Register the Kagi module service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		// This service provider is a convenient place to register your modules
		// services in the IoC container. If you wish, you may make additional
		// methods or service providers to keep the code more focused and granular.

		$this->registerNamespaces();
		$this->registerProviders();
	}

	/**
	 * Register the Menus module resource namespaces.
	 *
	 * @return void
	 */
	protected function registerNamespaces()
	{
//		Lang::addNamespace('menus', realpath(__DIR__.'/../Resources/Lang'));
		View::addNamespace('kagi', realpath(__DIR__.'/../Resources/Views'));
	}


	/**
	 * Boot the service provider.
	 *
	 * @return void
	 */
	public function boot()
	{
		$this->publishes([
			__DIR__ . '/../Config/kagi.php' => config_path('kagi.php'),
			__DIR__ . '/../Config/kagi_services.php' => config_path('kagi_services.php'),
			__DIR__ . '/../Config/throttle.php' => config_path('throttle.php'),
// 			__DIR__ . '/../Publish/assets/vendors' => base_path('public/assets/vendors/'),
// 			__DIR__ . '/../Publish/Plugins' => base_path('app/Plugins/'),
// 			__DIR__ . '/../Publish/views/plugins/' => base_path('resources/views/plugins/'),
		]);
/*
		$this->publishes([
			__DIR__ . '/../Publish/assets/vendors' => base_path('public/assets/vendors/'),
		], 'js');

		$this->publishes([
			__DIR__ . '/../Publish/Plugins' => base_path('app/Plugins/'),
		], 'plugins');

		$this->publishes([
			__DIR__ . '/../Publish/views/plugins/' => base_path('resources/views/plugins/'),
		], 'views');
*/

		AliasLoader::getInstance()->alias(
			'Socialite',
			'Laravel\Socialite\Facades\Socialite'
		);
		AliasLoader::getInstance()->alias(
			'Throttle',
			'GrahamCampbell\Throttle\Facades\Throttle'
		);


	}


	/**
	* add Prvoiders
	*
	* @return void
	*/
	private function registerProviders()
	{
		$app = $this->app;

		$app->register('App\Modules\Kagi\Providers\RouteServiceProvider');
		$app->register('Caffeinated\Shinobi\ShinobiServiceProvider');
		$app->register('Laravel\Socialite\SocialiteServiceProvider');
		$app->register('GrahamCampbell\Throttle\ThrottleServiceProvider');
	}


}