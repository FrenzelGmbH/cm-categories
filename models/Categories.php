<?php

namespace frenzelgmbh\cmcategories\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "categories".
 *
 * @property integer $id
 * @property integer $parent
 * @property string $name
 * @property integer $user_id
 * @property string $mod_table
 * @property integer $mod_id
 * @property string $system_key
 * @property string $system_name
 * @property integer $system_upate
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $deleted_at
 *
 * @property Categrories $Categrories
 */
class categories extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%categories}}';
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'mod_id', 'system_upate', 'created_at', 'updated_at', 'deleted_at','parent'], 'integer'],
            [['name'], 'string', 'max' => 200],            
            [['mod_table', 'system_key', 'system_name'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id'                    => Yii::t('cm-categories', 'ID'),
            'parent'                => Yii::t('cm-categories', 'Parent'),
            'name'                  => Yii::t('cm-categories', 'Name'),
            'user_id'               => Yii::t('cm-categories', 'User ID'),
            'mod_table'             => Yii::t('cm-categories', 'Mod Table'),
            'mod_id'                => Yii::t('cm-categories', 'Mod ID'),
            'system_key'            => Yii::t('cm-categories', 'System Key'),
            'system_name'           => Yii::t('cm-categories', 'System Name'),
            'system_upate'          => Yii::t('cm-categories', 'System Upate'),
            'created_at'            => Yii::t('cm-categories', 'Created At'),
            'updated_at'            => Yii::t('cm-categories', 'Updated At'),
            'deleted_at'            => Yii::t('cm-categories', 'Deleted At'),            
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParentCategory()
    {
        return $this->hasOne(Categrories::className(), ['parent' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategories()
    {
        return $this->hasMany(Categrories::className(), ['id' => 'parent']);
    }

}
