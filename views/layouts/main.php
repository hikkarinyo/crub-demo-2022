<?php

/** @var yii\web\View $this */
/** @var string $content */

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap4\Breadcrumbs;
use yii\bootstrap4\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="d-flex flex-column h-100">
<?php $this->beginBody() ;
?>

<header>
    <?php
    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar navbar-expand-md navbar-dark bg-dark fixed-top',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav'],
        'items' => [
            ['label' => 'О нас', 'url' => ['/site/index']],
            ['label' => 'Каталог', 'url' => ['/site/catalog']],
            ['label' => 'Где нас найти?', 'url' => ['/site/contact']],
            ['label' => 'Регистрация', 'url' => ['/user/create/'], 'visible'=> Yii::$app->user->isGuest],
            ['label' => 'Мои заказы', 'url' => ['/order/index/'], 'visible'=> !Yii::$app->user->isGuest],
            ['label' => 'Корзина', 'url' => ['/cart/index/'], 'visible'=> !Yii::$app->user->isGuest],
            ['label' => 'Админ.панель', 'url' => ['/admin/index/'], 'visible'=> !Yii::$app->user->isGuest and Yii::$app->user->identity->isAdmin()],
            ['label' => 'Товары', 'url' => ['/product/index'], 'visible'=> !Yii::$app->user->isGuest and Yii::$app->user->identity->isAdmin()],
            ['label' => 'Категории', 'url' => ['/category/index'], 'visible'=> !Yii::$app->user->isGuest and Yii::$app->user->identity->isAdmin()],
            Yii::$app->user->isGuest ? (
                ['label' => 'Вход', 'url' => ['/site/login']]
            ) : (
                '<li>'
                . Html::beginForm(['/site/logout'], 'post', ['class' => 'form-inline'])
                . Html::submitButton(
                    'Выход (' . Yii::$app->user->identity->username . ')',
                    ['class' => 'btn btn-link logout']
                )
                . Html::endForm()
                . '</li>'
            )
        ],
    ]);
    NavBar::end();
    ?>
</header>

<main role="main" class="flex-shrink-0">
    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</main>

<footer class="footer mt-auto py-3 text-muted">
    <div class="container">
        <p class="float-left">&copy; CopyStar <?= date('Y') ?></p>
        <p class="float-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
