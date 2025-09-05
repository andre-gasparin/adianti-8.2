# TNumericValidator — Validação numérica

Descrição

`TNumericValidator` verifica se um valor é numérico e pode validar intervalos (min/max).

Métodos principais

- `__construct(string $message = 'Valor numérico inválido', float $min = null, float $max = null)`
- `validate($value)` — verifica `is_numeric()` e limites
- `setMin(float $min)`, `setMax(float $max)`

Exemplo

```php
$validator = new TNumericValidator('Informe um número', 0, 100);
if (!$validator->validate($data->price)) {
    new TMessage('error', $validator->getMessage());
}
```

Observações

- Converta casas decimais conforme a localidade antes de validar (ex: 1.234,56 vs 1,234.56).
