<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Rupage */

$this->title = 'Создать страницу';
$this->params['breadcrumbs'][] = ['label' => 'Статичные страницы', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rupage-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
