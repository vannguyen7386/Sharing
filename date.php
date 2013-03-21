<script>
    var dateStr = "11/03/2013";
    var arr_day = dateStr.split("/");
    var day = arr_day[0];
    var month = eval(arr_day[1] - 1);
    var year = arr_day[2];
    var dateStart = new Date(year,month,day);
    var endStr = "12/03/2013";
    var arr_day = endStr.split("/");
    var day = arr_day[0];
    var month = eval(arr_day[1] - 1);
    var year = arr_day[2];
    var dateEnd = new Date(year,month,day);
    
    var fdateTimestamp = getFirstDayOfWeek(dateStart);
    var fdate = new Date(fdateTimestamp);
    var ldateTimestamp = getLastDayOfWeek(dateEnd);
    var ldate = new Date(ldateTimestamp);
    var week = "<table border='1'><tr>";
    week += "<th>Monday</th>";
    week += "<th>Tuesday</th>";
    week += "<th>Wednesday</th>";
    week += "<th>Thursday</th>";
    week += "<th>Friday</th>";
    week += "<th>Saturday</th>";
    week += "<th>Sunday</th>";
    week += "</tr><tr>";
    for (i = fdateTimestamp; i <= ldateTimestamp; i+=1000*3600*24) {
        var day = new Date(i);
        week += "<td>" + new Date(i);
        week += "</td>";
        if(day.getDay() == 0 && i > fdateTimestamp){
            week += "</tr><tr>";
        }
    }
    week +="</tr></table>";
    document.write(week);
    function getFirstDayOfWeek(date_input){
        var dayNumb = date_input.getDay();
        if(dayNumb == 0){
            var firstDate = date_input.getTime() - (1000 * 3600 * 24 * 6);
            return firstDate;
        }else{
            var firstDate = date_input.getTime() - (1000 * 3600 * 24 * (dayNumb - 1));
            return firstDate;
        }
    }
    
    function getLastDayOfWeek(date_input){
        var dayNumb = date_input.getDay();
        if(dayNumb == 0){
            dayNumb = 7;
        }
        
        var lastDate = date_input.getTime()  + (1000 * 3600 * 24 * (7 - dayNumb));
        return lastDate;
        
    }
    
</script>