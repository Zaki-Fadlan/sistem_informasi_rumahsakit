<?php
/* @var $this TagihanController */
/* @var $model Tagihan */

$this->breadcrumbs=array(
	'Tagihans'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Tagihan', 'url'=>array('index')),
	array('label'=>'Create Tagihan', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#tagihan-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Daftar Tagihan</h1>
<p>Pilih Pengunjung untuk membayar tagihan</p>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'tagihan-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		array(
			'name' => 'id_tagihan',
			'header' => 'ID Kunjungan',
			'type' => 'raw',
			// 'value' => 'CHtml::link($data->id_tagihan, array("pembayaran/create", "id_tagihan"=>$data->id_tagihan))',
			'value' => 'CHtml::link("Bayar Tagihan ID ".$data->id_tagihan, array("pembayaran/create", "id_tagihan"=>$data->id_tagihan))',
		),
		array(
			'name' => 'total_tindakan',
			'header' => 'Biaya Tindakan',
		),
		array(
			'name' => 'total_obat',
			'header' => 'Biaya Obat',
		),
		array(
			'name' => 'total_bayar',
			'header' => 'Total',
		),

		array(
			'name' => 'status_bayar',
			'header' => 'Status Pembayaran',
			'value' => '$data->status_bayar ? "Lunas" : "Belum Lunas"',
			'filter' => array(1 => 'Lunas', 0 => 'Belum Lunas'), 
		),	
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>

