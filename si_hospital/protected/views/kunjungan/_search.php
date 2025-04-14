<?php
/* @var $this KunjunganController */
/* @var $model Kunjungan */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id_kunjungan'); ?>
		<?php echo $form->textField($model,'id_kunjungan'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_petugas'); ?>
		<?php echo $form->textField($model,'id_petugas'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_pasien'); ?>
		<?php echo $form->textField($model,'id_pasien'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tanggal_kunjungan'); ?>
		<?php echo $form->textField($model,'tanggal_kunjungan'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_jenis_kunjungan'); ?>
		<?php echo $form->textField($model,'id_jenis_kunjungan'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'keluhan'); ?>
		<?php echo $form->textArea($model,'keluhan',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->