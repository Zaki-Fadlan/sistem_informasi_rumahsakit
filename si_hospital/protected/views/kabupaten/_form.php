<?php
/* @var $this KabupatenController */
/* @var $model Kabupaten */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'kabupaten-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'nama_kabupaten'); ?>
		<?php echo $form->textField($model,'nama_kabupaten',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'nama_kabupaten'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_provinsi'); ?>
		<?php echo $form->dropDownList(
			$model,
			'id_provinsi',
			CHtml::listData(Provinsi::model()->findAll(array('order'=>'nama_provinsi')), 'id_provinsi', 'nama_provinsi'),
			array('prompt'=>'-- Pilih Provinsi --')
		); ?>
		<?php echo $form->error($model,'id_provinsi'); ?>
	</div>


	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->