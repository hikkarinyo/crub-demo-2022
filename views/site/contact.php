<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap4\ActiveForm $form */

/** @var app\models\ContactForm $model */

use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;
use yii\captcha\Captcha;

$this->title = 'Где нас найти?';
$this->params['breadcrumbs'][] = $this->title;
?>
<div>
    <h1>Наш адрес: 683031, г. Петропавловск-Камчатский, ул. Бохняка, 13</h1>
    <p>Контактная информация по телефонам:
    <li>+7(415 2) 23-61-11 приёмная директора,</li>
    <li>+7(415 2) 21-51-53 приёмная комиссия,</li>
    <li>c 9:00 до 17:00</li>
    <li>эл. почта:collegepedagog@yandex.ru</li>
    </p>
    <img src="/web/image/map.png" alt="карта">
</div>
