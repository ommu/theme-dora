<?php
/**
 * TemplateController
 * @var $this TemplateController
 * 
 * Reference start
 * TOC :
 *	Index
 *
 * @author Putra Sudaryanto <putra@ommu.id>
 * @contact (+62)811-2540-432
 * @copyright Copyright (c) 2018 OMMU (www.ommu.id)
 * @link https://github.com/ommu/theme-dora
 *
 *----------------------------------------------------------------------------------------------------------
 */

class TemplateController extends Controller
{
	/**
	 * Initialize public template
	 */
	public function init() 
	{
		Yii::app()->theme = 'dora';
		$this->layout = 'front_default';
		$this->applyViewPath(__dir__, false);
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
				'actions'=>array('index','galaxy','island','pattern','classic','image','colorfulimage','particle','stars'),
				'users'=>array('*'),
			),
		);
	}
	
	/**
	 * Displays the login page
	 */
	public function actionGalaxy()
	{
		$this->pageTitle = Yii::t('phrase', 'Galaxy Template | Dora. - GalaxyComing Soon Page Template');
		$this->pageDescription = '';
		$this->pageMeta = '';
		$this->render('/dora/template/front_galaxy');
	}
	
	/**
	 * Displays the login page
	 */
	public function actionIsland()
	{
		$this->pageTitle = Yii::t('phrase', 'Island Template | Dora. - Coming Soon Page Template');
		$this->pageDescription = '';
		$this->pageMeta = '';
		$this->render('/dora/template/front_island');
	}
	
	/**
	 * Displays the login page
	 */
	public function actionPattern()
	{
		$this->pageTitle = Yii::t('phrase', 'Pattern Template | Dora. - Coming Soon Page Template');
		$this->pageDescription = '';
		$this->pageMeta = '';
		$this->render('/dora/template/front_pattern');
	}
	
	/**
	 * Displays the login page
	 */
	public function actionClassic()
	{
		$this->pageTitle = Yii::t('phrase', 'Classic Template | Dora. - Coming Soon Page Template');
		$this->pageDescription = '';
		$this->pageMeta = '';
		$this->render('/dora/template/front_classic');
	}
	
	/**
	 * Displays the login page
	 */
	public function actionImage()
	{
		$this->pageTitle = Yii::t('phrase', 'Image Template | Dora. - Coming Soon Page Template');
		$this->pageDescription = '';
		$this->pageMeta = '';
		$this->render('/dora/template/front_image');
	}
	
	/**
	 * Displays the login page
	 */
	public function actionColorfulimage()
	{
		$this->pageTitle = Yii::t('phrase', 'Colorfull Image Template | Dora. - Coming Soon Page Template');
		$this->pageDescription = '';
		$this->pageMeta = '';
		$this->render('/dora/template/front_colorfulimage');
	}
	
	/**
	 * Displays the login page
	 */
	public function actionParticle()
	{
		$this->pageTitle = Yii::t('phrase', 'Particle Template | Dora. - Coming Soon Page Template');
		$this->pageDescription = '';
		$this->pageMeta = '';
		$this->render('/dora/template/front_particle');
	}
	
	/**
	 * Displays the login page
	 */
	public function actionStars()
	{
		$this->pageTitle = Yii::t('phrase', 'Stars Template | Dora. - Coming Soon Page Template');
		$this->pageDescription = '';
		$this->pageMeta = '';
		$this->render('/dora/template/front_stars');
	}
}