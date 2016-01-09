<?php
namespace frontend\models;

use common\models\User;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use Yii;
use yii\gii\TypeAheadAsset;

/**
 * This is the model class for table "{{%article}}".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $title
 * @property string $summary
 * @property string $content
 * @property integer $status
 * @property integer $category
 * @property integer $created_at
 * @property integer $updated_at
 * @property string $type
 * @property integer $parent
 *
 * @property User $user
 */
class Article extends ActiveRecord
{
    const STATUS_DRAFT = 1;
    const STATUS_PUBLISHED = 2;

    const WIDGET = 1;
    const PERFORMANCE = 2;
    const FRAMEWORK = 3;
    
    const CODE = 1;
    const BITMAP = 2;
    const TEXT = 3;

    /**
     * Declares the name of the database table associated with this AR class.
     *
     * @return string
     */
    public static function tableName()
    {
        return '{{%article}}';
    }

    /**
     * Returns the validation rules for attributes.
     *
     * @return array
     */
    public function rules()
    {
        return [
            [['user_id', 'title', 'summary', 'content', 'status'], 'required'],
            [['user_id', 'status', 'category','parent'], 'integer'],
            [['summary', 'content','type'], 'string'],
            [['title'], 'string', 'max' => 255]
        ];
    }

    /**
     * Returns a list of behaviors that this component should behave as.
     *
     * @return array
     */
    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }

    /**
     * Returns the attribute labels.
     *
     * @return array
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'user_id' => Yii::t('app', 'Author'),
            'title' => Yii::t('app', 'Title'),
            'summary' => Yii::t('app', 'Summary'),
            'content' => Yii::t('app', 'Content'),
            'status' => Yii::t('app', 'Status'),
            'category' => Yii::t('app', 'Category'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'type' => Yii::t('app', 'Type'),
            'parent' => Yii::t('app', 'Parent'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * Gets the id of the article creator.
     * NOTE: needed for RBAC Author rule.
     * 
     * @return integer
     */
    public function getCreatedBy()
    {
        return $this->user_id;
    }

    /**
     * Gets the author name from the related User table.
     * 
     * @return mixed
     */
    public function getAuthorName()
    {
        return $this->user->username;
    }

    /**
     * Returns the article status in nice format.
     *
     * @param  null|integer $status Status integer value if sent to method.
     * @return string               Nicely formatted status.
     */
    public function getStatusName($status = null)
    {
        $status = (empty($status)) ? $this->status : $status ;

        if ($status === self::STATUS_DRAFT)
        {
            return Yii::t('app', 'Draft');
        }
        else
        {
            return Yii::t('app', 'Published');
        }
    }

    /**
     * Returns the array of possible article status values.
     *
     * @return array
     */
    public function getStatusList()
    {
        $statusArray = [
            self::STATUS_DRAFT     => Yii::t('app', 'Draft'),
            self::STATUS_PUBLISHED => Yii::t('app', 'Published'),
        ];

        return $statusArray;
    }

    /**
     * Returns the article category in nice format.
     *
     * @param  null|integer $category Category integer value if sent to method.
     * @return string                 Nicely formatted category.
     */
    public function getCategoryName($category = null)
    {
        $category = (empty($category)) ? $this->category : $category ;

        if ($category === self::WIDGET)
        {
            return Yii::t('app', 'Widget');
        }
        elseif ($category === self::PERFORMANCE)
        {
            return Yii::t('app', 'Performance');
        }
        else
        {
            return Yii::t('app', 'Framework');
        }
    }

    /**
     * Returns the array of possible article category values.
     *
     * @return array
     */
    public function getCategoryList()
    {
        $statusArray = [
            self::WIDGET => Yii::t('app', 'Widget'),
            self::PERFORMANCE => Yii::t('app', 'Performance'),
            self::FRAMEWORK   => Yii::t('app', 'Framework'),
        ];

        return $statusArray;
    }
    
    /**
     * Returns the array of possible types values.
     *
     * @return array
     */
    public function getTypeList()
    {
    	$typeList = [
    	self::CODE => Yii::t('app', 'Code'),
    	self::BITMAP => Yii::t('app', 'Bitmap'),
    	self::TEXT   => Yii::t('app', 'Text'),
    	];
    
    	return $typeList;
    }
    
    /**
     * Returns the article category in nice format.
     *
     * @param  null|integer $type Types integer value if sent to method.
     * @return string                 Nicely formatted types.
     */
    public function getTypeName($type = null)
    {
    	if ($type == self::CODE)
    	{
    		return Yii::t('app', 'Code');
    	}
    	elseif ($type == self::BITMAP)
    	{
    		return Yii::t('app', 'Bitmap');
    	}
    	elseif ($type == self::TEXT)
    	{
    		return Yii::t('app', 'Text');
    	}
    	else {
    		return Yii::t('app', '');
    	}
    }
    																							
    /**
     * Gets the parent name from the related User table.
     *
     * @return mixed
     */
    public function getParentName()
    {
    	if($this->parent==null)
    		return "brak";
    	else
    	return $this->parent;
    }
    
}
