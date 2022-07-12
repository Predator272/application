<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "music".
 *
 * @property int $id
 * @property int $idUser
 * @property string $name
 * @property string $executor
 *
 * @property User $idUser0
 * @property User[] $idUsers
 * @property Mymusic[] $mymusics
 */
class Music extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'music';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idUser', 'name', 'executor'], 'required'],
            [['idUser'], 'integer'],
            [['name', 'executor'], 'string', 'max' => 255],
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
            'name' => 'Name',
            'executor' => 'Executor',
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

    /**
     * Gets query for [[IdUsers]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdUsers()
    {
        return $this->hasMany(User::className(), ['id' => 'idUser'])->viaTable('mymusic', ['idMusic' => 'id']);
    }

    /**
     * Gets query for [[Mymusics]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMymusics()
    {
        return $this->hasMany(Mymusic::className(), ['idMusic' => 'id']);
    }
}
