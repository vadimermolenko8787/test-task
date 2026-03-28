<?php

namespace app\requests;

use yii\base\Model;

class NumbersRequest extends Model
{
    public mixed $numbers = null;

    public function rules(): array
    {
        return [
            [['numbers'], 'required'],
            [['numbers'], function ($attribute) {
                if (!is_array($this->$attribute)) {
                    $this->addError($attribute, 'Numbers must be an array.');
                }
            }],
            [['numbers'], 'each', 'rule' => ['integer'], 'when' => fn() => is_array($this->numbers)],
        ];
    }
}
