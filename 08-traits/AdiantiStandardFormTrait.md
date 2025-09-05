## AdiantiStandardFormTrait

Resumo dos métodos e comportamento encontrado em `lib/adianti/base/AdiantiStandardFormTrait.php`.

Principais métodos e propriedades:
- `onSave()` — coleta dados do formulário, valida, abre `TTransaction`, persiste (`store()`), executa callbacks `afterSaveCallback` e mostra mensagens.
- `setAfterSaveAction($action)` / `setAfterSaveCallback($callback)` — definem comportamento após salvar.
- `setUseMessages($bool)` — controla exibição de mensagens ou redirecionamento.
- `onClear($param)` — limpa o formulário.
- `onEdit($param)` — carrega um registro por `key` e preenche o formulário.

Boas práticas:
- Sempre defina `database` e `activeRecord` no construtor da classe que usa a trait.
- Use `afterSaveCallback` para operações pós-store (ex.: salvar arquivos relacionados).

Exemplo (em controller):

```php
class MyForm extends TStandardForm
{
  public function __construct()
  {
    $this->setDatabase('my_db');
    $this->setActiveRecord('MyModel');
  }
}
```

Referência: `lib/adianti/base/AdiantiStandardFormTrait.php`.
