<?php

use yii\helpers\Html;

?>

<?php
$mainImage = $entour->getImage();
?>
<section class="italy-tour">
	<div class="container-fluid">
		<div class="row header-color ">
			<div class="col-3 offset-2 bgrd-color">
				<h1><?= $entour->title ?></h1>
			</div>
			<div class="col-2 img-block">
				<div class="header-overlow"></div>
				<?=Html::img($mainImage->getUrl('x200'), ['alt' => $entour->title]) ?>
			</div>
			<div class="col-5 bgrd-color"></div>
		</div>
	</div>
	<div class="container-fluid">
		<div class="row">
			<div class="col-2 side-color"></div>

			<div class="col page-content">
				<div class="tour-content">
					<?= $entour->content ?>
				</div>
				<?php foreach($endocs as $endoc) :?>
				<div class="doc">
					<p class="doc-name"><?= $endoc->name ?></p>
					<p class="doc-price"><?= $endoc->price ?></p>
					<p><a class="doc-link" href="<?= $endoc->file ?>"><?= $endoc->link ?></a></p>
				</div>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
</section>


