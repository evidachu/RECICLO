# RECICLO Project

## Overview
RECICLO is a web application designed to facilitate the management of recycling processes. The application allows users to log in as either an admin or a buyer, providing tailored functionalities for each user type.

## Features
- User authentication for both admins and buyers.
- Registration forms for new users.
- Separate dashboards for admin and buyer roles.
- Responsive design for optimal viewing on various devices.

## Project Structure
```
RECICLO
├── src
│   ├── pages
│   │   ├── login.html        # HTML structure for the login page
│   │   ├── register.html     # HTML structure for the registration page
│   └── styles
│       ├── login.css         # CSS styles for the login page
│       ├── register.css      # CSS styles for the registration page
├── database
│   ├── admin.sql             # SQL commands to create the admin table
│   ├── buyer.sql             # SQL commands to create the buyer table
├── README.md                 # Project documentation
```

## Setup Instructions
1. Clone the repository to your local machine.
2. Navigate to the project directory.
3. Set up the database using the SQL files located in the `database` folder:
   - Run `admin.sql` to create the admin table.
   - Run `buyer.sql` to create the buyer table.
4. Open `src/pages/login.html` in your web browser to access the login page.
5. Use the registration page at `src/pages/register.html` to create a new account.

## Database Structure
- **Admin Table**: Contains fields for admin credentials and additional information.
- **Buyer Table**: Contains fields for buyer credentials and additional information.

## Contributing
Contributions are welcome! Please submit a pull request or open an issue for any enhancements or bug fixes.

## License
This project is licensed under the MIT License.