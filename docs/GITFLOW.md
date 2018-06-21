## Gitflow

Gitflow nada mais é que uma **metodologia** de trabalho para guiar o fluxo do versionamento do código com git. Você tem que separar muito bem o que é: **correção de bug**, **release**, **nova funcionalidade** e **correção de release**. E é algo que precisa ser testado e ir ajustando a metodologia. Evita estresse, perca de tempo e ameniza muito conflito:

O Gitflow sugere o trabalho com os branches no seguinte fluxo de branches (fora o `master` e `develop`):

**1. Feature**
   * Define uma nova funcionalidade
   * Prefixo padrão feature
   * Múltiplas features podem ser desenvolvidas ao mesmo tempo
   * Toda feature inicia em Develop
   * Toda feature termina em Develop

**2. Release**
   * Define uma nova versão de produção do software
   * Prefixo padrão release
   * Inicia em develop
   * Será mesclado master e também em develop
   * Uso do semantic version para determinar a versão
   * Erros podem ser corrigidos por hotfix

**3. Hotfix**
   * Define um novo branch para correção de erros
   * Ligada a uma release
   * Prefixo padrão Hotfix
   * Nome sempre será superior a release escorpo
   * Criado a partir do master
   * Se mescla com master e develop
   * Gerará uma nova versão de software

**4. Bugfix**
   * Define um novo branch para correção de erros
   * Prefixo padrão bugfix
   * Inicia no branch develop
   * Mergeado no branch develop

**5. Support** (beta)


## Comandos do git flow

> Após a [extensão](https://danielkummer.github.io/git-flow-cheatsheet/index.pt_BR.html#instalacao) instalada, você tem os comandos a seguir disponíveis.

#### Feature
  * git flow feature start name-feature
  * git flow feature publish name-feature
  * git flow feature track name-feature
  * git flow feature finish name-feature

#### Release
  * git flow release start name-feature
  * git flow release publish name-feature
  * git flow release track name-feature
  * git flow release finish name-feature

#### Hotfix
  * git flow hotfix start 0.0.0
  * git flow hotfix finish 0.0.0

#### Bugfix
  * git flow bugfix start name-feature
  * git flow bugfix publish name-feature
  * git flow bugfix track name-feature
  * git flow bugfix finish name-feature