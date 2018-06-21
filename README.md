# PHP com Rapadura - Projeto Hotsite

## Como rodar o projeto?

#### Requisitos
- [docker](https://docs.docker.com/install/)
- [docker-compose](https://docs.docker.com/compose/install/)


Para dar start no projeto é só executar o seguinte comando no console `docker-compose -f .docker/docker-compose.yml up -d `, dentro do **diretório root** do projeto. Se quiser parar a execução do projeto é só rodar o seguinte no console `docker-compose -f .docker/docker-compose.yml stop`, só para parar os serviços ou `docker-compose -f .docker/docker-compose.yml down` para remover e parar os serviços/containers.

> Segue duas **playlists** no **Youtube**, se você precisa se ambientar com o Docker. Uma do [**PHP da Zona da Mata**](https://www.youtube.com/playlist?list=PLMpauGt6IneQxS46vhASvVh7wGLmMRuXO), a segunda é do cara lá da [**Linux Tips**](https://www.youtube.com/playlist?list=PLf-O3X2-mxDk1MnJsejJwqcrDC5kDtXEb). E pra quem usa School of Net tem esse minicurso [Iniciando com Docker](https://www.schoolofnet.com/curso-iniciando-com-docker-rev2/).

## Versionando o projeto

Foi acordado de adotar a [**metodologia do git-flow**](https://danielkummer.github.io/git-flow-cheatsheet/index.pt_BR.html) para ajudar a [**versionar o projeto semanticamente**](https://semver.org/lang/pt-BR/). Sempre que houver uma dúvida quanto à isto. Sinta se à vontade para abrir uma [**issue**](https://github.com/PHPcomRapadura/site-principal/issues). Foi adicionado um pequeno resumo aqui no projeto. [[leia]](/docs/GITFLOW)