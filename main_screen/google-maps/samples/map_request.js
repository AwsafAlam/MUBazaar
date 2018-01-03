



function initMap(address, locationObject, branchLatitude, branchLongitude){
    // console.log(address);
    // console.log(locationObject);



    // var origin1 = new google.maps.LatLng(55.930384, -3.118425);
    var origins = [];

    var origin1 = new google.maps.LatLng(23.631213, 90.488277);// 23.631213, 90.488277
    // origins.push(origin1);
    // var origin2 = 'Greenwich, England';
    // var destinationA = 'Stockholm, Sweden';


    for(var i = 0; i < branchLatitude.length; i++){
        origins.push(new google.maps.LatLng(branchLatitude[i], branchLongitude[i]));
    }


    var destinationB = new google.maps.LatLng(locationObject.latitude, locationObject.longitude);

    var service = new google.maps.DistanceMatrixService();

    var distanceMatrixRequest = {
        origins: origins,
        destinations: [destinationB],
        travelMode: 'DRIVING'
    };

    // console.log(distanceMatrixRequest.origins);



    service.getDistanceMatrix(
        distanceMatrixRequest
        , callback);

    function callback(response, status) {
        if (status == 'OK') {
            var origins = response.originAddresses;
            var destinations = response.destinationAddresses;

            for (var i = 0; i < origins.length; i++) {
                var results = response.rows[i].elements;

                try{
                    if(results.length > 0){
                        var element = results[0];
                        var distance = element.distance.text;
                        var duration = element.duration.text;
                        var from = origins[i];
                        var to = destinations[0];

                        console.log(distance);
                        console.log(duration);
                        console.log(origins);
                        console.log(destinations[0]);

                        document.getElementById('distance_output').innerHTML = '<p>' + origins + ' to ' + destinations + ' Traveling Distance: ' + distance   +  '</p>';
                    }
                }
                catch (e){
                    document.getElementById('distance_output').innerHTML = '<p>' +  'Sorry, MUBazaar is unable to reach your picked location. ' +'</p>';
                }


                // for (var j = 0; j < results.length; j++) {
                //     var element = results[j];
                //     var distance = element.distance.text;
                //     var duration = element.duration.text;
                //     var from = origins[i];
                //     var to = destinations[j];
                //
                //     console.log(element);
                // }


            }
        }
    }







}