<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>

	<?= $form->field($model, 'username')->textInput() ?>

	<?= $form->field($model, 'password')->textInput() ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

	<?= $form->field($model, 'status')->dropDownList([ '10' => 'Активен', '0' => 'Не активен', ]) ?>
	<?= $form->field($model, 'role')->dropDownList([ '20' => 'Менеджер', '30' => 'Админ', ]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
