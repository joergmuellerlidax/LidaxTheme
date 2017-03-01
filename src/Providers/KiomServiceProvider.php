<?php

namespace Kiom\Providers;

use IO\Helper\TemplateContainer;
use Plenty\Plugin\Events\Dispatcher;
use Plenty\Plugin\ServiceProvider;
use Plenty\Plugin\Templates\Twig;

class KiomServiceProvider extends ServiceProvider
{

    /**
     * Register the service provider.
     */

    public function register() {
         
    }

    public function boot (Twig $twig, Dispatcher $eventDispatcher)
    {

        // provide template to use for homepage
        $eventDispatcher->listen('IO.tpl.home', function(TemplateContainer $container, $templateData) {
            $container->setTemplate("Kiom::Homepage.Homepage");
            return false;
        });
    }
}