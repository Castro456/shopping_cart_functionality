# Shopping Cart Functionality Project

## Project Overview

### Objective
Develop shopping cart functionality using CodeIgniter 3.

## Project Requirements

### 1. Database Setup
- Created a MySQL database named `shopping_cart`.
- Established a `products` table with columns: `id`, `name`, `description`, `price`, `created_at`.
- Populated the table with sample data (minimum of 5 products).

### 2. CodeIgniter Setup
- Configured the CodeIgniter project with appropriate database settings in `config/database.php`.

### 3. Admin Panel
- Implemented a basic admin panel within the CodeIgniter application.
- Admin functionalities include adding new products, editing existing products, and deleting products from the database.
- Enhanced admin panel with user authentication (using CodeIgniter's authentication library or custom implementation), validation, and improved UI/UX as needed.

### 4. Models
- Developed `ProductModel` (`ProductModel.php`) to interact with the `products` table.
- Model methods include CRUD operations (`get_product()`, `insert_product()`, `update_product()`, `delete_product()`).

### 5. Controllers
- Created `Cart` controller (`CartController.php`) with the following methods:
  - `index()`: Displays the shopping cart with product details, quantities, total price, and options to remove items or clear the cart.
  - `add($id)`: Adds a product to the cart based on the product ID.
  - `remove($rowid)`: Removes a product from the cart based on the row ID.
  - `clear()`: Clears all products from the cart.

### 6. Views
- Designed views (`cart.php`, `dashboard.php`, etc.) to:
  - Display the list of products with options for admin functionalities.
  - Showcase the shopping cart with product details and options to update quantities, remove items, or clear the cart.
  - Integrated Bootstrap (Bootwatch) for UI/UX enhancements as required.

### 7. Cart Logic
- Implemented functionality to ensure the cart maintains state across page reloads and navigations.
- Enabled updating product quantities in the cart dynamically without losing data upon navigation.

## Deliverables

### Database Schema
- Included SQL file (`tables`) for creating the `products` table structure and inserting sample data.

### CodeIgniter Project
- Provided complete project structure:
  - Models (`ProductModel.php`)
  - Controllers (`CartController.php`, `DashboardController.php`, etc.)
  - Views (folder structure with appropriate views)
- Ensured all functionalities are implemented and tested:
  - Admin panel for product management.
  - Shopping cart functionality.
  - Responsive UI/UX using Bootstrap (Bootwatch).
