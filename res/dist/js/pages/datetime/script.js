$(".form_datetime").datetimepicker({
        format: 'yyyy-mm-dd hh:ii',
 		autoclose: true,
        todayBtn: true,
        pickerPosition: "bottom"
    });

$(function () {
        $('#kt_datetimepicker_2').datetimepicker();
        $('#kt_datetimepicker_3').datetimepicker({
            useCurrent: false //Important! See issue #1075
        });
        $("#kt_datetimepicker_2").on("dp.change", function (e) {
        	alert("changed");
            $('#kt_datetimepicker_3').data("DateTimePicker").setminDate(e.date);
        });
        $("#kt_datetimepicker_3").on("dp.change", function (e) {
        	alert("changed_2");
            $('#kt_datetimepicker_2').data("DateTimePicker").setmaxDate(e.date);
        });
    });