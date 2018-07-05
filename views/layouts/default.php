<?php
/**
 * @author Putra Sudaryanto <putra@sudaryanto.id>
 * @contact (+62)856-299-4114
 * @copyright Copyright (c) 2018 Ommu Platform (www.ommu.co)
 * @link https://github.com/ommu/theme-dora
 *
 */

	Yii::import('webroot.themes.dora.components.*');
	$module = strtolower(Yii::app()->controller->module->id);
	$controller = strtolower(Yii::app()->controller->id);
	$action = strtolower(Yii::app()->controller->action->id);
	$currentAction = strtolower(Yii::app()->controller->id.'/'.Yii::app()->controller->action->id);
	$currentModule = strtolower(Yii::app()->controller->module->id.'/'.Yii::app()->controller->id);
	$currentModuleAction = strtolower(Yii::app()->controller->module->id.'/'.Yii::app()->controller->id.'/'.Yii::app()->controller->action->id);
	
	/**
	 * = Global condition
	 ** Construction condition
	 */
	$setting = OmmuSettings::model()->findByPk(1, array(
		'select' => 'site_oauth, site_title',
	));

	/**
	 * = Dialog Condition
	 */
	if($this->dialogDetail == true)
		$dialogWidth = !empty($this->dialogWidth) ? $this->dialogWidth.'px' : '650px';
	else
		$dialogWidth = '';
	$display = ($this->dialogDetail == true && !Yii::app()->request->isAjaxRequest) ? 'style="display: block;"' : '';
	
	/**
	 * = pushState condition
	 */
	$title = CHtml::encode($this->pageTitle).' | '.$setting->site_title;
	$description = $this->pageDescription;
	$keywords = $this->pageMeta;
	$urlAddress = Utility::getProtocol().'://'.Yii::app()->request->serverName.Yii::app()->request->requestUri;

	if(Yii::app()->request->isAjaxRequest && !Yii::app()->getRequest()->getParam('ajax')) {
		/* if(Yii::app()->session['theme_active'] != Yii::app()->theme->name) {
			$return = array(
				'redirect' => $urlAddress,		
			);

		} else { */
			$page = $this->contentOther == true ? 1 : 0;
			$dialog = $this->dialogDetail == true ? (empty($this->dialogWidth) ? 1 : 2) : 0;		// 0 = static, 1 = dialog, 2 = notifier
			$header = $this->widget('MenuMain', array(), true);
			
			if($this->contentOther == true) {
				$render = array(
					'content' => $content, 
					'other' => $this->contentAttribute,
				);
			} else {
				$render = $content;
			}
			$return = array(
				'title' => $title,
				'description' => $description,
				'keywords' => $keywords,
				'address' => $urlAddress,
				'dialogWidth' => $dialogWidth,
			);
			$return['page'] = $page;
			$return['dialog'] = $dialog;
			$return['header'] = $this->dialogDetail != true ? $header : '';
			$return['render'] = $render;
			$return['script'] = $cs=Yii::app()->getClientScript()->getOmmuScript();
		//}
		echo CJSON::encode($return);

	} else {
		$cs = Yii::app()->getClientScript();
		$cs->registerCssFile(Yii::app()->theme->baseUrl.'/css/jquery.fullPage.css');
		$cs->registerCssFile(Yii::app()->theme->baseUrl.'/css/owl.carousel.css');
		$cs->registerCssFile(Yii::app()->theme->baseUrl.'/css/owl.theme.css');
		$cs->registerCssFile(Yii::app()->theme->baseUrl.'/css/magnific-popup.css');
		$cs->registerCssFile(Yii::app()->theme->baseUrl.'/css/ionicons.min.css');
		$cs->registerScriptFile(Yii::app()->theme->baseUrl.'/js/jquery-3.2.1.min.js', CClientScript::POS_BEGIN);
		$cs->registerScriptFile(Yii::app()->theme->baseUrl.'/js/jquery-ui.min.js', CClientScript::POS_BEGIN);
		$cs->registerScriptFile(Yii::app()->theme->baseUrl.'/js/jquery.fullPage.min.js', CClientScript::POS_BEGIN);
		$cs->registerScriptFile(Yii::app()->theme->baseUrl.'/js/owl.carousel.min.js', CClientScript::POS_BEGIN);
		$cs->registerScriptFile(Yii::app()->theme->baseUrl.'/js/jquery.magnific-popup.js', CClientScript::POS_BEGIN);
		$cs->registerScriptFile(Yii::app()->theme->baseUrl.'/js/script.js', CClientScript::POS_END);
		Yii::app()->clientScript->scriptMap=array(
			'jquery.js'=>false,
		);
	?>
<!DOCTYPE html>
<html>
 <head>
	<meta charset="UTF-8" />
	<!--[if IE]><meta http-equiv="x-ua-compatible" content="IE=9" /><![endif]-->
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php echo $title;?></title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
	<meta name="msapplication-tap-highlight" content="no"/>
	<meta name="format-detection" content="telephone=no"/>
	<meta name="author" content="Ommu Platform (support@ommu.co)" />
	<link rel="shortcut icon" href="<?php echo Yii::app()->theme->baseUrl;?>/favicon.ico" />
 </head>
 <body>
	<?php echo $content;?>

	<?php $this->widget('ComGoogleAnalytics'); ?>

 </body>
</html>

<?php }?>