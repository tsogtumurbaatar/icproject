app.service('datapointService', ['$http', function($http){

    var headers = {
      'Access-Control-Allow-Origin' : '*',
      'Access-Control-Allow-Methods' : 'GET, POST, PUT, DELETE, OPTIONS',
      'Conent-Type' : 'application/json',
      'Accept' : 'application/json'
    };

    this.listdatapoint = function(){
      return $http({
        method: "GET",
        headers: headers,
        url : "/api/datapoints"});
    };

    this.removedatapoint = function(datapoint){
      return $http({
        method: "POST",
        headers: headers,
        url: "/api/datapointsdelete",
        'data_id': datapoint.data_id});
    };

    this.adddatapoint = function(data_point, city_id, factor_id, segment_id, indicator_id){
     return $http({
        method: "POST",
        headers: headers,
        url: "/api/datapoints",
       'data_point' : data_point,
       'city_id' : city_id,
       'factor_id' : factor_id,
       'segment_id' : segment_id,
       'indicator_id' : indicator_id});
   };

   this.savedatapoint = function(datapoint){
     return $http({
        method: "POST",
        headers: headers,
        url: "/api/datapointsput",
       'data_id': datapoint.data_id,
       'data_point': datapoint.data_point});
   };

 }]); 
