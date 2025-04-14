<?php
/* @var $this TagihanController */
/* @var $model Tagihan */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'tagihan-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'id_kunjungan'); ?>
		<?php echo $form->textField($model,'id_kunjungan'); ?>
		<?php echo $form->error($model,'id_kunjungan'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'total_tindakan'); ?>
		<?php echo $form->textField($model,'total_tindakan',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'total_tindakan'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'total_obat'); ?>
		<?php echo $form->textField($model,'total_obat',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'total_obat'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'total_bayar'); ?>
		<?php echo $form->textField($model,'total_bayar',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'total_bayar'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'status_bayar'); ?>
		<?php echo $form->checkBox($model,'status_bayar'); ?>
		<?php echo $form->error($model,'status_bayar'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->