<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Rudoc */

//$this->title = 'Добавление документа';
$this->params['breadcrumbs'][] = ['label' => 'Rudocs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rudoc-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
