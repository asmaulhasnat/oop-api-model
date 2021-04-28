<?php


namespace App\validation;


class OrderValidation extends \App\core\Validator
{

    public string $phone = '';
    public string $address = '';

    public static function tableName(): string
    {
        return 'orders';
    }

    public function labels(): array
    {
        return [
            'phone' => 'phone',
            'address' => 'address',
        ];
    }

    public function rules()
    {

        return [
            //'user_id' => [self::RULE_REQUIRED],
            //'items' => [self::RULE_REQUIRED],
            'phone' => [self::RULE_REQUIRED],
            'address' => [self::RULE_REQUIRED],

        ];
    }

}