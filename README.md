# Hall-Management-System

## Installation Steps For Windows users

1) Xampp<br>
* Click on this [link](https://www.apachefriends.org/download.html) to download xampp<br>
* To insall xampp, run the downloaded .exe file <br>
* Xampp will be downloaded to C:\xampp , by default.
* Clone or Download Hall-Management-System-master zip file.
* If you have the zip file, extract Hall-Management-System-master folder to C:\xampp\htdocs\ 
* To run website, Hall-Management-System-master folder must be in htdocs.
* Now run Xampp Control Panel

![screen shot of xammp control panel](https://github.com/Ch-Lokesh/Hall_Management_System/blob/main/images/xampp-control-panel.png?raw=true)
* Start Apache and MySql servers<br>

![Screen shot showing servers started](https://github.com/Ch-Lokesh/Hall_Management_System/blob/main/images/xampp-cpanel-running.png?raw=true)



## Database
* Click on the Mysql Admin button or directly go to localhost/phpmyadmin url<br>

* Create a new database by clicking on new, name the database as hms<br>

* Now Click on import, then browse to C:\xampp\htdocs\Hall_Management_System\db\ and Select hms.sql<br>

* Then click go, it will take few minutes to import database.<br>

* After importing the hms database looks like this<br>
![database screen shot](https://github.com/Ch-Lokesh/Hall_Management_System/blob/main/images/database.png?raw=true)

* Now go to [localhost/Hall_Management_System](localhost/Hall_Management_System) url or go to localhost/folder_name, where 
folder_name is the name of folder where website pages were saved.

* Then you will see this page<br>
* Set browser zoom in between (60% - 80%)<br>
![index page](https://github.com/Ch-Lokesh/Hall_Management_System/blob/main/images/index.png?raw=true)
<br>
* To register as Admin, use '123' (without quotes) as unique id (uid);<br>
* login as gmail : lokeshchikkula2000@gmail.com,  pass : legend11 to note all features of (student acc).<br>  
* login as gmail : admin@gmail.com , pass : admin123 to note all features of (admin acc).<br>
<br><br>

## For Linux users

* On linux follow these [instructions](https://phoenixnap.com/kb/how-to-install-xampp-on-ubuntu) to install xampp<br>
* Xampp will be downloaded to /opt/lampp, by default.<br>
* Clone or download repo
* If you have the zip file extract it.<br>
* Open terminal and go to downloads or the folder where you downloaded repo<br>
```
$ cd Download
```
<br>
* Now move the repo to /opt/lampp/htdocs/ <br>

```
$ sudo mv [folder_name] /opt/lampp/htdocs/
```
<br>
* to start apache and sql servers, enter<br>

```
$ sudo /opt/lampp/lampp start
```
<br>

* Enter below command to get writing permistions in htdocs<br>
```
$ sudo chmod -R 777 /opt/lampp/htdocs
```

* Go to localhost/phpmyadmin url<br>
* Now follow the same instructions (mentioned for the windows part) to create the [Database](#database)<br>
* Then open localhost/repo_folder_name example localhost/Hall-Management-System-master<br>
* Set browser zoom in between (60% - 80%)<br>

