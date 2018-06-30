# PHP com Rapadura - Novo Portal da Comunidade

## Como rodar o projeto?

#### Pré-Requisitos
- [docker](https://docs.docker.com/install/)
- [docker-compose](https://docs.docker.com/compose/install/)

Para preparar o projeto para rodar rode os comandos abaixo:
```
$ cp .env.dist .env
$ cp docker-compose.yml.dist docker-compose.yml
```
Estas instruções criarão cópias dos arquivos de configuração do projeto e do docker.
Os dois arquivos vêm com configurações padrão funcionais para usar em sistemas operacionais que não tenham outros serviços.
Se precisar edite-os de forma a ficarem compatíveis com alguma peculiaridade do seu sistema operacional.

Para dar start no projeto é só entrar no **diretório root** do projeto executar o seguinte comando:
```
$ docker-compose up -d
```

Para instalar as dependências pode usar o comando:
```
$ docker exec phpcomrapadura-app composer install
```

Se quiser parar a execução do projeto é só rodar o seguinte comando:
```
$ docker-compose stop
```

Caso queria finalizar os serviços é só rodar o seguinte comando. Isso irá remover e parar os serviços/containers:
```
$ docker-compose down
```

> Segue duas **playlists** no **Youtube**, se você precisa se ambientar com o Docker. Uma do [**PHP da Zona da Mata**](https://www.youtube.com/playlist?list=PLMpauGt6IneQxS46vhASvVh7wGLmMRuXO), a segunda é do cara lá da [**Linux Tips**](https://www.youtube.com/playlist?list=PLf-O3X2-mxDk1MnJsejJwqcrDC5kDtXEb). E pra quem usa School of Net tem esse minicurso [Iniciando com Docker](https://www.schoolofnet.com/curso-iniciando-com-docker-rev2/).

## Versionando o projeto

Foi acordado de adotar a [**metodologia do git-flow**](https://danielkummer.github.io/git-flow-cheatsheet/index.pt_BR.html) para ajudar a [**versionar o projeto semanticamente**](https://semver.org/lang/pt-BR/). Sempre que houver uma dúvida quanto à isto. Sinta se à vontade para abrir uma [**issue**](https://github.com/PHPcomRapadura/site-principal/issues). Foi adicionado um pequeno resumo aqui no projeto. [[leia]](/docs/GITFLOW.md)

## Convenções para Banco de Dados

Deverá ser utilizado [**este guia**](/docs/DATABASE.md) como base para nomenclaturas de tabelas, colunas, chaves estrangeiras e outros quesitos de banco de dados. Pode ser que haja algumas exceções, mas que as exceções sejam tratadas como **exceções**!