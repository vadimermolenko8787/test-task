# Yii2 Even Sum API

API на Yii2 Basic, що повертає суму парних чисел із переданого масиву.

## Стек

- PHP 8.3
- Yii2 Basic Template
- Docker (Nginx + PHP-FPM Alpine)

## Запуск

```bash
# Зібрати образ та запустити контейнери
make up

# Зупинити контейнери
make down
```

## Тести

```bash
make test
```

## API

### POST /api/sum-even

Приймає масив цілих чисел, повертає суму парних.

**Запит:**

```bash
curl -X POST http://localhost:8000/api/sum-even \
  -H "Content-Type: application/json" \
  -d '{"numbers": [1, 2, 3, 4, 5, 6]}'
```

**Відповідь (200):**

```json
{"sum": 12}
```

**Відповідь при помилці валідації (400):**

```json
{"errors": {"numbers": ["Numbers must be an array."]}}
```
