# Laravel Bookstore Systen

This project is a laravel based application that display a list of **Top 10 Most Famous Author** based on the number of votes/ratings

Additionally, user can select an author and view a list of book they have written via a dynamic dropdown (AJAX), and then rate the book

## 🚀 Main Features

### 1. **List of Book With Filter**
- In filter section, for the input of list show is a drop down input with data of increment 10 from the lowest is 10 to 100
- in the search filter section, we can input any text in it and search the data based oh book name or author name

### 2. **Top 10 Most Famous Authors**
- Show a list of famous author based on of the number of votes/ratings

### 3. **Dynamic Dropdown (Author -> Book)**
- When the user select **Author**, the system automatically load the **Book** written by that author
- Used **Ajax** and **jQuery** to show list of book without reload the page

---

## 🛠️ Installation

### 1. Clone Repository
```bash
git clone https://github.com/arditriana01/Book-App.git
cd Book-App
```

### 2. Install dependencies
```bash
composer install
npm install && npm run dev
```

### 4. Copy and Configure `.env`
```bash
cp .env.example .env
```

### 5. Generate Key
```bash
php artisan key:generate
```

### 6. Database Migration and Seeder
```bash
php artisan migrate --seed
```

### 6. Run Server
```bash
php artisan serve
```

---

## 🌐 Link of The System

### ✅ List Book
**URL:** `/`  
Showing list of books with filter

### ✅ Top Authors
**URL:** `/authors`  
Showing list of top 10 most famous author, order by vote

### ✅ Input Rating
**URL:** `/rating` 
This page provides user to submit rating

## 🧪 Data Dummy

Dummy data (Book, Author, Category, Rating) will automatically create by seeder.

- `database/seeders/`

---

## 📄 Technology

- Laravel 12
- Version PHP 8.2
- Jquery
- Bootstrap

---
