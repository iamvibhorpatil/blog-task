**# Project Information**

## **Project Overview**
This project is a **Blog Management System** built using **Laravel (Backend) and Vue.js (Frontend)**. The application allows users to:
- **Create** new blog posts.
- **View** a list of blogs.
- **Edit** and update existing blogs.
- **Delete** blogs with confirmation.
- **Search** for specific blogs.
- **Use SweetAlert** for success and confirmation messages.

The project follows a **RESTful API** structure, where the Laravel backend handles API requests, and the Vue.js frontend consumes these APIs.

---

## **Technology Stack**
- **Backend:** Laravel (PHP)
- **Frontend:** Vue.js (Vue 3 with Bootstrap 5 for styling)
- **Database:** MySQL
- **Package for Alerts:** SweetAlert2
- **Package for HTTP Requests:** Axios

---

## **Installation Steps**

### **1. Clone the Repository**
```sh
git clone https://github.com/your-repo/blog-management.git
cd blog-management
```

### **2. Install Backend Dependencies**
```sh
composer install
```

### **3. Create Environment File**
```sh
cp .env.example .env
```

Update your **`.env`** file with the correct database credentials:
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_database_user
DB_PASSWORD=your_database_password
```

### **4. Generate Application Key**
```sh
php artisan key:generate
```

### **5. Run Database Migrations**
```sh
php artisan migrate
```

### **6. Seed Dummy Data (Optional)**
```sh
php artisan db:seed
```

### **7. Install Frontend Dependencies**
```sh
npm install
```

### **8. Build the Frontend**
```sh
npm run dev
```

### **9. Start the Laravel Server**
```sh
php artisan serve
```
The application will be available at:
```
http://127.0.0.1:8000
```

### **10. Start the Vite Development Server (Frontend)**
```sh
npm run dev
```
Your frontend will be available at:
```
http://localhost:5173
```

---

## **Usage Guide**
- **Create a Blog:** Navigate to the blog creation form and enter the title and content.
- **View Blogs:** See the latest blogs on the homepage.
- **Edit Blog:** Click the "Edit" button to update a blog post.
- **Delete Blog:** Click the "Delete" button, and confirm via SweetAlert.
- **Search Blogs:** Use the search bar to filter blogs dynamically.

---

## **API Endpoints**
| Method | Endpoint        | Description           |
|--------|---------------|-----------------------|
| GET    | /api/blogs    | Fetch all blogs      |
| POST   | /api/blogs    | Create a new blog    |
| GET    | /api/blogs/{id} | Get a single blog  |
| PUT    | /api/blogs/{id} | Update a blog       |
| DELETE | /api/blogs/{id} | Delete a blog      |

---

## **Additional Notes**
- Ensure **MySQL** is running before migrating.
- Use **Postman or a browser** to test API endpoints.
- Vue components are stored in `resources/js/components/`.
- Laravel controllers are stored in `app/Http/Controllers/`.

For further issues, feel free to create a **GitHub issue** or reach out for support. 🚀

