## Carregamento de Templates (THtmlRenderer)

Resumo rápido das APIs para carregar e renderizar templates HTML com `THtmlRenderer`.

Principais pontos:
- Construtor: `new THtmlRenderer($path)` — recebe o caminho do arquivo HTML e lança Exception se não existir.
- Fábrica: `THtmlRenderer::create($path, $replaces)` — cria o renderer e já habilita a seção `main` com os `replaces` fornecidos.
- Controle de conversão HTML: `disableHtmlConversion()` — desativa o `htmlspecialchars` para valores substituídos (útil quando se passa HTML bruto com `RAW:`).
- Tradução: `enableTranslation()` — ativa tradução de strings no template antes do processamento.
- Saída: `show()` imprime diretamente o HTML processado; `getContents()` retorna o HTML em string (útil para envio por email ou retorno via API).

Exemplo mínimo:

```php
$html = THtmlRenderer::create('app/templates/email.html', ['title'=>'Olá']);
$html->enableTranslation();
echo $html->getContents();
```

Referência de implementação: `lib/adianti/widget/template/THtmlRenderer.php` (métodos citados).

