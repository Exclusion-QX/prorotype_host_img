<?php

namespace app\models;

use yii\base\Model;
use yii\helpers\Inflector;
use yii\web\UploadedFile;
use app\models\Image;

class UploadForm extends Model
{
    /**
     * @var UploadedFile[]
     */
    public $imageFiles;
    public $name;

    public function rules()
    {
        return [
            [['imageFiles'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg', 'maxFiles' => 5],
            [['name'], 'string'],
        ];
    }

    public function upload()
    {
        if ($this->validate()) {
            foreach ($this->imageFiles as $file) {
                $image = new Image();
                $name = (Inflector::transliterate($file->baseName)). '.' . $file->extension;
                $image->title = $name;
                $image->create_at = date("Y-m-d H:i:s");
                if ((!$image->save(true)) || (!$file->saveAs('uploads/' . $name))) {
                    return false;
                }
            }
        } else {
            return false;
        }
    }
}