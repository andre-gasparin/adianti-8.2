# Criando validadores customizados

Descrição

Explanação sobre como implementar validadores que estendem `TFieldValidator` para regras específicas da aplicação.

Exemplo rápido

```php
class EvenNumberValidator extends TFieldValidator {
    public function __construct($message = 'Deve ser número par') { parent::__construct($message); }
    public function validate($value) {
        if (!is_numeric($value)) { $this->setMessage('Não é número'); return false; }
        return ($value % 2) === 0;
    }
}
```

Boas práticas

- Reutilize `setMessage()` para mensagens claras.
- Teste unidades para cada validador; crie suite de testes quando a regra for crítica.
- Documente o comportamento esperado (empty allowed?, trim?, case sensitivity?).
