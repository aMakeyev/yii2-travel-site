<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;
use frontend\assets\AppAsset;
use yii\widgets\Menu;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
	<?php $this->registerCssFile('@web/css/enstyle.css', ['depends' => ['yii\web\YiiAsset',
		'yii\bootstrap4\BootstrapPluginAsset']]) ?>
<!--	<link rel="shortcut icon" href="/favicon.ico">-->
</head>
<body>
<?php $this->beginBody() ?>

<header>
	<div class="container-fluid">
		<div class="row mt-5 pr-0 pl-5">
			<div class="col-sm-3 col-6">
				<a href="<?= Url::to('/en')?>"><?=Html::img('@img/logo.png', ['alt' => 'iscra-group']) ?></a>
			</div>
			<div class="col-sm-3 p-0 align-self-center">
				<p class="slogan"><span>Ваши поездки и мероприятия</span><br> -- наша забота уже более 30 лет</p>
			</div>
			<div class="col-sm-4 p-0 align-self-center text-right">
				<p class="phone">+39 (010) 362-68-81</p>
			</div>
			<div class="col-auto lang-menu">
				<a href="<?= Url::to('/en') ?>" class="lang py-1 px-2 current-lang">
					EN <?=Html::img('@img/en.jpg', ['alt' => 'english']) ?>
				</a>
				<a href="<?= Url::to('/ru') ?>" class="lang py-1 px-2">
					RU <?=Html::img('@img/ru.jpg', ['alt' => 'russian']) ?>
				</a>
			</div>
		</div>
		<div class="container-fluid">
			<div class="row justify-content-center p-2 mr-4">
				<?php
				NavBar::begin([
					'options' => [
						'class' => 'navbar navbar-expand-md navbar-light main-nav col-auto'
					],
				]);
				$menuItems = [
					['label' => 'About', 'url' => ['/en/about']],
					['label' => 'Documents', 'url' => ['/en/index']],
					['label' => 'Contacts', 'url' => ['/en/contacts']]
				];
				echo Nav::widget([
					'options' => ['class' => 'navbar-nav'],
					'items' => $menuItems
				]);
				NavBar::end();
				?>
			</div>
		</div>
	</div>
</header>

<?= $content; ?>

<footer>
	<div class="container-fluid">
		<div class="row p-5">
			<div class="col-lg-4 col-sm-6 office">
				<h5>HEAD OFFICE  IN ITALY:</h5>
				<p>Genova, via Zara, 19/5<br>Tel.: +39 (010) 362-68-81</p>
				<h5>Office in Russia:</h5>
				<p>Moscow,B.Tatarskaya 5/5, 402<br>Tel: +7 (495) 972-86-84</p>
				<h5>Office in India:</h5>
				<p>Mumbai, 400058, Basera House, 3rd Floor<br>Tel.: +91 (22) 2670-45-57</p>
			</div>
			<div class="col-lg-3 col-sm-6">
				<?= Menu::widget([
					'options' => ['class' => 'footer-list'],
					'items' => [
						['label' => 'Welcome to RUSSIA', 'url' => ['/en/view', 'id' => '1']],
						['label' => 'About', 'url' => ['/en/about']],
						['label' => 'Documents', 'url' => ['/en/index']],
						['label' => 'Contacts', 'url' => ['/en/contacts']]
					],
					'activeCssClass' => 'active',
				]);
				?>
			</div>
			<div class="col-lg-5 contact">
				<p>Please, call:</p>
				<p class="phone">+39 (010) 362-68-81</p>
				<p>Write us:</p>
				<a class="mail" href="../../../backend/web/index.php">salesrus@iscra.com</a>
			</div>
		</div>
	</div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
