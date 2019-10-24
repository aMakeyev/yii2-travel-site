<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Rutour */

$this->title = 'Создать раздел';
$this->params['breadcrumbs'][] = ['label' => 'Разделы', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="entour-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('create_form', [
        'model' => $model,
    ]) ?>

</div>
