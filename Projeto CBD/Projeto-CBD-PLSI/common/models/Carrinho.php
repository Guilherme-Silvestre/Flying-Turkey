<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "carrinho".
 *
 * @property int $id
 * @property int $quant
 * @property int $dadosPessoais_id
 * @property int $produto_id
 *
 * @property Dadospessoais $dadosPessoais
 * @property Produto $produto
 */
class Carrinho extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'carrinho';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['quant', 'dadosPessoais_id', 'produto_id'], 'required'],
            [['quant', 'dadosPessoais_id', 'produto_id'], 'integer'],
            [['dadosPessoais_id'], 'exist', 'skipOnError' => true, 'targetClass' => Dadospessoais::class, 'targetAttribute' => ['dadosPessoais_id' => 'id']],
            [['produto_id'], 'exist', 'skipOnError' => true, 'targetClass' => Produto::class, 'targetAttribute' => ['produto_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'quant' => 'Quant',
            'dadosPessoais_id' => 'Dados Pessoais ID',
            'produto_id' => 'Produto ID',
        ];
    }

    /**
     * Gets query for [[DadosPessoais]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDadosPessoais()
    {
        return $this->hasOne(Dadospessoais::class, ['id' => 'dadosPessoais_id']);
    }

    /**
     * Gets query for [[Produto]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProduto()
    {
        return $this->hasOne(Produto::class, ['id' => 'produto_id']);
    }
}
