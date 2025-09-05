# TDateValidator — Validação de data

Descrição

`TDateValidator` valida se o valor corresponde a um formato de data esperado. Normalmente usado junto com `TDate` no frontend.

Métodos principais

- `__construct(string $format = 'd/m/Y', string $message = null)`
- `validate($value)` — usa `DateTime::createFromFormat($format, $value)` para validação

Exemplo

```php
$validator = new TDateValidator('d/m/Y', 'Data inválida');
if (!$validator->validate($data->birthdate)) {
    new TMessage('error', $validator->getMessage());
}
```

Boas práticas

- Normalize datas para o formato do banco (`Y-m-d`) antes de persistir.
- Trate input vazio com `TRequiredValidator` quando necessário.
