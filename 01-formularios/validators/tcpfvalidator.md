# TCPFValidator — Validador de CPF (Brasil)

Descrição

`TCPFValidator` valida números de CPF aplicando a regra de dígitos verificadores. Útil em formulários brasileiros.

Métodos principais

- `__construct(string $message = 'CPF inválido')`
- `validate($value)` — limpa o valor e calcula dígitos verificadores

Exemplo

```php
$validator = new TCPFValidator('CPF inválido');
if (!$validator->validate($data->cpf)) {
    new TMessage('error', $validator->getMessage());
}
```

Observações

- Sempre normalize removendo pontos e traços antes de salvar.
- Para uso legal, combine com confirmações via outros meios, se necessário.
