# DSTRCT 🚧

> A sleek, Laravel-powered web application scaffold with Vite + Vue.js support — ready for your next project.

![Laravel](https://img.shields.io/badge/Powered%20by-Laravel-%23FF2D20) 

---

## 🧩 Table of Contents

- [About](#about)  
- [Features](#features)  
- [Tech Stack](#tech-stack)  
- [Getting Started](#getting-started)  
  - [Prerequisites](#prerequisites)  
  - [Installation](#installation)  
  - [Environment Setup](#environment-setup)  
  - [Database Setup](#database-setup)  
- [Usage](#usage)
- [Project Structure](#project-structure)

---

## About

**DSTRCT** is a Laravel-based full-stack framework configured with Blade, Vue and Vite. It offers a clean and modular architecture designed to kickstart development quickly with modern tooling.

---

## Features

- **Laravel 10+** backend framework  
- Modular **Blade + Vue.js** frontend setup using **Vite**  
- Firebase or third-party auth configuration (adjust `.env`)  
- RESTful routes (under `/routes`)  
- Database migrations, seeding, and Eloquent models  
- Unit & feature tests (under `/tests`)  
- Frontend assets compilation (SCSS, JS) via Vite  

---

## Tech Stack

| Layer     | Technology                |
|-----------|---------------------------|
| Backend   | PHP 8+, Laravel           |
| Frontend  | Vue.js, Blade, Vite       |
| Database  | MySQL / SQLite / PostgreSQL |
| Testing   | PHPUnit                  |
| Dependencies | NPM, Composer          |

---

## Getting Started

### Prerequisites

- PHP ≥ 8.1  
- Composer  
- Node.js ≥ 16.x & npm  
- A database (MySQL/PostgreSQL/SQLite)

### Installation

```bash
git clone https://github.com/RaffiAkhdilputra/DSTRCT.git
cd DSTRCT
composer install
npm install
```

### Environment Setup

```bash
cp .env.example .env
php artisan key:generate
# Edit .env to set DB_DATABASE, DB_USERNAME, DB_PASSWORD, etc.
```

### Database Setup

```bash
php artisan migrate
php artisan db:seed # optional, if seeders are defined
```

## Usage
- Run backend
```bash
php artisan migrate
php artisan db:seed # optional, if seeders are defined
```
- Compile front-end assets
```bash
npm run dev      # for development
npm run build    # for production
```

## Project Structure
```bash
├── app/                # Laravel application code
├── bootstrap/          
├── config/             
├── database/           # migrations & seeders
├── public/             # entrypoint, index.php, assets
├── resources/
│   ├── js/             # Vue & JS files
│   └── views/          # Blade templates
├── routes/             # web.php, api.php
├── storage/            
├── tests/              # Unit & Feature tests
├── vite.config.js      # Vite configuration
├── package.json
└── composer.json
```

## Getting Support

For any issues or questions, please open an issue on the GitHub repository.

---

⚙️ Ready to start developing? Clone, configure, and launch!

---

Note: Badges (build status, downloads) should be updated once you integrate CI/CD tools (e.g., GitHub Actions) and release mechanisms.
Acknowledgements

---

Based on the default Laravel scaffold; thanks to the Laravel community for the foundation.
