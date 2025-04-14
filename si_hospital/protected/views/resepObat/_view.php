<?php
/* @var $this ResepObatController */
/* @var $data ResepObat */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_resep_obat')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_resep_obat), array('view', 'id'=>$data->id_resep_obat)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_dokter')); ?>:</b>
	<?php echo CHtml::encode($data->id_dokter); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_kunjungan')); ?>:</b>
	<?php echo CHtml::encode($data->id_kunjungan); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_obat')); ?>:</b>
	<?php echo CHtml::encode($data->id_obat); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('jumlah')); ?>:</b>
	<?php echo CHtml::encode($data->jumlah); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('dosis')); ?>:</b>
	<?php echo CHtml::encode($data->dosis); ?>
	<br />


</div>