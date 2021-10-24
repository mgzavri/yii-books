<?php

use app\models\Author;
use app\models\BookAuthor;
use app\models\BookCategory;
use app\models\Category;

/**
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
 * @property Category[] $categories
 * @property BookCategory[] $bookCategories
 */

namespace app\models;

use Yii;


class UploadJSON
{




    public function setAuthors($authors)
    {

    }
    public function setCategories($categories)
    {

    }
    public function setBooks($books)
    {

    }
}
