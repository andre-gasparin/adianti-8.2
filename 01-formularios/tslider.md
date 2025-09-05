# TSlider — Controle deslizante

Descrição

`TSlider` é um controle para escolher valores numéricos em um intervalo. Suporta min, max e step.

Exemplo

```php
// docs/01-formularios/examples/tslider_example.php
require_once 'init.php';

$form = new TForm('form_slider');

$volume = new TSlider('volume');
$volume->setRange(0, 100);
$volume->setStep(5);

$form->addField($volume);
$form->addAction('Salvar', new TAction(['SliderController', 'onSave']));

$form->show();
```

Boas práticas

- Normalize o valor para inteiro antes de salvar.
- Para acessibilidade, ofereça um input numérico paralelo.

## Métodos principais

- `__construct(string $name)`
- `setRange(int $min, int $max)`
- `setStep(int $step)`
- `setValue($value)`
- `getValue()`
