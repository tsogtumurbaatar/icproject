app.service('factorService', ['$http', function($http){

    var headers = {
      'Access-Control-Allow-Origin' : '*',
      'Access-Control-Allow-Methods' : 'GET, POST, PUT, DELETE, OPTIONS',
      'Conent-Type' : 'application/json',
      'Accept' : 'application/json'
    };

    this.listfactor = function(){
      return $http({
        method: "GET",
        headers: headers,
        url: "/api/factors"});
    };

    this.removefactor = function(factor){
      return $http({
        method: "POST",
        headers: headers,
        url: "/api/factorsdelete",
        'factor_id': factor.factor_id});
    };

    this.addfactor = function(factor_name, factor_desc){
     return $http({
        method: "POST",
        headers: headers,
        url: "/api/factors",
       'factor_name' : factor_name,
       'factor_desc' : factor_desc});
   };

   this.savefactor = function(factor){
     return $http({
        method: "POST",
        headers: headers,
        url: "/api/factorsput",
       'factor_id': factor.factor_id,
       'factor_name': factor.factor_name,
       'factor_desc': factor.factor_desc});
   };
   
 }]); 
