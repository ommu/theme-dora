<?php
/**
 * @var $this TemplateController
 * @var $error array
 *
 * @author Putra Sudaryanto <putra@sudaryanto.id>
 * @contact (+62)856-299-4114
 * @copyright Copyright (c) 2018 Ommu Platform (opensource.ommu.co)
 * @link https://github.com/OmmuThemes/dora
 *
 */

	$this->breadcrumbs=array(
		'Main',
	);
	Yii::import('webroot.themes.'.Yii::app()->theme->name.'.components.*');
	$cs = Yii::app()->getClientScript();
	$cs->registerCssFile(Yii::app()->theme->baseUrl.'/css/colorfulimage/style.css');
	$cs->registerScriptFile(Yii::app()->theme->baseUrl.'/js/custom/colorfulimage.js', CClientScript::POS_END);
?>

<section class="bg-page section">
	<div class="overlay"></div>
	<div class="logo">
		<a href="#"><img src="<?php echo Yii::app()->theme->baseUrl;?>/images/logo.png" alt="Dora"></a>
	</div>
	<div class="bg-page-content">
		<div class="inner">
			<h2>Coming Soon</h2>
			<!-- Type here opening date -->
			<input type="hidden" id="countDownDate" name="countDownDate" value="15 Sep, 2018 12:00:00" expireword="Welcome">
			<div class="timer">
				<h1 id="timer"></h1></div>
			<p>We are working hard on our new site. Follow the news updates and you'll be the first to know when it's ready.</p>
			<form class="notify-area" action="javascript:void(0)" autocomplete="off" method="post">
				<input type="text" name="email" id="email" value="" placeholder="E-mail">
				<button type="button" data-title="Notify Me" class="notify ripplelink">Notify Me</button>
			</form>
		</div>
	</div>
	<div class="arrow">
		<a href="#What We Do"><i class="ion-ios-arrow-down"></i></a>
	</div>
</section>

<?php $this->widget('ContentPortfolio'); //Portfolio ?>
<?php $this->widget('ContentContactUs'); //Contact ?>