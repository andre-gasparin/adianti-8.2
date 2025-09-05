## Documentação de API (Swagger / OpenAPI)

Visão prática para documentar as APIs REST do projeto.

1) Abordagem mínima
- Criar um arquivo `openapi.yaml` com os endpoints mais importantes apontando para `rest.php` e descrevendo parâmetros `class` e `method` quando aplicável.

2) Exemplo de endpoint (OpenAPI snippet):

```yaml
paths:
  /rest:
    get:
      summary: Call a service
      parameters:
        - in: query
          name: class
          schema: { type: string }
        - in: query
          name: method
          schema: { type: string }
      responses:
        '200':
          description: OK
```

3) Ferramentas e dicas
- Use Swagger UI para navegação e testes locais.
- Para geração automática, seria necessário mapear classes/serviços e anotações aos endpoints; esse projeto não fornece gerador automático por padrão.

4) Recomendação prática
- Documente os serviços mais usados manualmente (ex.: Authentication, User CRUD, Uploads). Inclua exemplos de request/response JSON.
- Proteja endpoints sensíveis no Swagger com mecanismos de autenticação (Bearer token) para evitar exposição em ambientes públicos.

Referências: `rest/*` exemplos de consumo, `app/service/` serviços expostos.
