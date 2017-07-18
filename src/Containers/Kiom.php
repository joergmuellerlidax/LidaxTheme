<?php

namespace Kiom\Containers;

use Plenty\Plugin\Templates\Twig;

class Kiom
{
    public function call(Twig $twig):string
    {
        return $twig->render('Kiom::Kiom');
    }
}
