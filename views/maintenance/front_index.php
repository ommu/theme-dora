<?php
/**
 * @var $this MaintenanceController
 *
 * @author Putra Sudaryanto <putra@ommu.id>
 * @contact (+62)811-2540-432
 * @copyright Copyright (c) 2012 OMMU (www.ommu.id)
 * @link https://github.com/ommu/theme-dora
 *
 */
 
	$this->breadcrumbs=array(
		'Maintenance',
	);

	$this->pageTitle = Yii::t('phrase', 'Maintenance');
	Yii::import('webroot.themes.dora.components.*');

	$condition = 0;
	$model = OmmuThemes::model()->findByAttributes(array(
		'default_theme'=>1,
		'folder'=>'dora',
	));
	$configTheme = unserialize($model->config);
	if($model != null && is_array($configTheme) && !empty($configTheme))
		$condition = 1;
?>

<?php 
$layout = 'LayoutGalaxy';
if($condition) {
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
}
$construction_text = unserialize($setting->construction_text);
$this->widget($layout, array(
	'construction_date' => date('j M, Y H:i:s', strtotime($setting->construction_date)),
	'construction_text' => $construction_text['maintenance'],
	'banner_id' => $configTheme['template']['banner'],
)); //Layout Galaxy ?>

<?php if(!$condition || in_array($configTheme['portfolio']['publish'], array('', 1))) {
	$this->widget('ContentPortfolio', array(
		'title' => $configTheme['portfolio']['title'],
		'article_id' => $configTheme['portfolio']['article'],
	));
} //Portfolio ?>

<?php if(!$condition || in_array($configTheme['contact-us']['publish'], array('', 1))) {
	$this->widget('ContentContactUs', array(
		'title' => $configTheme['contact-us']['title'],
		'desc' => $configTheme['contact-us']['desc'],
	)); 
} //Contact ?>