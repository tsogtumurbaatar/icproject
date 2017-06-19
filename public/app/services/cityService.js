app.service('cityService', ['$http', function($http){

    var headers = {
      'Access-Control-Allow-Origin' : '*',
      'Access-Control-Allow-Methods' : 'GET, POST, PUT, DELETE, OPTIONS',
      'Conent-Type' : 'application/json',
      'Accept' : 'application/json'
    };

    this.listCities = function(){
      return $http({
        method: "GET",
        headers: headers,
        url: "/api/cities"});
    };

    this.removeCity = function(city){
      return $http({
        method: "POST",
        headers: headers,
        url: "/api/citiesdelete",
        'city_id': city.city_id});
    };

    this.addCity = function(city_name, city_desc, city_lat, city_long){
     return $http({
        method: "POST",
        headers: headers,
        url: "/api/cities",
       'city_name' : city_name,
       'city_desc' : city_desc,
       'city_lat' : city_lat,
       'city_long' : city_long});
   };

   this.saveCity = function(city){
     return $http({
        method: "POST",
        headers: headers,
        url: "/api/citiesput",
       'city_id': city.city_id,
       'city_name': city.city_name,
       'city_desc': city.city_desc,
       'city_lat': city.city_lat,
       'city_long': city.city_long});
   };
   
 }]); 
