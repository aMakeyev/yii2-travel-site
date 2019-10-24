<?php

use yii\helpers\Url;
?>

<section class="sliders">
	<div class="container-fluid">
		<div class="row">
			<?php if(!empty($rutours)): $y = 1?>
			<?php foreach($rutours as $rutour): ?>
			<div id="carouselControls<?= $y?>" class="col-md carousel slide carousel-fade <?php if ($y == 2) echo 'p-0'; ?>" data-ride="carousel">
				<div class="carousel-inner">
					<div class="top-caption display-1">
						<h1><?= $rutour->name ?></h1>
					</div>
					<a href="<?= Url::to(['ru/view/', 'route' => $rutour->route]) ?>" class="bottom-caption"><?= $rutour->link ?></a>
					<?php $gallery = $rutour->getImages(); $i = 1;
					foreach($gallery as $img): ?>
					<div class="carousel-item <?php if ($i == 1) echo 'active'; ?>">
						<img src="<?= $img->getUrl()?>" class="d-block w-100" alt="">
					</div>
						<a class="carousel-control-prev" href="#carouselControls<?= $y?>" role="button" data-slide="prev">
							<span class="carousel-control-prev-icon" aria-hidden="true"></span>
							<span class="sr-only">Previous</span>
						</a>
						<a class="carousel-control-next" href="#carouselControls<?= $y?>" role="button" data-slide="next">
							<span class="carousel-control-next-icon" aria-hidden="true"></span>
							<span class="sr-only">Next</span>
						</a>
					<?php $i++; ?>
					<?php endforeach; ?>
				</div>
				<div class="order-list">
					<?= $rutour->list ?>
				</div>
			</div>
			<?php $y++; ?>
			<?php endforeach; ?>
			<?php endif; ?>
		</div>
	</div>
</section>
