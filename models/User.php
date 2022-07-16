<?php

namespace app\models;
use yii\data\ActiveDataProvider;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

class User extends ActiveRecord implements IdentityInterface
{
	public function rules()
	{
		return [
			[['name', 'email', 'password'], 'required'],
			[['name', 'email'], 'unique'],
			[['name'], 'string', 'min' => 3, 'max' => 100],
			[['email'], 'string', 'max' => 320],
			[['password'], 'string', 'min' => 8, 'max' => 32],
			[['email'], 'match', 'pattern' => '/^([a-z0-9_-]+\.)*[a-z0-9_-]+@[a-z0-9_-]+(\.[a-z0-9_-]+)*\.[a-z]{2,6}$/'],
		];
	}

	public function attributeLabels()
	{
		return [
			'email' => 'Логин',
			'password' => 'Пароль',
			'name' => 'Имя',
		];
	}

	public static function findIdentity($id)
	{
		return static::findOne($id);
	}

	public static function findByEmail($email)
	{
		return User::findOne(['email' => $email]);
	}

	public static function findIdentityByAccessToken($token, $type = null)
	{
		return null;
	}

	public function getId()
	{
		return $this->id;
	}

	public function getAuthKey()
	{
		return null;
	}

	public function validateAuthKey($authKey)
	{
		return false;
	}

	public function validatePassword($password)
	{
		return $this->password === md5($password);
	}

	public function beforeSave($insert)
	{
		if ($this->isNewRecord) {
			$this->password = md5($this->password);
		}
		return parent::beforeSave($insert);
	}
	public function search($params)
    {
        $query = User::find();

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
            'name' => $this->name,
            'email' => $this->email,
        ]);

        return $dataProvider;
    }
}
