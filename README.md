# Yii2 Even Sum API

API на Yii2 Basic, возвращающее сумму чётных чисел из переданного массива.

## Стек

- PHP 8.3
- Yii2 Basic Template
- Docker (Nginx + PHP-FPM Alpine)

## Запуск

```bash
# Собрать и запустить контейнеры
make up

# Установить зависимости
make install

# Остановить контейнеры
make down
```

## Тесты

```bash
make test
```

## API

### POST /api/sum

Принимает массив целых чисел, возвращает сумму чётных.

**Запрос:**

```bash
curl -X POST http://localhost:8000/api/sum \
  -H "Content-Type: application/json" \
  -d '{"numbers": [1, 2, 3, 4, 5, 6]}'
```

**Ответ (200):**

```json
{"sum": 12}
```

**Ответ при ошибке валидации (400):**

```json
{"errors": {"numbers": ["Numbers must be an array."]}}
```
