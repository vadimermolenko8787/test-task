<?php

namespace app\controllers;

use app\components\interfaces\EvenSumCalculatorInterface;
use app\dto\NumbersDto;
use yii\web\Controller;
use yii\web\Response;

class ApiController extends Controller
{
    public $enableCsrfValidation = false;

    private EvenSumCalculatorInterface $calculator;

    public function __construct(
        string $id,
        $module,
        EvenSumCalculatorInterface $calculator,
        array $config = []
    ) {
        $this->calculator = $calculator;
        parent::__construct($id, $module, $config);
    }

    public function actionSum(): Response
    {
        \Yii::$app->response->format = Response::FORMAT_JSON;

        $dto = new NumbersDto();
        $dto->load(\Yii::$app->request->getBodyParams(), '');

        if (!$dto->validate()) {
            \Yii::$app->response->statusCode = 400;
            return $this->asJson(['errors' => $dto->getErrors()]);
        }

        return $this->asJson(['sum' => $this->calculator->calculate($dto->numbers)]);
    }
}
