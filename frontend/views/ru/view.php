<?php

use yii\helpers\Html;

?>

<?php
$mainImage = $rutour->getImage();
//$gallery = $rutour->getImages();
?>
<section class="italy-tour">
	<div class="container-fluid">
		<div class="row header-color ">
			<div class="col-3 offset-2 bgrd-color">
				<h1><?= $rutour->title ?></h1>
			</div>
			<div class="col-2 img-block">
				<div class="header-overlow"></div>
				<?=Html::img($mainImage->getUrl('x200'), ['alt' => $rutour->title]) ?>
			</div>
			<div class="col-5 bgrd-color"></div>
		</div>
	</div>
	<div class="container-fluid">
		<div class="row">
			<div class="col-2 side-color"></div>

			<div class="col page-content">
				<div class="tour-content">
					<?= $rutour->content ?>
				</div>
				<?php foreach($rudocs as $rudoc) :?>
				<div class="doc">
					<p class="doc-name"><?= $rudoc->name ?></p>
					<p class="doc-price"><?= $rudoc->price ?></p>
					<p><a class="doc-link" href="<?= $rudoc->file ?>"><?= $rudoc->link ?></a></p>
				</div>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
</section>


