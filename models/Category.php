<?php

namespace app\models;

use phpDocumentor\Reflection\Type;
use Yii;
use olegsoft\firstOrCreate\FirstOrCreate;
use yii\helpers\ArrayHelper;

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

    public function getParent()
    {
        return $this->hasOne(Category::class, ['id' => 'parent']);
    }

    public function getParentTitle()
    {
        $parent = $this->parent;
        return $parent ? $this::find()->where(['id' => $parent])->one()->title : '';
    }
    public static function getParentsList()
    {
        // Выбираем только те категории, у которых есть дочерние категории
        $parents = Category::find()
            ->select(['c.id', 'c.title'])
            ->join('JOIN', 'category c', 'category.parent = c.id')
            ->distinct(true)
            ->all();

        return ArrayHelper::map($parents, 'id', 'title');
    }

    public static function getAllById($id){
        return Category::find()->with('books')->where(['id'=>$id])->asArray()->one();
    }

    public static function getChildren($id){
        return Category::find()->where(['parent'=>$id])->asArray()->all();
    }
    public function getBooks()
    {
        return $this->hasMany(Book::class, ['id' => 'book_id'])->viaTable('book_category', ['category_id' => 'id']);
    }


}
