# TPassword — Campo de senha

Descrição

`TPassword` é um campo de entrada que oculta o valor para senhas. Deve ser usado com práticas seguras: hashing no servidor e validação de força.

Exemplo

```php
// docs/01-formularios/examples/tpassword_example.php
require_once 'init.php';

$form = new TForm('form_password');

$pwd = new TPassword('password');
$pwd->setSize('100%');

$pwd_confirm = new TPassword('password_confirm');
$pwd_confirm->setSize('100%');

$form->addField($pwd);
$form->addField($pwd_confirm);

$form->addAction('Alterar senha', new TAction(['PasswordController', 'onChange']));

<formData = $form->getData('StdClass');
// validação exemplo (servidor)
if ($formData->password !== $formData->password_confirm) {
    new TMessage('error', 'Senha e confirmação diferentes');
}
// ao persistir, use password_hash()

$form->show();
```

Boas práticas

- Nunca salve senhas em texto claro.
- Use `password_hash()` e `password_verify()` no servidor.
- Para política de força, valide comprimento e complexidade antes do hash.

## Métodos principais

- `__construct(string $name)`
- `setSize(string $size)`
- `setProperty(string $name, $value)`
- `getValue()`
- `setValue($value)`

Lembre-se: `getValue()` traz a senha em claro para validação; nunca persista sem hash.
