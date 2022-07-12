<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\web\UploadedFile;

class File extends ActiveRecord
{
	public $temp;

	public static function tableName()
	{
		return 'file';
	}

	public function rules()
	{
		return [
			[['size'], 'integer'],
			[['data'], 'string'],
			[['name', 'type'], 'string', 'max' => 255],
		];
	}

	public function attributeLabels()
	{
		return [
			'id' => 'ID',
			'name' => 'Имя',
			'type' => 'Тип',
			'size' => 'Размер',
			'data' => 'Данные',
			'temp' => 'Загрузить файл',
		];
	}

	public function beforeSave($insert)
	{
		if ($temp = UploadedFile::getInstance($this, 'temp')) {
			$this->name = $temp->name;
			$this->type = $temp->type;
			$this->size = $temp->size;
			$this->data = file_get_contents($temp->tempName);
		}
		return parent::beforeSave($insert);
	}
}
