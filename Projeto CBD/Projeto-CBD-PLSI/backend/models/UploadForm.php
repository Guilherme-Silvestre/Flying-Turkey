<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\web\UploadedFile;

class UploadForm extends Model
{
    /**
     * @var UploadedFile
     */

    public $imageFile;

    public function rules()
    {
        return [
            [['imageFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg, jpeg'],
        ];
    }
    public function upload($nomeimagem)
    {
        if ($this->validate()) { 
                $this->imageFile->saveAs(Yii::getAlias('@common') .'/imagens/' . $nomeimagem . '.' . $this->imageFile->extension);
            return true;
        } else {
            return false;
        }
    }
}