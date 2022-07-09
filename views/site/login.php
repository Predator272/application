<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap4\ActiveForm $form */
/** @var app\models\LoginForm $model */

use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">
  

    <?php $form = ActiveForm::begin([
        'id' => 'login-form',
        'layout' => 'horizontal',
        'fieldConfig' => [
            'template' => "{label}\n{input}\n{error}",
            'labelOptions' => ['class' => 'col-lg-1 col-form-label mr-lg-3'],
            'inputOptions' => ['class' => 'col-lg-3 form-control'],
            'errorOptions' => ['class' => 'col-lg-7 invalid-feedback'],
        ],
    ]); ?>

    <div>
    <h1><span>I</span><span>ntersection</span></h1>
    <div class="wrapper">
    <svg width="200" height="200">
         <circle cx="80" cy="80" r="80" fill="black" />
        <circle class="bounce" cx="80" cy="55" r="15" fill="#e52e71" />
        <rect x="65" y="80" width="28" height="50" fill="#ff8a00" />
    </svg>
</div>
<style>

h1{
  color: #484848;
  font-size: 50px;
  font-weight: bold;
  font-family: monospace;
  letter-spacing: 7px;
  cursor: pointer
}
h1 span{
  transition: .5s linear
}
h1:hover span:nth-child(1){
  margin-right: 5px;
 color: red;
}

h1:hover span::after {
    color: #fff;

  
}
h1:hover span:nth-child(1):after{
 
}
h1:hover span:nth-child(2){
  margin-left: 30px
}
h1:hover span{
  color: #fff;
  text-shadow: 0 0 10px #000,
               0 0 20px #000, 
               0 0 40px #000;
}
.wrapper {
    margin: 2em;
    display: flex;
    justify-content: center;
}

@keyframes bounce {
    from {
        transform: translate3d(0, 0, 0);
    }
    to {
        transform: translate3d(0, -15px, 0);
    }
}

.bounce {
    animation: bounce 0.4s;
    animation-iteration-count: infinite;
    animation-direction: alternate;
}
</style>
    </div>
        <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

        <?= $form->field($model, 'password')->passwordInput() ?>

       

        <div class="form-group">
            <div class="offset-lg-1 col-lg-11">
                
                <?= Html::submitButton('Вход', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
       
                <?= Html::a($text = 'Регистрация', $url = '../site', ['class'=> 'btn btn-denger']) ?>
            </div>
        </div>


    <?php ActiveForm::end(); ?>

   
</div>
