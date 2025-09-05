# TCNPJValidator — Validador de CNPJ (Brasil)

Descrição

`TCNPJValidator` valida números de CNPJ usando os dígitos verificadores específicos para empresas brasileiras.

Métodos principais

- `__construct(string $message = 'CNPJ inválido')`
- `validate($value)` — remove formatação e calcula os dígitos verificadores

Exemplo

```php
$validator = new TCNPJValidator('CNPJ inválido');
if (!$validator->validate($data->cnpj)) {
    new TMessage('error', $validator->getMessage());
}
```

Observações

- Normalize removendo máscara antes de salvar.
- Combine com validações de formato e registros no cadastro nacional conforme necessário.
