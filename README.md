## O que é?
Sistema de cadastro de eventos, com calendário, desenvolvido com Laravel 11,
rodando com docker/sail, e bootstrap no frontend.

## Como rodar?

Na linha de comando siga as seguintes instruções:

### Rodando pela primeira vez ?

- Crie o arquivo de configuracao .env:
```bash
cp .env.example .env
```

- Build e levante o docker:
```bash
./vendor/bin/sail up --build
```

- Rode as migrations:
```bash
./vendor/bin/sail artisan migrate 
```
### OU

- Levante o docker:
```bash
./vendor/bin/sail up 
```

## Tempo de Desenvolvimento

Esse projeto foi desenvolvido em menos de 10 horas.