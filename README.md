This GitHub repository houses a dynamic database-driven website built with SQL, PHP, and Bootstrap elements. The website allows users to sign up, log in, and interact with project information stored in the database. Key features and functionalities include:

- **User Registration:** Users can register with unique usernames and password confirmation. The registration process includes input validation to ensure that fields are not left blank and that duplicate usernames are not accepted. Users must confirm their passwords to complete registration.

- **User Authentication:** Passwords are securely hashed and stored in the database. During login, the entered password is hashed and compared with the stored hash to authenticate users. Incorrect credentials trigger an error message.

- **Session Management:** Upon successful login, a session is created, and a personalised welcome message is displayed to the user, including their username.

- **Project Management:** Users can view basic information about all projects stored in the database. Users can also search for specific projects using title and start date criteria.

- **Adding Projects:** Authenticated users can add new projects to the database through a simple form. Users who are not logged in and attempt to create a project are redirected to the sign-in screen for authorisation.

- **Updating and Deleting Projects:** Users are only authorised to edit and delete projects for which they have the matching user ID (UID). The system compares the UID of the user in the current session to the UID of the project to ensure authorisation.

- **Logout:** A logout button is available on the project listing page. Clicking it logs the user out and clears any session variables containing user IDs and usernames.

The website prioritises security through input validation and authorisation mechanisms, providing a safe and user-friendly experience for managing and interacting with project data.
