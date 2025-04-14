<?php
/* @var $this PembayaranController */
/* @var $model Pembayaran */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id_pembayaran'); ?>
		<?php echo $form->textField($model,'id_pembayaran'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_kasir'); ?>
		<?php echo $form->textField($model,'id_kasir'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_tagihan'); ?>
		<?php echo $form->textField($model,'id_tagihan'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tanggal_bayar'); ?>
		<?php echo $form->textField($model,'tanggal_bayar'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'jumlah_dibayar'); ?>
		<?php echo $form->textField($model,'jumlah_dibayar',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->