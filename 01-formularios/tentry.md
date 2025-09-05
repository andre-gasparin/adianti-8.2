## TEntry — Campo de entrada básico

Descrição

`TEntry` é o campo de texto usado para capturar strings curtas (nomes, e-mails, códigos). Suporta máscara, tipos de input, autocomplete e funções de controle (tamanho, edição, validação client/server).

Exemplo mínimo

```php
require_once 'init.php';

$form = new TForm('form_entry');

$name = new TEntry('name');
$name->setSize('100%');
$name->setProperty('placeholder', 'Digite seu nome');
$name->setMaxLength(60);

$cpf = new TEntry('cpf');
$cpf->setMask('999.999.999-99');

$form->addField($name);
$form->addField($cpf);
$form->addAction('Enviar', new TAction(['EntryController', 'onSubmit']));
$form->show();
```

APIs / Métodos (lista completa)

- __construct(string $name)
- enableToggleVisibility(bool $toggleVisibility = TRUE)
- setInputType(string $type)
- setInnerIcon(TImage $image, string $side = 'right')
- exitOnEnter()
- setMask(string $mask, bool $replaceOnPost = FALSE)
- setNumericMask(int $decimals, string $decimalsSeparator, string $thousandSeparator, bool $replaceOnPost = FALSE, bool $reverse = FALSE, bool $allowNegative = TRUE)
- setValue($value)
- getPostData()
- setMaxLength(int $length)
- setCompletion(array $options)
- setExitAction(TAction $action)
- setExitFunction(string $function)
- disableAutoComplete()
- forceLowerCase()
- forceUpperCase()
- setDelimiter(string $delimiter)
- setMinLength(int $length)
- reloadCompletion(string $field, array $list, $options = null)
- changeMask(string $formName, string $name, string $mask)
- show()

Dicas rápidas

- Para autocompletion use `setCompletion()` com as opções apropriadas ou um serviço AJAX. Há também `TEntry::reloadCompletion()` para atualizar dinamicamente.
- Para valores numéricos, prefira `setNumericMask()` para formatação e processamento correto no post.
- Quando usar máscara (CPF, CNPJ, datas), normalize (remover máscara) antes de persistir.

Exemplo avançado — máscara dinâmica e ação de saída

```php
$entry = new TEntry('phone');
$entry->setMask('(99) 99999-9999');
$entry->setExitAction(new TAction(['PhoneController', 'onBlur']));
$entry->setExitFunction('onPhoneBlur'); // função JS
$entry->setMinLength(10);
$entry->show();
```

Referências

- `docs/01-formularios/tform.md` para integração com formulários e envio

