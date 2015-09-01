 [![logo.png][5][6]
 
 > Sell digital files from any host or server
 
 Filesprout is already setup to easily integrate with Dropbox and files on any server. 

 You can Filesprout from within your own website/application using our simple API. Two endpoints are available, to return either a link or complete button html.

 
# Get a link
 
 ```js
 POST	"https://filesprout.com/l/api/1.0/getlink"
 ```

# Get a button
 
 ```js
POST	"https://filesprout.com/l/api/1.0/getbutton"
 ```
 
 Authentication is not required, though we recommend storing API responses in your own application to avoid rate limiting.
 
 Requests are made by sending JSON data to either of the endpoints in the form of a POST request.
 
# Get a button
 
 ```js
 {"name":"Product name","price":"20.00"
 ,"currency":"USD","email":"paypalemail@address.com"
 ,"downloadURI":"http://locationofyourfile/product.pdf"}
 ```
 
 Currency codes are USD, GBP, EUR or JPY.
 
 Filesprout provides all responses, both successful and unsuccessful, in an easy to work with JSON data format. Check out the examples below.
 
# SUCCESSFUL REQUEST: RESPONSE WITH FILESPROUT LINK
 
 ```js
 {"data":"https://filesprout.com/l/WkQVYPS"}
 ```

# UNSUCCESSFUL REQUEST: RESPONSE WITH ERROR MESSAGE
 
 ```js
 {"data":"Null"
 ,"error":"The file is not reachable at that URL"}
 ```

# Resources 
 
 To help you get started we've provided some sample code and links to Filesprout plugins.
 
## Sample Code
 
 - [PHP implementation using CURL][1]

## Plugins
 
 - [RapidWeaver Stack][2]
 - [Google Chrome Application][3]
 - [Mac OS X Application][4]
  
# License
 
 MIT
 
 [1]: https://github.com/yuzoolcode/filesprout-api/blob/master/php-curl.php
 [2]: https://www.yuzoolthemes.com/themes/filesprout/
 [3]: https://chrome.google.com/webstore/detail/filesprout/janifcmcpcenddbcklkdnddgpahodnaa
 [4]: http://www.macupdate.com/app/mac/55160/filesprout
 [5]: https://github.com/yuzoolcode/filesprout-api/blob/master/resources/logo.png
 [6]: https://filesprout.com/l/
