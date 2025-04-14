<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	const ERROR_DISABLED_ACCOUNT = 3;
	private $_id;
	public function authenticate()
	{
		$user = Users::model()->findByAttributes(array('username'=>$this->username));

		if($user === null)
			$this->errorCode = self::ERROR_USERNAME_INVALID;
		else if(!CPasswordHelper::verifyPassword($this->password, $user->password))
			$this->errorCode = self::ERROR_PASSWORD_INVALID;
		else if (!$user->status)
			$this->errorCode = self::ERROR_DISABLED_ACCOUNT;
		else {
			$this->_id = $user->id_users;
			$this->setState('username', $user->username);
			$this->errorCode = self::ERROR_NONE;
		}

		return !$this->errorCode;
	}


	public function getId()
	{
		return $this->_id;
	}

}