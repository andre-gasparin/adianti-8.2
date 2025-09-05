# TEmailValidator — Validação de email

Descrição

`TEmailValidator` valida se o texto tem formato de e-mail válido. Deve ser combinado com `TRequiredValidator` quando o campo for obrigatório.

Métodos principais

- `__construct(string $message = 'Email inválido')`
- `validate($value)` — retorna true se o formato for válido (filtro ou regex)

Exemplo

```php
$validator = new TEmailValidator('Informe um e-mail válido');
if (!$validator->validate($data->email)) {
    new TMessage('error', $validator->getMessage());
}
```

Notas

- Para validação estrita, use envio de confirmação por e-mail. A validação de formato não garante existência do endereço.
