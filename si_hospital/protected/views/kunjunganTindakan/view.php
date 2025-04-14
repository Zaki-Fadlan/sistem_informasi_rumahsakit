<?php
/* @var $this KunjunganTindakanController */
/* @var $model KunjunganTindakan */

$this->breadcrumbs=array(
	'Kunjungan Tindakans'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List KunjunganTindakan', 'url'=>array('index')),
	array('label'=>'Create KunjunganTindakan', 'url'=>array('create')),
	array('label'=>'Update KunjunganTindakan', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete KunjunganTindakan', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage KunjunganTindakan', 'url'=>array('admin')),
);
?>

<h1>View KunjunganTindakan #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'id_dokter',
		'id_tindakan',
		'id_kunjungan',
		'catatan',
		'biaya',
	),
)); ?>
