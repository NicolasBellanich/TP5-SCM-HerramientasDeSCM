function myMap() {
  let myLatlng = new google.maps.LatLng(-31.441828, -64.193619);
  let mapProp= {
    center: myLatlng,
    zoom:15,
  };
  let map = new google.maps.Map(document.getElementById("googleMap"),mapProp);

  let marker = new google.maps.Marker({
    position: myLatlng,
    map: map,
    draggable:true,
    title:"Mueveme!"
  });
}
