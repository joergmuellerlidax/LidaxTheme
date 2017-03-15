<?php

namespace Kiom\Providers;


use IO\Extensions\Functions\Partial;
use IO\Helper\CategoryKey;
use IO\Helper\CategoryMap;
use IO\Helper\TemplateContainer;
use Plenty\Plugin\ServiceProvider;
use Plenty\Plugin\Templates\Twig;
use Plenty\Plugin\Events\Dispatcher;
use Plenty\Plugin\ConfigRepository;
use IO\Helper\ComponentContainer;
use Kiom\Providers\KiomRouteServiceProvider;

class KiomServiceProvider extends ServiceProvider
{
    const EVENT_LISTENER_PRIORITY = 99;

    /**
     * Register the service provider.
     */

    public function register() 
    {
        $this->getApplication()->register(KiomRouteServiceProvider::class);    
    }

    public function boot(Twig $twig, Dispatcher $eventDispatcher, ConfigRepository $config)
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

        // provide template to use for single items
        $eventDispatcher->listen('IO.tpl.item', function(TemplateContainer $container, $templateData) {
            $container->setTemplate("Kiom::Item.SingleItem");
            return false;
        });

        // provide template to use for basket
        $eventDispatcher->listen('IO.tpl.basket', function(TemplateContainer $container, $templateData) {
            $container->setTemplate("Kiom::Basket.Basket");
            return false;
        });

        // provide template to use for basket
        $eventDispatcher->listen('IO.tpl.contact', function(TemplateContainer $container, $templateData) {
            $container->setTemplate("Kiom::StaticPages.Contact");
            return false;
        });

        $eventDispatcher->listen('IO.init.templates', function (Partial $partial) {
            $partial->set('header', 'Kiom::PageDesign.Partials.Header.Header');
            $partial->set('footer', 'Kiom::PageDesign.Partials.Footer');
            $partial->set('page-design', 'Kiom::PageDesign.PageDesign');
        }, self::EVENT_LISTENER_PRIORITY);
        
        $eventDispatcher->listen('IO.Component.Import', function(ComponentContainer $componentContainer) { 
            if($componentContainer->getOriginComponentTemplate() == 'Ceres::Basket.Components.AddToBasket') {
                    $componentContainer->setNewComponentTemplate('Kiom::Basket.Components.AddToBasket');
            } 
        }, self::EVENT_LISTENER_PRIORITY);

        $eventDispatcher->listen('IO.Component.Import', function(ComponentContainer $componentContainer) { 
            if($componentContainer->getOriginComponentTemplate() == 'Ceres::Basket.Components.BasketListItem_large') {
                    $componentContainer->setNewComponentTemplate('Kiom::Basket.Components.BasketListItem_large');
            } 
        }, self::EVENT_LISTENER_PRIORITY);

        $eventDispatcher->listen('IO.Component.Import', function(ComponentContainer $componentContainer) { 
            if($componentContainer->getOriginComponentTemplate() == 'Ceres::Basket.Components.BasketListItem_small') {
                    $componentContainer->setNewComponentTemplate('Kiom::Basket.Components.BasketListItem_small');
            } 
        }, self::EVENT_LISTENER_PRIORITY);

        $eventDispatcher->listen('IO.Component.Import', function(ComponentContainer $componentContainer) { 
            if($componentContainer->getOriginComponentTemplate() == 'Ceres::Basket.Components.BasketPreview') {
                    $componentContainer->setNewComponentTemplate('Kiom::Basket.Components.BasketPreview');
            } 
        }, self::EVENT_LISTENER_PRIORITY);

        $eventDispatcher->listen('IO.Component.Import', function(ComponentContainer $componentContainer) { 
            if($componentContainer->getOriginComponentTemplate() == 'Ceres::ItemList.Components.CategoryItem') {
                    $componentContainer->setNewComponentTemplate('Kiom::ItemList.Components.CategoryItem');
            } 
        }, self::EVENT_LISTENER_PRIORITY);

    }



}