## Integração com Frontend (AJAX / Fetch)

Exemplos práticos de como o frontend pode chamar os serviços REST do projeto.

Padrão de URL: `rest.php?class=NomeDaClasse&method=nomeMetodo` ou chamadas diretas para endpoints que seguem o mesmo contrato.

1) Fetch (modern JS)

```javascript
// GET
fetch('/rest.php?class=SystemUserRestService&method=load&id=1', {
  headers: { 'Authorization': 'Bearer ' + token }
})
.then(r => r.json())
.then(data => console.log(data))
.catch(e => console.error(e));

// POST
fetch('/rest.php?class=SystemUserCliService&method=create', {
  method: 'POST',
  headers: { 'Content-Type': 'application/json', 'Authorization': 'Basic 123' },
  body: JSON.stringify({ login: 'peter', name: 'peter', password: '123' })
})
.then(r => r.json())
.then(data => console.log(data))
.catch(e => console.error(e));
```

2) jQuery.ajax

```javascript
$.ajax({
  url: '/rest.php?class=SystemUserRestService&method=load&id=1',
  type: 'GET',
  headers: { 'Authorization': 'Bearer ' + token },
  success: function(data){ console.log(data); },
  error: function(xhr){ console.error(xhr.responseText); }
});
```

3) Padrão server-side (helper `request()`)

Se precisar encapsular chamadas no servidor, use o helper `rest/request.php` presente no repositório — útil para servidores que fazem chamadas entre serviços localmente.

```php
require_once 'rest/request.php';
$location = 'http://server/rest.php?class=SystemUserRestService&method=load';
$user = request($location, 'GET', ['id'=>1], 'Bearer '.$token);
```

Boas práticas
- Não exponha credenciais no frontend; obtenha tokens com endpoints de autenticação.
- Trate erros de rede e de API (status != 200 ou payload com `status: 'error'`).
- Use HTTPS em produção.

Referências: `rest/*.php` exemplos no repositório.
