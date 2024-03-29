<?php
/**
 * LayoutStars
 *
 * @author Putra Sudaryanto <putra@ommu.co>
 * @contact (+62)856-299-4114
 * @copyright Copyright (c) 2018 Ommu Platform (www.ommu.co)
 * @link https://github.com/ommu/theme-dora
 *
 */

class LayoutStars extends CWidget
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
			$this->color = '#274bd3';
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

		$model=new UserNewsletter;

		$this->render('layout_stars', array(
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
