<?php
/**
 * DoraController
 * @var $this DoraController
 * 
 * Reference start
 * TOC :
 *	Index
 *
 * @author Putra Sudaryanto <putra@sudaryanto.id>
 * @contact (+62)856-299-4114
 * @copyright Copyright (c) 2018 Ommu Platform (opensource.ommu.co)
 * @link https://github.com/OmmuThemes/dora
 *
 *----------------------------------------------------------------------------------------------------------
 */

class DoraController extends Controller
{
	/**
	 * Initialize public template
	 */
	public function init() 
	{
		Yii::app()->theme = 'dora';
		$this->layout = 'main';
		Utility::applyViewPath(__dir__, false);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules() 
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','feedback'),
				'users'=>array('*'),
			),
		);
	}
	
	/**
	 * Displays the login page
	 */
	public function actionIndex()
	{
		$this->pageTitle = Yii::t('phrase', 'Main | Dora. - Coming Soon Page Template');
		$this->pageDescription = '';
		$this->pageMeta = '';
		$this->render('front_index');
	}
	
	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionFeedback() 
	{
		$model=new SupportFeedbacks;

		// Uncomment the following line if AJAX validation is needed
		$this->performAjaxValidation($model);

		if(isset($_POST['SupportFeedbacks'])) {
			$model->attributes=$_POST['SupportFeedbacks'];

			$jsonError = CActiveForm::validate($model);
			if(strlen($jsonError) > 2) {
				echo $jsonError;
				
			} else {
				if(isset($_GET['enablesave']) && $_GET['enablesave'] == 1) {
					if($model->save()) {
						echo CJSON::encode(array (
							'type' => 'contact',
							'msg' => Yii::t('phrase', 'Your email was sent!'),
						));
					} else
						print_r($model->getErrors());
				}
			}
			Yii::app()->end();
			
		} else
			$this->redirect(Yii::app()->createUrl('site/index'));
	}
	
	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionNewsletter($layout='galaxy') 
	{
		$model=new UserNewsletter;

		if(isset($_POST['UserNewsletter'])) {
			$model->attributes=$_POST['UserNewsletter'];
			$model->scenario = 'singleEmailForm';

			$newsletter = UserNewsletter::model()->findByAttributes(array('email' => strtolower($model->email_i)), array(
				'select' => 'email',
			));
			if($newsletter != null) {
				echo CJSON::encode(array (
					'type' => 'newsletter',
					'layout' => Utility::getUrlTitle($layout),
				));
			} else {
				if(isset($_GET['enablesave']) && $_GET['enablesave'] == 1) {
					if($model->save()) {
						echo CJSON::encode(array (
							'type' => 'newsletter',
							'layout' => Utility::getUrlTitle($layout),
						));
					} else
						print_r($model->getErrors());
				}
			}
			Yii::app()->end();
			
		} else
			$this->redirect(Yii::app()->createUrl('site/index'));
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model) 
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='contact-form') {
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}