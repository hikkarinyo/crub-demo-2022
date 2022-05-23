<?php

use app\models\Product;
use app\models\Status;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ProductSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Каталог';
?>
<div class="product-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php //echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'name',
            'file' => [
                'attribute' => 'file',
                'label' => 'Фото',
                'content' => function ($model) {
                    return Html::img($model->file, ['width'=> '200']);
                }
            ],
            'count',
            'year',
            'model',
            'country',
            [
                'label' => 'Категория',
                'attribute' => 'category_id',
                'filter' => ArrayHelper::map(\app\models\Category::find()->asArray()->all(),'id','name'),
                'value' => 'category.name'
            ],
            [
                'attribute' => 'view',
                'format'=>'raw',
                'label' => '',
                'content' => function ($model) {
                    return (
                            Html::a('Посмотреть', ['view', 'id' => $model->id], ['class' => 'btn btn-primary'])
                    );
                }
            ],
            [
                'attribute' => 'view',
                'format'=>'raw',
                'label' => '',
                'content' => function ($model) {
                   if (!Yii::$app->user->isGuest) {
                       return (
                       Html::a('Купить', ['cart/create', 'product_id' => $model->id, 'user_id'=>Yii::$app->user->identity->getId()], ['class' => 'btn btn-primary'])
                       );
                   }
                }
            ],
        ],
    ]); ?>


</div>
