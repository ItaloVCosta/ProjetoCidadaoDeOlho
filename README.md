
# Projeto escolhido: Cidadão de Olho 
**Autor:** Ítalo Vasconcelos Costa
**E-Mail:** italo.costa99@gmail.com
## Arquivos Necessários
Antes de começar a discutir o projeto é de extrema importância que o usuário tenha a versão do [PHP 8.1.1](https://www.php.net/downloads). Altere a php.ini localizada dentro da pasta do php e retire o ; de ;extension=pdo_sqlite, feito isso salve o arquivo.

Para a realização dos itens solicitados no projeto foi utilizado o framework Laravel, sendo assim é necessário instala-lo, assim como o [composer](https://getcomposer.org/download/) e inserir as variáveis no sistema.

Após a instalação do composer é necessário, caso o Laravel não esteja instalado, digitar no cmd:

 `Composer global require laravel/installer`    

Com os arquivos citados instalados, já é possível abrir o projeto .


## Seleção dos Links da API da ALMG

Previamente a programação do código, foi selecionado os links necessários da ALMG, são eles:

 1. Deputados do mandato de 2019 (recebendo a relação de nome e ID)

> http://dadosabertos.almg.gov.br/ws/legislaturas/19/deputados/situacao/1?formato=json

 2. Verbas indenizatórias (usado para obter os valores dos deputados que mais pediram reembolso em 2019, separado por mês)
 
>http://dadosabertos.almg.gov.br/ws/prestacao_contas/verbas_indenizatorias/legislatura_atual/deputados/{id}/2019/{mes}?formato=json

3. Redes Sociais (se encontram no link por id de deputado):

> http://dadosabertos.almg.gov.br/ws/deputados/[id]?formato=json

## Softwares Utilizados

O projeto foi feito utilizando o editor de código VScode, além disso, para o teste do retorno do método GET da API utilizado o insomnia. Para a melhor visualização do banco de dados, o SQLiteStudio foi empregado.

## Elaboração do Código

Inicialmente foi criado na pasta de “WebService” o arquivo ALMG.php, sendo uma classe que faz a requisição para a API da ALMG. Nessa classe se encontram funções, uma para cada Link descrito em *Seleção dos Links da API da ALMG*.

Com a comunicação com a API disponível foram trabalhados os dados nos arquivos seeder, um para cada tabela.
Após os dados trbalhados e organizados foi utilizado o Eloquent para envio dos dados para o banco.
Para a estruturação da tabela foi criado as migrations um para cada tabela, sendo o total dois.

Na elaboração da API foram criados duas rotas que executam o método get, também foi criado o controller de cada solicitação que lista os dados de cada tabela da API.

## Rodando o Código

Antes de popular o banco de dados, é necessário inserir alguns comandos no cmd para certificar o correto funcionamento do programa, são eles:

 - `composer update`
 - `composer require guzzlehttp/guzzle`
 - `php artisan migrate` (Caso de o alerta Application In Production!) certifique das configurações do banco no arquivo.env

Se não estiver criado, em *\database* inicie o arquivo *database.sqlite*. **Detalhe importante, o banco de dados tem que estar vazio!**
Para poder popular o banco digite `php artisan db:seed`. Em seguida rode o server com `php artisan serve`. Depois de todos esses passos, já é possível consultar a API através de um método GET.

Ao rodar o programa o usuário terá que esperar um tempo considerável para rodar o programa, já que não
foi utilizado assync e await para poder otimizar o processo de leitura de dados do API, sendo assim foram colocados delays entre as requisições, dessa forma tornando o programa lento, no PC que estou utilizando o código demorou cerca de 1060 segundos para rodar.
Após alimentar o banco de dados, é possível consultar a API criada utlizando o mpetodo GET nos links:

 - *http://127.0.0.1:8000/api/redesociaispara* obter o ranking de redes sociais
 - *http://127.0.0.1:8000/api/verbaindenizatorias* para obter os top 5 deputados que mais pediram reembolso de verbas indenizatórias por mês em 2019.

Atenção ao valor do local host pode variar, no meu caso foi utilizado 127.0.0.1.