<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name . ' - Wilayah';
// $this->breadcrumbs=array(
// 	'Datamaster'=>array('/site/page', 'view'=>'tindakobat'),
// 	'Wilayah',
// );
?>
<h1>Tindak & Obati Pasien</h1>

<?php $this->widget('zii.widgets.CMenu',array(
	'items'=>array(
		array('label'=>'Kunjungan Tindakan', 'url'=>array('/kunjunganTindakan/admin'), 'visible'=>!Yii::app()->user->isGuest),
		array('label'=>'Resep Obat', 'url'=>array('/resepObat/admin'), 'visible'=>!Yii::app()->user->isGuest),
	),
)); ?>