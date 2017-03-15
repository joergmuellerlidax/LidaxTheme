<?php //strict

namespace Kiom\Providers;

use Plenty\Plugin\ConfigRepository;
use Plenty\Plugin\RouteServiceProvider;
use Plenty\Plugin\Routing\Router;
use Plenty\Plugin\Routing\ApiRouter;

/**
 * Class KiomRouteServiceProvider
 * @package Kiom\Providers
 */
class KiomRouteServiceProvider extends RouteServiceProvider
{
	public function register()
	{
	}

    /**
     * Define the map routes to templates or REST resources
     * @param Router $router
     * @param ApiRouter $api
     */
	public function map(Router $router, ApiRouter $api, ConfigRepository $config)
	{
        $router->get('kontakt', 'Kiom\Controllers\ContactController@showContact');
	}
}