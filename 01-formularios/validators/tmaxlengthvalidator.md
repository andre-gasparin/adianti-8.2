# TMaxLengthValidator — Tamanho máximo

Descrição

`TMaxLengthValidator` garante que o valor não exceda um comprimento máximo.

Métodos principais

- `__construct(int $max, string $message = null)`
- `validate($value)` — retorna true se `strlen($value) <= $max`
- `getMax()` — retorna o valor máximo

Exemplo

```php
$validator = new TMaxLengthValidator(50, 'Máximo de 50 caracteres');
if (!$validator->validate($data->bio)) {
    new TMessage('error', $validator->getMessage());
}
```

Observações

- Para strings utf-8 use `mb_strlen()` quando apropriado.
