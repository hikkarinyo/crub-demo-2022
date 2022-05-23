<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\USer */

$this->title = $model->name;

\yii\web\YiiAsset::register($this);
?>
<div class="user-view">

    <h1><?= Html::encode($this->title) ?></h1>
    <p>
        <?php
        if (!Yii::$app->user->isGuest) {
            echo Html::a('Купить', ['cart/create', 'product_id' => $model->id, 'user_id'=>Yii::$app->user->identity->getId()], ['class' => 'btn btn-primary']);
        }
        ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'name',
            'file' => [
                'attribute' => 'file',
                'label' => 'Фото',
                'format'=> 'image',
                'content' => function ($model) {
                    return Html::img($model->file, ['width'=> '200']);
                }
            ],
            'count',
            'year',
            'model',
            'country',
            'category.name',
        ],
    ]) ?>

</div>
