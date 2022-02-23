<?php

namespace app\models;

use yii\base\Model;
use yii\web\UploadedFile;

class UploadForm extends Model
{
    /**
     * @var UploadedFile
     */
    public $imagen;

    public function rules()
    {
        return [
            [['imagen'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg'],
        ];
    }

    public function upload()
    {
        if ($this->validate()) {
            $this->imagen->saveAs('/upload' . $this->imagen->baseName . '.' . $this->imagen->extension);
            return true;
        } else {
            return false;
        }
    }
}
