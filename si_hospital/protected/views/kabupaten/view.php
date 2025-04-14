<?php
/* @var $this KabupatenController */
/* @var $model Kabupaten */

$this->breadcrumbs=array(
	'Kabupatens'=>array('index'),
	$model->id_kabupaten,
);

$this->menu=array(
	// array('label'=>'List Kabupaten', 'url'=>array('index')),
	array('label'=>'Create Kabupaten', 'url'=>array('create')),
	array('label'=>'Update Kabupaten', 'url'=>array('update', 'id'=>$model->id_kabupaten)),
	array('label'=>'Delete Kabupaten', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_kabupaten),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Kabupaten', 'url'=>array('admin')),
);
?>

<h1>View Kabupaten #<?php echo $model->id_kabupaten; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'nama_kabupaten',
		array(
            'label' => 'Nama Provinsi',
            'value' => $model->provinsi ? $model->provinsi->nama_provinsi : 'Not set',
        ),
	),
)); ?>
