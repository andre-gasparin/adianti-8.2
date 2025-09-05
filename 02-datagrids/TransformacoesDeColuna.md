Transformações de Coluna
========================

Visão geral
-----------
Transformadores permitem alterar o valor exibido em uma coluna sem modificar o dado original. São funções PHP (callables) registradas em `TDataGridColumn::setTransformer()`.

Como funciona
- O transformer recebe: `($value, $object, $row, $cell, $last_row, $forPrinting)`
- Pode retornar HTML seguro ou texto; `TDataGrid` aplica `htmlspecialchars` dependendo das flags.

Exemplos
- Formatar data
```php
$col->setTransformer(function($value){ return date('d/m/Y', strtotime($value)); });
```
- Exibir link
```php
$col->setTransformer(function($value, $object){ return "<a href='view.php?id={$object->id}'>" . htmlspecialchars($value) . "</a>"; });
```
- Somar valores (aplicado também em totais se `totalTransformed` estiver ativado)
```php
$col->setTransformer(function($value){ return number_format($value,2,',','.'); });
$col->setTotalFunction(function($values){ return array_sum($values); });
```

Boas práticas
- Preferir transformar apenas a renderização, não o dado original.
- Use `getDataProperty`/`setDataProperty` para meta-dados de célula.
- Evite lógica pesada no transformer (pode impactar performance em grandes grids).

Onde olhar no código
- `lib/adianti/widget/datagrid/TDataGridColumn.php`
