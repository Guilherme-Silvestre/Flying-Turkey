<?php

namespace frontend\models;

use Yii;
use yii\base\Model;

class PagamentoCartao extends Model
{
    public $nomeproprietario;
    public $numerocartao;
    public $dtacartao;
    public $cartaoccv;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['nomeproprietario', 'string'],
            ['numerocartao', 'string', 'max' => '16'],
            ['numerocartao', 'match', 'pattern' => '/^(?:4[0-9]{12}(?:[0-9]{3})?|5[1-5][0-9]{14})$/m'],
            ['dtacartao', 'date',  'format' => 'MM/yy'],
            ['cartaoccv', 'integer', 'min'=>100, 'max' => 999],
        ];
    }

    public function attributeLabels()
    {
        return [
            'nomeproprietario'=>'Nome do Proprietário do Cartão',
            'numerocartao'=>'Numero do Cartão',
            'dtacartao'=>'Validade do Cartão (ex: 11/23)',
            'cartaoccv'=>'CCV do Cartão',
        ];

    }
}