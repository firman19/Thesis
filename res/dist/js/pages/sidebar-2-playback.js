// sidebar-2-playback
var pbform='<div class="col-sm-12" id="sidebar-pbform">';
  pbform+='<form id="form-search-track" style="padding:8px;margin-top:6px;margin-left:6px;background-color:rgba(255, 255, 255, 0.8)!important;">';	       
    pbform+='<div class="form-group col-sm-12">';
      pbform+='<label for="from">Date Time from:</label>';
      pbform+='<input type="text"  name="from" id="pbfrom" class="form-control form-control-sm text-center pbfrom" readonly>';
    pbform+='</div>';
    pbform+='<div class="form-group col-sm-12">';
      pbform+='<label for="to">Date Time to:</label>';
      pbform+='<input type="text" name="to" id="pbto" class="form-control form-control-sm text-center pbto" readonly>';
    pbform+='</div>';
    pbform+='<div class="col-sm-12 text-center">';
      pbform+='<button type="button" id="btn-generate" class="btn btn-primary btn-sm btn-generate">Generate</button>';
    pbform+='</div>';
  pbform+='</form>';
pbform+='</div>';

// sidebar-2-addpanel
sidebar.addPanel({
    id: 'playbackform',                     // UID, used to access the panel
    tab: '<i class="ft-rewind"></i>',  // content can be passed as HTML string,
    pane: pbform,        // DOM elements can be passed, too
    title: 'Playback Generator',              // an optional pane header
    position: 'top'                  // optional vertical alignment, defaults to 'top'
});

// sidebar-playback
$(document).on('focus', ".pbfrom", function() {
  $(this).datetimepicker({
    weekStart: 1,
    todayBtn: true,
    autoclose: true,
    todayHighlight: true,
    pickerPosition: 'bottom-right',
    format: 'yyyy-mm-dd hh:ii'
  })
});

$(document).on('focus', ".pbto", function() {
  $(this).datetimepicker({
    weekStart: 1,
    todayBtn: true,
    autoclose: true,
    todayHighlight: true,
    pickerPosition: 'bottom-right',
    format: 'yyyy-mm-dd hh:ii'
  })
});

$(document).on('focus', "#historyfrom", function() {
  $(this).datetimepicker({
    weekStart: 1,
    todayBtn: true,
    autoclose: true,
    todayHighlight: true,
    pickerPosition: 'bottom-right',
    format: 'yyyy-mm-dd hh:ii'
  })
});

$(document).on('focus', "#historyto", function() {
  $(this).datetimepicker({
    weekStart: 1,
    todayBtn: true,
    autoclose: true,
    todayHighlight: true,
    pickerPosition: 'bottom-right',
    format: 'yyyy-mm-dd hh:ii'
  })
});