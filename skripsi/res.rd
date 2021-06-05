Deploy
http://www.aaravtech.com/articles/django-2/deploy-django-web-application-using-nginx-gunicorn-and-supervisor-in-ubuntu
======================================================================================================================
In this tutorial, you will learn about deployment on Ubuntu desktop or Ubuntu server using following technologies

Nginx
Gunicorn
Supervisor.
Setup new or existing project
To start new project, create virtual environment using following commands. You can create virtual environment wherever you want but I would suggest to create parallel to you project folder. (For existing project)
======================================================================================================================
sudo apt install python-virtualenv 
Virtualenv -p python3 venv 
source venv/bin/activate 
======================================================================================================================
Install django to start new project in Django
======================================================================================================================
pip install django==2.1 
Start new project with name "demo"
======================================================================================================================
django-admin startproject demo 
======================================================================================================================
Change directory to your project folder and install all the python dependencies (For existing project)
======================================================================================================================
cd demo 
pip install -r requirements.txt 
======================================================================================================================
Migrate database
======================================================================================================================
python manage.py migrate 
======================================================================================================================
Collect all static/media files of all apps into one directory to server using Nginx and to do that following parameters must be set in settings.py
======================================================================================================================
STATIC_ROOT = "<Project directory>/static"
MEDIA_ROOT= "<Project directory>/media"
======================================================================================================================
python manage.py collectstatic 
======================================================================================================================
Now your project is ready to run, so let's try once by hitting following command,
======================================================================================================================
python manage.py runserver 
======================================================================================================================
Check on browser with localhost:8000 URL. If it works fine then let's go for next step.

Install Gunicorn and make ready to serve the Django application
Activate your python environment if you haven't.
======================================================================================================================
source venv/bin/activate 
Install Gunicorn python package
======================================================================================================================
pip install gunicorn 
======================================================================================================================
Let's check Gunicorn by serving Django application using command
======================================================================================================================
gunicorn demo.wsgi:application -bind localhost:8000 
======================================================================================================================
Test in browser with the same URL and If it works fine then let's move further and make script with more parameters, so that can be used as service.

Create folder deployment in your project folder and inside that create one file named gunicorn_service, so that file can be tracked along with your project code. Copy following content to this file and save it.
======================================================================================================================
#!/bin/bash 

NAME="demo"                                 # Name of the application 
DJANGODIR=/home/hardik/projects/demo            # Django project directory 
SOCKFILE=/home/hardik/projects/demo/run/gunicorn.sock # we will communicte using this unix socket 
USER=hardik                                       # the user to run as 
GROUP=hardik                                    # the group to run as 
NUM_WORKERS=3                                    # how many worker processes should Gunicorn spawn 
DJANGO_SETTINGS_MODULE=demo.settings            # which settings file should Django use 
DJANGO_WSGI_MODULE=demo.wsgi                    # WSGI module name 

echo "Starting $NAME as `whoami`" 

# Activate the virtual environment 
cd $DJANGODIR 
Source ../venv/bin/activate 
export DJANGO_SETTINGS_MODULE=$DJANGO_SETTINGS_MODULE 
export PYTHONPATH=$DJANGODIR:$PYTHONPATH 

# Create the run directory if it doesn't exist 
RUNDIR=$(dirname $SOCKFILE) 
test -d $RUNDIR || mkdir -p $RUNDIR 

# Start your Django Unicorn 
# Programs meant to be run under supervisor should not daemonize themselves (do not use --daemon) 
exec /home/hardik/projects/venv/bin/gunicorn ${DJANGO_WSGI_MODULE}:application \ 
 --name $NAME \ 
 --workers $NUM_WORKERS \ 
 --user=$USER --group=$GROUP \ 
 --bind=$SOCKFILE \ 
 --log-level=debug \ 
 --log-file=- 
======================================================================================================================
In above file, you need to change user, group and path of project. If you want to change those paths according to your structure then just make sure that you have the permission to create and read the files wherever required.

Further let's test this script by using following two commands
======================================================================================================================
chmod +x /home/hardik/projects/demo/deployment/gunicorn_start 
bash /home/hardik/projects/demo/deployment/gunicorn_start 
======================================================================================================================
If there is no error printed in console that means script is running successfully. Let's move to next step setting up this script as service.

Setup script as startup service using Supervisor.
Let's install supervisor first
======================================================================================================================
sudo apt install supervisor 
======================================================================================================================
Now create one file /etc/supervisor/conf.d/demo_gunicorn.conf and paste following code to that file.
======================================================================================================================
[program:demo] 
command = /home/hardik/projects/demo/deployment/gunicorn_start          ; Command to start app 
user = hardik                                                                                     ; User to run as 
stdout_logfile = /home/hardik/projects/demo/logs/gunicorn_supervisor.log  ; Where to write log messages 
redirect_stderr = true                                                                        ; Save stderr in the same log 
environment=LANG=en_US.UTF-8,LC_ALL=en_US.UTF-8 
======================================================================================================================
Enable the service under supervisor and then start the service which we have created.
======================================================================================================================
sudo supervisorctl update 
sudo supervisorctl reload 
======================================================================================================================
Check out the log file in logs folder under project folder and log must be similar as follows

[2018-11-22 10:21:23 +0530] [20860] [INFO] Starting gunicorn 19.9.0 
[2018-11-22 10:21:23 +0530] [20860] [DEBUG] Arbiter booted 
[2018-11-22 10:21:23 +0530] [20860] [INFO] Listening at: unix:/home/hardik/projects/demo/run/gunicorn.sock (20860) 
[2018-11-22 10:21:23 +0530] [20860] [INFO] Using worker: sync 
[2018-11-22 10:21:23 +0530] [20866] [INFO] Booting worker with pid: 20866 
[2018-11-22 10:21:24 +0530] [20868] [INFO] Booting worker with pid: 20868 
[2018-11-22 10:21:24 +0530] [20870] [INFO] Booting worker with pid: 20870 
[2018-11-22 10:21:24 +0530] [20860] [DEBUG] 3 workers 
======================================================================================================================
Let's setup Nginx for service static files and passing backend requests to Django application through Gunicorn.
Gunicorn is already running one upstream server and now we need to use that upstream in to nginx to create link between two. So let's move to the first step of installation

Install nginx
======================================================================================================================
sudo apt install nginx 
======================================================================================================================
Create new configuration file /etc/nginx/sites-avaiable/demo for demo project and paste following configuration in to the file.
======================================================================================================================
upstream demo_app_server { 
 # fail_timeout=0 means we always retry an upstream even if it failed 
 # to return a good HTTP response (in case the Unicorn master nukes a 
 # single worker for timing out). 

 server unix:/home/hardik/projects/demo/run/gunicorn.sock fail_timeout=0; 
} 

server { 

   listen  80; 
    server_name [demo.com](http://demo.com); 

    client_max_body_size 4G; 

    access_log /home/hardik/projects/demo/logs/nginx-access.log; 
    error_log /home/hardik/projects/demo/logs/nginx-error.log; 

   location /static/ { 
       alias   /home/hardik/projects/demo/static/; 
   } 

   location /media/ { 
        alias  /home/hardik/projects/demo/media/; 
   } 

   location / { 
        proxy_set_header X-Forwarded-For $proxy_add_x_forwarded_for; 
        proxy_set_header Host $http_host; 
        proxy_redirect off; 

       # Try to serve static files from nginx, no point in making an 
       # *application* server like Unicorn/Rainbows! serve static files. 
       if (!-f $request_filename) { 
            proxy_pass [http://demo_app_server](http://demo_app_server); 
           break; 
       } 
   } 
} 
======================================================================================================================
Now let's disable default nginx configuration and enable this demo app.
======================================================================================================================
sudo rm /etc/nginx/sites-enabled/default 
sudo ln -s /etc/nginx/sites-available/demo /etc/nginx/sites-enabled/demo 
======================================================================================================================
Restart Nginx and test the application in browser using http://localhost or http://127.0.0.1/
======================================================================================================================
sudo service nginx restart 
======================================================================================================================
Bravo, You have successfully deployed Django application by yourself. Good Job !!
======================================================================================================================
