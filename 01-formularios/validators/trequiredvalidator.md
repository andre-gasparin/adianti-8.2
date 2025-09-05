# TRequiredValidator — Campo obrigatório

Descrição

`TRequiredValidator` valida se o campo possui valor não vazio. É o validador mais usado para garantir presença de dados.

Métodos principais

- `__construct(string $message = 'Campo obrigatório')`
- `validate($value)` — retorna true se `$value` não for nulo/empty

Exemplo de uso

```php
$validator = new TRequiredValidator('Nome é obrigatório');
if (!$validator->validate($data->name)) {
    new TMessage('error', $validator->getMessage());
}
```

Observações

- Para campos numéricos, verifique se o zero é aceito conforme a regra de negócio.
- Combine com outros validadores para regras compostas.
