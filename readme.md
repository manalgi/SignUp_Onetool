# SIGN UP - ONETOOL <br /> <br />

register with user name and email which will be saved in the DB. and then shows all the users.<br /><br />


## Getting Started <br /> <br />

+database configuration: go to application/config/database and set according to your environment<br />
+there is an additional ready sql DB table to be imported<br />
+for execution the url is  http://yourURL.com/index.php/user or  http://yourURL.com/index.php/user , change the yourURL.com with your URL <br />
+enter a valid and existing email with name and check it out. <br />
+add your own kickbox API_key , recaptcha API_key and secert_key in application/config/config under the variables $config["kickbox_API_key"], $config["google_key"] and $config["google_secert"]


## Built With
<br /><br />
* [CodeIgniter](https://codeigniter.com/download)<br />
* [Kickbox](https://kickbox.com/) -verification for real email<br />
* [recaptcha](https://www.google.com/recaptcha/intro/v3.html) - for scurity<br />
