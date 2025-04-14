<?php

class KunjunganTindakanController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',
			'actions'=>array('index', 'view','admin','tabel_kunjungan'),
			'users'=>array('@'),
			),
			array('allow',
			'actions'=>array('admin','delete','create','update'),
			'expression'=>'Yii::app()->user->checkAccess("kelolaKunjungan")',
			),
			array('deny',
				'users'=>array('*'), // * berarti semua user (termasuk guest)
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate($id_kunjungan = null)
	{
		$model=new KunjunganTindakan;
		if ($id_kunjungan !== null) {
			$model->id_kunjungan = $id_kunjungan;
		}

		if(isset($_POST['KunjunganTindakan']))
		{
			$model->attributes=$_POST['KunjunganTindakan'];
			$model->id_dokter = Yii::app()->user->id;
			$model->id_kunjungan = $id_kunjungan;
			if($model->save()){
            // Cek apakah sudah ada Tagihan untuk id_kunjungan ini
	            $tagihan = Tagihan::model()->findByAttributes(['id_kunjungan' => $id_kunjungan]);

				if ($tagihan === null) {
					// Belum ada tagihan, buat baru
					$tagihan = new Tagihan;
					$tagihan->id_kunjungan = $id_kunjungan;
					$tagihan->total_tindakan = $model->biaya; // ambil biaya dari KunjunganTindakan
					$tagihan->total_obat = 0;
					$tagihan->total_bayar = $tagihan->total_tindakan + $tagihan->total_obat;
					$tagihan->status_bayar = false;
					$tagihan->save();
				} else {
					// Sudah ada tagihan, update total_tindakan dan total_bayar
					$tagihan->total_tindakan += $model->biaya;
					$tagihan->total_bayar = $tagihan->total_tindakan + $tagihan->total_obat;
					$tagihan->save();
				}
	
				$this->redirect(['view', 'id' => $model->id]);
			}
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['KunjunganTindakan']))
		{
			$model->attributes=$_POST['KunjunganTindakan'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('KunjunganTindakan');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new KunjunganTindakan('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['KunjunganTindakan']))
			$model->attributes=$_GET['KunjunganTindakan'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return KunjunganTindakan the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=KunjunganTindakan::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param KunjunganTindakan $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='kunjungan-tindakan-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	public function actionTabel_kunjungan()
	{
		$dataProvider = new CActiveDataProvider(Kunjungan::model(), array(
			'criteria'=>array(
				'order'=>'tanggal_kunjungan DESC',
			),
			'pagination'=>array(
				'pageSize'=>10,
			),
		));
		$this->render('tabel_kunjungan', array(
			'dataProvider' => $dataProvider,
		));
		
		
	}
}
