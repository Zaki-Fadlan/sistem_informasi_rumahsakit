<?php
/* @var $this ResepObatController */
/* @var $model ResepObat */

$this->breadcrumbs=array(
	'Resep Obats'=>array('index'),
	$model->id_resep_obat,
);

$this->menu=array(
	array('label'=>'List ResepObat', 'url'=>array('index')),
	array('label'=>'Create ResepObat', 'url'=>array('create')),
	array('label'=>'Update ResepObat', 'url'=>array('update', 'id'=>$model->id_resep_obat)),
	array('label'=>'Delete ResepObat', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_resep_obat),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ResepObat', 'url'=>array('admin')),
);
?>

<h1>View ResepObat #<?php echo $model->id_resep_obat; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_resep_obat',
		'id_dokter',
		'id_kunjungan',
		'id_obat',
		'jumlah',
		'dosis',
	),
)); ?>
