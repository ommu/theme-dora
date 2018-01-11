<?php
/**
 * Ommu Settings (ommu-settings)
 * @var $this ComingsoonController
 * @var $model OmmuSettings
 *
 * @author Putra Sudaryanto <putra@sudaryanto.id>
 * @contact (+62)856-299-4114
 * @copyright Copyright (c) 2012 Ommu Platform (opensource.ommu.co)
 * @link https://github.com/ommu/ommu
 *
 */

	$this->breadcrumbs=array(
		'Coming Soon',
	);

	$this->pageTitle = Yii::t('phrase', 'Coming Soon');
	Yii::import('webroot.themes.'.Yii::app()->theme->name.'.components.*');

	$condition = 0;
	$model = OmmuThemes::model()->findByAttributes(array(
		'group_page'=>'maintenance',
		'default_theme'=>1,
		'folder'=>Yii::app()->theme->name,
	));
	$configTheme = unserialize($model->config);
	if($model != null && is_array($configTheme) && !empty($configTheme))
		$condition = 1;
?>

<?php 
$layout = 'LayoutGalaxy';
if($condition == 1) {
	if($configTheme['template'] == 'galaxy')
		$layout = 'LayoutGalaxy';
	else if($configTheme['template'] == 'island')
		$layout = 'LayoutIsland';
	else if($configTheme['template'] == 'pattern')
		$layout = 'LayoutPattern';
	else if($configTheme['template'] == 'classic')
		$layout = 'LayoutClassic';
	else if($configTheme['template'] == 'image')
		$layout = 'LayoutImage';
	else if($configTheme['template'] == 'colorfulimage')
		$layout = 'LayoutColorfulimage';
	else if($configTheme['template'] == 'particle')
		$layout = 'LayoutParticle';
	else if($configTheme['template'] == 'stars')
		$layout = 'LayoutStars';
}
$construction_text = unserialize($setting->construction_text);
$this->widget($layout, array(
	'construction_date' => date('j M, Y H:i:s', strtotime($setting->construction_date)),
	'construction_text' => $construction_text['comingsoon'],
)); //Layout Galaxy ?>

<?php if(!$condition || $configTheme['portfolio'] == 1)
	$this->widget('ContentPortfolio'); //Portfolio ?>

<?php if(!$condition || $configTheme['contact-us'] == 1)
	$this->widget('ContentContactUs'); //Contact ?>