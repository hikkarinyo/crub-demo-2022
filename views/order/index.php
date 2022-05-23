<?php

use app\models\Order;
use app\models\Status;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\OrderSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Мои заказы';
?>
<div class="order-index">

    <h1><?= Html::encode($this->title) ?></h1>

<!--    <p>-->
<!--        --><?//= Html::a('Создать заказ', ['create'], ['class' => 'btn btn-success']) ?>
<!--    </p>-->

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'date',
            [
                'label' => 'ФИО заказчика',
                'value' => function ($data) {
                    return $data->user->name . ' ' . $data->user->surname . ' ' . $data->user->patronymic;
                }
            ],
            [
                'label' => 'Статус',
                'attribute' => 'status_id',
                'filter' => ArrayHelper::map(Status::find()->asArray()->all(), 'id', 'name'),
                'value' => 'status.name'
            ],
            'rejection_reason:ntext',
            [
                'attribute' => 'view',
                'format'=>'raw',
                'label' => '',
                'content' => function ($model) {
                    if (!Yii::$app->user->isGuest and !Yii::$app->user->identity->isAdmin() and $model->status_id === 1) {
                        return (
                                Html::a('Удалить',
                                    ['delete', 'id' => $model->id],
                                    ['class' => 'btn btn-danger',
                                        'data' => ['confirm' => 'Are you sure you want to delete this item?', 'method' => 'post'],
                        ]));
                    }
                }
            ],
        ],
    ]); ?>


</div>
