app = angular.module("KRCapp");

app.controller("KRCController", function ($scope, KRCService, KRCFactory) {
    
            $scope.getUrlparameter = function(){

                var board_point = GetURLParameter('from');
                var drop_point = GetURLParameter('to');
                var date = GetURLParameter('dateJ');
                var dateR = GetURLParameter('dateR');
                post_data  ={'board_point':board_point,'drop_point':drop_point};
                link="API/route/select_bus";
                var promise = KRCService.GET(link,post_data);
                promise.then(function(response)
                { 
                    $scope.getbusdetails = response;
                    $scope.board_point = board_point;
                    $scope.drop_point = drop_point;
                    $scope.dateJ = date;
                    $scope.dateR = dateR;
                    date=new Date(date);
                    today =new Date();
                    if(today<date){
                        
                        $scope.datepre="true";
                    }else{
                        $scope.datepre="false";
                    }
                    $scope.date_slide = date.toISOString();
                    if(dateR!="undefined"){
                        dateRs=new Date(dateR);
                        $scope.date_slideR = dateRs.toISOString();
                        if(date<dateRs){
                                $scope.datenext="false";
                            }else{
                            $scope.datenext="true";	
                            }
                    }else{
                            $scope.datenext="false";
                        }
                    $(".loader").hide();
                })
                _post_data  ={'board_point':board_point,'drop_point':drop_point};
                link="API/route/filter_option";
                var promise = KRCService.GET(link,_post_data);
                promise.then(function(response)
                {
                    $scope.filter = response; 
                    $scope.bus_names =  JSON.parse(response['bus_names']);
                    $scope.bus_types =  JSON.parse(response['bus_types']);
                    $scope.Amenities = JSON.parse(response['Amenities']).substr(1).slice(0, -1);
                    $scope.pointss =  JSON.parse(response['pointss']);
                    $scope.Stoppoint =  JSON.parse(response['Stoppoint']);
                })
            }
        
            $scope.Viewseats= function(item,id)
            {
                 post_data  ={'board_point':$scope.board_point,'drop_point':$scope.drop_point,'route_id':id};
                 link="API/route/select_bus_seats";
                 var promise = KRCService.GET( link,post_data);
                 promise.then(function(response){
                     $scope.viewseats = response;
                     var index = $scope.getbusdetails.indexOf(item);
                   if( $scope.getbusdetails[index].active == true){
                       $scope.getbusdetails[index].active = false;
                   }else{
                      $scope.getbusdetails[index].active = true;
                   }
                 });	
            };
            $scope.odrop='null';
            $scope.name='';
            $scope.ogrey='';
            $scope.Rgrey='Grey';
            $scope.Continue= function(name,id,bus_id)
            {
            
               bus_v =$("#bus"+bus_id+ " .seat_nos").val();
               /*alert(bus_v);*/
                if(!bus_v ){
                    alert("Please select at least 1 seat");
                    return false;
                }
                if(name == undefined){
                    alert("Please select your boarding Point");
                    return false;
                }
                
                $scope.ogrey='';
                $scope.Rgrey='Grey';
                if($scope.odrop == 'null'){
                   //$scope.oseats=new Array();
                    $scope.odrop=name;
                    $scope.ogrey='Grey';
                    $scope.showSkip='true';
                    $scope.Rgrey='';
                    $scope.obus_id=bus_id; 
                    $scope.oseats=$("#seat_nos"+bus_id).val();
                    var oseats=$scope.oseats;
                     lengtho =  oseats.split(',');
                     var lengthss =  lengtho.length;
                     $scope.lengthss=lengthss;
                     //alert($scope.lengths);
                    $scope.oroute_id=id;
                    if($scope.dateR!='undefined'){
                        $scope.returnDetails();
                    }else{
                        $(".loader").show();
                       window.location.href = base_url+"bus1.1.html?from=" +$scope.board_point + "&to=" + $scope.drop_point + "&dateJ=" + $scope.dateJ + "&dateR=" + $scope.dateR+"&0ckc="+$scope.oroute_id +"&0nm="+$scope.lengthss+"&0bpnt="+$scope.odrop+"&0seats="+$scope.oseats+"&0bus_id="+$scope.obus_id+"&Rckc=0&Rnm="+lengthss+"&Rbpnt=0&Rseats=0&Rbus_id=0" ;
                    }
                }
                else{
                    //var seat_nos=new Array();
                    var seat_nos =$("#seat_nos"+bus_id).val();
                    var seat_array = seat_nos.split(',');
                    var length = seat_array.length;
                   
                    //alert(JSON.parse(seat_nos));
                    if($scope.lengthss != length){
                        
                        alert("A maximum of "+$scope.lengthss+" Seats can be selected as in the onward journey ");
                        return false;
                    }
                    
                    $(".loader").show();
                    window.location.href = base_url+"payment/index?from=" +$scope.board_point + "&to=" + $scope.drop_point + "&dateJ=" + $scope.dateJ + "&dateR=" + $scope.dateR+"&0ckc="+$scope.oroute_id +"&0nm="+$scope.oseats.length+"&0bpnt="+$scope.odrop+"&0seats="+$scope.oseats+"&Rckc="+id +"&Rnm="+length+"&Rbpnt="+name+"&Rseats="+seat_nos+"&Rbus_id="+bus_id ;
                    
                }
                
            };

            $scope.Twowaypaymentdetails='';
            $scope.getUrlparameterPayment = function(){
                 
                 $(".loader").show();
                 var board_point = GetURLParameter('from');
                 var drop_point = GetURLParameter('to');
                 var dates = GetURLParameter('dateJ');
                 var dateR = GetURLParameter('dateR');
                 var number = GetURLParameter('Rnm');
                 var oroute_id = GetURLParameter('0ckc');
                 var oboard_id = GetURLParameter('0bpnt');
                 var oseat_no = GetURLParameter('0seats');
                 var Rroute_id = GetURLParameter('Rckc');
                 var Rboard_id = GetURLParameter('Rbpnt');
                 var Rseat_no = GetURLParameter('Rseats');
                  $scope.paymentReturnOneway(board_point,drop_point);
                if(Rroute_id !=0){
                      $scope.paymentReturnOneway2(Rroute_id,Rboard_id);
                  }
                 $scope.board_points = board_point;
                 $scope.drop_points = drop_point;
                 $scope.oboard_id = oboard_id;
                 $scope.oroute_id = oroute_id;
                 $scope.oseat_no = oseat_no;
                 $scope.Rboard_id = Rboard_id;
                 $scope.Rroute_id = Rroute_id;
                 $scope.Rseat_no = Rseat_no;
     
                   $scope.counter = Array;
                 $scope.numberss = parseInt(number);
                 dates=new Date(dates);
                 $scope.dateR=dateR;
                 $scope.dates = dates.toISOString();
                 
                 if(dateR!='undefined'){
                     dateR =new Date(dateR);
                     $scope.Returndates=dateR.toISOString();
                 };
               // post_data  ={'route_id':Rroute_id,'boarding_point_id':boarding_point_id};
                post_data  ={'board_point':board_point,'drop_point':drop_point};
                link="API/route/select_bus_seats";
                var res ="";
                var promise =  KRCService.GET( link,post_data);
                promise.then(function(response){
                 $scope.payment=response.paypals.payment_option;
                 
                  $scope.payoptions =  $scope.payment.split(',');
     
                  angular.forEach($scope.payoptions, function (index,value) {
                      
                     if (index== 'Cash') {
                         $scope.cash_new = true;
                     }
     
                     if(index == 'PayPal'){
                         $scope.pay = true;
                     }
                     
                 })
                });
                 $scope.sums='null';
                 $scope.TotalAmount = function(sum){
                     
                     if($scope.sums=='null'){
                         $scope.sums=sum;
                         $scope.totals =parseInt($scope.sums);
                         //console.log($scope.totals );
                     }else{
                         $scope.totals =parseInt($scope.sums)+parseInt(sum);
                         //console.log($scope.totals );
                     }
                   $(".loader").hide();
                     
                 };
             $(".loader").hide();
                   //}
             };
            // };
            
            $scope.paymentReturnOneway = function(oroute_id,boarding_point_id){
                //alert(oroute_id);
                //post_data  ={'route_id':oroute_id,'boarding_point_id':boarding_point_id};
                post_data  ={'board_point':oroute_id,'drop_point':boarding_point_id};
                link="API/route/select_bus_seats";
                
            var res ="";
                var promise = KRCService.GET( link,post_data);
                promise.then(function(response){
                    $scope.Onewaypaymentdetails=response;
                    $scope.paypaldetails=response.paypals;
                    $scope.TotalAmount($scope.Onewaypaymentdetails[0].fare*$scope.numberss);
                    
                });
                
            };

            $scope.paymentReturnOneway2 = function(Rroute_id,boarding_point_id){
                        //alert(Rroute_id);
                       // post_data  ={'route_id':Rroute_id,'boarding_point_id':boarding_point_id};
                       post_data  ={'board_point':Rroute_id,'drop_point':boarding_point_id};
                        link="API/route/select_bus_seats";
                        
                    var res ="";
                        var promise =  KRCService.GET( link,post_data);
                        promise.then(function(response){
                            $scope.Twowaypaymentdetails=response;
                            $scope.TotalAmount($scope.Twowaypaymentdetails[0].fare*$scope.numberss)
                        });
                
                 };
            $scope.SubmitFunction = function (e) {
                        var formElement = angular.element(e.target);
                        formElement.attr("action", $scope.paypaldetails.paypal);
                        formElement.submit();
                 }; 

            $scope.item ={};
		    $scope.forms={};
		    $scope.userDetails = function(forms) {
                    if ($('#userForm').parsley().validate() ) {
                    console.log($scope.forms);
                    return false;
			             }
                }
           $scope.getNumber = function(num) {
                    //alert(num)
                    console.log(new Array(num));
                 return new Array(num);   
                }
           $scope.hiddenDiv=[];
                
           $scope.showDiv = function (index) {
           $scope.hiddenDiv[index] = !$scope.hiddenDiv[index];
                    
                };
           $scope.timediff = function(start, end){
                  return moment.utc(moment(end).diff(moment(start))).format("mm")
                };
            $scope.previous= function(date)
                {
                    var board_point = GetURLParameter('from');
                    var drop_point = GetURLParameter('to');
                    var dateR = GetURLParameter('dateR');
                    var myDate = new Date(date);
                    
                    var previousDay = new Date(myDate);
                    var today =new Date();
                    if(today<=myDate){
                        $scope.date_slide = previousDay.setDate(myDate.getDate()-1);
                        var dateJ =$filter('date')($scope.date_slide, "MM/dd/yyyy");
                            window.location.href = base_url+"search/index?from=" + board_point + "&to=" + drop_point + "&dateJ=" + dateJ + "&dateR=" +dateR;
                            
                    
                    }
                    
                    
                };
            $scope.next= function(date)
                {
                    var board_point = GetURLParameter('from');
                    var drop_point = GetURLParameter('to');
                    var myDate = new Date(date);
                   
                    var dateR=GetURLParameter('dateR');
         
                    var previousDay = new Date(myDate);
                    if(dateR!='undefined'){
                        var today =new Date(dateR);
                        
                        if(today>myDate){
                            $scope.date_slide = previousDay.setDate(myDate.getDate()+1); 
                             var dateJ =$filter('date')($scope.date_slide, "MM/dd/yyyy");
                         window.location.href = base_url+"search/index?from=" + board_point + "&to=" + drop_point + "&dateJ=" + dateJ + "&dateR=" +dateR;
                        }
                    }else{
                        $scope.date_slide = previousDay.setDate(myDate.getDate()+1);
                         var dateJ =$filter('date')($scope.date_slide, "MM/dd/yyyy");
                         window.location.href = base_url+"search/index?from=" + board_point + "&to=" + drop_point + "&dateJ=" + dateJ + "&dateR=" +dateR;
                    }
                    
                    
                    
                };

                $scope.colourIncludes = []; 
                $scope.colourIncludes1 = [];
                $scope.tags = [];
                $scope.amt =[];
                $scope.drop =[];
                $scope.rates = '';
                $scope.value = '';
                $scope.includedrop = function(drop) {
                        var i = $.inArray(drop, $scope.drop);
                        if (i > -1) {
                            $scope.drop.splice(i, 1);
                            
                        } else {
                            $scope.drop.push(drop);
                            
                        }
                    };
                $scope.includeBus3 = function(amenities) {
                    console.log(amenities);console.log($scope.amt);
                    var i = $.inArray(amenities, $scope.amt);
                    if (i > -1) {
                        $scope.amt.splice(i, 1);
                    } else {
                        $scope.amt.push(amenities);
                    }
                };
                $scope.includeBus = function(bus) {
                    var i = $.inArray(bus, $scope.colourIncludes);
                    if (i > -1) {
                        $scope.colourIncludes.splice(i, 1);
                        console.log($scope.colourIncludes);
                    } else {
                        $scope.colourIncludes.push(bus);
                        console.log($scope.colourIncludes);
                    }
                };
                $scope.includeBus1 = function(bus_type) {
                    var i = $.inArray(bus_type, $scope.colourIncludes1);
                    if (i > -1) {
                        $scope.colourIncludes1.splice(i, 1);
                    } else {
                        $scope.colourIncludes1.push(bus_type);
                    }
                }; 
                 $scope.includeBus2 = function(bpoints) {
                    var i = $.inArray(bpoints,  $scope.tags);
                    if (i > -1) {
                         $scope.tags.splice(i, 1);
                    } else {
                             $scope.tags.push(bpoints);
                    }
                }; 









      
        function GetURLParameter(sParam) {
			var sPageURL = decodeURIComponent(window.location.search.substring(1)),
				sURLVariables = sPageURL.split('&'),
				sParameterName,
				i;

			for (i = 0; i < sURLVariables.length; i++) {
				sParameterName = sURLVariables[i].split('=');

				if (sParameterName[0] === sParam) {
					return sParameterName[1] === undefined ? true : sParameterName[1];
				}
			}
        }
    
    })
