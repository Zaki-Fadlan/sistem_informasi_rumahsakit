<?php
/* @var $this TagihanController */
/* @var $model Tagihan */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id_tagihan'); ?>
		<?php echo $form->textField($model,'id_tagihan'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_kunjungan'); ?>
		<?php echo $form->textField($model,'id_kunjungan'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'total_tindakan'); ?>
		<?php echo $form->textField($model,'total_tindakan',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'total_obat'); ?>
		<?php echo $form->textField($model,'total_obat',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'total_bayar'); ?>
		<?php echo $form->textField($model,'total_bayar',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'status_bayar'); ?>
		<?php echo $form->checkBox($model,'status_bayar'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->