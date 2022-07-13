<?php

namespace app\models;
use yii\data\ActiveDataProvider;
use Yii;


/**
 * This is the model class for table "friend".
 *
 * @property int $id
 * @property int $idUser
 * @property int $idFriend
 *
 * @property User $idFriend0
 * @property User $idUser0
 */
class Friend extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'friend';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idUser', 'idFriend'], 'required'],
            [['idUser', 'idFriend'], 'integer'],
            [['idUser', 'idFriend'], 'unique', 'targetAttribute' => ['idUser', 'idFriend']],
            [['idUser'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['idUser' => 'id']],
            [['idFriend'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['idFriend' => 'id']],
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
            'idFriend' => 'Id Friend',
        ];
    }

    /**
     * Gets query for [[IdFriend0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdFriend0()
    {
        return $this->hasOne(User::className(), ['id' => 'idFriend']);
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
    
    public function search($params)
    {
        $query = Friend::find();

        // add conditions that should always apply here

       
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'idUser' => $this->idUser,
            'idFriend' => $this->idFriend,
        ]);

        return $dataProvider;
    }
}
