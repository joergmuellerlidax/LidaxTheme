<?php

namespace Kiom\Providers;

use IO\Helper\TemplateContainer;
use Plenty\Plugin\Events\Dispatcher;
use Plenty\Plugin\ServiceProvider;
use Plenty\Plugin\Templates\Twig;

class KiomServiceProvider extends ServiceProvider
{
    const EVENT_LISTENER_PRIORITY = 99;

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

        // provide template to use for item categories
        $eventDispatcher->listen('IO.tpl.category.item', function(TemplateContainer $container, $templateData) {
            $container->setTemplate("Kiom::Category.Item.CategoryItem");
            return false;
        });

        $eventDispatcher->listen('IO.init.templates', function (Partial $partial) {
            // $partial->set('head', 'Kiom::PageDesign.Partials.Head');
            $partial->set('header', 'Kiom::PageDesign.Partials.Header.Header');
            $partial->set('footer', 'Kiom::PageDesign.Partials.Footer');
            // $partial->set('page-design', 'Kiom::PageDesign.PageDesign');
        }, self::EVENT_LISTENER_PRIORITY);
    }
}