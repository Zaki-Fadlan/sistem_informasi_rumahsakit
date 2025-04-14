<?php

/**
 * This is the model class for table "tbl_pembayaran".
 *
 * The followings are the available columns in table 'tbl_pembayaran':
 * @property integer $id_pembayaran
 * @property integer $id_kasir
 * @property integer $id_tagihan
 * @property string $tanggal_bayar
 * @property string $jumlah_dibayar
 *
 * The followings are the available model relations:
 * @property TblUsers $idKasir
 * @property TblTagihan $idTagihan
 */
class Pembayaran extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_pembayaran';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_kasir, id_tagihan, tanggal_bayar', 'required'),
			array('id_kasir, id_tagihan', 'numerical', 'integerOnly'=>true),
			array('jumlah_dibayar', 'length', 'max'=>10),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_pembayaran, id_kasir, id_tagihan, tanggal_bayar, jumlah_dibayar', 'safe', 'on'=>'search'),
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
			'Kasir' => array(self::BELONGS_TO, 'Users', 'id_kasir'),
			'Tagihan' => array(self::BELONGS_TO, 'Tagihan', 'id_tagihan'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_pembayaran' => 'Id Pembayaran',
			'id_kasir' => 'Id Kasir',
			'id_tagihan' => 'Id Tagihan',
			'tanggal_bayar' => 'Tanggal Bayar',
			'jumlah_dibayar' => 'Jumlah Dibayar',
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

		$criteria->compare('id_pembayaran',$this->id_pembayaran);
		$criteria->compare('id_kasir',$this->id_kasir);
		$criteria->compare('id_tagihan',$this->id_tagihan);
		$criteria->compare('tanggal_bayar',$this->tanggal_bayar,true);
		$criteria->compare('jumlah_dibayar',$this->jumlah_dibayar,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Pembayaran the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
