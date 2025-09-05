## appendPage (Tabs / Notebook)

Resumo
- `appendPage` adiciona uma aba (página) a componentes tipo Notebook/Forms com abas. Está disponível em: `BootstrapFormBuilder`, `TNotebook`, `BootstrapNotebookWrapper`, `TQuickNotebookForm` e widgets similares (ex: `TAccordion`).

Assinaturas principais
- `BootstrapFormBuilder::appendPage(string $title)` — adiciona uma aba ao formulário com layout bootstrap.
- `TNotebook::appendPage(string $title, $object)` — adiciona uma aba ao notebook, associando um conteúdo (painel, tabela, formulário).
- `BootstrapNotebookWrapper::appendPage(string $title, $object)` — wrapper bootstrap para notebook.
- `TQuickNotebookForm::appendPage(string $title, $container = NULL)` — helper que cria uma aba e associa a estrutura de `TQuickForm`.

Exemplo simples (BootstrapFormBuilder)

```php
$form = new BootstrapFormBuilder('my_form');
$form->setFormTitle('Usuário');

// adiciona primeira aba
$form->appendPage('Dados pessoais');
$form->addField(new TEntry('name'));

// adiciona segunda aba
$form->appendPage('Endereço');
$form->addField(new TEntry('address'));

$form->setCurrentPage(0); // mostra a primeira aba ao renderizar
$form->show();
```

Exemplo com `TNotebook` (uso de painel como conteúdo)

```php
$notebook = new TNotebook();
$panel1 = new TTable(); // qualquer container que implemente show()
$panel1->addRowSet(...);
$notebook->appendPage('Detalhes', $panel1);

$panel2 = new TTable();
$notebook->appendPage('Configurações', $panel2);

$notebook->setCurrentPage(1); // abre a aba 2
$notebook->show();
```

Métodos relacionados úteis (lista completa por componente)
- setCurrentPage(int $i) — define a aba ativa (index inicia em 0).
- getCurrentPage() — retorna o índice da aba atual.
- setTabAction(TAction $action) / setTabFunction(string $function) — define ação ao clicar na aba (usar `TAction` ou JS callback dependendo do wrapper).
- setTabsDirection($direction, $divisions = null) — altera direção das abas (wrapper bootstrap).
- setTabsVisibility(bool $visible) — mostra/oculta os títulos das abas (ex.: quando usar somente navegação programática).
- getPageCount() — retorna número de abas.

Boas práticas e observações
- Conteúdos passados em `$object` devem implementar `show()` (por exemplo `TTable`, `TForm`, `TPanel`).
- Use `setCurrentPage()` para controlar qual aba abrir por padrão.
- Para ações customizadas ao clicar na aba, prefira `setTabAction()` com `TAction` quando precisar de callbacks no servidor; use `setTabFunction()` quando for apenas JS local.
- Em formulários grandes, dividir em abas melhora usabilidade e permite validações por página.

Referências no código-fonte
- `lib/adianti/wrapper/BootstrapFormBuilder.php` — `appendPage($title)`
- `lib/adianti/widget/container/TNotebook.php` — `appendPage($title, $object)`
- `lib/adianti/wrapper/BootstrapNotebookWrapper.php` — `appendPage($title, $object)`
- `lib/adianti/widget/wrapper/TQuickNotebookForm.php` — `appendPage($title, $container = NULL)`

Fim
