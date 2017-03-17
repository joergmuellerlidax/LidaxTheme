<?php //strict
namespace Kiom\Controllers;

use IO\Controllers\LayoutController;

/**
 * Class ShippingController
 * @package Kiom\Controllers
 */
class ShippingController extends LayoutController
{
	public function showShipping():string
	{
		return $this->renderTemplate(
			"tpl.shipping",
			[
				"shipping" => ""
			]
		);
	}
}