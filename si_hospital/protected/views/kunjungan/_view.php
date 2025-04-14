<?php
/* @var $this KunjunganController */
/* @var $data Kunjungan */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_kunjungan')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_kunjungan), array('view', 'id'=>$data->id_kunjungan)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_petugas')); ?>:</b>
	<?php echo CHtml::encode($data->id_petugas); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_pasien')); ?>:</b>
	<?php echo CHtml::encode($data->id_pasien); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tanggal_kunjungan')); ?>:</b>
	<?php echo CHtml::encode($data->tanggal_kunjungan); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_jenis_kunjungan')); ?>:</b>
	<?php echo CHtml::encode($data->id_jenis_kunjungan); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('keluhan')); ?>:</b>
	<?php echo CHtml::encode($data->keluhan); ?>
	<br />


</div>