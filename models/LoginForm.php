<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * LoginForm is the model behind the login form.
 *
 * @property-read Usuarios|null $user
 *
 */
class LoginForm extends Model
{
    public $nick;
    public $password;
    public $rememberMe = true;

    private $_user = false;


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['nick', 'password'], 'required'],
            // rememberMe must be a boolean value
            ['rememberMe', 'boolean'],
            // password is validated by validatePassword()
            ['password', 'validatePassword'],
        ];
    }

    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */
    public function validatePassword($attribute, $params)
    {
        // if (!$this->hasErrors()) {
        //     $user = $this->getUser();
        //     if (!$user || !$user->validatePassword($this->password)) {
        //         $this->addError($attribute, 'Usuario o password incorrecto');
        //     } else
        // if ($user->tipo != "A")
        //         $this->addError($attribute, 'Usuario inactivo o no confirmado');
        // }
    }

    /**
     * Logs in a user using the provided username and password.
     * @return bool whether the user is logged in successfully
     */
    public function login()
    {
        if ($this->getUser()) {
            return Yii::$app->user->login($this->getUser(), $this->rememberMe ? 3600 * 24 * 30 : 0);
        } else {
            $this->addError("password", 'Usuario o password incorrecto');
        }

        return false;
    }

    /**
     * Finds user by [[username]]
     *
     * @return User|null
     */
    public function getUser()
    {
        if ($this->_user === false) {
            $this->_user = Usuarios::findByUsername($this->nick);
        }

        return $this->_user;
    }
}
