<?php

class WebUser extends CWebUser
{
    public function accessDenied($message = null)
    {
        if ($message === null) {
            $message = 'Maaf, Anda tidak memiliki izin untuk mengakses halaman ini.';
        }

        if ($this->isGuest) {
            $this->loginRequired(); // Redirect ke login
        } else {
            // Redirect ke halaman unauthorized
            Yii::app()->controller->redirect(array('/site/unauthorized'));
        }
    }
}

