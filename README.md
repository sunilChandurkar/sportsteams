Instructions for installing the App Locally.
1. Create a database called teams.
2. git clone https://github.com/sunilChandurkar/sportsteams.git AND composer update
3. Rename .env.example to .env
4. Set database, username, and password
5. Set FOOTBALL_KEY and BASKETBALL_KEY api keys.
6. Run php artisan key:generate
7. Run php artisan cache:clear
8. Run php artisan config:clear
9. Run php artisan migrate
10. Run php artisan vendor:publish --provider="Tymon\JWTAuth\Providers\LaravelServiceProvider"
11. Run php artisan jwt:secret
12. Inside vendor/guzzlehttp/guzzle/src/Client.php in the configureDefaults 
12. function set verify to false so that it does not give an SSL error.
13. Run php artisan getdata:yearly to populate the tables.
14. Run the app php -S 127.0.0.1:8000  -t public/ server.php
15. Send POST request to http://127.0.0.1:8000/api/auth/register
15. with {
             "name": "Sunil Chandurkar",
             "email": "sunil_chandurkar@yahoo.com",
             "password": "xxx"
         }
16. Login by sending POST request to http://127.0.0.1:8000/api/auth/login
16. with {
             "email": "sunil_chandurkar@yahoo.com",
             "password": "xxx"
         }       
17. Copy the token after login.
18. Send POST request to 127.0.0.1:8000/api/setFavoriteTeam with token and
18. this data {
                  "favoriteTeam": "Giants"
              }
19. Send GET request with token to http://127.0.0.1:8000/api/getFavoriteTeam.
20. Should return     {
                          "favorite_team": "Giants"
                      }
21. SEND GET request with token to http://127.0.0.1:8000/api/getBasketballTeams
21. Should return all BasketBall teams.
22. Send GET request with token to http://127.0.0.1:8000/api/getFootballTeams
22. Should return all Football teams.
23. Please feel free to call me at 516.737.8424 if you have any questions about installing this app.
24. Thank You for reading this and have a Happy New Year.                      
                                               
         
         

