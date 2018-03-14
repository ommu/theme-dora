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
	Yii::import('webroot.themes.dora.components.*');
?>

<?php $this->widget('LayoutIsland'); //Layout Island ?>
<?php $this->widget('ContentPortfolio'); //Portfolio ?>
<?php $this->widget('ContentContactUs'); //Contact ?>