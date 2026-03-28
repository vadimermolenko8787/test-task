# Yii2 Even Sum API

API на Yii2 Basic, що повертає суму парних чисел із переданого масиву.

## Стек

- PHP 8.3
- Yii2 Basic Template
- Docker (Nginx + PHP-FPM Alpine)
- PHPUnit 10

---

## Встановлення та запуск

### Вимоги

- Docker
- Docker Compose
- Make

### Кроки

```bash
# 1. Клонувати репозиторій
git clone https://github.com/vadimermolenko8787/test-task.git
cd test-task

# 2. Зібрати образ та запустити контейнери
make up
```

API буде доступне за адресою: http://localhost:8000

### Зупинити контейнери

```bash
make down
```

### Запустити тести

```bash
make test
```

---

## Приклади використання

### Успішний запит

```bash
curl -X POST http://localhost:8000/api/sum-even \
  -H "Content-Type: application/json" \
  -d '{"numbers": [1, 2, 3, 4, 5, 6]}'
```

```json
{"sum": 12}
```

### Масив без парних чисел

```bash
curl -X POST http://localhost:8000/api/sum-even \
  -H "Content-Type: application/json" \
  -d '{"numbers": [1, 3, 5]}'
```

```json
{"sum": 0}
```

### Помилка валідації (400)

```bash
curl -X POST http://localhost:8000/api/sum-even \
  -H "Content-Type: application/json" \
  -d '{"numbers": "not-an-array"}'
```

```json
{"errors": {"numbers": ["Numbers must be an array."]}}
```

---

## Структура проекту

```
├── components/
│   ├── interfaces/
│   │   └── EvenSumCalculatorInterface.php  # інтерфейс сервісу
│   └── services/
│       └── EvenSumCalculator.php           # бізнес-логіка: сума парних чисел
├── config/
│   └── web.php                             # конфігурація: роутинг, DI, JSON-парсер
├── controllers/
│   └── ApiController.php                   # обробка POST /api/sum-even
├── dto/
│   └── NumbersDto.php                      # валідація вхідних даних
├── nginx/
│   └── default.conf                        # конфігурація Nginx
├── tests/
│   └── unit/
│       └── EvenSumCalculatorTest.php       # unit-тести (6 кейсів)
├── Dockerfile                              # multistage build (composer + php-fpm)
├── docker-compose.yml                      # сервіси: php, nginx
├── Makefile                                # команди: up, down, test
└── phpunit.xml                             # конфігурація PHPUnit
```
