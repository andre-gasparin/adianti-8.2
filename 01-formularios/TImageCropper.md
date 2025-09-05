## TImageCropper — Upload e recorte de imagens

Resumo
TImageCropper é um campo de formulário que permite upload, recorte (crop), zoom, rotação e captura por webcam. Pode operar em modo `base64` ou com `fileHandling` (envio para serviço). Inclui botões de manipulação (arrastar, escalar, rotacionar, reset, zoom).

Principais métodos (disponíveis)
- __Construtor__: `new TImageCropper(string $name)`
- `setImagePlaceholder(TImage $image)` — define imagem placeholder
- `setWindowTitle(string $title)` — título da janela de crop
- `setButtonLabel(string $text)` — texto do botão de confirmar
- `setAspectRatio(float $aspectRatio)` — força proporção (usar constantes)
- `enableBase64()` — ativa retorno em base64
- `enableWebCam()` — habilita captura por webcam
- `enableFileHandling()` — envia via uploader service
- `disableButtonsDrag()` — desativa arrastar
- `disableButtonsZoom()` — desativa zoom
- `disableButtonsScale()` — desativa escala
- `disableButtonReset()` — desativa reset
- `disableButtonsRotate()` — desativa rotação
- `setValue($value)` — define valor inicial (URL, base64 ou file-hash)
- `setAllowedExtensions(array $extensions)` / `getAllowedExtensions()`
- `setService(string $service)` — define classe de serviço para upload
- `setSize($width, $height = NULL)` / `getSize()`
- `setCropSize($width, $height)` — tamanho do recorte de saída e define aspectRatio
- `getOptions()` — retorna JSON com opções do componente
- `show()` — renderiza o campo

Constantes de aspecto
- `CROPPER_RATIO_16_9`, `CROPPER_RATIO_4_3`, `CROPPER_RATIO_1_1`, `CROPPER_RATIO_2_3`

Exemplo de uso (modo fileHandling)

```php
$img = new TImageCropper('photo');
$img->setWindowTitle('Ajuste da foto');
$img->setButtonLabel('Salvar');
$img->enableFileHandling(); // salva via uploader
$img->setAllowedExtensions(['jpg','png']);
$img->setCropSize(800, 600); // define tamanho final
$img->setService('CustomUploadService');
$form->addField($img);
$form->show();
```

Exemplo de uso (base64 / webcam)

```php
$img = new TImageCropper('avatar');
$img->enableBase64();
$img->enableWebCam();
$img->setAspectRatio(TImageCropper::CROPPER_RATIO_1_1);
$img->setSize('150%', 150);
$form->addField($img);
```

Observações rápidas
- Quando `fileHandling` estiver ativo, `setValue()` aceita um JSON urlencoded com `{fileName:...}`. Em `base64` o campo guarda a string base64.
- `getOptions()` fornece as labels e flags usadas pelo JavaScript (ex.: enableButtonDrag, aspectRatio, etc.).
- O componente gera scripts que interagem com `AdiantiUploaderService` por padrão; `setService()` altera a classe alvo.

Fim
