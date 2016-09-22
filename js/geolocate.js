addEventListener('load',initiate);
function initiate(){
    var get = document.getElementById('getlocation');
    get.addEventListener('click',getlocation);
}
function getlocation(){
    navigator.geolocation.getCurrentPosition(showinfo);
}
function showinfo(position){


var location = document.getElementById('location');
var mapurl = 'https://maps.google.com/maps/api/staticmap?center='
    +position.coords.latitude+','
    +position.coords.longitude+'&zoom=12&size=1400x1400&sensor=false&markets='
    +position.coords.latitude+','
    +position.coords.longitude
    +'&key= 918d875b291ad870f055f5fcc7d31ffd583fde00';
location.innerHTML = "<img src="+mapurl+" width='400px' headth='400px'>";
}