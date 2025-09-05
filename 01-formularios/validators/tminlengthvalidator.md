# TMinLengthValidator — Tamanho mínimo

Descrição

`TMinLengthValidator` garante que o valor do campo possua um comprimento mínimo.

Métodos principais

- `__construct(int $min, string $message = null)`
- `validate($value)` — retorna true se `strlen($value) >= $min`
- `getMin()` — retorna o valor mínimo

Exemplo

```php
$validator = new TMinLengthValidator(3, 'Mínimo de 3 caracteres');
if (!$validator->validate($data->username)) {
    new TMessage('error', $validator->getMessage());
}
```

Observações

- Para strings utf-8 use `mb_strlen()` quando apropriado.
