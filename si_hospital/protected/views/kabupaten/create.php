<?php
/* @var $this KabupatenController */
/* @var $model Kabupaten */

$this->breadcrumbs=array(
	'Kabupatens'=>array('index'),
	'Create',
);

$this->menu=array(
	// array('label'=>'List Kabupaten', 'url'=>array('index')),
	array('label'=>'Manage Kabupaten', 'url'=>array('admin')),
);
?>

<h1>Create Kabupaten</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>