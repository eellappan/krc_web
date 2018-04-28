 App.service('WebService', function( $http, $q){
  
	

	 /* SEARCH SHOPS 
	  =============================================== */ 
	 this.send_data = function( link , post_data ){
			var self = this;
			
			var deferred = $q.defer();
			
			var url = base_url + link;
			var result = null;
			
			 var req = {
				 method: 'POST',
				 url: url,
				 data: post_data
			}
			
			 
			$http(req).then( 
				function (data){
					// alert(JSON.stringify(data.data));
					deferred.resolve(data.data);		
				},function (error){
				
					deferred.reject();
				}
			);	
		  
		  return deferred.promise;
		 }
		 this.get_data = function( link , post_data ){
			var self = this;
			
			var deferred = $q.defer();
			
			var url = base_url + link +"?"+ $.param(post_data);
			var result = null;
			
			 var req = {
				 method: 'GET',
				 url: url,
			}
			
			 
			$http(req).then( 
				function (data){
					// alert(JSON.stringify(data.data));
					deferred.resolve(data.data);		
				},function (error){
				
					
					deferred.reject();
				}
			);	
		  
		  return deferred.promise;
		 }
		  
	
 })