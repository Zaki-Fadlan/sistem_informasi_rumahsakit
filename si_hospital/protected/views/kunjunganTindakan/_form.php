<?php
/* @var $this KunjunganTindakanController */
/* @var $model KunjunganTindakan */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'kunjungan-tindakan-form',
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
        <?php echo $form->labelEx($model,'id_tindakan'); ?>
        <?php echo $form->dropDownList(
            $model,
            'id_tindakan',
            CHtml::listData(Tindakan::model()->findAll(array('order'=>'nama_tindakan ASC')), 'id_tindakan', 'nama_tindakan'),
            array('prompt'=>'Pilih Jenis Tindakan')
        ); ?>
        <?php echo $form->error($model,'id_tindakan'); ?>
    </div>
	<div class="row">
		<?php echo $form->labelEx($model,'catatan'); ?>
		<?php echo $form->textArea($model,'catatan',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'catatan'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'biaya'); ?>
		<?php echo $form->textField($model,'biaya',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'biaya'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->