<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "fatura".
 *
 * @property int $id
 * @property string $dtaEmissao
 * @property string $moradaEntrega
 * @property string $moradaFaturacao
 * @property string $estado
 * @property int $pago
 * @property int $dadospessoais_id
 *
 * @property Dadospessoais $dadospessoais
 * @property Linhafatura[] $linhafaturas
 */
class Fatura extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'fatura';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['dtaEmissao', 'moradaEntrega', 'moradaFaturacao', 'estado', 'pago', 'dadospessoais_id'], 'required'],
            [['dtaEmissao'], 'safe'],
            [['estado'], 'string'],
            [['pago', 'dadospessoais_id'], 'integer'],
            [['moradaEntrega', 'moradaFaturacao'], 'string', 'max' => 80],
            [['dadospessoais_id'], 'exist', 'skipOnError' => true, 'targetClass' => Dadospessoais::class, 'targetAttribute' => ['dadospessoais_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'dtaEmissao' => 'Dta Emissao',
            'moradaEntrega' => 'Morada Entrega',
            'moradaFaturacao' => 'Morada Faturacao',
            'estado' => 'Estado',
            'pago' => 'Pago',
            'dadospessoais_id' => 'Dadospessoais ID',
        ];
    }

    /**
     * Gets query for [[Dadospessoais]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDadospessoais()
    {
        return $this->hasOne(Dadospessoais::class, ['id' => 'dadospessoais_id']);
    }

    /**
     * Gets query for [[Linhafaturas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLinhafaturas()
    {
        return $this->hasMany(Linhafatura::class, ['fatura_id' => 'id']);
    }
}
