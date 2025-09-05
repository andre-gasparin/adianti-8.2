## TNotebook — Abas / Tabs

Resumo
`TNotebook` é um container que organiza conteúdo em abas (tabs). Cada aba recebe um título e um objeto (container, formulário, tabela). Permite controlar visibilidade/ sensibilidade das abas, tamanho e ações de clique.

Principais métodos
- __Construtor__: `new TNotebook($width = null, $height = null)`
- `setTabsVisibility(bool $visible)` — mostra/oculta títulos das abas
- `setTabsSensibility(bool $sensibility)` — habilita/desabilita clique nas abas
- `getId()` — retorna ID do bloco
- `setSize($width, $height)` / `getSize()`
- `setCurrentPage(int $i)` / `getCurrentPage()` — controla aba ativa
- `appendPage(string $title, $object)` — adiciona uma aba com conteúdo
- `getPageCount()` — conta abas
- `setTabAction(TAction $action)` — define ação de clique que será chamada (servidor)
- `render()` / `show()` — renderiza as tabs e painéis; `render()` retorna o elemento gerado

Exemplo básico

```php
$notebook = new TNotebook(800, 400);
$panel1 = new TTable();
$panel1->addRowSet('Conteúdo 1');
$notebook->appendPage('Geral', $panel1);

$panel2 = new TTable();
$notebook->appendPage('Config', $panel2);

$notebook->setCurrentPage(0);
$notebook->show();
```

Exemplo com ação em clique

```php
$action = new TAction(['MyPage', 'onTabClick']);
$notebook->setTabAction($action);
```

Observações
- O `appendPage()` aceita qualquer objeto que implemente `show()` (por exemplo `TTable`, `TForm`, etc.).
- `setTabAction()` define um `TAction` que recebe `current_page` como parâmetro quando o usuário clica na aba.

Fim
# TNotebook — Notebooks / Abas

Descrição

`TNotebook` permite organizar campos em abas (notebook). Útil para formulários longos que precisam ser segmentados.

Exemplo

```php
// docs/01-formularios/examples/tnotebook_example.php
require_once 'init.php';

$form = new BootstrapFormBuilder('multi_tab_form');
$form->setFormTitle('Formulário com abas');

$form->appendPage('Dados pessoais');
$form->addFields([new TLabel('Nome'), new TEntry('name')]);

$form->appendPage('Endereço');
$form->addFields([new TLabel('CEP'), new TEntry('cep')]);

$form->show();
```

Métodos principais

- `appendPage(string $title)` — adiciona uma aba
- `setCurrentPage(int $i)` — define a aba ativa
- `setTabFunction(callable $function)` — função JS ao trocar aba
- `setTabAction(TAction $action)` — ação ao clicar na aba
- `validate()` — validação por abas (deve ser orchestrada pelo form)

Boas práticas

- Valide cada aba ao submeter; destaque abas com erros.
- Evite muitas abas (usabilidade) e mantenha navegação clara.
