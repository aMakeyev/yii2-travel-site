
<?php

use yii\helpers\Html;

?>

<section class="contacts">
	<div class="container-fluid">
		<div class="row header-color ">
			<div class="col-3 offset-2 bgrd-color">
				<h1><?=	$contacts->title; ?></h1>
			</div>
			<div class="col-2 img-block">
				<div class="header-overlow"></div>
				<?=Html::img('@img/en-page.jpg', ['alt' => '']) ?>
			</div>
			<div class="col-5 bgrd-color"></div>
		</div>
	</div>
	<div class="container-fluid">
		<div class="row">
			<div class="col-2 side-color"></div>
			<div class="col content p-0">
				<p><?= $contacts->content ?></p>
			</div>
		</div>
	</div>
</section>



