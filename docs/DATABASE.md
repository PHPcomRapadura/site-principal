## Convenções para Banco de Dados

### Tabelas
- Os nomes das tabelas devem ser **NO PLURAL** por parecer fazer sentido que um nome para um conjunto de linhas deva ser plural, ou seja, por ser um "conjunto de coisas";

- Cada tabela deve ter um `id` de Chave Primária (PK). Exceção dessa regra **PODE SER** tabelas auxiliares de relacionamentos N:M;

- Nomes para tabelas compostas devem ser escritas em caixa baixa separados por um `underscore (_)`

- Em tabelas relacionadas deve-se combinar uso `singular_plural`. Geralmente a entidade dominante primeiro, já que ela é principal, na segunda entidade filha. Ex: `post_tags`, `user_roles` ou `student_tests`;

### Colunas/Campos
- Nomes de colunas sempre **NO SINGULAR**. Exceção da regra **PODE SER** uma coluna que represente algo que dê a menção de ser muitas coisas;

- Colunas que representam uma Chave Estrangeira (FK) devem iniciar com o nome da "Tabela Estrangeira" no **SINGULAR** adicionando `_id`, por exemplo: `usuario_id`, `categoria_id` e `grupo_id`.

- Exceção dessa regra são as colunas: `criado_por`, `atualizado_por` e `removido_por` que são chaves estrangeiras para a tabela `usuarios` e armazenam o ID do usuário de sua respectiva ação. 

Fontes:

https://imasters.com.br/data/convencoes-de-nomeacao-de-sql-schema

https://www.sqlstyle.guide/
