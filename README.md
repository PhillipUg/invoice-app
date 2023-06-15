# Symfony Invoice Management Project

This project is a simple invoice management application built with Symfony and Doctrine ORM. It allows for the creation and management of invoices, each with associated invoice lines.

## Project Specifications

- Language: PHP 8.x
- Framework: Symfony 5.4.x
- ORM: Doctrine

## Features

- Create, read, and manage invoices with associated invoice lines
- Each invoice consists of:
    - ID (auto increment)
    - Invoice date
    - Invoice number
    - Customer ID
- Each invoice line associated with an invoice includes:
    - ID (auto increment)
    - Invoice ID
    - Description
    - Quantity
    - Amount
    - VAT amount
    - Total with VAT

## Getting Started

Please follow these instructions to get a copy of the project up and running on your local machine for development and testing purposes.

### Prerequisites

Ensure you have the following installed on your local machine:

- PHP >= 8.0
- Symfony 5.4.x
- Composer

### Installation

1. Clone the repository into your local machine:

    ```bash
    git clone https://github.com/phillipug/invoice-app.git
    ```

2. Change into the directory:

    ```bash
    cd invoice-app
    ```

3. Install the project's dependencies:

    ```bash
    composer install
    ```

4. Run the project:

    ```bash
    symfony server:start
    ```

5. Navigate to `localhost:8000` in your web browser to view the project.

### Database

The SQL folder within the repository contains a dump of the database. Ensure that your local database is set up correctly to work with the Symfony project. Check your `.env` file for the DATABASE_URL entry.


## Authors

- Phillip Musiime - Initial work - [phillipug](https://github.com/phillipug)

## License

This project is licensed under the MIT License.

## Acknowledgments

- Symfony community
- All contributors to this project
