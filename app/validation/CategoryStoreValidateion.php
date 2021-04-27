<?php


namespace App\validation;


class CategoryStoreValidateion extends \App\core\Validator
{
    public string $name = '';
    public static function tableName(): string
    {
        return 'categories';
    }

    public function labels(): array
    {
        return [
            'name' => 'name',
        ];
    }

    public function rules()
    {

        return [
            'name' => [self::RULE_REQUIRED, [
                self::RULE_UNIQUE, 'class' => self::class
            ]],
        ];
    }
}