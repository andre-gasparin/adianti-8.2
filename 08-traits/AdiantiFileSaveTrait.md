## AdiantiFileSaveTrait

Trait para lidar com upload/movimentação e persistência de arquivos durante operações de formulário.

Principais métodos:
- `saveFile($object, $data, $input_name, $target_path)` — processa um arquivo único informado no `data` (JSON), move de tmp para target e ajusta o objeto.
- `saveFiles($object, $data, $input_name, $target_path, $model_files, $file_field, $foreign_key)` — processa múltiplos arquivos e armazena registros em tabela auxiliar.
- `saveFilesByComma($object, $data, $input_name, $target_path)` — salva múltiplos arquivos concatenados por vírgula.
- `saveBinaryFile($object, $data, $attr_file, $attr_file_name)` — salva conteúdo binário em campo BLOB/LONGBLOB/VARBINARY/BYTEA conforme driver.

Boas práticas:
- Use em controllers que precisam mover arquivos do `tmp/` para pastas organizadas por entidade/ID.
- Verifique permissões do filesystem e trate erros de I/O.

Referência: `lib/adianti/base/AdiantiFileSaveTrait.php`.
