<?php


namespace App\validation;


use App\core\Validator;

class UserValidation extends Validator
{
    public string $name = '';
    public string $email = '';
    public string $password = '';
    public string $password_confirmation = '';

    public static function tableName(): string
    {
        return 'users';
    }

    public function labels(): array
    {
        return [
            'name' => 'name',
            'email' => 'Email',
            'password' => 'Password',
            'password_confirmation' => 'Password Confirm'
        ];
    }

    public function rules()
    {

        return [
            'name' => [self::RULE_REQUIRED],
           'email' => [self::RULE_REQUIRED, self::RULE_EMAIL, [
                self::RULE_UNIQUE, 'class' => self::class
            ]],
            'password' => [self::RULE_REQUIRED, [self::RULE_MIN, 'min' => 8]],
            'password_confirmation' => [[self::RULE_MATCH, 'match' => 'password']],
        ];
    }
}