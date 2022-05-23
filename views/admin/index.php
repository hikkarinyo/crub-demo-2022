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

$this->title = 'Заказы';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'date' => [
                'label' => 'Дата',
                'attribute' => 'date',
            ],
            [
                'label' => 'ФИО заказчика',
                'value' => function ($data) {
                    return $data->user->name . ' ' . $data->user->surname . ' ' . $data->user->patronymic;
                }
            ],
            [
                'label' => 'Количество товаров',
            ],
            [
                'label' => 'Статус',
                'attribute' => 'status_id',
                'filter' => ArrayHelper::map(Status::find()->asArray()->all(), 'id', 'name'),
                'value' => 'status.name'
            ],
            [
                'label' => '',
                'format'=>'raw',
                'content' => function ($model) {
                    return (Html::a('Изменить статус', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']));
                }
            ],
        ],
    ]); ?>


</div>
