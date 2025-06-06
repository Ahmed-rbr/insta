

# Insta Clone

A simplified Instagram clone built using **Laravel**, **Blade templating engine**, and **Bootstrap** for frontend styling. This project demonstrates essential social media features such as user authentication, posting images, liking, and commenting.

---

## Features

* User registration, login, and authentication
* User profiles with editable information and profile pictures
* Create, edit, and delete posts with image upload support
* Like and comment on posts
* Responsive design using Bootstrap



## Technologies Used

* **Backend:** Laravel Framework (PHP)
* **Frontend:** Blade templating engine, Bootstrap 5
* **Database:** MongDb
* **Authentication:** Laravel's built-in authentication system


## Installation

1. **Clone the repository:**

   ```bash
   git clone https://github.com/yourusername/instagram-clone.git
   cd instagram-clone
   ```

2. **Install dependencies:**

   ```bash
   composer install
   npm install
   npm run dev
   ```


3. **Generate application key:**

   ```bash
   php artisan key:generate
   ```

4. **Run database migrations and seeders:**

   ```bash
   php artisan migrate --seed
   ```

5. **Serve the application:**

   ```bash
   php artisan serve
   ```

6. **Access the app:**

   Open your browser and go to `http://localhost:8000`


## Usage

* Register a new user or log in with existing credentials
* Create posts with images and captions
* Like and comment on other users’ posts
* Edit your profile information


## Folder Structure

* `app/Http/Controllers` — Contains controllers managing application logic
* `resources/views` — Blade templates for frontend UI
* `public` — Public assets like images, CSS, and JavaScript
* `routes/web.php` — Web routes file
* `database/migrations` — Database schema definitions


## Contributing

Contributions are welcome! Please open issues or submit pull requests for improvements or bug fixes.


## License

This project is open-source and available under the [MIT License](LICENSE).



