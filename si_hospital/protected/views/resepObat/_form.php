<?php
/* @var $this ResepObatController */
/* @var $model ResepObat */
/* @var $form CActiveForm */
Yii::app()->clientScript->registerCssFile("https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css");
Yii::app()->clientScript->registerScriptFile("https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js", CClientScript::POS_END);

?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'resep-obat-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->hiddenField($model,'id_kunjungan'); ?>

	<div class="row">
    <?php echo $form->labelEx($model,'Nama Obat'); ?>
		<?php echo $form->dropDownList(
			$model,
			'id_obat',
			CHtml::listData(Obat::model()->findAll(array('order'=>'nama_obat ASC')), 'id_obat', 'nama_obat'),
			array(
				'prompt'=>'Pilih Obat',
				'class'=>'select2-obat',
			)
		); ?>
		<?php echo $form->error($model,'id_obat'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'jumlah'); ?>
		<?php echo $form->textField($model,'jumlah'); ?>
		<?php echo $form->error($model,'jumlah'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'dosis'); ?>
		<?php echo $form->textField($model,'dosis',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'dosis'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

<?php
Yii::app()->clientScript->registerScript('init-select2', "
    $('.select2-obat').select2({
        placeholder: 'Cari nama obat...',
        allowClear: true,
        width: '100%'
    });
");
?>
</div><!-- form -->
