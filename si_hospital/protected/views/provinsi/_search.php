<?php
/* @var $this ProvinsiController */
/* @var $model Provinsi */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id_provinsi'); ?>
		<?php echo $form->textField($model,'id_provinsi'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'nama_provinsi'); ?>
		<?php echo $form->textField($model,'nama_provinsi',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->