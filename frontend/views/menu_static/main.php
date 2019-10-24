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
<html lang="ru-Ru">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
	<link rel="shortcut icon" href="../../../backend/web/index.php">
</head>
<body>
<?php $this->beginBody() ?>
<header>
	<div class="container-fluid">
		<div class="row mt-5 pr-0 pl-5">
			<div class="col-sm-3 col-6">
				<a href="<?= Url::to('/ru')?>"><?=Html::img('@img/logo.png', ['alt' => 'iscra-group']) ?></a>
			</div>
			<div class="col-sm-3 p-0 align-self-center">
				<p class="slogan"><span>Ваши поездки и мероприятия</span><br> -- наша забота уже более 30 лет</p>
			</div>
			<div class="col-sm-4 p-0 align-self-center text-right">
				<p class="phone">+7 495 972-86-84</p>
			</div>
			<div class="col-auto lang-menu">
				<a href="<?= Url::to('/en') ?>" class="lang py-1 px-2">
					EN <?=Html::img('@img/en.jpg', ['alt' => 'english']) ?>
				</a>
				<a href="<?= Url::to('/ru') ?>" class="lang py-1 px-2 current-lang">
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
						['label' => 'О компании', 'url' => ['/ru/about']],
						['label' => 'Агентствам', 'url' => ['/ru/index']],
						['label' => 'Контакты', 'url' => ['/ru/contacts']]
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
				<h5>Офис в России:</h5>
				<p>Москва, 115184,<br> ул.Большая Татарская, 5с5, оф.402 (<a href="<?= Url::to('/ru/contacts')?>">схема</a>)<br> Тел: +7 (495)
					972-86-84</p>
				<h5>Головной офис в Италии:</h5>
				<p>Genova, via Zara, 19/5 (<a href="<?= Url::to('/ru/contacts')?>">схема</a>)<br> Tel.: +39 (010) 362-68-81</p>
			</div>
			<div class="col-lg-3 col-sm-6">
				<?= Menu::widget([
					'options' => ['class' => 'footer-list'],
					'items' => [
						['label' => 'Италия для групп из России', 'url' => ['/ru/view', 'id' => '1']],
						['label' => 'Деловой туризм и мероприятия', 'url' => ['/ru/view', 'id' => '2']],
						['label' => 'О компании', 'url' => ['/ru/about']],
						['label' => 'Агентствам', 'url' => ['/ru/index']],
						['label' => 'Контакты', 'url' => ['/ru/contacts']]
					],
					'activeCssClass' => 'active',
				]);
				?>
			</div>
			<div class="col-lg-5 contact">
				<h5>Звоните:</h5>
				<p class="phone">+7 (495) 972-86-84</p>
				<h5>Пишите:</h5>
				<a class="mail" href="../../../backend/web/index.php">salesrus@iscra.com</a>
			</div>
		</div>
	</div>
</footer>


<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
