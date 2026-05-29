# Places - Sistema de Diretório de Negócios

![Laravel](https://img.shields.io/badge/Laravel-12.x-FF2D20?style=for-the-badge&logo=laravel)
![PHP](https://img.shields.io/badge/PHP-8.2+-777BB4?style=for-the-badge&logo=php)
![License](https://img.shields.io/badge/License-MIT-blue.svg)

O **Places** é uma aplicação web robusta desenvolvida em Laravel 12 concebida para a gestão, organização e listagem de negócios locais classificados por categorias. 

Este projeto foi originalmente desenvolvido por **Diogo Pimenta** e posteriormente forçado (*forked*) e atualizado por **Ari Brandão**.

---

## 🛠️ Tech Stack & Requisitos

### Backend & Core
- **Framework:** Laravel 12.x
- **Linguagem:** PHP 8.2 ou superior
- **Gestor de Dependências:** Composer

### Base de Dados
- **Motores compatíveis:** MariaDB / MySQL ou SQLite (configurável no ficheiro `.env`)

### Frontend
- **Interface:** Blade Templates
- **Estilização:** Tailwind CSS (gerido via Vite)
- **Runtime Node.js:** Node.js (v18+) e NPM

---

## 🚀 Instalação e Configuração

Siga os passos abaixo para configurar o ambiente de desenvolvimento local:

### 1. Obter o Código Fonte
Clone o repositório para o seu ambiente local:
```bash
git clone <url-do-repositorio>
cd places
```

### 2. Configuração Automática (Recomendado)
O projeto inclui um script automatizado que instala dependências, cria a configuração de ambiente, gera as chaves de encriptação, corre as migrações da base de dados e compila os recursos de frontend:
```bash
composer run setup
```

### 3. Configuração Manual (Alternativa)
Se preferir configurar cada componente individualmente:
```bash
# Instalar dependências PHP
composer install

# Configurar variáveis de ambiente
cp .env.example .env
php artisan key:generate

# Configurar a base de dados no .env e executar as migrações
php artisan migrate

# Instalar dependências e compilar assets do frontend
npm install
npm run build
```

---

## 💻 Execução em Desenvolvimento

Para iniciar o servidor de desenvolvimento e o compilador de assets em tempo real em simultâneo:
```bash
composer run dev
```
*Este comando corre concorrentemente o servidor HTTP do Laravel, o queue listener, o painel de logs (Pail) e o Vite.*

### Principais Endereços Locais:
- **Aplicação:** [http://localhost:8000](http://localhost:8000)
- **Vite Dev Server:** [http://localhost:5173](http://localhost:5173)

---

## 📂 Arquitetura e Estrutura do Projeto

### Rotas Principais
- `/` - Página principal de acolhimento e boas-vindas.
- `/categories` - Painel administrativo para a gestão (CRUD) de categorias de negócios.

### Estrutura de Modelos e Dados
A estrutura de dados está desenhada para suportar os seguintes fluxos:
- **Categorias:** Estrutura taxonómica para agrupar e filtrar negócios.
- **Negócios:** Contém informações estruturadas de contacto, tais como:
  - Nome do negócio, morada física, NIF, contactos de telefone/e-mail, estado e associação com a categoria respetiva.

---

## 🧪 Testes

Para garantir a estabilidade do sistema e validar as regras de negócio implementadas, pode executar a suite de testes automatizados com o seguinte comando:
```bash
composer run test
```

---

## 📝 Notas de Desenvolvimento e Contribuição

- Assegure-se de que configura corretamente a ligação à base de dados no seu `.env` antes de correr as migrações (suporta `mariadb` ou `sqlite`).
- Utilize o comando `composer run test` antes de submeter alterações de código para garantir que a cobertura de testes se mantém verde.
