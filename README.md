# F3STIVALS - EVENT MANAGER

Welcome to F3STIVALS - Event Manager, a tool for organizing and keeping track of events.

## Table of Contents
* [Launching the application](#launching-the-application)
* [Technologies and Features Used](#technologies-and-features-used)
* [General Information](#general-information)
* [Demo](#demo)


## Launching the application
To run the application, you must have Docker downloaded. Set the variables in the .env file.
In the console, enter the command `docker-compose up` and go to the browser to *http://localhost:8080/*

## Technologies and Features Used
- Docker
- NGNIX - version 1.17.8-alpine
- PHP - version 8.2.0-fpm-alpine3.17
- PostgreSQL database
- JavaScript
- HTML, CSS
- Routing
- View for desktop and mobile
- Session
- Fetch API


## General Information
F#STIVALS is a tool that allows users to organize and keep track of events such as concerts, hackathons and more.
With F3STIVALS users can:
* [Create and login to your account](#create-and-login-to-your-account)
* [Add events](#add-events)
* [See a list of all events](#see-a-list-of-all-events)
* [Mark participation in an event](#mark-participation-in-an-event)
* [See a list of your own events](#see-a-list-of-your-own-events)
* [Searching for events](#searching-for-events)
* [Get notifications about events](#get-notifications-about-events)
* [Get notifications about updates from your friends](#get-notifications-about-updates-from-your-friends)
* [Change your account settings](#change-your-account-settings)
* [Admins can delete events](#admins-can-delete-events)

### Create and login to your account
To create an account, click on 'Register' in the login menu.
You will be prompted to enter your name, surname, username, email and password.
Once you have entered the information, click "Register" to create an account.

### Add events
To add an event, click the 'Add event' button in the top menu.
You will be prompted to enter the event's title, description, location, date and image.
Once you have entered the information, click "Send" to add the event to your list.

### See a list of all events
To see a list of all events, click the 'Events' button in the navigation bar.
This will show you a list of all the events available in the application,
along with the title, description, location, date and image.

### Mark participation in an event
You can mark participation in an event by clicking on the buttons at the bottom of the event view.
The events you will attend will be shown in the 'My Events' section.

### See a list of your own events
To see a list of your own events, click the 'My events' button in the navigation bar.
This will show you a list of all the events you have added and events you have declared to attend,
along with the title, description, location, date and image.

### Searching for events
You can search for events by title or description by using the search bar in the top menu.
Simply enter the title or description of the event you are looking for.
The results will be displayed in a list, with the most relevant events shown first.

### Get notifications about events
You can see your notifications by clicking the 'Notices' button in the navigation bar.
This will show you a list of events that will take place in less than a week.

### Get notifications about updates from your friends
You can see your friends notifications by clicking the 'Friends' button in the navigation bar.
This will show a list of events where you and your friends will be attending.

### Change your account settings
You can change your account details by clicking the 'Settings' button in the navigation bar.
You will be prompted to enter your name, surname, username, email and password.
Once you have entered the information, click 'Save' to change your account details.

### Admins can delete events
As an administrator, you can delete events by clicking the 'Admin' button in the navigation bar,
specifying events id and clicking 'Delete'.

# Demo
![Alt text](public/img/29-12-2022%20%2018-26.gif)


#### We hope you enjoy using F3STIVALS!<br>
![Logo](public/img/logo.svg)

















