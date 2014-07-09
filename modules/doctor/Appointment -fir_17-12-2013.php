<?php
include_once("../../conf/config.inc.php");
include_once(MODULES_PATH."/doctor/code/appointment_code.php");
include_once(INCLUDES_DIR."/header.php");
?>
  <script type="text/javascript" src="build/jquery.continuousCalendar-latest-min.js" charset="UTF-8"></script>

<script>
$(document).ready(function(){
	$("#timeCalendar").continuousCalendar({ firstDate:"today" , selectToday: true, theme: 'rounded'});
$("#timeCalendar").bind('calendarChange', function() {
  var container = $(this);
  var startTime = container.find('select[name=tripStartTime]').val();
  var endTime = container.find('select[name=tripEndTime]').val();
  var range = container.calendarRange();
  range = range.withTimes(startTime, endTime);
  container.find('.totalTimeOfTrip').text(DateFormat.formatRange(range, DateLocale.EN)).toggleClass('invalid', !range.isValid());
});
$("#timeCalendar select").bind('change', function() {
  $("#timeCalendar").trigger('calendarChange');
});
$("#timeCalendar select").each(function() {
  for(i = 0; i < 24; i++) {
    $(this).append($("<option>").text(i + ":00")).append($("<option>").text(i + ":30"));
  }
});
$("#intervalTime select").each(function() {
  for(i = 0; i < 5; i++) {
    $(this).append($("<option>").text(i + ":00")).append($("<option>").text(i + ":15"));
  }
});

	$('.calendarBody  tr>td').each(function() {
    var customerId = $(this).attr('date-cell-index');  
   $(this).attr('id',"chandra_"+customerId);
    
 });
 
 function returnMonth (monthString)
 {
 	var dat = new Date('1 ' + monthString + ' 1999');
return dat.getMonth();
 }


  for (var i=0; i < 188; i++) {
 var week= $('#chandra_'+i+'').siblings().html();
var newweek =returnMonth(week);
var valHtml=   $('#chandra_'+i+'').html();
if(parseInt(valHtml)==parseInt(<?php echo $startDay; ?>))
{
 $('#chandra_'+i+'').addClass( "rangeStart" );	
}
if(parseInt(valHtml)>=parseInt(<?php echo $startDay; ?>) && parseInt(<?php echo $endDay; ?>)>=parseInt(valHtml)
 ){
	
	 $('#chandra_'+i+'').addClass( "selected" );
}


 if(parseInt(valHtml)==parseInt(<?php echo $endDay; ?>))
{
 $('#chandra_'+i+'').addClass( "rangeEnd" );	
}   
  };

});
</script>
  <link rel="stylesheet" type="text/css" href="site/styles.css"/>
  <link rel="stylesheet" href="build/jquery.continuousCalendar-latest-min.css" type="text/css" media="all"/>
  <link rel="stylesheet" href="src/main/theme.rounded.css" type="text/css" media="all"/>
<!--| Contant Start |-->
<div class="container">
  <div class="row">
    <div class="span12 edit-pro-bar">
    <div class="span2"><a href="<?php echo MODULE_URL."/doctor/dashboard.php"; ?>">Profile</a></div>
      <div class="span2"><a href="#">Appointments</a></div>
      <div class="span2" style="border:none;"><a href="<?php echo MODULE_URL."/doctor/Accounts.php"; ?>">Accounts</a></div>
      <div class="cls"></div>
    </div>
     <div class="span12 past-app top_do_bg_contant_box">
      <div class="bs-docs-example">
           
            <div class="tab-content" id="myTabContent">
              <div id="Appointment" class="tab-pane fade active in">
               
<div class="section">
 <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" id="test">
  <div id="timeCalendar">
    <input type="hidden" class="startDate" name="tripStartDate"/>
    <input type="hidden" class="endDate" name="tripEndDate"/>

    <h3>Select Days</h3>

    <div class="continuousCalendar"></div>
    <div class="dateLabels">
      <div>
        <label for="starts">Starts</label>
        <span class="startDateLabel"></span>
        <select id="starts" name="tripStartTime"></select>
      </div>
      
      <div>
        <label for="ends">Ends</label>
        <span class="endDateLabel"></span>
        <select id="ends" name="tripEndTime"></select>
      </div>
        <div>
        <label for="ends">Intervel</label>
      <input type="text" name="timeInterval" value="" placeholder="Mintees"  maxlength="2">
      </div>
      <div>
        <label>Duration</label>
        <span class="totalTimeOfTrip"></span>
      </div>
      <div>
         <input type="hidden" name="app" value="1">
     <input type="submit" name="submit" value="SUBMIT">
      </div>
    </div>
  </div>
 </form>
</div>
              </div>
             
            </div>
          </div>
      <div class="cls"></div>
    </div>
</div>
</div>
<!--| Contant End |--> 

<!--| footer Start |-->
<div class="Foot">
    <div class="container">
      <div class="row">
        <div class="span12">
          <div class="span6 Navi3"> <a href="index.html">Home</a> <a href="find-a-doctor.html">Find a Doctor</a> <a href="view-history.html">View History</a> <a href="blog.html">Patient & Doctor Blog</a> <a href="about-us.html">About Us</a>
            <div class="cls"></div>
          </div>
          <div class="span6 Copyright">© 2013 Chat MD All Rights Reserved.</div>
        </div>
      </div>
    </div>
    <div class="cls"></div>
  </div>


<?php include_once(INCLUDES_DIR."/footer.php") ; ?>