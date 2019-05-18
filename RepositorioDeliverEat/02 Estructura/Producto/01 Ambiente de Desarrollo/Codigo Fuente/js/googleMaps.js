function myMap() {
  let mapProp= {
    center:new google.maps.LatLng(-31.441828, -64.193619),
    zoom:15,
  };
  let map = new google.maps.Map(document.getElementById("googleMap"),mapProp);
}
