<?php
namespace Zombiecorp\Ceps\FormWidgets;

use Backend\Classes\FormWidgetBase;

class CepField extends FormWidgetBase
{
    /**
     * @var string A unique alias to identify this widget.
     */
    protected $defaultAlias = 'cepfield';

    public function init(){

    }

    public function render() {
        $this->prepareVars();
        return $this->makePartial('cepfield');
    }

    public function prepareVars(){
        $this->vars = [
            'id' => $this->getId(),
            'name' => $this->getFieldName(),
            'value' => $this->getLoadValue(),
            'displayLogradouro' => ''
        ];
    }
    /**
     * @inheritDoc
     */
    public function loadAssets()
    {
        // Gutenberg assets
        $this->addCss('css/cepfield.css', 'Zombiecorp.CEPField');
        $this->addJS('js/cep-backend.js','zcCeps-v1.0.0.1');
        // $this->addJs('js/laraberg.js', 'Zombiecorp.CEPField');

    }
    public function onConsultaCep(){
        return $this->vars['displayLogradouro'] = 'Pedroso de Moraes';
    }

}