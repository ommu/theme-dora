<?php
/**
 * @var $this LayoutImage
 *
 * @author Putra Sudaryanto <putra@sudaryanto.id>
 * @contact (+62)856-299-4114
 * @copyright Copyright (c) 2018 Ommu Platform (www.ommu.co)
 * @link https://github.com/ommu/theme-dora
 *
 */

	$cs = Yii::app()->getClientScript();
	$cs->registerCssFile(Yii::app()->theme->baseUrl.'/css/image/style.css');
	$cs->registerScriptFile(Yii::app()->theme->baseUrl.'/js/custom/image.js', CClientScript::POS_END);
?>

<section class="bg-page section" style="background-color: <?php echo $this->color;?>;">
	<div class="overlay" style="background-image: url(<?php echo $banner_source;?>);"></div>
	<div class="logo">
		<a href="#"><img src="<?php echo Yii::app()->theme->baseUrl;?>/images/logo.png" alt="Dora"></a>
	</div>
	<div class="bg-page-content">
		<div class="inner">
			<h2>Coming Soon</h2>
			<!-- Type here opening date -->
			<input type="hidden" id="countDownDate" name="countDownDate" value="<?php echo $this->construction_date;?>" expireword="Welcome">
			<div class="timer">
				<h1 id="timer"></h1></div>
			<p><?php echo $this->construction_text;?></p>
			<?php $form=$this->beginWidget('application.libraries.core.components.system.OActiveForm', array(
				'id'=>'notify-area',
				'action' => Yii::app()->createUrl('dorasite/newsletter', array('layout'=>'image')),
				'enableAjaxValidation'=>true,
				'htmlOptions' => array(
					'class' => 'notify-area',
				),
			)); ?>
				<?php echo $form->textField($model,'email_i', array('maxlength'=>32, 'id'=>'email', 'placeholder'=>'E-mail')); ?>
				<?php echo CHtml::tag('button', array('data-title'=>'Notify Me', 'class'=>'notify ripplelink', 'onclick' => 'setEnableSave()'), Yii::t('phrase', 'Notify Me')); ?>
			<?php $this->endWidget(); ?>
		</div>
	</div>
	<div class="arrow">
		<a href="#What We Do"><i class="ion-ios-arrow-down"></i></a>
	</div>
</section>