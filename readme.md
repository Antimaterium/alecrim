# Bar e restaurante Alecrim

Sistema de gestão do Bar e Restaurante Alecrim

#Boa noite coleguinha, como vai?

Para usar o laravel é necessário baixar algumas coisas antes. Segue:

#PHP: http://windows.php.net/download#php-7.1
obs: sempre baixar a versão com THREAD.

#Instalando o PHP

Descompacte os arquivos dentro de uma pasta com nome php no diretório C:. Em seguida, verá que entre os arquivos terá um chamado php.ini-development, crie uma cópia e renomeie para php.ini. Abra o php.ini e procure as configurações e remova os comentários (;):
•	extension=php_mbstring.dll
•	extension=php_openssl.dll
•	extension=php_pdo_mysql.dll
•	extension=php_pdo_odbc.dll
•	extension=php_pdo_pgsql.dll
•	extension=php_pdo_sqlite.dll
Composer: https://getcomposer.org/download/
obs: basta clicar no composer-setup.exe. Não é necessária nenhuma configuração(next,next,finish).

#Sublime text 3: https://www.sublimetext.com/3
Recomendo! Nele é possível baixar vários pacotes que auxiliam no desenvolvimento. Pacotes: Emmet, JavaScriptSnippets,MaterialTheme (o tema é bom) e Color Highlighter.

#CMDER: http://cmder.net
Recomendo! Nele é possível abrir várias abas, isso no decorrer do projeto é importante, principalmente porque usaremos algo pra controle de versão, em uma aba conseguimos rodar o projeto e em outra subir e baixar as atualizações do projeto.


#Iniciando com Laravel (Para estudo)

	Acho importante que todos saibam como iniciar um projeto, mas no nosso caso, um criará e os outros apenas baixarão pelo git. Para criar é só abrir o terminal e escolher o diretório onde quer criar o projeto. Ai cola esse comando:

composer create-project --prefer-dist laravel/laravel alecrim
Onde está alecrim pode colocar o nome que quiser.

	Depois que terminar de executar, pode testar, para saber se está funcionando corretamente. Basta colar esse comando no terminal e dar enter:

php artisan serve
Esse comando inicia um servidor local, no localhost:8000.

O laravel vem com um namespace padrão, chamado App, é recomendado mudar e colocar o nome do seu projeto. Entao basta colar esse comando no terminal

php artisan app:name alecrim

Fazer um npm install e um npm run dev

