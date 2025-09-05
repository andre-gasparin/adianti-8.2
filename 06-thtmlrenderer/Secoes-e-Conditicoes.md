## Seções e Condições (THtmlRenderer)

O `THtmlRenderer` usa marcações HTML comentadas para delimitar seções. Sintaxe:

- Início de seção: `<!--[sectionName]-->`
- Fim de seção: `<!--[/sectionName]-->`

Comportamento:
- Habilite uma seção com `enableSection($sectionName, $replacements = NULL, $repeat = FALSE)`.
- `repeat` indica que a seção será processada várias vezes quando `replacements[$sectionName]` for um array de iterações.
- Se uma seção estiver aninhada e for marcada como repeatable, o renderer embebe o resultado no bloco pai (`{{childSection}}`).
- Se uma seção não for habilitada, seu conteúdo não será impresso.

Erros comuns:
- Se uma seção não for fechada corretamente o renderer lança Exception informando o nome da seção não fechada.

Exemplo de template (trecho):

```html
<!--[main]-->
<h1>{{title}}</h1>
<!--[items]-->
  <div class="item">{$name} - {$price}</div>
<!--[/items]-->
<!--[/main]-->
```

Exemplo de habilitação em PHP:

```php
$html = new THtmlRenderer('templates/example.html');
$html->enableSection('main', ['title'=>'Relatório'], false);
$html->enableSection('items', [ ['name'=>'A','price'=>'10'], ['name'=>'B','price'=>'20'] ], true);
echo $html->getContents();
```

Referência: método `show()` em `lib/adianti/widget/template/THtmlRenderer.php` — ele processa linha-a-linha, controla pilha de seções e trata herança de replacements.
