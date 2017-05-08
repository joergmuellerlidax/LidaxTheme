<?php //strict
namespace Kiom\Controllers;

use IO\Controllers\LayoutController;

/**
 * Class DisposalController
 * @package Kiom\Controllers
 */
class DisposalController extends LayoutController
{
	public function showDisposal():string
	{
		return $this->renderTemplate(
			"tpl.disposal",
			[
				"disposal" => ""
			]
		);
	}
}