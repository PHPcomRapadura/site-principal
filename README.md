# PHP com Rapadura - Novo Portal da Comunidade

## Como rodar o projeto?

#### Pré-Requisitos
- [docker](https://docs.docker.com/install/)
- [docker-compose](https://docs.docker.com/compose/install/)


Para dar start no projeto é só entrar no **diretório root** do projeto executar o seguinte comando:

```
docker-compose -f .docker/docker-compose.yml up -d
```

Se quiser parar a execução do projeto é só rodar o seguinte comando:

```
docker-compose -f .docker/docker-compose.yml stop
```

Caso queria PARAR serviços é só rodar o seguinte comando. Isso irá remover e parar os serviços/containers:
 
```
docker-compose -f .docker/docker-compose.yml down
```

> Segue duas **playlists** no **Youtube**, se você precisa se ambientar com o Docker. Uma do [**PHP da Zona da Mata**](https://www.youtube.com/playlist?list=PLMpauGt6IneQxS46vhASvVh7wGLmMRuXO), a segunda é do cara lá da [**Linux Tips**](https://www.youtube.com/playlist?list=PLf-O3X2-mxDk1MnJsejJwqcrDC5kDtXEb). E pra quem usa School of Net tem esse minicurso [Iniciando com Docker](https://www.schoolofnet.com/curso-iniciando-com-docker-rev2/).
