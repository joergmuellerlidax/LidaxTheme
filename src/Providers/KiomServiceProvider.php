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

        // provide template to use for checkout
        $eventDispatcher->listen('IO.tpl.checkout', function(TemplateContainer $container, $templateData) {
            $container->setTemplate("Kiom::Checkout.Checkout");
            return false;
        });

        // provide template to use for item search
        $eventDispatcher->listen('IO.tpl.search', function(TemplateContainer $container, $templateData) {
            $container->setTemplate("Kiom::ItemList.ItemListView");
            return false;
        });

        // provide template to use for contact
        $eventDispatcher->listen('IO.tpl.contact', function(TemplateContainer $container, $templateData) {
            $container->setTemplate("Kiom::StaticPages.Contact");
            return false;
        });

        // provide template to use for shipping
        $eventDispatcher->listen('IO.tpl.shipping', function(TemplateContainer $container, $templateData) {
            $container->setTemplate("Kiom::StaticPages.Shipping");
            return false;
        });

        // provide template to use for payment
        $eventDispatcher->listen('IO.tpl.payment', function(TemplateContainer $container, $templateData) {
            $container->setTemplate("Kiom::StaticPages.Payment");
            return false;
        });

        // provide template to use for aboutus
        $eventDispatcher->listen('IO.tpl.aboutus', function(TemplateContainer $container, $templateData) {
            $container->setTemplate("Kiom::StaticPages.AboutUs");
            return false;
        });

        $eventDispatcher->listen('IO.init.templates', function (Partial $partial) {
            $partial->set('head', 'Kiom::PageDesign.Partials.Head');
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

        $eventDispatcher->listen('IO.Component.Import', function(ComponentContainer $componentContainer) { 
            if($componentContainer->getOriginComponentTemplate() == 'Ceres::Category.Components.CategoryBreadcrumbs') {
                    $componentContainer->setNewComponentTemplate('Kiom::Category.Components.CategoryBreadcrumbs');
            } 
        }, self::EVENT_LISTENER_PRIORITY);

    }



}