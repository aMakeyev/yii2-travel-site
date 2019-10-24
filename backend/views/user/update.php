<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\User */

$this->title = 'Update User: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="user-update">

    <h1><?= Html::encode($this->title) ?></h1>

	<div class="user-form">

		<?php $form = ActiveForm::begin(); ?>

		<?= $form->field($model, 'username')->textInput() ?>

		<?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

		<?= $form->field($model, 'status')->dropDownList([ '10' => 'Активен', '0' => 'Не активен', ]) ?>
		<?= $form->field($model, 'role')->dropDownList([ '20' => 'Менеджер', '30' => 'Админ', ]) ?>

		<div class="form-group">
			<?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
		</div>

		<?php ActiveForm::end(); ?>

	</div>

</div>
