<?php
/* @var $this PembayaranController */
/* @var $data Pembayaran */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_pembayaran')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_pembayaran), array('view', 'id'=>$data->id_pembayaran)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_kasir')); ?>:</b>
	<?php echo CHtml::encode($data->id_kasir); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_tagihan')); ?>:</b>
	<?php echo CHtml::encode($data->id_tagihan); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tanggal_bayar')); ?>:</b>
	<?php echo CHtml::encode($data->tanggal_bayar); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('jumlah_dibayar')); ?>:</b>
	<?php echo CHtml::encode($data->jumlah_dibayar); ?>
	<br />


</div>