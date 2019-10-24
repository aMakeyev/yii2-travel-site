<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use backend\assets\AppAsset;
use common\widgets\Alert;

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
<!--	<link rel="shortcut icon" href="/favicon.ico">-->
</head>
<body>
<?php $this->beginBody() ?>
<header>
			<?php
			NavBar::begin([
				'options' => [
					'class' => 'navbar-inverse navbar-fixed-top',
				],
			]);
			$menuItems = [
				['label' => 'Sections', 'url' => ['/en/index']],
				['label' => 'Static pages', 'url' => ['/enpage/index']],
				['label' => 'Administrators', 'url' => ['/user/index']],
			];
			if (Yii::$app->user->isGuest) {
				$menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
			} else {
				$menuItems[] = '<li class="menu-right">'
					. Html::beginForm(['/site/logout'], 'post')
					. Html::submitButton(
						'Logout (' . Html::encode(Yii::$app->user->identity->username) . ')',
						['class' => 'btn btn-link logout']
					)
					. Html::endForm()
					. '</li>';
			}
			echo Nav::widget([
				'options' => ['class' => 'navbar-nav'],
				'items' => $menuItems,
			]);
			NavBar::end();
			?>

			<div class="container">
				<div class="row mt-5">
					<div class="col-sm-10 text-left">
						<a href="<?= Url::to('/en')?>"><?=Html::img('@img/logo.png', ['width' => '150px', 'alt' => 'iscra-group']) ?></a>
					</div>
					<div class="col-sm-2 lang-menu text-right">
						<ul class="lang">
							<li class="active"><a href="<?= Url::to('/admin/en')?>">EN <?=Html::img('@img/en.jpg', ['alt' => '']) ?></a></li>
							<li><a href="<?= Url::to('/admin/ru')?>">RU <?=Html::img('@img/ru.jpg', ['alt' => '']) ?></a></li>
						</ul>
					</div>
				</div>
			</div>

			<div class="container">
				<?= Breadcrumbs::widget([
					'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
				]) ?>
				<?= Alert::widget() ?>
			</div>
</header>

<div class="container">
<?= $content; ?>
</div>

<footer class="footer">
	<div class="container">
		<p class="pull-left">&copy; ISCRA Tour operator <?= date('Y') ?></p>
	</div>
</footer>


<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
