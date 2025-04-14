<?php
/* @var $this PembayaranController */
/* @var $model Pembayaran */

$this->breadcrumbs=array(
	'Pembayarans'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Pembayaran', 'url'=>array('index')),
	array('label'=>'Create Pembayaran', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#pembayaran-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>
<?php $this->widget('zii.widgets.CMenu',array(
	'items'=>array(
		array('label'=>'Bayar Tagihan', 'url'=>array('/tagihan/admin')),
	),
)); ?>

<h1>Riwayat Pembayaran</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'pembayaran-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id_pembayaran',
		'id_kasir',
		'id_tagihan',
		'tanggal_bayar',
		'jumlah_dibayar',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
