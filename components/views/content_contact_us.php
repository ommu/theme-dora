<?php
/**
 * @var $this ContentContactUs
 *
 * @author Putra Sudaryanto <putra@sudaryanto.id>
 * @contact (+62)856-299-4114
 * @copyright Copyright (c) 2018 Ommu Platform (opensource.ommu.co)
 * @link https://github.com/OmmuThemes/dora
 *
 */
?>

<!-- Contact -->
<section class="contact section">
    <div class="container">
        <h1><?php echo $this->title;?></h1>
        <p class="description"><?php echo $this->desc;?></p>
		<?php $form=$this->beginWidget('application.libraries.core.components.system.OActiveForm', array(
				'id'=>'contact-form',
				'action' => Yii::app()->createUrl('dora/feedback'),
				'enableAjaxValidation'=>true,
				'htmlOptions' => array(
					'class' => 'contact-form',
				),
			)); ?>
            <div id="success"></div>
            <div class="name field">
				<?php echo $form->labelEx($model,'displayname'); ?>
				<?php echo $form->textField($model,'displayname',array('maxlength'=>32)); ?>
				<?php echo $form->error($model,'displayname'); ?>
            </div>
            <div class="email field">
				<?php echo $form->labelEx($model,'email'); ?>
				<?php echo $form->textField($model,'email',array('maxlength'=>32)); ?>
				<?php echo $form->error($model,'email'); ?>
            </div>
            <div class="clearfix"></div>
            <div class="message field">
				<?php echo $form->labelEx($model,'subject'); ?>
				<?php echo $form->textField($model,'subject',array('maxlength'=>64)); ?>
				<?php echo $form->error($model,'subject'); ?>
            </div>
            <div class="message field">
				<?php echo $form->labelEx($model,'message'); ?>
				<?php echo $form->textArea($model,'message',array('rows'=>10, 'cols'=>25)); ?>
				<?php echo $form->error($model,'message'); ?>
            </div>
			<?php echo CHtml::submitButton(Yii::t('phrase', 'Send'), array('id'=>'contact-button', 'class'=>'btn primary submit ripplelink', 'onclick' => 'setEnableSave()')); ?>
            <div class="clearfix"></div>
		<?php $this->endWidget(); ?>
    </div>
</section>