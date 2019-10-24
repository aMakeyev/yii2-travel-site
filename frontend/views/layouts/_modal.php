<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode('ISCRA Tour operator') ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="container-fluid">
	<img src="/frontend/web/img/m3ru.jpg" alt="" width="100%">
</div>

<div id="overlay">
	<div class="popup">
		<h2>ISCRA Tour operator</h2>
		<p>
			Извините, в данный момент на сайте ведутся работы.
			Если у вас есть вопросы, свяжитесь с нами по телефонам:
			+7 (495) 972-86-84 или +7 (916) 553-57-93,
			или по электронной почте: salesrus@iscra.com
		</p>
		<button class="close" title="Закрыть" onclick="document.getElementById('overlay').style.display='none';"></button>
	</div>
</div>

<?php $this->endBody() ?>
</body>
</html>
<script type="text/javascript">
	var delay_popup = 2000;
	setTimeout("document.getElementById('overlay').style.display='block'", delay_popup);
</script>
<?php $this->endPage() ?>
