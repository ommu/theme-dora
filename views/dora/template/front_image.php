<?php
/**
 * @var $this TemplateController
 * @var $error array
 *
 * @author Putra Sudaryanto <putra@ommu.co>
 * @contact (+62)856-299-4114
 * @copyright Copyright (c) 2018 Ommu Platform (www.ommu.co)
 * @link https://github.com/ommu/theme-dora
 *
 */

	$this->breadcrumbs=array(
		'Main',
	);
	Yii::import('webroot.themes.dora.components.*');
?>

<?php $this->widget('LayoutImage'); //Layout Image ?>
<?php $this->widget('ContentPortfolio'); //Portfolio ?>
<?php $this->widget('ContentContactUs'); //Contact ?>