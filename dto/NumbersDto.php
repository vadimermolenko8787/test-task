<?php

namespace app\dto;

use yii\base\Model;

class NumbersDto extends Model
{
    public $numbers;

    public function rules(): array
    {
        return [
            [['numbers'], 'required'],
            [['numbers'], 'each', 'rule' => ['integer']],
        ];
    }
}
