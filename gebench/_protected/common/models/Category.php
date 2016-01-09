<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "category".
 *
 * @property integer $cat_id
 * @property string $cat_name
 * @property string $description
 * @property string $avatarlink
 * @property integer $manner
 * @property integer $status
 * @property integer $orderlist
 * @property integer $parent_id
 */
class Category extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cat_name', 'description', 'manner', 'status'], 'required'],
            [['description', 'avatarlink'], 'string'],
            [['manner', 'status', 'orderlist', 'parent_id'], 'integer'],
            [['cat_name'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'cat_id' => Yii::t('app', 'Cat ID'),
            'cat_name' => Yii::t('app', 'Cat Name'),
            'description' => Yii::t('app', 'Description'),
            'avatarlink' => Yii::t('app', 'Avatarlink'),
            'manner' => Yii::t('app', 'Manner'),
            'status' => Yii::t('app', 'Status'),
            'orderlist' => Yii::t('app', 'Orderlist'),
            'parent_id' => Yii::t('app', 'Parent ID'),
        ];
    }

    /**
     * @inheritdoc
     * @return CategoryQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CategoryQuery(get_called_class());
    }
}
