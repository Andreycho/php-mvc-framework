# PHP MVC Framework

This is a simple PHP MVC framework demonstrating the Model-View-Controller architecture, providing a basic structure for creating web applications. The framework includes routing, database operations, and a simple note-taking application. Created to demonstrate knowledge of MVC architecture and PHP.

## Features
- Basic MVC structure
- Routing system
- Simple note-taking app with Create, Read, Update, Delete (CRUD) operations
- PDO database connection
- Bootstrap integration for user interface styling

## MVC Structure
The application is structured using the **MVC (Model-View-Controller)** pattern:

- **Model**: Contains the logic for interacting with the database. The model retrieves data and performs operations such as create, update, delete, and read (CRUD operations).
- **View**: Represents the user interface. The view is responsible for rendering the HTML content and displaying the data.
- **Controller**: Handles the user's requests, retrieves data from the model, and renders the appropriate view.

## Key Files
Here are some important files and directories to know:

- **`app/controllers/`**: Contains PHP files for handling requests and returning views (e.g., `NotesController.php`).
- **`app/models/`**: Contains classes that interact with the database (e.g., `Note.php`).
- **`app/views/`**: Contains the HTML templates for rendering views in the browser.
- **`app/core/Router.php`**: Defines the routing logic for the application, including route definitions and parameter handling.
- **`index.php`**: The front controller that initiates the request flow for each HTTP request.
- **`scripts/create_db_notes_table.php`**: A PHP script for automatically setting up the database and notes table.
- **`app/config.php`**: The configuration file where you can set database connection details and other configuration options.

## Prerequisites
To run this project locally, you need the following:
- PHP 8.1 or higher
- MySQL 5.7 or higher

## Installation

### Step 1: Clone the repository
```bash
git clone https://github.com/Andreycho php-mvc-framework.git

cd php-mvc-framework
```

### Step 2: Set Up Database Configuration
- The framework uses MySQL to store notes. Before running the application, you need to configure the database settings.

1. Open the **`app/config.php`** file.
2. Modify the database connection details as needed, for example:

```bash
return [
    'host' => 'localhost',          // Database host
    'port' => '3306',               // Database port (default: 3306)
    'dbname' => 'mvc-framework',    // Database name
    'username' => 'root',           // Your MySQL username
    'password' => '',               // Your MySQL password
    'charset' => 'utf8mb4'          // Database character set
];
```
### Step 3: Create the Database and Tables
- The framework requires a MySQL database named mvc-framework and a table named notes.
- To automatically create the database and table, use the provided create_db_and_table.php script.

```bash
php scripts/create_db_notes_table.php
```

This will connect to your MySQL server and create the mvc-framework database and the notes table.

### Step 4: Run the Application
Start the PHP development server with the following command:

```bash
php -S localhost:8000
```
Visit http://localhost:8000 in your web browser to access the application.

### Step 5: Enjoy!

You're now ready to use your PHP MVC framework! You can create, edit, view, and delete notes using the provided routes and controllers.

## Routes 

This application supports the following routes:

- **`GET /`** - Home page
- **`GET /notes`** - List all notes
- **`GET /notes/create`** - Form to create a new note
- **`POST /notes`** - Create a new note
- **`GET /notes/{id}`** - View a single note
- **`GET /notes/{id}/edit`** - Edit an existing note
- **`PUT /notes/{id}`** - Update an existing note
- **`DELETE /notes/{id}`** - Delete a note

## Troubleshooting

### Configuring PHP from an Archive (Without WAMP or XAMPP)

If you've installed PHP directly from an archive and are not using a tool like WAMP or XAMPP, you may need to configure PHP manually.

1. **Create a **`php.ini`** File:**
- Copy the **`php.ini-development`** or **`php.ini-production file`** (found in your PHP installation directory) and rename it to **`php.ini`**.

2. **Enable Required Extensions:**
- Open the **`php.ini`** file in a text editor.
- Uncomment the following lines to enable PDO and MySQL extensions by removing the **`;`** at the beginning of each line:

```bash
extension=pdo_mysql
```

3. **Set **`php.ini`** Path:**
- Ensure PHP knows where to find your **`php.ini`** file. If running PHP from the command line, it should automatically detect the **`php.ini`** file in the same directory as the PHP executable.
- To confirm, run the following command:
```bash
php --ini 
```
- This should display the path to the loaded **`php.ini file`**. If it shows **`(none)`**, Ensure that the **`php.ini`** file includes the correct path for the PHP ext directory. Look for the following line and confirm that it points to the location of your PHP extensions:
```bash
extension_dir = "ext"
```
If needed, replace "ext" with the full path to the ext folder in your PHP installation (e.g., C:\php\ext on Windows).