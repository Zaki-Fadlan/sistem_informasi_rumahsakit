<?php
/* @var $this KaryawanController */
/* @var $data Karyawan */

?>


<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_karyawan')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_karyawan), array('view', 'id'=>$data->id_karyawan)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nama')); ?>:</b>
	<?php echo CHtml::encode($data->nama); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nip')); ?>:</b>
	<?php echo CHtml::encode($data->nip); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('jenis_kelamin')); ?>:</b>
	<?php echo CHtml::encode($data->jenis_kelamin); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('dob')); ?>:</b>
	<?php echo CHtml::encode($data->dob); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('kontak')); ?>:</b>
	<?php echo CHtml::encode($data->kontak); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('alamat')); ?>:</b>
	<?php echo CHtml::encode($data->alamat); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('id_kabupaten')); ?>:</b>
	<?php echo CHtml::encode($data->id_kabupaten); ?>
	<br />

	*/ ?>

</div>