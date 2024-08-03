# SupportHub

SupportHub is an online support system built with Laravel. It allows customers to submit support tickets and track their status, while agents can log in, manage tickets, and provide responses.

## Features

- **Customer Functionality**:
  - Submit a new support ticket.
  - Check the status of existing tickets.
  
- **Agent Functionality**:
  - Log in to manage tickets.
  - View ticket details and update their status.
  - Reply to tickets.
  - View ticket replies and send responses.

## Installation

### Prerequisites

- PHP 8.0 or higher
- Composer
- Laravel 10.x or higher
- MySQL or another supported database
- Node.js and npm

### Steps to Install

1. **Clone the Repository**:
   
bash
   git clone https://github.com/skbahmd/supportHub.git
   cd supportHub


2. **Install Dependencies**:
   
bash
   composer install
   npm install


3. **Create a .env File**:
   
bash
   cp .env.example .env

   - **Database Configuration**:
     - In the .env file, fill in your own database name, username, and password.
   - **Mail Configuration**:
     - Set your own email configuration details. For testing, default data is provided in the .env.example file, which you can use if you wish.

4. **Generate Application Key**:
   
bash
   php artisan key:generate


5. **Run Migrations**:
   
bash
   php artisan migrate


6. **Build Frontend Assets**:
   
bash
   npm run dev


7. **Serve the Application**:
   
bash
   php artisan serve


## Usage

### For Customers

- **Submit a Ticket**:
  - Navigate to /tickets/submit to fill out and submit a new ticket.
  
- **Check Ticket Status**:
  - Go to /tickets/status to enter your ticket ID and view the status.

### For Agents

- **Log In**:
  - Access the login page at /agents/login.

- **Manage Tickets**:
  - View and update ticket details at /tickets/{id}.

- **Reply to Tickets**:
  - Add replies through the ticket view page.

## Authentication and Authorization

- Customers can view and submit tickets without logging in.
- Agents must log in to view and manage tickets.
- Only logged-in agents can update ticket statuses and reply to tickets.

## Email Notifications

- **Acknowledgment Notification**:
  - An email is sent to the customer once he/she created the ticket.

- **Reply Notification**:
  - An email is sent to the customer whenever an agent replies to their ticket.

- **Status Change Notification**:
  - An email is sent to the customer whenever the status of their ticket changes.

## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

## Acknowledgments

- Laravel Framework
- Creative Tim's Argon Dashboard

## Credits

- The user interface is based on open-source resources provided by [Creative Tim](https://www.creative-tim.com/product/argon-dashboard). Special thanks for their amazing UI components.
