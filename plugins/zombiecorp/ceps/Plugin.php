<?php namespace Zombiecorp\Ceps;

use System\Classes\PluginBase;

class Plugin extends PluginBase
{
    public function registerComponents()
    {
    }

    public function registerSettings()
    {
    }

    public function registerFormWidgets()
    {
        return [
            'Zombiecorp\Ceps\FormWidgets\CepField' => 'cepfield'
        ];
    }

}
