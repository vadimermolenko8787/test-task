<?php

namespace app\controllers;

use app\components\interfaces\EvenSumCalculatorInterface;
use app\dto\NumbersDto;
use app\requests\NumbersRequest;
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

    public function actionSumEven(): Response
    {
        \Yii::$app->response->format = Response::FORMAT_JSON;

        $request = new NumbersRequest();
        $request->load(\Yii::$app->request->getBodyParams(), '');

        if (!$request->validate()) {
            \Yii::$app->response->statusCode = 400;
            return $this->asJson(['errors' => $request->getErrors()]);
        }

        // В рамках даного завдання DTO є надлишковим — сервіс приймає array.
        // Додано для демонстрації патерну передачі даних через DTO між шарами.
        $dto = new NumbersDto($request->numbers);

        return $this->asJson(['sum' => $this->calculator->calculate($dto->numbers)]);
    }
}
