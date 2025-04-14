<?php
/* @var $this TagihanController */
/* @var $model Tagihan */

$this->breadcrumbs=array(
	'Tagihans'=>array('index'),
	$model->id_tagihan,
);

$this->menu=array(
	array('label'=>'List Tagihan', 'url'=>array('index')),
	array('label'=>'Create Tagihan', 'url'=>array('create')),
	array('label'=>'Update Tagihan', 'url'=>array('update', 'id'=>$model->id_tagihan)),
	array('label'=>'Delete Tagihan', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_tagihan),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Tagihan', 'url'=>array('admin')),
);
?>

<h1>View Tagihan #<?php echo $model->id_tagihan; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_tagihan',
		'id_kunjungan',
		'total_tindakan',
		'total_obat',
		'total_bayar',
		'status_bayar',
	),
)); ?>
