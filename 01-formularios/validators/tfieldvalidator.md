# TFieldValidator — Validador base

Descrição

`TFieldValidator` é a classe base para todos os validadores de campo no Adianti. Ela define a interface e o contrato que validadores concretos devem seguir (mensagem de erro, execução de validação, condições opcionais).

Métodos principais

- `__construct(string $message = '')` — cria o validador com mensagem padrão
- `validate($value)` — executa validação sobre o valor e retorna boolean
- `getMessage()` — retorna a mensagem de erro
- `setMessage(string $message)` — define uma mensagem personalizada

Exemplo de implementação customizada

```php
class MyValidator extends TFieldValidator {
    public function validate($value) {
        if (/* condição */) return true;
        $this->setMessage('Inválido');
        return false;
    }
}
```

Boas práticas

- Reutilize `TFieldValidator` para encapsular regras reutilizáveis.
- Retorne mensagens claras e localizáveis.
