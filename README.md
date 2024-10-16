# Maga-teste

1. Execute o comando abaixo para instalar as dependências do projeto:

   ```bash
   composer install
   ```

2. Cheque se os parâmetros de configuração de acesso ao MySQL estão válidos.

   Arquivo: `config/bd_config.php`:

   ```php
   // Configurações do banco de dados
   $dbParams = [
       'driver'   => 'pdo_mysql',
       'host'     => 'localhost',
       'user'     => 'root', // Insira o usuário do banco
       'password' => '', // Insira a senha correta
       'dbname'   => 'MagaTest', // Banco padrão MagaTest
   ];
   ```

   Caso necessário, altere as configurações de parâmetros do banco diretamente no arquivo.

3. Para criar o banco de dados, execute o comando:

   ```bash
   php scripts/create_database.php
   ```
