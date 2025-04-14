<?php

/**
 * This is the model class for table "tbl_users".
 *
 * The followings are the available columns in table 'tbl_users':
 * @property integer $id_users
 * @property integer $id_karyawan
 * @property string $username
 * @property string $password
 * @property boolean $status
 * @property string $created_at
 *
 * The followings are the available model relations:
 * @property TblKaryawan $idKaryawan
 * @property AuthItem[] $authItems
 * @property TblKunjungan[] $tblKunjungans
 * @property TblResepObat[] $tblResepObats
 * @property TblPembayaran[] $tblPembayarans
 * @property TblKunjunganTindakan[] $tblKunjunganTindakans
 */
class Users extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_users';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_karyawan, username, password, created_at', 'required'),
			array('id_karyawan', 'numerical', 'integerOnly'=>true),
			array('username', 'length', 'max'=>50),
			array('password', 'length', 'max'=>255),
			array('status', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_users, id_karyawan, username, password, status, created_at', 'safe', 'on'=>'search'),
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
			'Karyawan' => array(self::BELONGS_TO, 'Karyawan', 'id_karyawan'),
			'authItems' => array(self::MANY_MANY, 'AuthItem', 'AuthAssignment(userid, itemname)'),
			'Kunjungan' => array(self::HAS_MANY, 'Kunjungan', 'id_petugas'),
			'ResepObat' => array(self::HAS_MANY, 'ResepObat', 'id_dokter'),
			'Pembayaran' => array(self::HAS_MANY, 'Pembayaran', 'id_kasir'),
			'KunjunganTindakan' => array(self::HAS_MANY, 'KunjunganTindakan', 'id_dokter'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_users' => 'Id Users',
			'id_karyawan' => 'Id Karyawan',
			'username' => 'Username',
			'password' => 'Password',
			'status' => 'Status',
			'created_at' => 'Created At',
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

		$criteria->compare('id_users',$this->id_users);
		$criteria->compare('id_karyawan',$this->id_karyawan);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('created_at',$this->created_at,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Users the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
