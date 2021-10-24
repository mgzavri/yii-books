<?php

namespace app\models;

use Yii;
use olegsoft\firstOrCreate\FirstOrCreate;
/**
 * This is the model class for table "category".
 *
 * @property int $id
 * @property string|null $title
 * @property int|null $parent
 */
class Category extends \yii\db\ActiveRecord
{
    use FirstOrCreate;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'category';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['parent'], 'integer'],
            [['title'], 'string', 'max' => 255],
            [['title'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'parent' => 'Parent',
        ];
    }
}
