## Convenções para Banco de Dados
Foi convencionado que todos os nomes de tabelas, colunas, views e qualquer outro recurso do SGBD devem ser escrito em INGLÊS.

### Tabelas
- Os nomes das tabelas devem ser **NO PLURAL** por parecer fazer sentido que um nome para um conjunto de linhas deva ser plural, ou seja, por ser um "conjunto de coisas";

- Cada tabela deve ter um `id` de Chave Primária (PK). Exceção dessa regra **PODE SER** tabelas auxiliares de relacionamentos N:M;

- Nomes para tabelas compostas devem ser escritas em caixa baixa separados por um `underscore (_)`

- Em tabelas relacionadas deve-se combinar uso `singular_plural`. Geralmente a entidade dominante primeiro, já que ela é principal, na segunda entidade filha. Ex: `post_tags`, `user_roles` ou `student_tests`;

### Colunas/Campos
- Nomes de colunas sempre **NO SINGULAR**. Exceção da regra **PODE SER** uma coluna que represente algo que dê a menção de ser muitas coisas;

- Colunas que representam uma Chave Estrangeira (FK) devem iniciar com o nome da "Tabela Estrangeira" no **SINGULAR** adicionando `_id`, por exemplo: `user_id`, `category_id` e `group_id`.

- Exceção dessa regra são as colunas: `created_by`, `updated_by` e `deleted_by` que são chaves estrangeiras para a tabela `users` e armazenam o ID do usuário de sua respectiva ação. 

Fontes:

https://imasters.com.br/data/convencoes-de-nomeacao-de-sql-schema

https://www.sqlstyle.guide/
