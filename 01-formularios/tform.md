# TForm — Formulário básico

Descrição rápida

TForm é a classe base para formulários no Adianti Framework. Ela provê a estrutura para criar formulários HTML, setar dados e ações, validar campos e recuperar valores em objetos PHP.

Contrato mínimo

- Entrada: campos registrados via `addField()`
- Saída: objeto com dados via `getData()` ou `getData('Array')`
- Erros: validação falha deve lançar ou retornar mensagens via `setError()`/mensagens de formulário

Exemplo mínimo

```php
// arquivo: docs/01-formularios/examples/tform_example.php
require_once 'init.php';

$form = new TForm('my_form');
$form->setName('user_form');

// criação de campos
$name = new TEntry('name');
$email = new TEntry('email');

$form->addField($name);
$form->addField($email);

// ações
$saveAction = new TAction(['UserForm', 'onSave']);
$form->addAction('Salvar', $saveAction, 'fa:save');

// validação básica (exemplo simples)
if ($_SERVER['REQUEST_METHOD'] === 'POST')
{
    $data = $form->getData('StdClass');
    if (empty($data->name))
    {
        TTransaction::open('database');
        new TMessage('error', 'Nome é obrigatório');
        TTransaction::close();
    }
    else
    {
        // processar dados
    }
}

// renderizar
$form->show();
```

Boas práticas e casos de borda

- Sempre chame `addField()` para cada widget que guarda dados.
- Use `getData()` com o tipo desejado para compatibilidade.
- Ao persistir, trate SQL exceptions com `TTransaction`.

Ver também

- `BootstrapFormBuilder` para formulários com layout Bootstrap
- `TModalForm` para formulários em modal

## Métodos principais

- __Construtor__
    - ____new TForm(string $name)____: cria um formulário com nome.
- __Gestão de campos__
    - `addField(AdiantiWidgetInterface $field)`
    - `delField(AdiantiWidgetInterface $field)`
    - `setFields(array $fields)`
    - `getField(string $name)`
    - `getFields()`
- __Dados e submissão__
    - `setData($object)` — popula o formulário com um objeto/array
    - `getData(string $class = 'StdClass')` — recupera os valores
    - `clear(bool $keepDefaults = FALSE)` — limpa valores
- __Ações e validação__
    - `addAction(string $label, TAction $action, string $icon = null)`
    - `getActions()`
    - `validate()` — valida campos registrados
    - `show()` — renderiza o formulário

Observação: os métodos listados são os mais comuns no Adianti; assumi a presença de métodos de manipulação de campos e dados segundo as convenções do framework.
