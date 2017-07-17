<?php //strict
namespace Kiom\Controllers;

use IO\Controllers\LayoutController;

/**
 * Class PaymentController
 * @package Kiom\Controllers
 */
class PaymentController extends LayoutController
{
	public function showPayment():string
	{
		return $this->renderTemplate(
			"tpl.payment",
			[
				"payment" => ""
			]
		);
	}
}