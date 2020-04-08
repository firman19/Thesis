// sidebar-3-user
var userpane = '<div class="col-sm-12 sidebar-pbform" id="userpane">';
    userpane += '<div class="form-group col-sm-12" style="margin-top:10px;">';
        userpane += '<a class="btn btn-primary" href="'+base_url+'auth/logout" style="color:white;"> Logout </a>';
    userpane += '</div>';
userpane += '</div>';

//sidebar-3-addpanel
sidebar.addPanel({
    id: 'user',                     // UID, used to access the panel
    tab: '<i class="fa fa-user"></i>',  // content can be passed as HTML string,
    pane: userpane,        // DOM elements can be passed, too
    title: 'User',              // an optional pane header
    position: 'top'                  // optional vertical alignment, defaults to 'top'
});