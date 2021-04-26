<?php


namespace App\validation;


class loginValidation extends \App\core\Validator
{

    public string $email = '';
    public string $password = '';

    public static function tableName(): string
    {
        return 'users';
    }

    public function labels(): array
    {
        return [
            'email' => 'Email',
            'password' => 'Password',
        ];
    }

    public function rules()
    {

        return [
            'email' => [self::RULE_REQUIRED],
            'password' => [self::RULE_REQUIRED],
        ];
    }
}