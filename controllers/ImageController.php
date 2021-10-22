<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Image;
use app\models\UploadForm;
use yii\web\UploadedFile;

class ImageController extends Controller
{
    public function actionUpload()
    {
        $model = new UploadForm();

        if (Yii::$app->request->isPost) {
            $model->imageFiles = UploadedFile::getInstances($model, 'imageFiles');
            if ($model->upload()) {
                return;
            }
        }

        return $this->render('upload', ['model' => $model]);
    }

    public function actionIndex()
    {
        $imagesList = Image::find()->all();
        return $this->render('index', [
            'imagesList' => $imagesList,
        ]);
    }

    public function actionView()
    {
        return $this->render('view');
    }

}
