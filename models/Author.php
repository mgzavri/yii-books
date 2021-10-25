<?php

namespace app\models;

use Yii;
use olegsoft\firstOrCreate\FirstOrCreate;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "author".
 *
 * @property int $id
 * @property string|null $title
 *
 * @property BookAuthor[] $bookAuthors
 * @property Book[] $books
 */
class Author extends \yii\db\ActiveRecord
{
    use FirstOrCreate;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'author';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
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
        ];
    }

    /**
     * Gets query for [[BookAuthors]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBookAuthors()
    {
        return $this->hasMany(BookAuthor::class, ['author_id' => 'id']);
    }



    /**
     * Gets query for [[Books]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBooks()
    {
        return $this->hasMany(Book::class, ['id' => 'book_id'])->viaTable('book_author', ['author_id' => 'id']);
    }

    /**
     * Gets query for [[GridView]].
     */

    public static function getAuthorList()
    {
        $authors = Author::find()
            ->select(['id', 'title'])
            ->distinct(true)
            ->all();

        return ArrayHelper::map($authors, 'id', 'title');
    }


}
