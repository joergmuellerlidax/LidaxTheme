<?php

namespace Kiom\Containers;

use Plenty\Plugin\Templates\Twig;

class KiomScripts
{
    public function call(Twig $twig):string
    {
        return $twig->render('Kiom::KiomScripts');
    }
}
