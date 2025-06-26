# CarServ - Car Service Reservation Website

## Project Description
CarServ is a web application for car service and repair businesses, allowing customers to book services online, view available services, and contact the business. The project includes an admin interface for managing reservations.

## Features
- Online service booking form
- Admin panel to manage reservations
- Contact form with email sending
- Responsive design (Bootstrap)
- Team, testimonials, and about pages
- Animated UI and carousels

## Technologies Used
- **Frontend:** HTML5, CSS3, Bootstrap 5, JavaScript, jQuery
- **Backend:** PHP
- **Database:** MySQL
- **Libraries:**
  - WOW.js (animations)
  - OwlCarousel (carousels)
  - TempusDominus (date/time picker)
  - FontAwesome, Bootstrap Icons

## Folder Structure
- `index.html`, `about.html`, `service.html`, `booking.html`, `contact.html`, `team.html`, `testimonial.html`, `404.html`, `reservation_form.html`: Main pages
- `admin-manage-booking.php`: Admin interface
- `reservation.php`: Handles reservation form submissions
- `send_email.php`: Handles contact form emails
- `img/`: Images and assets
- `css/`, `scss/`: Stylesheets (compiled and source)
- `js/`: JavaScript logic
- `lib/`: Third-party libraries

## Setup Instructions
1. **Requirements:**
   - PHP 7+
   - MySQL
   - Web server (XAMPP, WAMP, MAMP, or similar)
2. **Installation:**
   - Clone this repository: `git clone <repo-url>`
   - Place the project in your web server's root directory (e.g., `htdocs` for XAMPP)
   - Import the required MySQL database (see `reservation.php` for table structure)
   - Update database credentials in `reservation.php` and `admin-manage-booking.php`
3. **Usage:**
   - Access the site via `http://localhost/<project-folder>`
   - Use the admin panel at `admin-manage-booking.php` to manage reservations

## Live Demo
A live demo will be available soon. [Add your link here]

## Screenshots

![Homepage Screenshot](acc_carserv.png)
*Homepage of CarServ - Car Service Reservation Website*

## Credits
- Bootstrap, jQuery, and all third-party libraries used are credited to their respective authors.
- Developed by Saifeddine Mosrati. 