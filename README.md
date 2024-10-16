# Maga-teste

1. **Copie o repositório para dentro do `htdocs` do XAMPP:**

   ```bash
   git clone https://github.com/VerNancio/Magatest.git
   ```


2. Execute o comando abaixo para instalar as dependências do projeto:

   ```bash
   composer install
   ```

3. Cheque se os parâmetros de configuração de acesso ao MySQL estão válidos e se porta está correta.

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

   Arquivo: `resources/js/routes.js`:
    ```js
    const URI = "http://localhost:80/magatest/";

    [...]
    ```

   Caso necessário, altere de porta no js acima. (Buscando atualmente :80)




4. Para criar o banco de dados, execute o comando:

   ```bash
   php scripts/create_database.php
   ```

5. Rodar a aplicação no XAMPP:

    Daí é só acessar o path onde está executando esse diretório
