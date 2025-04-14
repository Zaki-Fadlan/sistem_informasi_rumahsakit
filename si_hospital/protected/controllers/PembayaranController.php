<?php

class PembayaranController extends Controller
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
			'actions'=>array('index', 'view','admin'),
			'users'=>array('@'),
			),
			array('allow',
				'actions'=>array('admin','delete','create','update'),
				'expression'=>'Yii::app()->user->checkAccess("kelolaPembayaran")',
			),
			array('deny',  // Semua selain itu ditolak
				'users'=>array('*'),
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
	public function actionCreate($id_tagihan = null)
	{
		$model=new Pembayaran;
		if ($id_tagihan !== null) {
			$model->id_tagihan = $id_tagihan;
		}

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Pembayaran']))
		{
			$model->attributes=$_POST['Pembayaran'];
			$model->id_kasir = Yii::app()->user->id;
			$model->tanggal_bayar = date('Y-m-d');
			$model->id_tagihan = $id_tagihan;
			if($model->save()) {
				// Ambil semua pembayaran untuk tagihan ini
				$allPayments = Pembayaran::model()->findAllByAttributes([
					'id_tagihan' => $model->id_tagihan
				]);
			
				// Hitung total dibayar
				$totalDibayar = 0;
				foreach ($allPayments as $payment) {
					$totalDibayar += $payment->jumlah_dibayar;
				}
			
				// Ambil tagihan
				$tagihan = Tagihan::model()->findByPk($model->id_tagihan);
			
				// Update status_bayar jika lunas
				if ($totalDibayar >= $tagihan->total_bayar) {
					$tagihan->status_bayar = true;
					$tagihan->save(false); // false: skip validation
				}
			
				$this->redirect(array('view','id'=>$model->id_pembayaran));
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

		if(isset($_POST['Pembayaran']))
		{
			$model->attributes=$_POST['Pembayaran'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id_pembayaran));
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
		$dataProvider=new CActiveDataProvider('Pembayaran');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Pembayaran('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Pembayaran']))
			$model->attributes=$_GET['Pembayaran'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Pembayaran the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Pembayaran::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Pembayaran $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='pembayaran-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
