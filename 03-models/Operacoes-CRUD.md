# Operações CRUD (Exemplo: Integrante)

Resumo curto (≤750 palavras):
Este documento descreve o fluxo de Create, Read, Update e Delete usando o exemplo em `example-crud` (Integrante, IntegranteForm, IntegranteList). O padrão é: abrir transação, validar formulário, hidratar Active Record, executar `store()` / `delete()`, tratar relações e arquivos, e fechar a transação.

Create (fluxo observado)
- A ação `onSave` em `IntegranteForm`:
  - `TTransaction::open('database')` — inicia transação.
  - `$this->form->validate()` — valida campos usando validators (ex.: `TRequiredValidator`, `TEmailValidator`).
  - `$object = new Integrante(); $object->fromArray((array) $data);` — hidrata o AR.
  - `$object->store();` — persiste (insert/update). Trata `IDPOLICY`, `created_at/updated_at` se configurados.
  - Tratar relações compostas: no exemplo, o código apaga registros de relação e re-insere os atuais (`MotoclubeUnidadeIntegrante`).
  - `saveFile` / `saveFiles` — trait `AdiantiFileSaveTrait` para arquivos.
  - `TTransaction::close()` / `TTransaction::rollback()` em caso de erro.

Exemplo mínimo (pseudo):

```php
TTransaction::open('saas_motoclube');
$this->form->validate();
$object = new Integrante();
$data = $this->form->getData();
$object->fromArray((array) $data);
$object->store();
// salvar relações (apagar e inserir)
TTransaction::close();
```

Read (listagem e edição)
- `IntegranteList::onReload` usa `TRepository` + `TCriteria`:
  - `$repository = new TRepository('Integrante');`
  - Configura `$criteria->setProperties($param)` (order, offset) e `setProperty('limit', $limit)`.
  - `$objects = $repository->load($criteria, FALSE);` — carrega os registros.
  - Para edição, `IntegranteForm::onEdit($param)` instancia `new Integrante($key)` e usa `$this->form->setData($object)`.

Update
- Mesma lógica do Create: quando um `id` existe, `store()` faz `UPDATE`.
- O form carrega o objeto via `new Integrante($key)` e, após alterações, `store()` atualiza.

Delete (físico / lógico)
- `IntegranteList::onDelete` ilustra:
  - Confirmação com `TQuestion`.
  - `TTransaction::open()`, `$object = new Integrante($key, FALSE);`, `$object->delete();`, `TTransaction::close()`.
- `TRecord::delete()` pode executar soft delete se a classe define `DELETEDAT`/`DELETEDBY`.

Validações e eventos
- Form validators (`addValidation`) garantem integridade antes do store.
- TRecord suporta ganchos opcionais: `onBeforeLoad`, `onAfterLoad`, `onBeforeStore`, `onAfterStore`, `onBeforeDelete`, `onAfterDelete` — invoque-os na sua classe modelo para validações/side-effects.

Boas práticas observadas
- Usar transações para operações que envolvem múltiplas inserções (registro principal + relações).
- Tratar arquivos com `AdiantiFileSaveTrait` para mover/registrar arquivos após `store()`.
- Para relações 1:N/N:N, apagar registros antigos e regravar os atuais (estratégia simples explicada no exemplo).

Referência: `example-crud/IntegranteForm.php`, `example-crud/Integrante.php`, `example-crud/IntegranteList.php`.
