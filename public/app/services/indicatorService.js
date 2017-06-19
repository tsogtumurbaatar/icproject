app.service('indicatorService', ['$http', function($http){

    var headers = {
      'Access-Control-Allow-Origin' : '*',
      'Access-Control-Allow-Methods' : 'GET, POST, PUT, DELETE, OPTIONS',
      'Conent-Type' : 'application/json',
      'Accept' : 'application/json'
    };

    this.listindicator = function(){
      return $http({
        method: "GET",
        headers: headers,
        url: "/api/indicators"});
    };

    this.listindicatorbyid = function(segment_id){
    return $http({
        method: "POST",
        headers: headers,
        url: "/api/indicatorsbysegmentid",
        'segment_id': segment_id});
  };

   this.findDictionByID = function(indicator_id){
    return $http({
        method: "POST",
        headers: headers,
        url: "/api/dictionbyindicatorid",
        'indicator_id': indicator_id});
  };

    this.removeindicator = function(indicator){
      return $http({
        method: "POST",
        headers: headers,
        url: "/api/indicatorsdelete",
        'indicator_id': indicator.indicator_id});
    };

    this.addindicator = function(indicator_name, indicator_desc, factor_id, segment_id){
     return $http({
        method: "POST",
        headers: headers,
        url: "/api/indicators",
       'indicator_name' : indicator_name,
       'indicator_desc' : indicator_desc,
       'factor_id' : factor_id,
       'segment_id' : segment_id});
   };

    this.adddiction = function(indicator_id, range1_min, range1_max,range2_min, range2_max,range3_min, range3_max,range4_min, range4_max,range5_min, range5_max){
     return $http({
        method: "POST",
        headers: headers,
        url: "/api/dictions",
       'indicator_id' : indicator_id,
       'range1_min' : range1_min,
       'range1_max' : range1_max,
       'range2_min' : range2_min,
       'range2_max' : range2_max,
       'range3_min' : range3_min,
       'range3_max' : range3_max,
       'range4_min' : range4_min,
       'range4_max' : range4_max,
       'range5_min' : range5_min,
       'range5_max' : range5_max});
   };


   this.saveindicator = function(indicator, factor_id, segment_id){
     return $http({
        method: "POST",
        headers: headers,
        url: "/api/indicatorsput",
       'indicator_id': indicator.indicator_id,
       'indicator_name': indicator.indicator_name,
       'indicator_desc': indicator.indicator_desc,
       'factor_id': factor_id,
       'segment_id': segment_id});
   };

 }]); 
