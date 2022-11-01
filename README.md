# Laravel 7 Playlist Web App

This is a Laravel 7 Web App that has a function of a playlist

# _**App specs:**_
PHP 7.4.32

Laravel 7.x

MySQL 8

Nginx 1.23.1




# _**How to run the app:**_
- The app already contains the dockerfile and docker-compose file so no addition installation but for docker is required.
- Download WSL and Docker
- Go into the directory where the app is located
- Run docker-compose build and docker-compose up or docker-compose up -d to run the program in detached mode. If you aren't running in detached mode then press CTRL+C to stop the app, or go to your Docker application and press Stop container.
- the app is hosted on localhost at port 8000 so be sure to free this port if it's already in use or you can change the port in the .ENV file, do note that you will also have to change the port in the docker-compose file and nginx.conf file should you decide to do so




# _**The app has basic funtionality of a playlist:**_
**1. Add songs to the playlist:**
- Input name of the song, artists' names and the embed link to the song
- The added song will be displayed right in the homepage
- The data inputted will be stored inside 2 databases: artists and links each contain information about the songs and the artists. Since the relationship between 2 databases are many to many, a third database to store the relation between the two databases is required. Repeated data about the artist will not be added to the database again.
- Display a success message after adding into the database and reupdate onto the homepage.

**2. Search songs:**
- Input name of the songs or the artists into the appropriate field, there are two seperate buttons to perform each task accordingly. Results will be displayed right inside the homepage.

**3. Delete songs:**
- Next to the songs displayed in the page there are two buttons: edit button and delete button, clicking the delete button next to the displayed song will delete said result from the links database and at the same time delete the relationship between said song and the artists the song is attached to.

**4. Edit songs:**
- Next to the songs displayed in the page there are two buttons: edit button and delete button, clicking the edit button next to the displayed song will alter information of the said result. Display the update message after and reupdate the record and display it onto the current page.
