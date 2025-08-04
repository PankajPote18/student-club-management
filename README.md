# Student Club Management System

A powerful Laravel-based application for managing student clubs, memberships, and activities. This project demonstrates best practices in Laravel such as validation separation, repository pattern, model events, controller organization, accessors, mutators, and more.

---

## Features

- Manage clubs and student memberships easily
- Clear separation of validation rules into dedicated files
- Organized controllers (resource and custom types)
- Efficient use of model events for automatic data handling
- Accessors and mutators for clean attribute management
- Repository and interface pattern for business logic abstractions

---

## Getting Started

### Prerequisites

- PHP 8.1 or above
- Composer
- MySQL (or compatible database)
- Node.js & npm (for front-end assets, if required)

---

### Installation

1. **Clone the repository:**
git clone https://github.com/PankajPote18/student-club-management.git
cd student-club-management

2. **Install Composer dependencies:**
composer install

3. **Install NPM dependencies (optional, for front-end):**
npm install
npm run dev

4. **Copy the `.env` file and configure environment variables:**
cp .env.example .env
Update your database and other settings in `.env` as necessary.

5. **Generate application key:**
php artisan key:generate

6. **Run migrations and seeders:**
php artisan migrate --seed

---

## Code Structure and Concepts

- **Validation Separation**  
All validation logic resides in dedicated Form Request classes within `app/Http/Requests/`, keeping controllers focused on business logic.

- **Model Files & Events**  
Eloquent model files are organized in `app/Models/`. Model events (e.g., `creating`, `updating`) are handled within each model for actions like auto-setting attributes.

- **Controllers Types**  
Resource controllers handle standard CRUD operations, while custom controllers manage other specific actions. See `app/Http/Controllers/`.

- **Accessors & Mutators**  
Used within model classes for formatting and manipulating data attributes (e.g., `getFullNameAttribute()`, `setEmailAttribute()`).

- **Repository & Interface Pattern**  
All database logic is abstracted via repositories and interfaces in `app/Repositories/` and `app/Interfaces/`. This enhances maintainability and testability.

---

## Contributing

1. Fork this repository
2. Create a new branch (`git checkout -b feature/your-feature`)
3. Commit your changes (`git commit -m 'Add some feature'`)
4. Push to the branch (`git push origin feature/your-feature`)
5. Open a Pull Request

---

## License

This project is open-source and available under the MIT License.

---

## Contact

For issues or suggestions, please open an [Issue](https://github.com/PankajPote18/student-club-management/issues) 
---

## Author

**Pankaj Pote**

[Connect with me on LinkedIn](www.linkedin.com/in/pankaj-pote)


