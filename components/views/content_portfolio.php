<?php
/**
 * @var $this ContentPortfolio
 *
 * @author Putra Sudaryanto <putra@ommu.id>
 * @contact (+62)811-2540-432
 * @copyright Copyright (c) 2018 OMMU (www.ommu.id)
 * @link https://github.com/ommu/theme-dora
 *
 */
?>

<!-- Portfolio -->
<section class="portfolio section">
	<div class="container">
		<h1><?php echo $this->title;?></h1>
		<div id="portfolio" class="owl-carousel owl-theme">
			<?php 
			$count = count($article);
			$variable = 2;
			$i=0;
			if($condition) {
				foreach ($article as $key => $value) {
					$i++;
					$article_path = Yii::app()->request->baseUrl.'/public/article/'.$value->article_id;?>
				<?php if($i == 1 || $i%$variable == 1) {?>
				<div class="portfolio-col">
				<?php }?>
					<div class="portfolio-item">
						<a class="galleryItem" href="<?php echo $article_path.'/'.$value->cover_filename;?>">
							<div class="portfolio-item-in">
								<img src="<?php echo $article_path.'/'.$value->cover_filename;?>">
								<div class="overlay"></div>
							</div>
						</a>
					</div>
				<?php if($i%$variable == 0 || ($i == $count)) {?>
				</div>
			<?php 	}
				}
			} else {
				foreach ($article as $key => $value) {
					$i++;?>
				<?php if($i == 1 || $i%$variable == 1) {?>
				<div class="portfolio-col">
				<?php }?>
					<div class="portfolio-item">
						<a class="galleryItem" href="<?php echo $value;?>">
							<div class="portfolio-item-in">
								<img src="<?php echo $value;?>">
								<div class="portfolio-item-info">
									<h3><?php echo Yii::t('phrase', '{title} Item {i}', array('{title}'=>$this->title, '{i}'=>$i));?></h3>
								</div>
								<div class="overlay"></div>
							</div>
						</a>
					</div>
				<?php if($i%$variable == 0 || ($i == $count)) {?>
				</div>
			<?php 	}
				}
			}?>
		</div>
	</div>
</section>