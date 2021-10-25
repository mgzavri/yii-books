<?php

namespace app\modules\admin;

use Yii;
use yii\filters\AccessControl;
use yii\web\User;

/**
 * admin module definition class
 */
class Module extends \yii\base\Module
{

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'allow' => true,
                        'matchCallback' => function ($rule, $action) {
                            echo Yii::$app->user->identity->username;
                            return Yii::$app->user->identity->username =='admin';
                        }
                    ]
                ]
            ]
        ];
    }

    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'app\modules\admin\controllers';

    /**
     * {@inheritdoc}
     */
    public function init()
    {
        parent::init();

        // custom initialization code goes here
    }
}
