<?php

class SiteController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		if (Yii::app()->user->isGuest) {
			$this->redirect(array('site/login'));
		}
	
		// Kunjungan per hari
		$kunjunganData = Yii::app()->db->createCommand("
		SELECT DATE(tanggal_kunjungan) as tanggal, COUNT(*) as jumlah
		FROM tbl_kunjungan
		WHERE EXTRACT(MONTH FROM tanggal_kunjungan) = EXTRACT(MONTH FROM CURRENT_DATE)
		AND EXTRACT(YEAR FROM tanggal_kunjungan) = EXTRACT(YEAR FROM CURRENT_DATE)
		GROUP BY DATE(tanggal_kunjungan)
		ORDER BY tanggal ASC
		")->queryAll();
	
	

		// Tindakan terbanyak
		$tindakanData = Yii::app()->db->createCommand("
		SELECT t2.nama_tindakan, COUNT(*) as jumlah
		FROM tbl_kunjungan_tindakan t1
		JOIN tbl_tindakan t2 ON t1.id_tindakan = t2.id_tindakan
		GROUP BY t2.nama_tindakan
		ORDER BY jumlah DESC
		LIMIT 5
		")->queryAll();
	

		// Obat yang paling sering diresepkan
		$obatData = Yii::app()->db->createCommand("
		SELECT o.nama_obat, COUNT(*) as jumlah
		FROM tbl_resep_obat r
		JOIN tbl_obat o ON r.id_obat = o.id_obat
		GROUP BY o.nama_obat
		ORDER BY jumlah DESC
		LIMIT 5
		")->queryAll();
	

		$this->render('index', array(
		'kunjunganData' => $kunjunganData,
		'tindakanData' => $tindakanData,
		'obatData' => $obatData,
		));
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$name='=?UTF-8?B?'.base64_encode($model->name).'?=';
				$subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
				$headers="From: $name <{$model->email}>\r\n".
					"Reply-To: {$model->email}\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-Type: text/plain; charset=UTF-8";

				mail(Yii::app()->params['adminEmail'],$subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		if (!Yii::app()->user->isGuest) {
			$this->redirect(Yii::app()->homeUrl); // Atau ke halaman lain seperti dashboard
		}
		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				$this->redirect(Yii::app()->user->returnUrl);
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
	public function actionUnauthorized()
	{
		$this->render('unauthorized');
	}

	public function actionLaporanRs()
	{
		require_once(Yii::getPathOfAlias('application.extensions.tcpdf') . '/tcpdf.php');

		$pdf = new TCPDF();
		$pdf->AddPage();

		// Data 1: Jumlah Total Kunjungan
		$totalKunjungan = Yii::app()->db->createCommand("SELECT COUNT(*) FROM tbl_kunjungan")->queryScalar();

		// Data 2: Jumlah Kunjungan Bulan Ini
		$kunjunganBulanIni = Yii::app()->db->createCommand("
			SELECT COUNT(*) FROM tbl_kunjungan 
			WHERE EXTRACT(MONTH FROM tanggal_kunjungan) = EXTRACT(MONTH FROM CURRENT_DATE)
			AND EXTRACT(YEAR FROM tanggal_kunjungan) = EXTRACT(YEAR FROM CURRENT_DATE)
		")->queryScalar();

		// Data 3: Tabel Kunjungan per Bulan
		$kunjunganPerBulan = Yii::app()->db->createCommand("
			SELECT TO_CHAR(tanggal_kunjungan, 'YYYY-MM') AS bulan, COUNT(*) AS jumlah 
			FROM tbl_kunjungan 
			GROUP BY TO_CHAR(tanggal_kunjungan, 'YYYY-MM') 
			ORDER BY bulan
		")->queryAll();

		// Data 4: Jumlah Pasien Total
		$totalPasien = Yii::app()->db->createCommand("SELECT COUNT(*) FROM tbl_pasien")->queryScalar();

		// Data 5: Pasien Bulan Ini
		$pasienBulanIni = Yii::app()->db->createCommand("
			SELECT COUNT(*) FROM tbl_pasien 
			WHERE EXTRACT(MONTH FROM tanggal_daftar) = EXTRACT(MONTH FROM CURRENT_DATE)
			AND EXTRACT(YEAR FROM tanggal_daftar) = EXTRACT(YEAR FROM CURRENT_DATE)
		")->queryScalar();

		// Data 6: Total Tagihan
		$totalTagihan = Yii::app()->db->createCommand("SELECT COALESCE(SUM(total_bayar),0) FROM tbl_tagihan")->queryScalar();

		// Data 7: Tagihan Lunas
		$tagihanLunas = Yii::app()->db->createCommand("
		SELECT COALESCE(SUM(total_bayar),0) FROM tbl_tagihan WHERE status_bayar = TRUE
		")->queryScalar();
	

		// Isi PDF
		$html = "
		<h1>Laporan Rumah Sakit</h1>
		<p><strong>Total Kunjungan:</strong> $totalKunjungan</p>
		<p><strong>Kunjungan Bulan Ini:</strong> $kunjunganBulanIni</p>
		<p><strong>Total Pasien:</strong> $totalPasien</p>
		<p><strong>Pasien Bulan Ini:</strong> $pasienBulanIni</p>
		<p><strong>Total Tagihan:</strong> Rp ".number_format($totalTagihan, 0, ',', '.')."</p>
		<p><strong>Total Tagihan Lunas:</strong> Rp ".number_format($tagihanLunas, 0, ',', '.')."</p>

		<h3>Kunjungan per Bulan:</h3>
		<table border=\"1\" cellpadding=\"5\">
			<tr>
				<th>Bulan</th>
				<th>Jumlah Kunjungan</th>
			</tr>";

		foreach ($kunjunganPerBulan as $row) {
			$html .= "<tr><td>{$row['bulan']}</td><td>{$row['jumlah']}</td></tr>";
		}

		$html .= "</table>";

		$pdf->writeHTML($html, true, false, true, false, '');

		// Output PDF
		$pdf->Output('laporan_rumah_sakit.pdf', 'D'); // 'D' untuk langsung download
	}


}