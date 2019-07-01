<?php namespace Zombiecorp\Ceps\Controllers;

use Backend\Classes\Controller;
use BackendMenu;
use Response;
use  Zombiecorp\Ceps\Classes\ConsultaCep;

class CepsController extends Controller
{
    public $implement = [
        'Backend\Behaviors\ListController',
        'Backend\Behaviors\FormController'
    ];
    
    public $listConfig = 'config_list.yaml';
    public $formConfig = 'config_form.yaml';

    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('Zombiecorp.Ceps', 'ceps-menu-item');
    }
    public function onCEP()
    {
        $cepForm = post();
        $result = false;
        if ( isset($cepForm['cep'] )) {
            $cepData = preg_replace('/\D/','', $cepForm['cep']);
            $result = ConsultaCep::busca_cep($cepData);
        }
        return Response::json($result);
    }
}
