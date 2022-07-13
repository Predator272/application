<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

class Photo extends ActiveRecord
{
	public static function tableName()
	{
		return 'photo';
	}

	public function rules()
	{
		return [
			[['idUser', 'likes'], 'integer'],
			[['time'], 'safe'],
			[['name'], 'required'],
			[['name'], 'string', 'max' => 255],
			[['name'], 'file', 'extensions' => 'png, jpg, ico'],
			[['data'], 'string'],
			[['idUser'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['idUser' => 'id']],
		];
	}

	public function attributeLabels()
	{
		return [
			'id' => 'ID',
			'idUser' => 'Id User',
			'time' => 'Time',
			'name' => 'Name',
			'likes' => 'Likes',
			'data' => 'Data',
		];
	}
}
