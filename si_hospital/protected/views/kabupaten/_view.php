<?php
/* @var $this KabupatenController */
/* @var $data Kabupaten */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('nama_kabupaten')); ?>:</b>
	<?php echo CHtml::encode($data->nama_kabupaten); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nama_provinsi')); ?>:</b>
	<?php echo CHtml::encode($data->provinsi ? $data->provinsi->nama_provinsi : '-'); ?>

	<br />


</div>