<?php namespace Zombiecorp\Ceps\Models;

use Model;

/**
 * Model
 */
class Cep extends Model
{
    use \October\Rain\Database\Traits\Validation;
    

    /**
     * @var string The database table used by the model.
     */
    public $table = 'zombiecorp_ceps_ceps';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];
    protected $fillable = [
        'cep', 'tipo_logradouro', 'logradouro', 'bairro', 'cidade', 'uf'
    ];
}
