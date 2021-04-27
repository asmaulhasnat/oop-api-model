<?php


namespace App\validation;


class CategoryUpdateValidation extends \App\core\Validator
{
    public string $name = '';
    public int  $id;

    public static function tableName(): string
    {
        return 'categories';
    }

    public function labels(): array
    {
        return [
            'name' => ' name',
        ];
    }

    public function rules()
    {

        return [
            'name' => [self::RULE_REQUIRED, [
                self::RULE_UNIQUE, 'class' => self::class,'not_in'=>self::RULE_NOT_THIS
            ]],
        ];
    }

}