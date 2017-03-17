<?php //strict
namespace Kiom\Controllers;

use IO\Controllers\LayoutController;

/**
 * Class AboutUsController
 * @package Kiom\Controllers
 */
class AboutUsController extends LayoutController
{
	public function showAboutUs():string
	{
		return $this->renderTemplate(
			"tpl.aboutus",
			[
				"aboutus" => ""
			]
		);
	}
}
