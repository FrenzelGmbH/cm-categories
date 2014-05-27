<?php

namespace frenzelgmbh\cmcategories\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "communication".
 *
 * @property integer $id
 * @property string $mobile
 * @property string $phone
 * @property string $fax
 * @property string $email
 * @property integer $user_id
 * @property string $mod_table
 * @property integer $mod_id
 * @property string $system_key
 * @property string $system_name
 * @property integer $system_upate
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $deleted_at
 * @property integer $communication_type_id
 *
 * @property CommunicationType $communicationType
 */
class Communication extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%communication}}';
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
            [['user_id', 'mod_id', 'system_upate', 'created_at', 'updated_at', 'deleted_at', 'communication_type_id'], 'integer'],
            [['mobile', 'phone', 'fax'], 'string', 'max' => 200],
            [['email'],'email'],
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
            'mobile'                => Yii::t('cm-categories', 'Mobile'),
            'phone'                 => Yii::t('cm-categories', 'Phone'),
            'fax'                   => Yii::t('cm-categories', 'Fax'),
            'email'                 => Yii::t('cm-categories', 'Email'),
            'user_id'               => Yii::t('cm-categories', 'User ID'),
            'mod_table'             => Yii::t('cm-categories', 'Mod Table'),
            'mod_id'                => Yii::t('cm-categories', 'Mod ID'),
            'system_key'            => Yii::t('cm-categories', 'System Key'),
            'system_name'           => Yii::t('cm-categories', 'System Name'),
            'system_upate'          => Yii::t('cm-categories', 'System Upate'),
            'created_at'            => Yii::t('cm-categories', 'Created At'),
            'updated_at'            => Yii::t('cm-categories', 'Updated At'),
            'deleted_at'            => Yii::t('cm-categories', 'Deleted At'),
            'communication_type_id' => Yii::t('cm-categories', 'Communication Type'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCommunicationType()
    {
        return $this->hasOne(CommunicationType::className(), ['id' => 'communication_type_id']);
    }
}
