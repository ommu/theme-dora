<?php
/**
 * ContentPortfolio
 *
 * @author Putra Sudaryanto <putra@sudaryanto.id>
 * @contact (+62)856-299-4114
 * @copyright Copyright (c) 2018 Ommu Platform (www.ommu.co)
 * @link https://github.com/ommu/theme-dora
 *
 */

class ContentPortfolio extends CWidget
{
	public $title;
	public $article_id;

	public function init() {
		if(!$this->title)
			$this->title = Yii::t('phrase', 'Portfolio');

		$moduleVendorPath = Yii::getPathOfAlias('application.vendor.ommu.article.models');
		if(!file_exists($moduleVendorPath))
			Yii::import('application.vendor.ommu.article.models.*');
			
		Yii::import('application.modules.article.models.*');
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
		
		$articleCondition = 0;
		$model = Articles::model()->findByPk($this->article_id);
		if($this->article_id && $model != null) {
			$articleCondition = 1;
			$article = $model->medias;

		} else {
			$article = array(
				Yii::app()->theme->baseUrl.'/images/preview/portfolio_1.jpg',
				Yii::app()->theme->baseUrl.'/images/preview/portfolio_2.jpg',
				Yii::app()->theme->baseUrl.'/images/preview/portfolio_3.jpg',
				Yii::app()->theme->baseUrl.'/images/preview/portfolio_4.jpg',
				Yii::app()->theme->baseUrl.'/images/preview/portfolio_5.jpg',
				Yii::app()->theme->baseUrl.'/images/preview/portfolio_6.jpg',
				Yii::app()->theme->baseUrl.'/images/preview/portfolio_8.jpg',
				Yii::app()->theme->baseUrl.'/images/preview/portfolio_9.jpg',
			);
		}

		$this->render('content_portfolio', array(
			'condition'=>$articleCondition,
			'article'=>$article,
			'module'=>$module,
			'controller'=>$controller,
			'action'=>$action,
			'currentAction'=>$currentAction,
			'currentModule'=>$currentModule,
			'currentModuleAction'=>$currentModuleAction,
		));
	}
}
