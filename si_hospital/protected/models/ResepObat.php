<?php

/**
 * This is the model class for table "tbl_resep_obat".
 *
 * The followings are the available columns in table 'tbl_resep_obat':
 * @property integer $id_resep_obat
 * @property integer $id_dokter
 * @property integer $id_kunjungan
 * @property integer $id_obat
 * @property integer $jumlah
 * @property string $dosis
 *
 * The followings are the available model relations:
 * @property TblKunjungan $idKunjungan
 * @property TblObat $idObat
 * @property TblUsers $idDokter
 */
class ResepObat extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_resep_obat';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_dokter, id_kunjungan, id_obat', 'required'),
			array('id_dokter, id_kunjungan, id_obat, jumlah', 'numerical', 'integerOnly'=>true),
			array('dosis', 'length', 'max'=>100),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_resep_obat, id_dokter, id_kunjungan, id_obat, jumlah, dosis', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'Kunjungan' => array(self::BELONGS_TO, 'Kunjungan', 'id_kunjungan'),
			'Obat' => array(self::BELONGS_TO, 'Obat', 'id_obat'),
			'Dokter' => array(self::BELONGS_TO, 'Users', 'id_dokter'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_resep_obat' => 'Id Resep Obat',
			'id_dokter' => 'Id Dokter',
			'id_kunjungan' => 'Id Kunjungan',
			'id_obat' => 'Id Obat',
			'jumlah' => 'Jumlah',
			'dosis' => 'Dosis',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id_resep_obat',$this->id_resep_obat);
		$criteria->compare('id_dokter',$this->id_dokter);
		$criteria->compare('id_kunjungan',$this->id_kunjungan);
		$criteria->compare('id_obat',$this->id_obat);
		$criteria->compare('jumlah',$this->jumlah);
		$criteria->compare('dosis',$this->dosis,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ResepObat the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
