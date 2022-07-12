<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "mymusic".
 *
 * @property int $id
 * @property int $idUser
 * @property int $idMusic
 *
 * @property Music $idMusic0
 * @property User $idUser0
 */
class Mymusic extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'mymusic';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idUser', 'idMusic'], 'required'],
            [['idUser', 'idMusic'], 'integer'],
            [['idUser', 'idMusic'], 'unique', 'targetAttribute' => ['idUser', 'idMusic']],
            [['idUser'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['idUser' => 'id']],
            [['idMusic'], 'exist', 'skipOnError' => true, 'targetClass' => Music::className(), 'targetAttribute' => ['idMusic' => 'id']],
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
            'idMusic' => 'Id Music',
        ];
    }

    /**
     * Gets query for [[IdMusic0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdMusic0()
    {
        return $this->hasOne(Music::className(), ['id' => 'idMusic']);
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
