Laravel Livewire Starter Kit

Este projeto é um starter kit Laravel 12 integrado com Livewire 3, Tailwind CSS e Vite, pronto para construir aplicações web interativas com SPA-like behavior.

📦 Requisitos

Antes de iniciar, certifique-se de ter instalado:

PHP 8.2 ou superior

Composer 2.6+

Node.js 20+ e npm 9+

SQLite (ou MySQL/PostgreSQL se preferir)

Opcional: Git para clonar o projeto

⚙️ Instalação

Clonar o projeto 

Instalar dependências PHP:

composer install


Instalar dependências Node.js:

npm install

🌐 Configuração do ambiente

Copiar o arquivo .env.example:

cp .env.example .env


Ajustar variáveis de ambiente:

APP_NAME="Laravel Livewire Starter"
APP_URL=http://localhost:8000
DB_CONNECTION=sqlite
# ou MySQL/PostgreSQL:
# DB_CONNECTION=mysql
# DB_HOST=127.0.0.1
# DB_PORT=3306
# DB_DATABASE=nome_do_banco
# DB_USERNAME=root
# DB_PASSWORD=


Criar banco SQLite (caso use SQLite):

touch database/database.sqlite


Gerar a chave da aplicação:

php artisan key:generate


Rodar migrations e seeders:

php artisan migrate --seed

🚀 Inicializando o projeto

Você pode iniciar o projeto em modo de desenvolvimento com:

php artisan serve


O Laravel estará disponível em http://127.0.0.1:8000.


🔄 Rodando tudo simultaneamente

O projeto já inclui um script dev para rodar:

Servidor Laravel

Queue listener

Vite dev server

composer run dev
