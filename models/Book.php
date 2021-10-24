<?php

namespace app\models;
use lhs\Yii2SaveRelationsBehavior\SaveRelationsBehavior;
use olegsoft\firstOrCreate\FirstOrCreate;
use Yii;


/**
 * This is the model class for table "book".
 *
 * @property int $id
 * @property string $title
 * @property int|null $isbn
 * @property int|null $pageCount
 * @property string|null $publishedDate
 * @property string|null $thumbnailUrl
 * @property string|null $shortDescription
 * @property string|null $longDescription
 * @property string|null $status
 *
 * @property Author[] $authors
 * @property BookAuthor[] $bookAuthors
 *@property Category[] $categories
 * @property BookCategory[] $bookCategories
 */
class Book extends \yii\db\ActiveRecord
{
    use FirstOrCreate;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'book';
    }

    public function behaviors()
    {
        return [
            'saveRelations' => [
                'class' => SaveRelationsBehavior::class,
                'relations' => [
                    'authors','categories'
                ],
            ],
        ];
    }
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['isbn', 'pageCount'], 'integer'],
            [['publishedDate'], 'safe'],
            [['shortDescription', 'longDescription'], 'string'],
            [['title', 'thumbnailUrl', 'status'], 'string', 'max' => 255],
            [['authors', 'categories'], 'safe']
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
            'isbn' => 'Isbn',
            'pageCount' => 'Page Count',
            'publishedDate' => 'Published Date',
            'thumbnailUrl' => 'Thumbnail Url',
            'shortDescription' => 'Short Description',
            'longDescription' => 'Long Description',
            'status' => 'Status',
        ];
    }

    /**
     * Gets query for [[Authors]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAuthors()
    {
        return $this->hasMany(Author::class, ['id' => 'author_id'])->viaTable('book_author', ['book_id' => 'id']);
    }

    /**
     * Gets query for [[BookAuthors]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBookAuthors()
    {
        return $this->hasMany(BookAuthor::class, ['book_id' => 'id']);
    }

    public function getCategories()
    {
        return $this->hasMany(Category::class, ['id' => 'category_id'])->viaTable('book_category', ['book_id' => 'id']);
    }

    /**
     * Gets query for [[BookAuthors]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBookCategories()
    {
        return $this->hasMany(BookCategory::class, ['book_id' => 'id']);
    }



}
