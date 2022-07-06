$(document).ready(function() {
    

var settings = {
    'cache': false,
    'dataType': "json",
    "async": true,
    "crossDomain": true,
    "url": "https://data.covid19.go.id/public/api/update.json:"+me.originPlaceId+"&destinations=place_id:"+me.destinationPlaceId+"®ion=ng&units=metric&key=mykey",
    "method": "GET",
    "headers": {
        "accept": "application/json",
        "Access-Control-Allow-Origin":"*"
    }
}
$.ajax(settings).done(function (response) {
    console.log(response);
})
})