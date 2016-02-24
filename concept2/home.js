app.controller('listings_controller',function($scope,$http){
        
        $scope.post_listing=function(){
                document.getElementById('message').textContent='';
                var request=$http({
                        method:'post',
                        url:'postdata.php',
                        data:{
                                label:$scope.label
                        },
                        headers:{'Content-Type':'multipart/form-data'}
                });
                
                request.success(function(data){
                       document.getElementById('message').textContent=data.message;                
                });
        }
});