<?php
/* @var $this TindakanController */
/* @var $model Tindakan */

$this->breadcrumbs=array(
	'Tindakans'=>array('index'),
	$model->id_tindakan=>array('view','id'=>$model->id_tindakan),
	'Update',
);

$this->menu=array(
	array('label'=>'List Tindakan', 'url'=>array('index')),
	array('label'=>'Create Tindakan', 'url'=>array('create')),
	array('label'=>'View Tindakan', 'url'=>array('view', 'id'=>$model->id_tindakan)),
	array('label'=>'Manage Tindakan', 'url'=>array('admin')),
);
?>

<h1>Update Tindakan <?php echo $model->id_tindakan; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>