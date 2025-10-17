# PDF with BD: Relatórios PDF a partir de um Banco de Dados MySQL

![Status](https://img.shields.io/badge/status-concluído-brightgreen)  ![Linguagem](https://img.shields.io/badge/linguagem-PHP-blue)  ![Banco de Dados](https://img.shields.io/badge/banco_de_dados-MySQL-orange)  ![Library](https://img.shields.io/badge/library-mPDF-red)

Este projeto acadêmico demonstra a integração completa entre um back-end PHP e um banco de dados MySQL para gerar relatórios dinâmicos em formato PDF. É a evolução do projeto anterior, substituindo um array de dados estático por uma consulta a um banco de dados real.

## 📝 Sobre o Projeto

O objetivo principal é criar uma aplicação que se conecta a um banco de dados, executa uma consulta SQL para buscar informações (neste caso, uma lista de livros de uma biblioteca) e utiliza a biblioteca **mPDF** para formatar esses dados em um relatório profissional. O projeto utiliza **PDO (PHP Data Objects)** para uma conexão segura e eficiente com o banco de dados MySQL. O PDF gerado é forçado para download no navegador do usuário.

---

## ✨ Funcionalidades

* **Conexão com Banco de Dados:** Utiliza PDO para se conectar a um banco de dados MySQL.
* **Consulta Dinâmica:** Busca dados em tempo real de uma tabela, garantindo que o relatório esteja sempre atualizado.
* **Geração de PDF:** Usa a biblioteca mPDF para converter os dados obtidos em uma tabela HTML estilizada dentro de um documento PDF.
* **Tratamento de Erros:** Inclui blocos `try-catch` básicos para lidar com possíveis falhas de conexão ou de geração do PDF.
* **Forçar Download:** O PDF gerado é enviado diretamente para o usuário para download, em vez de ser exibido no navegador.

---

## 🛠️ Tecnologias Utilizadas

* **Back-end:**

  ![PHP](https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white)
  
* **Banco de Dados:**
  
    ![MySQL](https://img.shields.io/badge/MySQL-4479A1?style=for-the-badge&logo=mysql&logoColor=white)
  
* **Biblioteca e Pacotes:**
    -   **mPDF:** Para a conversão de HTML para PDF.
    -   **Composer:** Para o gerenciamento de dependências.

---

## 🚀 Como Executar o Projeto

Para rodar este projeto, você precisará de um ambiente de servidor local (XAMPP, WAMP, etc.) com suporte a PHP e MySQL, além do Composer instalado.

1.  **Clone o repositório:**
    ```bash
    git clone [https://github.com/ERTbcod/PDF-with-BD.git](https://github.com/ERTbcod/PDF-with-BD.git)
    ```

2.  **Instale as dependências:**
    Navegue até a pasta do projeto e execute o Composer para instalar a biblioteca mPDF.
    ```bash
    cd PDF-with-BD
    composer install
    ```

3.  **Configure o Banco de Dados:**
    * Inicie seu serviço MySQL (pelo XAMPP, por exemplo).
    * Crie um banco de dados chamado `biblioteca`.
    * Execute o seguinte comando SQL para criar a tabela `livros` e inserir alguns dados de exemplo:
        ```sql
        CREATE TABLE livros (
          id INT AUTO_INCREMENT PRIMARY KEY,
          titulo VARCHAR(255) NOT NULL,
          autor VARCHAR(255) NOT NULL,
          ano_publicacao INT,
          resumo TEXT
        );

        INSERT INTO livros (titulo, autor, ano_publicacao, resumo) VALUES
        ('A Revolução dos Bichos', 'George Orwell', 1945, 'Uma fábula sobre o poder e a corrupção.'),
        ('O Senhor dos Anéis', 'J.R.R. Tolkien', 1954, 'Uma épica jornada para destruir um anel mágico.'),
        ('Dom Quixote', 'Miguel de Cervantes', 1605, 'As aventuras de um fidalgo que enlouquece lendo romances de cavalaria.');
        ```

4.  **Configure a Conexão:**
    Abra o arquivo `relPDFBD.php` e, se necessário, altere os dados de conexão com o banco de dados (host, usuário, senha) de acordo com a sua configuração local.
    ```php
    $host = 'localhost';
    $dbname = 'biblioteca';
    $username = 'root';
    $password = ''; // Coloque sua senha aqui, se houver
    ```

5.  **Execute o Projeto:**
    * Mova a pasta `PDF-with-BD` para o diretório raiz do seu servidor web (ex: `htdocs`).
    * Abra o navegador e acesse a URL:
        ```
        http://localhost/PDF-with-BD/relPDFBD.php
        ```
    * O download do arquivo `lista_de_livros.pdf` deve começar automaticamente.
