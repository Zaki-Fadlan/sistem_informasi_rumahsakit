<?php
/* @var $this ResepObatController */
/* @var $model ResepObat */

$this->breadcrumbs=array(
	'Resep Obats'=>array('index'),
	$model->id_resep_obat=>array('view','id'=>$model->id_resep_obat),
	'Update',
);

$this->menu=array(
	array('label'=>'List ResepObat', 'url'=>array('index')),
	array('label'=>'Create ResepObat', 'url'=>array('create')),
	array('label'=>'View ResepObat', 'url'=>array('view', 'id'=>$model->id_resep_obat)),
	array('label'=>'Manage ResepObat', 'url'=>array('admin')),
);
?>

<h1>Update ResepObat <?php echo $model->id_resep_obat; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>