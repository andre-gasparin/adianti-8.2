## BootstrapNotebookWrapper — Wrapper Bootstrap para Notebook

Resumo
`BootstrapNotebookWrapper` adapta um `TNotebook` ao layout Bootstrap, permitindo alterar direção das abas (left/right), divisões (colunas) e classes externas. Oferece renderização que separa guias e painéis e suporta `tabs-left`/`tabs-right` para layouts com colunas.

Principais métodos
- __Construtor__: `new BootstrapNotebookWrapper(TNotebook $notebook, string $wrapper_class = '')`
- `setTabsDirection(string $direction, array $divisions = null)` — direção: `left` ou `right`; `$divisions` define colunas (ex.: [2,10])
- Delegação via `__call()` para métodos do `TNotebook` (`appendPage`, `setCurrentPage`, `setTabAction`, etc.)
- `show()` — renderiza o notebook com classes personalizadas e rearranja dom quando `tabs-left` ou `tabs-right`.

Exemplo

```php
$notebook = new TNotebook();
$notebook->appendPage('Geral', $panel1);
$notebook->appendPage('Avançado', $panel2);

$wrapper = new BootstrapNotebookWrapper($notebook, 'my-notebook-class');
$wrapper->setTabsDirection('left', [3,9]);
$wrapper->show();
```

Observações
- `setTabsDirection('left')` move as abas para a esquerda e cria duas colunas com as divisões informadas.
- Propriedades adicionais podem ser atribuídas ao wrapper e serão aplicadas ao elemento final.

Fim
