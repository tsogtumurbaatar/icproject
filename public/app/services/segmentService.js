app.service('segmentService', ['$http', function($http){

  var headers = {
    'Access-Control-Allow-Origin' : '*',
    'Access-Control-Allow-Methods' : 'GET, POST, PUT, DELETE, OPTIONS',
    'Conent-Type' : 'application/json',
    'Accept' : 'application/json'
  };

  this.listsegment = function(){
    return $http({
        method: "GET",
        headers: headers,
        url: "/api/segments"});
  };

  this.listsegmentbyid = function(factor_id){
    return $http({
        method: "POST",
        headers: headers,
        url: "/api/segmentsbyfactorid",
        'factor_id': factor_id});
  };

  this.removesegment = function(segment){
    return $http({
        method: "POST",
        headers: headers,
        url: "/api/segmentsdelete",
        'segment_id': segment.segment_id});
  };

  this.addsegment = function(segment_name, segment_desc, factor_id){
   return $http({
        method: "POST",
        headers: headers,
        url: "/api/segments",
       'segment_name' : segment_name,
       'segment_desc' : segment_desc,
       'factor_id' : factor_id});
 };

 this.savesegment = function(segment, factor_id){
   return $http({
        method: "POST",
        headers: headers,
        url: "/api/segmentsput",
       'segment_id': segment.segment_id,
       'segment_name': segment.segment_name,
       'segment_desc': segment.segment_desc,
       'factor_id': factor_id});
 };

}]);