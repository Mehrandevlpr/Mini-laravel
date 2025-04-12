<?php

namespace App\Services\View;

class View
{
    public static function render(string $tpl, $data = [], $layout = null) {}

    public static function renderErrorTemplate(string $tpl)
    {

        extract($data);

        $template_path = BASE_PATH . 'template/error/' . $tpl . '/error' . $tpl . '.php';
        $error_tpl     = require $template_path;

        return $error_tpl;
    }
}
