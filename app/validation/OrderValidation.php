<?php


namespace App\validation;


class OrderValidation extends \App\core\Validator
{

    //public string $user_id = '';
    //public string $items = '';

    public static function tableName(): string
    {
        return 'orders';
    }

    public function labels(): array
    {
        return [
            //'user_id' => 'user_id',
            //'items' => 'items',
        ];
    }

    public function rules()
    {

        return [
            //'user_id' => [self::RULE_REQUIRED],
            //'items' => [self::RULE_REQUIRED],
        ];
    }

}