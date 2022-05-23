<?php

/** @var yii\web\View $this */

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <p style='text-align: center'><img style="width: 500px; height: 200px " src="/web/image/logo.png" alt="логотип"></p>
    <h4 style='text-align: center'>Всегда выиграшное решение</h4>
    <h4 style='text-align: center'>Новинки компании!</h4>
    <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleCaptions" data-slide-to="0"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="3"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="4"></li>
        </ol>
        <div class="carousel-inner">
            <?php
            foreach ($models as $model => $element) {
                if ($model === array_key_first($models)) {
                    ?>
                    <div class="carousel-item active">
                        <img  src="<?= $element->file ?>" class="d-block w-100" alt="image">
                        <div class="carousel-caption d-none d-md-block">
                            <h5><?= $element->name ?></h5>
                        </div>
                    </div>
                <?php } else {

                    ?>
                    <div class="carousel-item">
                        <img src="<?= $element->file ?>" class="d-block w-100" alt="image">
                        <div class="carousel-caption d-none d-md-block">
                            <h5><?= $element->name ?></h5>
                        </div>
                    </div>
                <?php } ?>
            <?php } ?>
        </div>
        <button class="carousel-control-prev" type="button" data-target="#carouselExampleCaptions" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-target="#carouselExampleCaptions" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </button>
    </div>
</div>
