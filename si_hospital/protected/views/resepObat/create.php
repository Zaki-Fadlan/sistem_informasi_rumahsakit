<?php
/* @var $this ResepObatController */
/* @var $model ResepObat */

$this->breadcrumbs=array(
	'Resep Obats'=>array('index'),
	'Create',
);

$this->menu=array(
	// array('label'=>'List ResepObat', 'url'=>array('index')),
	array('label'=>'Riwayat Resep Obat Pasien', 'url'=>array('admin')),
);
?>

<h1>Resepkan Obat Untuk Pasien</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>