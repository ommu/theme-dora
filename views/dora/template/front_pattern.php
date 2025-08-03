<?php
/**
 * @var $this TemplateController
 * @var $error array
 *
 * @author Putra Sudaryanto <putra@ommu.id>
 * @contact (+62)811-2540-432
 * @copyright Copyright (c) 2018 OMMU (www.ommu.id)
 * @link https://github.com/ommu/theme-dora
 *
 */

	$this->breadcrumbs=array(
		'Main',
	);
	Yii::import('webroot.themes.dora.components.*');
?>

<?php $this->widget('LayoutPattern'); //Layout Pattern ?>
<?php $this->widget('ContentPortfolio'); //Portfolio ?>
<?php $this->widget('ContentContactUs'); //Contact ?>