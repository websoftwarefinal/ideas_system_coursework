# EWSD Ideas system coursework

Welcome to the EWSD Ideas system coursework! This repository contains a PHP application structured with MVC (Model-View-Controller) architecture.

## Prerequisites
Before running the application, ensure you have the following prerequisites installed:

- XAMPP: Download and install XAMPP from [here](https://www.apachefriends.org/index.html).
- Composer: Install Composer from [here](https://getcomposer.org/download/).
- PHPMailer: Install PHPMailer by running `composer require phpmailer/phpmailer` in your terminal.

## Getting Started
To run the application, follow these steps:

1. Clone this repository to your local machine.
2. Import the provided database into your MySQL database management system.
3. Open your terminal and navigate to the project directory using the `cd` command.
4. Start the PHP built-in server by running the following command:
5. Once the server is running, access the application by typing the following link into your browser:


## Application Structure
- **Models**: All business logic is located in the `Models` folder, where you'll find all the model classes.
- **Controllers**: The interface between the database and the views is handled by the controllers. You can find all controllers in the `Controllers` folder.
- **Views**: Frontend views are stored in the `resources/views` folder.

## Additional Notes
- Make sure to configure your database credentials in the appropriate files for database connectivity. All credentials should be added in the .env file.