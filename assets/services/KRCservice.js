
(function (app) {

    var tenant =
                  [  
                      {
                          Id : 1,
                          FirstName: "Jose",
                          LastName: "Vowels",
                          Company: "ACME",
                          JobTitle: "Marine electronics technician",
                          BusinessPhone: "5593346999",
                          HomePhone: "5468546525",
                          MobilePhone: "8525646587",
                          FaxNumber: "9785465854",
                          Street: "600 Caisson Hill Road ",
                          City: "Smoky Hill",
                          State: "Texas",
                          Country: "USA",
                          Email: "PamelaJCallaghan@rhyta.com",
                          WebPage: "JesseAIrvine.dayrep.com",
                          Notes: " "                          
                      },
                      {
                           Id : 2,
                           FirstName: "Andrew",
                           LastName: "Mowry",
                           Company: "ACME",
                           JobTitle: "Software Developer",
                           BusinessPhone: "465478987",
                           HomePhone: "4658978878",
                           MobilePhone: "6987984658",
                           FaxNumber: "3235654658",
                           Street: "2104 Melm Street",
                           City: "Providence",
                           State: "rhode island",
                           Country: "USA",
                           Email: "ClydeRPrice@jourrapide.com",
                           WebPage: "ClydeRPrice.jourrapide.com",
                           Notes: " "
                       },
                        {
                            Id: 3,
                            FirstName: "Milton",
                            LastName: "White",
                            Company: "ACME",
                            JobTitle: "Sawing machine tender",
                            BusinessPhone: "9879855465",
                            HomePhone: "6547898787",
                            MobilePhone: "2325659658",
                            FaxNumber: "4658798854",
                            Street: "1214 Charles Street",
                            City: "Southfield",
                            State: "Florida",
                            Country: "USA",
                            Email: "JohnGHaines@armyspy.com",
                            WebPage: "FurnishingExperts.com",
                            Notes: " "
                        },
                  ];


    var KRCFactory = function () {
        var KRCFactory = {};
        
        KRCFactory.getTenant = function (index) {
            var returnTenant = [];
            if (tenantFactory.isOverflow(index))
            {
                index = 0;
            }
            returnTenant.push(tenant[index]);
            return returnTenant;
        };

        KRCFactory.isOverflow = function (index){

            return (tenant.length <= index)
        };

        KRCFactory.addTenant = function (index) {
            var returnTenant = [];
            var newIndex = tenant.length + 1;
            tenant.push(KRCFactory.newItem(newIndex));
            returnTenant.push(tenant[tenant.length -1]);
            return (returnTenant)
        };

        KRCFactory.deleteTenant = function (index) {
            var returnTenant = [];

            tenant.splice(index,1);
           if (tenant.length <= index)
           {
               index = tenant.length -1;
           }
            returnTenant.push(tenant[index]);
            return (returnTenant)
        };

        KRCFactory.newItem = function (index) {

            var newItem = {

                Id: index,
                FirstName: "",
                LastName: "",
                Company: "",
                JobTitle: "",
                BusinessPhone: "",
                HomePhone: "",
                MobilePhone: "",
                FaxNumber: "",
                Street: "",
                City: "",
                State: "",
                Country: "",
                Email: "",
                WebPage: "",
                Notes: ""
            }
            return newItem;

        }

        return KRCFactory;
    };
    app.factory("KRCFactory", KRCFactory);
  app.service("KRCService",function( $http, $q)
  {
      this.GET = function(link, data){
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

  }
)
}(angular.module("KRCapp",[])));