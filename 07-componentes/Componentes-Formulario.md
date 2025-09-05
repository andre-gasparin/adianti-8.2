## Componentes de Formulário (TField)

Resumo das APIs e métodos úteis da classe base `TField` (classe mãe de todos os widgets de formulário).

Principais métodos/propriedades:
- `__construct($name)` — cria o field; `name` é obrigatório.
- `setName($name)`, `getName()` — nome do campo.
- `setId($id)`, `getId()` — id do elemento.
- `setValue($value)`, `getValue()` — valor do campo; `setValueCallback($callback)` para hook.
- `setLabel($label)`, `getLabel()` — rótulo do campo.
- `setSize($width, $height = NULL)`, `getSize()` — tamanho do campo.
- `setProperty($name, $value, $replace = TRUE)` — seta atributos HTML/propiedades do widget.
- `getPropertiesAsString($filter = null)` — retorna atributos formatados para render.
- `addValidation($label, TFieldValidator $validator, $parameters = NULL)` — adiciona validações (required, email, min/max length etc.).
- `validate()` — executa validações registradas.
- `getContents()` / `__toString()` — retorna o HTML renderizado do widget.

Exemplo rápido (TEntry é subclasse comum):

```php
$entry = new TEntry('email');
$entry->setLabel('E-mail');
$entry->addValidation('E-mail', new TRequiredValidator);
$entry->addValidation('E-mail', new TEmailValidator);
echo $entry->getContents();
```

Boas práticas:
- Use `addValidation` em campos obrigatórios para validação server-side.
- Para interações JS, utilize `TField::enableField/disableField/clearField`.

Referências: `lib/adianti/widget/form/TField.php`.
