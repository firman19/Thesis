var mymap = L.map('mapid').setView([-6.285306, 107.170417], 15);
const base_url="http://"+window.location.hostname+"/thesis/";
L.tileLayer(
	"https://mt1.google.com/vt/lyrs=s&x={x}&y={y}&z={z}",
	{
		minZoom: 3,
        maxZoom: 21,
        id: "google.satellite",
        type: "base",
        name: "GoogleSatellite"
	}
).addTo(mymap);

var j = window.innerHeight;
var k = (j);
var l = window.innerWidth;
document.getElementById("mapid").style.height = k+"px";
document.getElementById("mapid").style.width = "100%";



var destination_list;
$.ajax({
  url : base_url + "/Map/getDestinationList",
  dataType : 'json',
  async : false
}).done(function(data){
  destination_list = data;
});


for(var i=0;i<destination_list.length;i++){
  L.marker([destination_list[i].lat, destination_list[i].lng]).addTo(mymap)
    .bindPopup(destination_list[i].name);
}


var bound=[];

bound.push([-6.285314, 107.170272]);
bound.push([-6.285428, 107.170281]);
mymap.fitBounds(bound,{maxZoom:14});

var ajaxLastPostion = { //Object to save cluttering the namespace.
      options: {
        async: false,
        url: base_url+"/Map/getLastPosition/", //The resource that delivers loc data.
        dataType: "json" //The type of data tp be returned by the server.
      }
  };

var markerGroup = L.layerGroup().addTo(mymap);

getLastPosition();

function getLastPosition(){
    console.log('getting last position..');
    markerGroup.clearLayers();
    $.ajax(ajaxLastPostion.options).done(function(data){
      console.log(data.lat+","+data.lng);
      var latLng = L.latLng(data.lat, data.lng);
      var fillColor='#ff0';
      marker=L.trackSymbol(latLng, {
              trackId: data.id,
              fill: true,
              fillColor: fillColor,
              fillOpacity: 1.0,
              stroke: true,
              color: '#000',
              opacity: 1.0,
              weight: 1.0,
              speed: 0,
              course: 0,
              heading: (data.hdg * Math.PI / 180.0),
              leaderTime:1*1,
            });
        var popup_content = "Vehicle : "+data.name+"</br>";
        popup_content += "Last Update : "+data.time+"</br>";
        popup_content += "Latitude : "+data.lat+"</br>";
        popup_content += "Longitude : "+data.lng+"</br>";
        popup_content += "Heading : "+data.hdg+"</br>";
        marker.bindPopup(popup_content).openPopup().addTo(markerGroup);
        bound.push([data.lat, data.lng]);
        setTimeout(function () {getLastPosition();},10000);
    });
}