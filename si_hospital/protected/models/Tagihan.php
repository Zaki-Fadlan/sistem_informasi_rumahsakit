<?php

/**
 * This is the model class for table "tbl_tagihan".
 *
 * The followings are the available columns in table 'tbl_tagihan':
 * @property integer $id_tagihan
 * @property integer $id_kunjungan
 * @property string $total_tindakan
 * @property string $total_obat
 * @property string $total_bayar
 * @property boolean $status_bayar
 *
 * The followings are the available model relations:
 * @property TblKunjungan $idKunjungan
 * @property TblPembayaran[] $tblPembayarans
 */
class Tagihan extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_tagihan';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_kunjungan', 'required'),
			array('id_kunjungan', 'numerical', 'integerOnly'=>true),
			array('total_tindakan, total_obat, total_bayar', 'length', 'max'=>10),
			array('status_bayar', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_tagihan, id_kunjungan, total_tindakan, total_obat, total_bayar, status_bayar', 'safe', 'on'=>'search'),
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
			'Pembayaran' => array(self::HAS_MANY, 'Pembayaran', 'id_tagihan'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_tagihan' => 'Id Tagihan',
			'id_kunjungan' => 'Id Kunjungan',
			'total_tindakan' => 'Total Tindakan',
			'total_obat' => 'Total Obat',
			'total_bayar' => 'Total Bayar',
			'status_bayar' => 'Status Bayar',
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

		$criteria->compare('id_tagihan',$this->id_tagihan);
		$criteria->compare('id_kunjungan',$this->id_kunjungan);
		$criteria->compare('total_tindakan',$this->total_tindakan,true);
		$criteria->compare('total_obat',$this->total_obat,true);
		$criteria->compare('total_bayar',$this->total_bayar,true);
		$criteria->compare('status_bayar',$this->status_bayar);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Tagihan the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
