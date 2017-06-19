app.controller("mySegmentController", function($scope, factorService, segmentService){

  getSegmentsCont();
  $scope.itemsPerPageVal = 10;
  $scope.statusval = '';

  function getSegmentsCont() {
    segmentService.listsegment()
    .then(function (response) {
      $scope.segments = response.data;
    }, function (error) {
      $scope.status = 'Unable to load customer data: ' + error.message;
    });
  };

 $scope.insertSegmentCont = function() {
  
      var flag = 1;
    
     if(!$scope.new_segment_name)
      {
       flag = 0;
       window.alert('The segment name is empty!');
      }
 
    if(!$scope.selectedFactor)
      {
       flag = 0;
       window.alert('The factor is empty!');
      }
 

      if(flag)
      {
      segmentService.addsegment($scope.new_segment_name, $scope.new_segment_desc, $scope.selectedFactor.factor_id)
     .then(function(response){ 
        $scope.statusval = 'success_newsegment';
        $scope.segments.push(response.data);
      });
    }
   };

$scope.insertSegmentBefortCont = function()
   {
    factorService.listfactor()
    .then(function (response) {
      $scope.factorlist = response.data; });

    $scope.new_segment_name = '';
    $scope.new_segment_desc = '';
    $scope.statusval = '';
  };

  $scope.deleteSegmentCont = function(segment){
      var result = confirm("Are you sure delete this record?");
      if (result) {
       segmentService.removesegment(segment)
       .then(function(response){ 
        var index=$scope.segments.indexOf(segment)
        $scope.segments.splice(index,1);
      });
     };
   };  


   $scope.saveSegmentCont = function(row_index) {
     segmentService.savesegment($scope.editsegment, $scope.editFactor.factor_id)
     .then(function(response){ 
      $scope.statusval = 'success_editsegment';
      $scope.segments[row_index] = angular.copy(response.data);
      // $scope.segments[row_index] = angular.copy($scope.editsegment);
     });
   };


   $scope.editSegmentCont = function(segment, index)
   {
   factorService.listfactor()
    .then(function (response) {
      $scope.factorlist = response.data; });

    $scope.editsegment = angular.copy(segment);
   
    $scope.row_index = index;
    $scope.statusval = '';
  };

  $scope.sort = function(sortkey){
    $scope.sortkey = sortkey;
    $scope.reverse = !$scope.reverse;

  };

});