<?php
/* @var $this TagihanController */
/* @var $data Tagihan */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_tagihan')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_tagihan), array('view', 'id'=>$data->id_tagihan)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_kunjungan')); ?>:</b>
	<?php echo CHtml::encode($data->id_kunjungan); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('total_tindakan')); ?>:</b>
	<?php echo CHtml::encode($data->total_tindakan); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('total_obat')); ?>:</b>
	<?php echo CHtml::encode($data->total_obat); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('total_bayar')); ?>:</b>
	<?php echo CHtml::encode($data->total_bayar); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status_bayar')); ?>:</b>
	<?php echo CHtml::encode($data->status_bayar); ?>
	<br />


</div>