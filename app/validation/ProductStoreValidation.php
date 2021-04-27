<?php


namespace App\validation;


class ProductStoreValidation extends \App\core\Validator
{
    public string $name = '';
    public  $sku = '';
    public  $description = '';
    public  $category_id = '';
    public  $price = '';
    public  $image = '';

    public static function tableName(): string
    {
        return 'products';
    }

    public function labels(): array
    {
        return [
            'name' => 'First name',
        ];
    }

    public function rules()
    {

        return [
            'sku' => [self::RULE_REQUIRED, [
                self::RULE_UNIQUE, 'class' => self::class
            ]],
            'name' => [self::RULE_REQUIRED],
            'description' => [self::RULE_REQUIRED],
            'category_id' => [self::RULE_REQUIRED],
            'price' => [self::RULE_REQUIRED],
            'image' => [self::RULE_REQUIRED],
        ];
    }
}