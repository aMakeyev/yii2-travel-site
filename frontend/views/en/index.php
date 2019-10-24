<?php

use yii\helpers\Url;
//dbg($entours);
?>

<section class="sliders">
	<div class="container-fluid">
		<div class="row">
			<?php if(!empty($entours)): $y = 1 ?>
				<?php foreach($entours as $entour): ?>
					<div id="carouselControls<?= $y?>" class="col-md carousel slide carousel-fade" data-ride="carousel">
						<div class="container-fluid">
							<div class="row justify-content-center">
								<div class="carousel-inner">
									<div class="top-caption display-1">
										<h1><?= $entour->name ?></h1>
									</div>
									<a href="<?= Url::to(['en/view', 'route' => $entour->route]) ?>" class="bottom-caption"><?= $entour->link ?></a>
									<?php $gallery = $entour->getImages(); $i = 1;
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
									<?= $entour->list ?>
								</div>
							</div>
						</div>
					</div>
					<?php $y++; ?>
				<?php endforeach; ?>
			<?php endif; ?>
		</div>
	</div>
</section>
