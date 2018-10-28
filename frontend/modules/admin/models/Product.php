<?php

namespace frontend\modules\admin\models;

use Yii;

/**
 * This is the model class for table "product".
 *
 * @property int $id
 * @property int $category_id
 * @property string $name
 * @property string $content
 * @property double $price
 * @property string $keywords
 * @property string $description
 * @property resource $img
 * @property int $hit
 * @property int $new
 * @property int $sale
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product';
    }

    public function getCategory() {
        return $this->hasOne(Category::class, ['id' => 'category_id']);
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['category_id', 'name', 'content', 'price', 'keywords', 'description', 'hit', 'new', 'sale'], 'required'],
            [['category_id', 'hit', 'new', 'sale'], 'integer'],
            [['price'], 'number'],
            [['img'], 'string'],
            [['name', 'content', 'keywords', 'description'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Product ID',
            'category_id' => 'Category',
            'name' => 'Name',
            'content' => 'Content',
            'price' => 'Price',
            'keywords' => 'Keywords',
            'description' => 'Description',
            'img' => 'Img',
            'hit' => 'Hit',
            'new' => 'New',
            'sale' => 'Sale',
        ];
    }
}
