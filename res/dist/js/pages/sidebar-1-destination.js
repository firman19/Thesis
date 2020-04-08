
// sidebar-1-destination
var destpane = '<div class="col-sm-12" id="destinationform">';
    destpane += '<div class="form-group col-sm-12" style="margin-top:10px;">';
        destpane += '<label>Destination</label>';
        destpane += '<select class="form-control form-control-sm" id="destination">';
        for (var i=0;i<destination_list.length;i++){
            destpane += '<option value="'+destination_list[i].id+'">'+destination_list[i].name+'</option>';
        }
        destpane += '</select><br>';
    destpane == '</div>';
    destpane+='<div class="col-sm-12 text-center">';
        destpane += '<button class="btn btn-primary" onclick="setDest()">Send</button>';
    destpane+='<div class="col-sm-12 text-center">';
destpane += '</div>';

// sidebar-1-addpanel
sidebar.addPanel({
    id: 'destinationform',                     // UID, used to access the panel
    tab: '<i class="fa fa-flag"></i>',  // content can be passed as HTML string,
    pane: destpane,        // DOM elements can be passed, too
    title: 'Set Destination',              // an optional pane header
    position: 'top'                  // optional vertical alignment, defaults to 'top'
});

// sidebar-1
function setDest(){
    val = $('#destination').val();  
    var postdata = 'destination_id=' + val; 
    var posturl = base_url+'Map/setDest';
    $.ajax({
        type: "POST",
        url: posturl,
        data: postdata,
        success: function(data){
            Swal.fire({
              title: 'Success!',
              text: 'Destination is set!',
              type: 'success'
            });
        },
        error: function(){
            Swal.fire({
              type: 'error',
              title: 'Oops...',
              text: 'Please select another destination',
            });
        }
    });
}