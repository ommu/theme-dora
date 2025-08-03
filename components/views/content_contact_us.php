<?php
/**
 * @var $this ContentContactUs
 *
 * @author Putra Sudaryanto <putra@ommu.id>
 * @contact (+62)811-2540-432
 * @copyright Copyright (c) 2018 OMMU (www.ommu.id)
 * @link https://github.com/ommu/theme-dora
 *
 */
?>

<!-- Contact -->
<section class="contact section">
    <div class="container">
        <h1><?php echo $this->title;?></h1>
        <p class="description"><?php echo $this->desc;?></p>
		<?php $form=$this->beginWidget('application.libraries.yii-traits.system.OActiveForm', array(
			'id'=>'contact-form',
			'action' => Yii::app()->createUrl('dorasite/feedback'),
			'enableAjaxValidation'=>true,
			'htmlOptions' => array(
				'class' => 'contact-form',
			),
		)); ?>
            <div id="success"></div>
            <div class="name field">
				<?php echo $form->labelEx($model,'displayname'); ?>
				<?php echo $form->textField($model,'displayname', array('maxlength'=>32)); ?>
				<?php echo $form->error($model,'displayname'); ?>
            </div>
            <div class="email field">
				<?php echo $form->labelEx($model,'email'); ?>
				<?php echo $form->textField($model,'email', array('maxlength'=>32)); ?>
				<?php echo $form->error($model,'email'); ?>
            </div>
            <div class="clearfix"></div>
            <div class="message field">
				<?php echo $form->labelEx($model,'subject_i'); ?>
				<?php echo $form->textField($model,'subject_i', array('maxlength'=>64)); ?>
				<?php echo $form->error($model,'subject_i'); ?>
            </div>
            <div class="message field">
				<?php echo $form->labelEx($model,'message'); ?>
				<?php echo $form->textArea($model,'message', array('rows'=>10, 'cols'=>25)); ?>
				<?php echo $form->error($model,'message'); ?>
            </div>
			<?php echo CHtml::submitButton(Yii::t('phrase', 'Send'), array('id'=>'contact-button', 'class'=>'btn primary submit ripplelink', 'onclick' => 'setEnableSave()')); ?>
            <div class="clearfix"></div>
		<?php $this->endWidget(); ?>
    </div>
</section>