## TText — Área de texto (Memo)

Descrição

`TText` é a área de texto usada para textos longos (descrições, observações). Suporta altura/largura, maxlength, transformações e ações de saída; pode ser usada com editores ricos.

Exemplo mínimo

```php
require_once 'init.php';

$form = new TForm('form_text');
$description = new TText('description');
$description->setSize('100%', 120); // largura e altura
$description->setMaxLength(2000);
$form->addField($description);
$form->addAction('Salvar', new TAction(['TextController', 'onSave']));
$form->show();
```

APIs / Métodos (lista completa)

- __construct(string $name)
- setSize(string $width, int $height = NULL)
- getSize()
- setMaxLength(int $length)
- setExitAction(TAction $action)
- setExitFunction(string $function)
- forceLowerCase()
- forceUpperCase()
- getPostData()
- show()

Integração com editor rico

- Inclua scripts com `TScript::create()` ou `TPage::include_js()` e inicialize o editor (ex: TinyMCE/Quill) sobre o elemento retornado por `getId()` do campo.

Exemplo: contador de caracteres (JS inline)

```php
$text = new TText('notes');
$text->setMaxLength(500);
$text_id = $text->getId();
TScript::create("(function(){var el=document.getElementById('".$text_id."');if(el){el.addEventListener('input',function(){var remain=500-this.value.length;document.getElementById('count_".$text_id."').innerText=remain;}})})();");
echo "<div id='count_".$text_id."'>500</div>";
```

Boas práticas

- Normalize/escape conteúdo antes de persistir. Se aceitar HTML, sanitize no servidor.
- Use maxlength para evitar erros de banco. Para textos muito longos, prefira campos TEXT/CLOB.

Referências

- `docs/01-formularios/thtmleditor.md` (exemplo de integração com editor rico)
