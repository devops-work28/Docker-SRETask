##Brief
We have a problem in our production container image, please help us fix it. It should have a working apache php environment running 
through fcgi.  
 
Please document everything you found and how you fixed it.
 
1. Please pull down the container image.  
`docker pull roundrobintreegenerator/itech_media_sre_test`
2. Run the container.   
`docker run -p80:80 -it roundrobintreegenerator/itech_media_sre_test`
3. There are a number of things not working with the container that you will
fix before continuing on to the next steps.
 
Once you have got the page running in the browser.
 
1. You will need to figure out why the `index.php` in `/var/www/html` 
is not working.
2. Once working you will need to make the date time display as follow:  
`Monday the 9th of September 2019 - 14:44:26`  
3. Get the ip address display working.
4. Get the source code to be displayed.
 
 
1. Write a Dockerfile to replace apache2 with nginx. 
 
2. Run both apache and nginx in sequence 
`nginx -> apache -> php`