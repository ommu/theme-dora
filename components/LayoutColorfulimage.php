<?php
/**
 * LayoutColorfulimage
 *
 * @author Putra Sudaryanto <putra@ommu.id>
 * @contact (+62)811-2540-432
 * @copyright Copyright (c) 2018 OMMU (www.ommu.id)
 * @link https://github.com/ommu/theme-dora
 *
 */

class LayoutColorfulimage extends CWidget
{
	public $construction_date;
	public $construction_text;
	public $banner_id;
	public $color;

	public function init() {
		if(!$this->construction_date)
			$this->construction_date = '15 Sep, 2018 12:00:00';
		if(!$this->construction_text)
			$this->construction_text = 'We are working hard on our new site. Follow the news updates and you\'ll be the first to know when it\'s ready.';
		if(!$this->color)
			$this->color = 'linear-gradient(180deg,#F3904F,#3B4371)';

		$moduleVendorPath = Yii::getPathOfAlias('ommu.banner');
		if(file_exists($moduleVendorPath))
			Yii::import('ommu.banner.models.*');
		Yii::import('application.modules.banner.models.*');
	}

	public function run() {
		$this->renderContent();
	}

	protected function renderContent() {
		$module = strtolower(Yii::app()->controller->module->id);
		$controller = strtolower(Yii::app()->controller->id);
		$action = strtolower(Yii::app()->controller->action->id);
		$currentAction = strtolower(Yii::app()->controller->id.'/'.Yii::app()->controller->action->id);
		$currentModule = strtolower(Yii::app()->controller->module->id.'/'.Yii::app()->controller->id);
		$currentModuleAction = strtolower(Yii::app()->controller->module->id.'/'.Yii::app()->controller->id.'/'.Yii::app()->controller->action->id);

		$banner_path = "public/banner";
		$banner_source = Yii::app()->theme->baseUrl.'/images/colorfulimage_bg.jpg';
		if($this->banner_id) {
			$model = Banners::model()->findByPk($this->banner_id);
			if($model->banner_filename != '' && file_exists($banner_path.'/'.$model->banner_filename))
				$banner_source = Yii::app()->request->baseUrl.'/public/banner/'.$model->banner_filename;
		}
		//$banner_source = Utility::getProtocol().'://'.Yii::app()->request->serverName.$banner_source;

		$model=new UserNewsletter;

		$this->render('layout_colorfulimage', array(
			'banner_source'=>$banner_source,
			'model'=>$model,
			'module'=>$module,
			'controller'=>$controller,
			'action'=>$action,
			'currentAction'=>$currentAction,
			'currentModule'=>$currentModule,
			'currentModuleAction'=>$currentModuleAction,
		));
	}
}
