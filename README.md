# [Sticky Notes v1.9](http://sayakbanerjee.com/sticky-notes)

Sticky notes is a powerful open-source pastebin application. [See it in action](http://paste.kde.org).

License: [BSD 2-clause license](http://www.opensource.org/licenses/bsd-license.php).
&copy; 2014 [Sayak Banerjee](http://sayakbanerjee.com). All rights reserved. [Privacy notice](http://goo.gl/Ba15QZ)

#How do I install it?

## Heroku

1. Create an account at [http://www.heroku.com](http://www.heroku.com)
2. Click here [![Deploy](https://www.herokucdn.com/deploy/button.png)](https://heroku.com/deploy?template=https://github.com/pcon/sticky-notes-quickstart)
3. Click the "View it" link after the app is deployed
4. Click "Test connection" to verify the database connection
5. Click "Start installation" to install the database schema
6. Remember the credentials on this page and click "Proceed to login"
7. Login with the credentials from step 6

## Openshift

1. Create an account at [http://openshift.redhat.com](http://openshift.redhat.com)
2. Create the application
```
rhc app create stickynotes php-5.4 mysql-5.5 --from-code=git://github.com/pcon/sticky-notes-quickstart.git
```
3. Open the URL provided by the rhc application
4. Click "Test connection" to verify the database connection
5. Click "Start installation" to install the database schema
6. Remember the credentials on this page and click "Proceed to login"
7. Login with the credentials from step 6