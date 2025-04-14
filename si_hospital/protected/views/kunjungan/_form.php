<?php
/* @var $this KunjunganController */
/* @var $model Kunjungan */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'kunjungan-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->hiddenField($model,'id_pasien'); ?>


	<div class="row">
        <?php echo $form->labelEx($model,'id_jenis_kunjungan'); ?>
        <?php echo $form->dropDownList(
            $model,
            'id_jenis_kunjungan',
            CHtml::listData(JenisKunjungan::model()->findAll(array('order'=>'nama_jenis ASC')), 'id_jenis_kunjungan', 'nama_jenis'),
            array('prompt'=>'Pilih Jenis Kunjungan')
        ); ?>
        <?php echo $form->error($model,'id_jenis_kunjungan'); ?>
    </div>
	<div class="row">
		<?php echo $form->labelEx($model,'keluhan'); ?>
		<?php echo $form->textArea($model,'keluhan',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'keluhan'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->