This is a simple application build to insert data into remote database . 
This application runs on localhost and database is created on XAMPP server. 
The database name is user_db and the table name is user_info .
The table contains two column name(varchar(50)) and email(varchar(50)).
Inorder to insert into databse we have to write a php script and its name is update_info.php
Add a dependency in gradle for using volley library 
	
	compile 'com.mcxiaoke.volley:library:1.0.19'

Than we create a stringRequest in java file.
Inorder  to send data along with onResponse() and onErrorResponse() we have to overrie another method getParams() .
This will return string value pair in type of Hashmap.
Than by using the map variable use the method put 
	
	params.put("name",name);
    params.put("email",email);

Inorder to add this string request to requestQueue there are several methods but we will add it to requestQueue using a new class Singelton.
And than add the stringRequest to requestQueue.