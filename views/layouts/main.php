<?php
/**
 * @author Putra Sudaryanto <putra@sudaryanto.id>
 * @contact (+62)856-299-4114
 * @copyright Copyright (c) 2018 Ommu Platform (opensource.ommu.co)
 * @link https://github.com/OmmuThemes/dora
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
	$setting = OmmuSettings::model()->findByPk(1,array(
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

	if(Yii::app()->request->isAjaxRequest && !isset($_GET['ajax'])) {
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
		$cs->registerCssFile(Yii::app()->theme->baseUrl.'/css/bootstrap.min.css');
		$cs->registerCssFile(Yii::app()->theme->baseUrl.'/css/ionicons.min.css');
		$cs->registerCssFile(Yii::app()->theme->baseUrl.'/css/font-awesome.min.css');
		$cs->registerCssFile(Yii::app()->theme->baseUrl.'/css/style.css');
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
	<section class="background">
		<div class="navbar">
			<div class="logo" style="background-image: url(<?php echo Yii::app()->theme->baseUrl;?>/images/logo.png);"></div>
			<ul class="right">
				<li><a href="https://github.com/OmmuThemes/dora" target="_blank" class="btn"> GitHub </a></li>
			</ul>
		</div>
		<div class="box">
			<div class="container">
				<div class="vawebox">
					<h1>This's Coming Soon Page Template</h1>
					<p>A multipurpose coming soon template built with versatile syles and multi concepts</p>
					<a href="#demo" type="button" class="btn" id="down">View Demo</a>
				</div>
			</div>
		</div>
	</section>

	<?php echo $content;?>

	<!-- Devob Creative Agency -->
	<section class="devob">
		<div class="container">
			<div class="col-sm-12">
				<a href="https://github.com/ommu" target="_blank"><img src="<?php echo Yii::app()->theme->baseUrl;?>/images/devob.png" alt="devob creative agency"></a>
				<ul class="right">
					<li><a href="mailto:putra@sudaryanto.id">Mail Us</a></li>
					<li><a href="https://github.com/OmmuThemes" target="_blank">Our Themes</a></li>
				</ul>
			</div>
		</div>
	</section>

	<?php $this->widget('ComGoogleAnalytics'); ?>

 </body>
</html>

<?php }?>