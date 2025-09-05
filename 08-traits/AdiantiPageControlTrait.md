## AdiantiPageControlTrait

Trait para controle de páginas e dispatch de ações via parâmetros `class` e `method`.

Principais métodos:
- `run()` — interpreta `$_GET['class']` e `$_GET['method']` e invoca o método correspondente.
- `setPageName($name)` / `getClassName()` — utilitários para identificar a página.
- `callIfExists($method, $param)` — chama método condicionalmente quando implementado.

Uso típico: controllers que querem permitir chamadas por URL (ex.: `index.php?class=MyPage&method=onReload`).

Referência: `lib/adianti/control/AdiantiPageControlTrait.php`.
