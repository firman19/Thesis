// sidebar-3-history
var historyform='<div class="col-sm-12" id="sidebar-historyform">';
  	historyform+='<form id="" style="padding:8px;margin-top:6px;margin-left:6px;background-color:rgba(255, 255, 255, 0.8)!important;">';	       
        historyform+='<div class="form-group col-sm-12">';
          historyform+='<label for="from">Date Time from:</label>';
          historyform+='<input type="text"  name="historyfrom" id="historyfrom" class="form-control form-control-sm text-center " readonly>';
        historyform+='</div>';
        historyform+='<div class="form-group col-sm-12">';
          historyform+='<label for="to">Date Time to:</label>';
          historyform+='<input type="text" name="historyto" id="historyto" class="form-control form-control-sm text-center " readonly>';
        historyform+='</div>';
        historyform+='<div class="col-sm-12 text-center">';
          historyform+='<button type="button" id="btn-get" class="btn btn-primary btn-sm btn-generate">Get</button>';
        historyform+='</div>';
  	historyform+='</form>';
historyform+='</div>';
historyform +='<div class="table-responsive">';
    historyform +='<table  id="" class="table table-striped table-bordered zero-configuration" style="width: 100%;">';
        historyform +='<thead>';
            historyform +='<tr class="row100 head">';
                historyform +='<th>Lat</th>';
                historyform +='<th>Lng</th>';
                historyform +='<th>Hdg</th>';
                historyform +='<th>Datetime</th>';
            historyform +='</tr>';
        historyform +='</thead>';
        historyform +='<tbody>';
          historyform +='<tr>';
            historyform += '<td></td>';
            historyform += '<td></td>';
            historyform += '<td></td>';
            historyform += '<td></td>';
          historyform += '</tr>';
        historyform +='</tbody>';
    historyform +='</table>';
historyform +='</div>';

// sidebar-3-addpanel
sidebar.addPanel({
    id: 'history',                     // UID, used to access the panel
    tab: '<i class="fa fa-repeat"></i>',  // content can be passed as HTML string,
    pane: historyform,        // DOM elements can be passed, too
    title: 'Show Position History',              // an optional pane header
    position: 'top'                  // optional vertical alignment, defaults to 'top'
});