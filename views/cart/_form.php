<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Cart */
/* @var $form yii\widgets\ActiveForm */

$request = Yii::$app->request;
$product = $request->get('product_id');
$user = $request->get('user_id');

?>

<div class="cart-form">

    <?php $form = ActiveForm::begin(); ?>

    <div style="display: none;">
        <?= $form->field($model, 'user_id')->textInput(['value' => $user]) ?>

        <?= $form->field($model, 'product_id')->textInput(['value' => $product]) ?>
    </div>

    <?= $form->field($model, 'count')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Заказать', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
