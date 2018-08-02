<?php
/**
 * @var $this SiteController
 *
 * @author Putra Sudaryanto <putra@sudaryanto.id>
 * @contact (+62)856-299-4114
 * @copyright Copyright (c) 2012 Ommu Platform (www.ommu.co)
 * @link https://github.com/ommu/theme-dora
 *
 */

	Yii::import('webroot.themes.dora.components.*');
	$configTheme = Yii::app()->controller->themeSetting;

	$this->breadcrumbs=array(
		'Main',
	);
	$this->pageTitle = Yii::t('phrase', 'Main');
?>

<?php 
$layout = 'LayoutGalaxy';
if($configTheme['template']['option'] == 'galaxy')
	$layout = 'LayoutGalaxy';
else if($configTheme['template']['option'] == 'island')
	$layout = 'LayoutIsland';
else if($configTheme['template']['option'] == 'pattern')
	$layout = 'LayoutPattern';
else if($configTheme['template']['option'] == 'classic')
	$layout = 'LayoutClassic';
else if($configTheme['template']['option'] == 'image')
	$layout = 'LayoutImage';
else if($configTheme['template']['option'] == 'colorfulimage')
	$layout = 'LayoutColorfulimage';
else if($configTheme['template']['option'] == 'particle')
	$layout = 'LayoutParticle';
else if($configTheme['template']['option'] == 'stars')
	$layout = 'LayoutStars';

$construction_text = unserialize($setting->construction_text);
$this->widget($layout, array(
	'construction_date' => date('j M, Y H:i:s', strtotime($setting->construction_date)),
	'construction_text' => $construction_text['comingsoon'],
	'banner_id' => $configTheme['template']['banner'],
	'color' => $configTheme['template']['color'],
)); //Layout Galaxy ?>

<?php if($configTheme['portfolio']['publish'] != 0) {
	$this->widget('ContentPortfolio', array(
		'title' => $configTheme['portfolio']['title'],
		'article_id' => $configTheme['portfolio']['article'],
	));
} //Portfolio ?>

<?php if($configTheme['contact-us']['publish'] != 0) {
	$this->widget('ContentContactUs', array(
		'title' => $configTheme['contact-us']['title'],
		'desc' => $configTheme['contact-us']['desc'],
	)); 
} //Contact ?>