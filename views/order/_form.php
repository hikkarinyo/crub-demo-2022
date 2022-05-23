<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Order */
/* @var $form yii\widgets\ActiveForm */
$request = Yii::$app->request;
$user = $request->get('user_id');
?>

<div class="order-form">

    <?php $form = ActiveForm::begin(); ?>

<!--    //<div style="display: none;">-->
        <?= $form->field($model, 'user_id')->textInput(['value'=>$user]) ?>
<!--    </div>-->

    <div class="form-group">
        <?= Html::submitButton('Заказать', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
