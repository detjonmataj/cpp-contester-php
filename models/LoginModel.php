<?php

require_once 'core/BaseModel.php';
require_once 'models/User.php';

class LoginModel extends BaseModel
{
    public string $email = '';
    public string $password = '';

    public function createRules(): array
    {
        return [
            'email' => [self::RULE_REQUIRED, self::RULE_EMAIL],
            'password' => [self::RULE_REQUIRED]
        ];
    }

    public function updateRules(): array
    {
        return [];
    }

    public function login(): bool
    {
        $user = User::findOne(['email'=>$this->email]);
        if(!$user) {
            $this->addError('email','User does not exist');
            return false;
        }
        if(!password_verify($this->password, $user->password)) {
            $this->addError('password', 'Password is incorrect');
            return false;
        }
        Application::$APP->setUserData($user);
        return true;
    }

    public function labels(): array
    {
        return [
            'email' => 'Your email',
            'password' => 'Password'
        ];
    }
}