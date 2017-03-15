<?php //strict
namespace Kiom\Controllers;

use IO\Helper\TemplateContainer;

/**
 * Class ContactController
 * @package Kiom\Controllers
 */
class ContactController extends LayoutController
{
	public function showContact():string
	{
		return $this->renderTemplate(
			"tpl.contact",
			[
				"contact" => ""
			]
		);
	}
}