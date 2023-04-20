<div align="center">
 
</div>


# Weather app


Site utilizes the openweathermap API to provide accurate and up-to-date weather forecasts for cities all around the world. Here's a quick guide on how to use our site:

Registration and Login:
To fully utilize site, registering for an account. Once registered, you'll be able to save your favorite cities and access your search history. If you're already registered, simply log in with your email and password.

Search for a City:
Once you're logged in, you can search for a city by entering the city name in the search bar at the top of the page. The website will automatically display the current weather

Search History:
If you want to revisit a city that you searched for previously, you can access your search history by in chapter "History". Your search history will display the last 5cities you searched for.

Background Image:
website has a unique feature where the background image of the site changes based on the weather in the city you searched for. For example, if it's raining in London, the background image will display a picture of a rainy day.

<hr/>

### Postman documentation  
[view](https://documenter.getpostman.com/view/12599375/2s93CKQErt/)

# installation
```
.env.example -> .env
add VITE_APP_API/OPEN_WEATHER_KEY/GOOGLE_PLACES_API
composer install
php artisan key:generate
npm install
php artisan migrate
npm run dev
```
