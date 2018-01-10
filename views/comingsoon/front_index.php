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

	$this->pageTitle = Yii::t('phrase', 'Contruction');
	Yii::import('webroot.themes.'.Yii::app()->theme->name.'.components.*');
?>

<?php $this->widget('LayoutGalaxy', array(
	'construction_date' => date('j M, Y H:i:s', strtotime($setting->construction_date)),
	'construction_text' => unserialize($setting->construction_text),
)); //Layout Galaxy ?>
<?php $this->widget('ContentPortfolio'); //Portfolio ?>
<?php $this->widget('ContentContactUs'); //Contact ?>