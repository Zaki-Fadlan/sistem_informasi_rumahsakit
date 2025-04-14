<?php
/* @var $this KabupatenController */
/* @var $model Kabupaten */

$this->breadcrumbs=array(
	'Kabupatens'=>array('index'),
	$model->id_kabupaten=>array('view','id'=>$model->id_kabupaten),
	'Update',
);

$this->menu=array(
	// array('label'=>'List Kabupaten', 'url'=>array('index')),
	array('label'=>'Create Kabupaten', 'url'=>array('create')),
	array('label'=>'View Kabupaten', 'url'=>array('view', 'id'=>$model->id_kabupaten)),
	array('label'=>'Manage Kabupaten', 'url'=>array('admin')),
);
?>

<h1>Update Kabupaten <?php echo $model->id_kabupaten; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>