<?php
/* @var $this PasienController */
/* @var $model Pasien */
/* @var $form CActiveForm */
?>

<div class="form">
<?php if(Yii::app()->user->hasFlash('success')): ?>
    <div class="alert alert-success">
        <?php echo Yii::app()->user->getFlash('success'); ?>
    </div>
<?php endif; ?>

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'pasien-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'nama_lengkap'); ?>
		<?php echo $form->textField($model,'nama_lengkap',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'nama_lengkap'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nik'); ?>
		<?php echo $form->textField($model,'nik',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'nik'); ?>
	</div>

    <div class="row">
        <?php echo $form->labelEx($model,'dob'); ?>
        <?php echo $form->dateField($model,'dob'); ?>
        <?php echo $form->error($model,'dob'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'jenis_kelamin'); ?>
        <?php echo $form->dropDownList($model,'jenis_kelamin',array('L'=>'Laki-laki','P'=>'Perempuan'), array('prompt'=>'Pilih Jenis Kelamin')); ?>
        <?php echo $form->error($model,'jenis_kelamin'); ?>
    </div>

	<div class="row">
        <?php echo $form->labelEx($model,'nama_provinsi'); ?>
        <?php echo $form->dropDownList(
            $model,
            'id_provinsi',
            CHtml::listData(Provinsi::model()->findAll(array('order'=>'nama_provinsi ASC')), 'id_provinsi', 'nama_provinsi'),
            array(
                'prompt'=>'Pilih Provinsi',
                'ajax' => array(
                    'type'=>'POST',
                    'url'=>CController::createUrl('pasien/dynamicKabupaten'),
                    'update'=>'#'.CHtml::activeId($model,'id_kabupaten'),
                )
            )
        ); ?>
        <?php echo $form->error($model,'id_provinsi'); ?>
    </div>
    <div class="row">
        <?php echo $form->labelEx($model,'nama_kabupaten'); ?>
        <?php echo $form->dropDownList(
            $model,
            'id_kabupaten',
            array(), // awalnya kosong
            array('prompt'=>'Pilih Kabupaten')
        ); ?>
        <?php echo $form->error($model,'id_kabupaten'); ?>
    </div>
	<div class="row">
		<?php echo $form->labelEx($model,'alamat'); ?>
		<?php echo $form->textArea($model,'alamat',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'alamat'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'no_hp'); ?>
		<?php echo $form->textField($model,'no_hp',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'no_hp'); ?>
	</div>
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


	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Tambah Pasien' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->