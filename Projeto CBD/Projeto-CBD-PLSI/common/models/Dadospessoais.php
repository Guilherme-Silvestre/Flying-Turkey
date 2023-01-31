<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "dadospessoais".
 *
 * @property int $id
 * @property string|null $nome
 * @property string|null $morada
 * @property string|null $dtaNasc
 * @property string|null $codigopostal
 * @property string|null $nif
 * @property int $user_id
 *
 * @property Carrinho[] $carrinhos
 * @property Fatura[] $faturas
 * @property Listadesejo[] $listadesejos
 * @property Loja[] $lojas
 * @property User $user
 */
class Dadospessoais extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'dadospessoais';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['dtaNasc'], 'safe'],
            [['dtaNasc'], 'date'],
            [['user_id'], 'required'],
            [['user_id'], 'integer'],
            [['nome', 'morada', 'codigopostal'], 'string', 'max' => 45],
            [['nif'], 'string', 'max' => 9],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['user_id' => 'id']],
            ['dtaNasc','compare','compareValue'=>date('Y-m-d',strtotime('-18 years')),'operator'=>'>=']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nome' => 'Nome',
            'morada' => 'Morada',
            'dtaNasc' => 'Dta Nasc',
            'codigopostal' => 'Codigopostal',
            'nif' => 'Nif',
            'user_id' => 'User ID',
        ];
    }

    /**
     * Gets query for [[Carrinhos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCarrinhos()
    {
        return $this->hasMany(Carrinho::class, ['dadosPessoais_id' => 'id']);
    }

    /**
     * Gets query for [[Faturas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFaturas()
    {
        return $this->hasMany(Fatura::class, ['dadospessoais_id' => 'id']);
    }

    /**
     * Gets query for [[Listadesejos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getListadesejos()
    {
        return $this->hasMany(Listadesejo::class, ['dadosPessoais_id' => 'id']);
    }

    /**
     * Gets query for [[Lojas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLojas()
    {
        return $this->hasMany(Loja::class, ['dadosPessoais_id' => 'id']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }
}
