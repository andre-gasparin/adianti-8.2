## APIs REST (Visão rápida)

Este documento mostra como consumir os endpoints REST do projeto usando os scripts de exemplo em `rest/`.

1) Helper HTTP
- Arquivo: `rest/request.php` — função `request($url, $method = 'POST', $params = [], $authorization = null)`
- Comportamento resumido:
  - Para POST e PUT a função envia o corpo como JSON (CURLOPT_POSTFIELDS) e define método correto.
  - Para GET e DELETE, quando há parâmetros, anexa-os na query string (`?a=b&c=d`).
  - Suporta header `Authorization: {value}` quando informado.
  - Decodifica a resposta JSON e lança Exception se não for JSON ou se o retorno indicar erro.

Exemplo mínimo (GET):

```php
$location = 'http://server/rest.php';
$params = ['class'=>'SystemUserRestService','method'=>'load','id'=>1];
$user = request($location, 'GET', $params, 'Bearer '.$token);
print_r($user);
```

2) Chamada por classe+method
- Padrão usado nos exemplos: o endpoint `rest.php` recebe `class` e `method` como parâmetros.
- Exemplo (POST create):

```php
$location = 'http://server/rest.php?class=SystemUserCliService&method=create';
$body = ['login'=>'peter','name'=>'peter','password'=>'123','active'=>1];
print_r( request($location, 'POST', $body, 'Basic 123') );
```

3) Fluxo de autenticação (JWT)
- Exemplo em `rest/jwt.php`:
  - Primeiro chama `ApplicationAuthenticationRestService::getToken` (GET) com credenciais (login/password) e obtém um token.
  - Usa `Bearer {token}` no header Authorization para chamadas subsequentes.

Exemplo resumido:

```php
$location = 'http://server/rest.php';
$params = ['class'=>'ApplicationAuthenticationRestService','method'=>'getToken','login'=>'user','password'=>'user'];
$token = request($location, 'GET', $params, 'Basic 123');

$params = ['class'=>'SystemUserRestService','method'=>'load','id'=>1];
$user = request($location, 'GET', $params, 'Bearer '.$token);
```

4) Tratamento de erros
- O helper lança Exception quando a resposta não é JSON ou quando o objeto retornado possui `status == 'error'`.
- Sempre capture exceptions com try/catch ao integrar em scripts ou frontends.

5) Boas práticas rápidas
- Use TLS (https) em produção e valide certificados (desabilitado no exemplo para simplicidade).
- Prefira enviar credenciais pelo cabeçalho Authorization em vez de parâmetros na URL.
- Sanitize e valide entradas no lado do servidor (services recebem parâmetros brutos).

Referências: `rest/request.php`, `rest/rest-method.php`, `rest/jwt.php` (exemplos no repositório).
