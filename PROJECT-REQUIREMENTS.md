# Helpdesk - Project Requirements
## About project
Helpdesk is a web application that allows users add tickets and administrators or technicians manage them. It will be written from scratch and will be using jQuery and Bootstrap frameworks.
Backend will be written with PHP. Frontend will be written in HTML, CSS and JavaScript.

## User roles
There will be several roles and each role will be able to perform some actions.
- Guests
  - Guests will not be able to view any tickets or perform anything special
  - Guests will be able to log in
- Users
  - Users will be able to view their profile with stats and sign out
  - Users will be able to add tickets and view their tickets
- Technicians
  - Technicians will be able to do everything a user will be able
  - Technicians will be able to list, view, comment, close and postpone tickets
  - Technicians will be able to print lists of tickets
- Administrators
  - Administrators will be able to do everything a technician will be able
  - Administrators will be able to assign tickets to technicians
  - Administrators will be able to delete tickets from database
  - Administrators will be able to create, edit and delete accounts
  - Administrators will be able to label users as technicians
  - Administrators will be able to unlock (unblock) accounts
- Super administrator (Root)
  - Super administrator will be able to do everything an administrator will be able
  - Super administrator will be able to label users as administrators

## UI as seen from user's perspective
When the page is loaded a login screen will open up. User will login and the backend will check whether they are administrators, technicians or basic users.

### Login screen
Here is a form that asks the user to enter their username and password and click the submit button to proceed. If credential check is successful it will redirect the user to the home page.
If credential check fails, the user is asked to enter their accurate credentials or contact support (administrators) to unlock their accounts upon identity check.

### Home page
Here are links that link to the user profile, user's own ticket list, to a form to create a new ticket and a sign out button. Here is also listed how many active tickets the user has, how many are waiting
for their response or reaction and how many are postponed, closed or finished.

### User profile
Here is user's name, their location and stats of how many tickets they created.

### User's own ticket list
Here is a list of tickets the user created. There is a search field to search for tickets.

### New ticket form
Here are fields that ask the user to enter the title, description, location and type. Within this form there is also saved the current user id.
At the bottom there is a save / submit button that saves the ticket and later redirects the user to the ticket page (ticket profile).

## UI as seen from technician's perspective
When the page is loaded a login screen will open up. User will login and the backend will check whether they are administrators, technicians or basic users.
Therefore login screen is same in all perspectives.

### Home page
Here is a list of tickets that are opened and sorted by date. Here are also links that allow user to open tickets that were assigned to him, closed tickets or tickets waiting for their reaction.

### Ticket profile
Here is information about the ticket, a form to comment the ticket and links to close and postpone the ticket.

## UI as seen from administrator's perspective
When the page is loaded a login screen will open up. User will login and the backend will check whether they are administrators, technicians or basic users.
Therefore login screen is same in all perspectives.

### Home page
Homepage is same as technician's. But here is link to list all users.

### Ticket profile
Ticket profile is same as in technician's perspective but here is a form to assign the ticket to a technician.

### All users lists
Here is a list of all users with a search field. A filter is available to filter out technicians, administrators and users. When clicked on user's name a user profile will open up.
Here is a link to a new user form.

### New user form
Here is a form with all the information required to create a user.

### User profile
User profile is same as in user's perspective but there is a form that allows to assign the user a role. Here are also links to edit the information and delete the profile.

## User information
- ID (int 16)
- Full name (varchar 255)
- User name (varchar 255)
- Auto generated password (varchar 255)
- Email (varchar 255)
- Role (varchar 255)
- Author ID (int 16)
- Is blocked (int 2 null)

## Ticket information
- ID (int 16)
- Title (varchar 255)
- Description (varchar 255)
- Author ID (int 16)
- Current status (varchar 255)
- Date created (current_timestamp)

## Ticket comments (Each ticket has a table with comments (TICKET_ID-comments))
- ID (int 16)
- Text (varchar 255)
- Author ID (int 16)
- Date created (current_timestamp)
