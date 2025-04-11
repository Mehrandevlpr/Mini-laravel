<?php

namespace App\Services\View;

class View
{
    public static function render(string $tpl, ?string $layout) {}

    public static function renderErrorTemplate(string $tpl)
    {

        $template_path = BASE_PATH . 'template/error/' . $tpl . '/error' . $tpl . '.php';
        $error_tpl     = require $template_path;
        return $error_tpl;
    }
}
