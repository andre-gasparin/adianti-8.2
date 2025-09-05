# TCheckGroup — Grupo de checkboxes

Descrição

`TCheckGroup` é usado quando múltiplas opções independentes podem ser selecionadas. Permite validação de mínimo/máximo.

Exemplo

```php
// docs/01-formularios/examples/tcheckgroup_example.php
require_once 'init.php';

$form = new TForm('form_checkgroup');

$hobbies = new TCheckGroup('hobbies');
$hobbies->addItems([ 'sports' => 'Esportes', 'music' => 'Música', 'reading' => 'Leitura' ]);

$form->addField($hobbies);
$form->addAction('Salvar', new TAction(['CheckController', 'onSave']));

$form->show();
```

Validação

- No servidor, verifique `count($data->hobbies)` para limites.
- Para grandes conjuntos, prefira componentes com busca.

## Métodos principais

- `__construct(string $name)`
- `addItems(array $items)`
- `setValue(array $values)`
- `getValue()`
- `setProperty(string $name, $value)`
