<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name . ' - Datamaster';
$this->breadcrumbs=array(
	'Datamaster',
);
?>
<h1>Datamaster</h1>

<?php $this->widget('zii.widgets.CMenu',array(
	'items'=>array(
		array('label'=>'Pegawai', 'url'=>array('/karyawan/admin')),
		array('label'=>'Obat', 'url'=>array('/obat/admin')),
		array('label'=>'Tindakan', 'url'=>array('/tindakan/admin')),
		array('label'=>'Jenis Kunjungan', 'url'=>array('/jeniskunjungan/admin')),
		array('label'=>'Wilayah', 'url'=>array('/site/page', 'view'=>'wilayah'), 'visible'=>!Yii::app()->user->isGuest),
	),
)); ?>