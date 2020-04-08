$(document).on('click', '.btn-generate', function(){
  var postdata={};
  postdata.from=$('#pbfrom').val()+":00";
  postdata.to=$('#pbto').val()+":00";
  if(isPlayback){
    isRegeneratePlayback=true;
  }
  sidebar.close();
  initPlayback(postdata);
});

var isRegeneratePlayback=false;
var isPlayback=false;

var ajaxObjPb = { //Object to save cluttering the namespace.
    options: {
      url: base_url+"/Map/getPlayback/", //The resource that delivers loc data.
      dataType: "json", //The type of data tp be returned by the server.
      type: "POST"
      // data:postdata,
      // dataType: 'json'
    },
    delay: 10000, //(milliseconds) the interval between successive gets.
    errorCount: 0, //running total of ajax errors.
    errorThreshold: 5, //the number of ajax errors beyond which the get cycle should cease.
    ticker: null, //setTimeout reference - allows the get cycle to be cancelled with clearTimeout(ajaxObjPb.ticker);
    get: function () { //a function which initiates
      if (ajaxObjPb.errorCount < ajaxObjPb.errorThreshold) {
        // console.log("get function started");
        ajaxObjPb.ticker = setTimeout(getLastPosition, ajaxObjPb.delay);
      }
    },
    fail: function (jqXHR, textStatus, errorThrown) {
      // console.log(errorThrown);
      ajaxObjPb.errorCount++;
    }
};

function initPlayback(_postdata){
	if(isRegeneratePlayback){
		trackplayback.dispose();
		trackplayback=null;
		$('#leaflet-control-playback').remove();
		playbackControl=null;
		isRegeneratePlayback=false;
		initPlayback(_postdata);
	}

  	ajaxObjPb.options.data=_postdata;
    ajaxObjPb.options.dataType='json';
    $.ajax(ajaxObjPb.options).done(function(data){
    	if(data.length>0){
    		markerGroup.clearLayers();
    		if(!isPlayback){
    			isPlayback=true;
    			clearTimeout(getLastPosition);
    		}
	    	locs=data;
	      	var newbound=[];
	      	var pbdata=[];
	      	for (var i = 0; i < locs.length; i++) {
	      		var temp={
	      			lat:parseFloat(locs[i].lat), 
	      			lng:parseFloat(locs[i].lng), 
	      			time:Date.parse(locs[i].time)/1000, 
	      			dir:parseFloat(locs[i].hdg), 
	      			info:[
				      	{key: 'Latitude', value: locs[i]['lat']},
				      	{key: 'Longitude', value: locs[i]['lng']},
				      	{key: 'Time Stamp', value: locs[i]['time']},
	      			]
	      		};

	      		if(temp.lat!='' && parseFloat(temp.lat)<91 && temp.lat!="0.00000000"){
		      		pbdata.push(temp);
		      		newbound.push([locs[i].lat,locs[i].lng]);
		      	}
	      	}
	      	const Options = {
			  // the play options
			  clockOptions: {
			    // the default speed
			    // caculate method: fpstime * Math.pow(2, speed - 1)
			    // fpstime is the two frame time difference
			    speed: 12,
			    // the max speed
			    maxSpeed: 30
			  },
			  // trackPoint options
			  trackPointOptions: {
			    // whether draw track point
			    isDraw: true,
			    // whether use canvas to draw it, if false, use leaflet api `L.circleMarker`
			    useCanvas: true,
			    stroke: false,
			    color: '#ef0300',
			    fill: true,
			    fillColor: '#ef0300',
			    opacity: 0.5,
			    radius: 4
			  },
			  // trackLine options
			  trackLineOptions: {
			    // whether draw track line
			    isDraw: true,
			    stroke: true,
			    color: '#1C54E2',
			    weight: 2,
			    fill: false,
			    fillColor: '#000',
			    opacity: 0.5
			  },
			  // target options
			  targetOptions: {
			    // whether use image to display target, if false, the program provide a default
			    useImg: false,
			    // if useImg is true, provide the imgUrl
			    // imgUrl: imgUrl,
			    // the width of target, unit: px
			    width: 10,
			    // the height of target, unit: px
			    height: 20,
			    // // the stroke color of target, effective when useImg set false
			    // color: '#00f',
			    // // the fill color of target, effective when useImg set false
			    // fillColor: '#9FD12D'
			  }
			}
			mymap.fitBounds(newbound,{maxZoom:14});
	      	trackplayback = L.trackplayback(pbdata, mymap, Options);
		    // Optional  (only if you need plaback control)
		    playbackControl = L.trackplaybackcontrol(trackplayback, {position:'bottomright'});
		    // console.log(playbackControl);
		    playbackControl.addTo(mymap);
		    // $('#leaflet-control-playback').remove();
		    $('#pbControl').append($('#leaflet-control-playback'));
		    if($("#pbControl").children().length>1){
		    	$("#pbControl").children().first().remove();
		    }
			$(document).on('click', '.btn-close', function(){
				// trackplayback.dispose();
				trackplayback=null;
				playbackControl=null;
				isPlayback=false;
				isRegeneratePlayback=false;
				getLastPosition();
			});
		}else{
			Swal.fire({
			  type: 'error',
			  title: 'Oops...',
			  text: 'No Data Found'
			});
		}
   	});
};