<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "multimedia".
 *
 * @property int $id
 * @property int $idUser
 * @property string $time
 * @property string $name
 * @property int $likes
 * @property resource $file
 *
 * @property User $idUser0
 */
class Multimedia extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'multimedia';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idUser', 'name', 'file'], 'required'],
            [['idUser', 'likes'], 'integer'],
            [['time'], 'safe'],
            [['file'], 'string'],
            [['name'], 'string', 'max' => 255],
            [['idUser'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['idUser' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'idUser' => 'Id User',
            'time' => 'Time',
            'name' => 'Name',
            'likes' => 'Likes',
            'file' => 'File',
        ];
    }

    /**
     * Gets query for [[IdUser0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdUser0()
    {
        return $this->hasOne(User::className(), ['id' => 'idUser']);
    }
    
}
