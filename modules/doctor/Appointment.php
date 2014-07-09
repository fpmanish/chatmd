<?php
include_once("../../conf/config.inc.php");
include_once(MODULES_PATH."/doctor/code/appointment_code.php");
include_once(INCLUDES_DIR."/header.php");

?>
<link rel="stylesheet" href="<?php echo CSS_URL ;?>/jquery.ptTimeSelect.css" type="text/css"/>
<style>
	.offcal{
		border-color: #B5C2CA #B5C2CA #CCCCCC;
    border-radius: 5px 5px 0 0;
    border-style: solid;
    border-width: 1px;
    box-shadow: 0 1px 0 #F9FFFF inset;
	}
</style>
<?php echo jscripts::script("jquery.ptTimeSelect.js"); ?>
  <script type="text/javascript">
        $(document).ready(function(){
            // find the input fields and apply the time select to them.
            
            $('#sun_starttime').ptTimeSelect();
             $('#sun_breakstart').ptTimeSelect();
              $('#sun_breakend').ptTimeSelect();
               $('#sun_endtime').ptTimeSelect();
              $('#mon_starttime').ptTimeSelect();
             $('#mon_breakstart').ptTimeSelect();
              $('#mon_breakend').ptTimeSelect();
               $('#mon_endtime').ptTimeSelect();
               $('#tues_starttime').ptTimeSelect();
             $('#tues_breakstart').ptTimeSelect();
              $('#tues_breakend').ptTimeSelect();
               $('#tues_endtime').ptTimeSelect();
               $('#wed_starttime').ptTimeSelect();
             $('#wed_breakstart').ptTimeSelect();
              $('#wed_breakend').ptTimeSelect();
               $('#wed_endtime').ptTimeSelect();
               $('#thru_starttime').ptTimeSelect();
             $('#thru_breakstart').ptTimeSelect();
              $('#thru_breakend').ptTimeSelect();
               $('#thru_endtime').ptTimeSelect();
               $('#fri_starttime').ptTimeSelect();
             $('#fri_breakstart').ptTimeSelect();
              $('#fri_breakend').ptTimeSelect();
               $('#fri_endtime').ptTimeSelect();
               $('#sat_starttime').ptTimeSelect();
             $('#sat_breakstart').ptTimeSelect();
              $('#sat_breakend').ptTimeSelect();
               $('#sat_endtime').ptTimeSelect();
               
               
               $('#sun_starttime1').ptTimeSelect();
             $('#sun_breakstart1').ptTimeSelect();
              $('#sun_breakend1').ptTimeSelect();
               $('#sun_endtime1').ptTimeSelect();
              $('#mon_starttime1').ptTimeSelect();
             $('#mon_breakstart1').ptTimeSelect();
              $('#mon_breakend1').ptTimeSelect();
               $('#mon_endtime1').ptTimeSelect();
               $('#tues_starttime1').ptTimeSelect();
             $('#tues_breakstart1').ptTimeSelect();
              $('#tues_breakend1').ptTimeSelect();
               $('#tues_endtime1').ptTimeSelect();
               $('#wed_starttime1').ptTimeSelect();
             $('#wed_breakstart1').ptTimeSelect();
              $('#wed_breakend1').ptTimeSelect();
               $('#wed_endtime1').ptTimeSelect();
               $('#thru_starttime1').ptTimeSelect();
             $('#thru_breakstart1').ptTimeSelect();
              $('#thru_breakend1').ptTimeSelect();
               $('#thru_endtime1').ptTimeSelect();
               $('#fri_starttime1').ptTimeSelect();
             $('#fri_breakstart1').ptTimeSelect();
              $('#fri_breakend1').ptTimeSelect();
               $('#fri_endtime1').ptTimeSelect();
               $('#sat_starttime1').ptTimeSelect();
             $('#sat_breakstart1').ptTimeSelect();
              $('#sat_breakend1').ptTimeSelect();
               $('#sat_endtime1').ptTimeSelect();

                       
                
        });
    </script>
<script>
  $(function() {
    $( "#from" ).datepicker({
    	 minDate: 'today',
      defaultDate: "+1w",
      changeMonth: true,
      numberOfMonths: 3,
      onClose: function( selectedDate ) {
        $( "#to" ).datepicker( "option", "minDate", selectedDate );
      }
    });
    $( "#to" ).datepicker({
      defaultDate: "+1w",
      changeMonth: true,
      numberOfMonths: 3,
      onClose: function( selectedDate ) {
        $( "#from" ).datepicker( "option", "maxDate", selectedDate );
      }
    });
    
    $( "#from1" ).datepicker({
    	 minDate: 'today',
      defaultDate: "+1w",
      changeMonth: true,
      numberOfMonths: 3,
      onClose: function( selectedDate ) {
        $( "#to1" ).datepicker( "option", "minDate", selectedDate );
      }
    });
    $( "#to1" ).datepicker({
      defaultDate: "+1w",
      changeMonth: true,
      numberOfMonths: 3,
      onClose: function( selectedDate ) {
        $( "#from1" ).datepicker( "option", "maxDate", selectedDate );
      }
    });
    
  });
  $(document).ready(function() { 
  	      $("#appointment").validationEngine('attach', {binded :false,autoHidePrompt:true,autoHideDelay:3000,autoPositionUpdate:true,promptPosition : "centerRight", scroll: false});
  	      
  	       $("#offappointment").validationEngine('attach', {binded :false,autoHidePrompt:true,autoHideDelay:3000,autoPositionUpdate:true,promptPosition : "centerRight", scroll: false});

  });

  </script>
<!--| Contant Start |-->
<div class="container">
  <div class="row">
    <div class="span12 edit-pro-bar">
    <div class="span2"><a href="<?php echo MODULE_URL."/doctor/dashboard.php"; ?>">Profile</a></div>
      <div class="span2 active"><a href="javascript:">Appointments</a></div>
       <div class="span2 "><a href="<?php echo MODULE_URL."/doctor/blog.php"; ?>">Blogs</a></div>
      <div class="span2" style="border:none;"><a href="<?php echo MODULE_URL."/doctor/Accounts.php"; ?>">Accounts</a></div>
      <div class="cls"></div>
    </div>
    <div class="span12 past-app top_do_bg_contant_box">
    	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="appointment" id="appointment">   
    	<div class="appo_calender">
    		
        	<div class="app_row">
            	<div class="day">Sun</div>
                <div class="app_col"><span class="hide320">Start Time</span> <span class="show320">ST</span><input id="sun_starttime" type="text" name="sun_starttime" value="<?php echo $appointmentListArr['sun_starttime']; ?>" ></div>
                <div class="app_col"><span class="hide320">Start Break</span> <span class="show320">SB</span><input id="sun_breakstart" type="text" name="sun_breakstart" value="<?php echo $appointmentListArr['sun_breakstart']; ?>" ></div>
                <div class="app_col"><span class="hide320">End Break</span><span class="show320">EB</span> <input id="sun_breakend" type="text" name="sun_breakend" value="<?php echo $appointmentListArr['sun_breakend']; ?>" ></div>
                <div class="app_col"><span class="hide320">End Time</span><span class="show320">ET</span> <input id="sun_endtime" type="text" name="sun_endtime" value="<?php echo $appointmentListArr['sun_endtime']; ?>" ></div>
            </div>
            <div class="app_row">
            	<div class="day">Mon</div>
              <div class="app_col"><span class="hide320">Start Time</span> <span class="show320">ST</span> <input id="mon_starttime" type="text" name="mon_starttime" value="<?php echo $appointmentListArr['mon_starttime']; ?>" ></div>
                <div class="app_col"><span class="hide320">Start Break</span> <span class="show320">SB</span> <input id="mon_breakstart" type="text" name="mon_breakstart" value="<?php echo $appointmentListArr['mon_breakstart']; ?>" ></div>
                <div class="app_col"><span class="hide320">End Break</span><span class="show320">EB</span> <input id="mon_breakend" type="text" name="mon_breakend" value="<?php echo $appointmentListArr['mon_breakend']; ?>" ></div>
                <div class="app_col"><span class="hide320">End Time</span><span class="show320">ET</span> <input id="mon_endtime" type="text" name="mon_endtime" value="<?php echo $appointmentListArr['mon_endtime']; ?>" ></div>
            </div>
            <div class="app_row">
            	<div class="day">Tue</div>
                <div class="app_col"><span class="hide320">Start Time</span> <span class="show320">ST</span> <input id="tues_starttime" type="text" name="tues_starttime" value="<?php echo $appointmentListArr['tues_starttime']; ?>" ></div>
                <div class="app_col"><span class="hide320">Start Break</span> <span class="show320">SB</span> <input id="tues_breakstart" type="text" name="tues_breakstart" value="<?php echo $appointmentListArr['tues_breakstart']; ?>" ></div>
                <div class="app_col"><span class="hide320">End Break</span><span class="show320">EB</span> <input id="tues_breakend" type="text" name="tues_breakend" value="<?php echo $appointmentListArr['tues_breakend']; ?>" ></div>
                <div class="app_col"><span class="hide320">End Time</span><span class="show320">ET</span> <input id="tues_endtime" type="text" name="tues_endtime" value="<?php echo $appointmentListArr['tues_endtime']; ?>" ></div>
            </div>
            <div class="app_row">
            	<div class="day">Wed</div>
                <div class="app_col"><span class="hide320">Start Time</span> <span class="show320">ST</span> <input id="wed_starttime" type="text" name="wed_starttime" value="<?php echo $appointmentListArr['wed_starttime']; ?>" ></div>
                <div class="app_col"><span class="hide320">Start Break</span> <span class="show320">SB</span> <input id="wed_breakstart" type="text" name="wed_breakstart" value="<?php echo $appointmentListArr['wed_breakstart']; ?>" ></div>
                <div class="app_col"><span class="hide320">End Break</span><span class="show320">EB</span> <input id="wed_breakend" type="text" name="wed_breakend" value="<?php echo $appointmentListArr['wed_breakend']; ?>" ></div>
                <div class="app_col"><span class="hide320">End Time</span><span class="show320">ET</span> <input id="wed_endtime" type="text" name="wed_endtime" value="<?php echo $appointmentListArr['wed_endtime']; ?>" ></div>
            </div>
            <div class="app_row">
            	<div class="day">Thu</div>
                <div class="app_col"><span class="hide320">Start Time</span> <span class="show320">ST</span> <input id="thru_starttime" type="text" name="thru_starttime" value="<?php echo $appointmentListArr['thru_starttime']; ?>" ></div>
                <div class="app_col"><span class="hide320">Start Break</span> <span class="show320">SB</span> <input id="thru_breakstart" type="text" name="thru_breakstart" value="<?php echo $appointmentListArr['thru_breakstart']; ?>" ></div>
                <div class="app_col"><span class="hide320">End Break</span><span class="show320">EB</span> <input id="thru_breakend" type="text" name="thru_breakend" value="<?php echo $appointmentListArr['thru_breakend']; ?>" ></div>
                <div class="app_col"><span class="hide320">End Time</span><span class="show320">ET</span> <input id="thru_endtime" type="text" name="thru_endtime" value="<?php echo $appointmentListArr['thru_endtime']; ?>" ></div>
            </div>
            <div class="app_row">
            	<div class="day">Fri</div>
               <div class="app_col"><span class="hide320">Start Time</span> <span class="show320">ST</span> <input id="fri_starttime" type="text" name="fri_starttime" value="<?php echo $appointmentListArr['fri_starttime']; ?>" ></div>
                <div class="app_col"><span class="hide320">Start Break</span> <span class="show320">SB</span> <input id="fri_breakstart" type="text" name="fri_breakstart" value="<?php echo $appointmentListArr['fri_breakstart']; ?>" ></div>
                <div class="app_col"><span class="hide320">End Break</span><span class="show320">EB</span> <input id="fri_breakend" type="text" name="fri_breakend" value="<?php echo $appointmentListArr['fri_breakend']; ?>" ></div>
                <div class="app_col"><span class="hide320">End Time</span><span class="show320">ET</span> <input id="fri_endtime" type="text" name="fri_endtime" value="<?php echo $appointmentListArr['fri_endtime']; ?>" ></div>
            </div>
            <div class="app_row">
            	<div class="day">Sat</div>
               <div class="app_col"><span class="hide320">Start Time</span> <span class="show320">ST</span> <input id="sat_starttime" type="text" name="sat_starttime" value="<?php echo $appointmentListArr['sat_starttime']; ?>" ></div>
                <div class="app_col"><span class="hide320">Start Break</span> <span class="show320">SB</span> <input id="sat_breakstart" type="text" name="sat_breakstart" value="<?php echo $appointmentListArr['sat_breakstart']; ?>" ></div>
                <div class="app_col"><span class="hide320">End Break</span><span class="show320">EB</span> <input id="sat_breakend" type="text" name="sat_breakend" value="<?php echo $appointmentListArr['sat_breakend']; ?>" ></div>
                <div class="app_col"><span class="hide320">End Time</span><span class="show320">ET</span> <input id="sat_endtime" type="text" name="sat_endtime" value="<?php echo $appointmentListArr['sat_endtime']; ?>" ></div>
            </div>
            <div class="app_row">
            	<div class="app_col last"><span class="hide320">Start Date</span><span class="show320">SD</span> <input class="validate[required]"  id="from" type="text" name="startdate" value="<?php echo $appointmentListArr['start_date']; ?>" ></div>
                <div class="app_col last"><span class="hide320">End Date</span> <span class="show320">ED</span><input class="validate[required]" id="to" type="text" name="enddate" value="<?php echo $appointmentListArr['end_date']; ?>" ></div>
                <div class="app_col last"><span>Price</span> <input  class="validate[required]" type="text" name="price" value="<?php echo $appointmentListArr['price']; ?>" ></div>
                <div class="app_col last"><span>Duration</span> <input  class="validate[required]" type="text" name="interval" value="<?php echo $appointmentListArr['intervalBetween']; ?>" ></div>
            </div>
         
        </div>
      <div class="cls"></div>
      <div class="clndr">
      	<input type="hidden" name="action" value="1">
	 	<input type="hidden" name="Edtaction" value="<?php echo $appointmentListArr['id']; ?>">
      	<input type="submit" class="publish_but" value="Submit"></div>
      	</form>
    </div>
      
</div>

<div class="row">
    <div class="span12">
    	<h2>Office Appointments</h2>
    </div>
    
    <div class="span12 past-app top_do_bg_contant_box offcal" >
    	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="offappointment" id="offappointment">   
    	<div class="appo_calender">
    		
        	<div class="app_row">
            	<div class="day">Sun</div>
                <div class="app_col"><span class="hide320">Start Time</span> <span class="show320">ST</span><input id="sun_starttime1" type="text" name="sun_starttime1" value="<?php echo $officeappointmentListArr['sun_starttime']; ?>" ></div>
                <div class="app_col"><span class="hide320">Start Break</span> <span class="show320">SB</span><input id="sun_breakstart1" type="text" name="sun_breakstart1" value="<?php echo $officeappointmentListArr['sun_breakstart']; ?>" ></div>
                <div class="app_col"><span class="hide320">End Break</span><span class="show320">EB</span> <input id="sun_breakend1" type="text" name="sun_breakend1" value="<?php echo $officeappointmentListArr['sun_breakend']; ?>" ></div>
                <div class="app_col"><span class="hide320">End Time</span><span class="show320">ET</span> <input id="sun_endtime1" type="text" name="sun_endtime1" value="<?php echo $officeappointmentListArr['sun_endtime']; ?>" ></div>
            </div>
            <div class="app_row">
            	<div class="day">Mon</div>
              <div class="app_col"><span class="hide320">Start Time</span> <span class="show320">ST</span> <input id="mon_starttime1" type="text" name="mon_starttime1" value="<?php echo $officeappointmentListArr['mon_starttime']; ?>" ></div>
                <div class="app_col"><span class="hide320">Start Break</span> <span class="show320">SB</span> <input id="mon_breakstart1" type="text" name="mon_breakstart1" value="<?php echo $officeappointmentListArr['mon_breakstart']; ?>" ></div>
                <div class="app_col"><span class="hide320">End Break</span><span class="show320">EB</span> <input id="mon_breakend1" type="text" name="mon_breakend1" value="<?php echo $officeappointmentListArr['mon_breakend']; ?>" ></div>
                <div class="app_col"><span class="hide320">End Time</span><span class="show320">ET</span> <input id="mon_endtime1" type="text" name="mon_endtime1" value="<?php echo $officeappointmentListArr['mon_endtime']; ?>" ></div>
            </div>
            <div class="app_row">
            	<div class="day">Tue</div>
                <div class="app_col"><span class="hide320">Start Time</span> <span class="show320">ST</span> <input id="tues_starttime1" type="text" name="tues_starttime1" value="<?php echo $officeappointmentListArr['tues_starttime']; ?>" ></div>
                <div class="app_col"><span class="hide320">Start Break</span> <span class="show320">SB</span> <input id="tues_breakstart1" type="text" name="tues_breakstart1" value="<?php echo $officeappointmentListArr['tues_breakstart']; ?>" ></div>
                <div class="app_col"><span class="hide320">End Break</span><span class="show320">EB</span> <input id="tues_breakend1" type="text" name="tues_breakend1" value="<?php echo $officeappointmentListArr['tues_breakend']; ?>" ></div>
                <div class="app_col"><span class="hide320">End Time</span><span class="show320">ET</span> <input id="tues_endtime1" type="text" name="tues_endtime1" value="<?php echo $officeappointmentListArr['tues_endtime']; ?>" ></div>
            </div>
            <div class="app_row">
            	<div class="day">Wed</div>
                <div class="app_col"><span class="hide320">Start Time</span> <span class="show320">ST</span> <input id="wed_starttime1" type="text" name="wed_starttime1" value="<?php echo $officeappointmentListArr['wed_starttime']; ?>" ></div>
                <div class="app_col"><span class="hide320">Start Break</span> <span class="show320">SB</span> <input id="wed_breakstart1" type="text" name="wed_breakstart1" value="<?php echo $officeappointmentListArr['wed_breakstart']; ?>" ></div>
                <div class="app_col"><span class="hide320">End Break</span><span class="show320">EB</span> <input id="wed_breakend1" type="text" name="wed_breakend1" value="<?php echo $officeappointmentListArr['wed_breakend']; ?>" ></div>
                <div class="app_col"><span class="hide320">End Time</span><span class="show320">ET</span> <input id="wed_endtime1" type="text" name="wed_endtime1" value="<?php echo $officeappointmentListArr['wed_endtime']; ?>" ></div>
            </div>
            <div class="app_row">
            	<div class="day">Thu</div>
                <div class="app_col"><span class="hide320">Start Time</span> <span class="show320">ST</span> <input id="thru_starttime1" type="text" name="thru_starttime1" value="<?php echo $officeappointmentListArr['thru_starttime']; ?>" ></div>
                <div class="app_col"><span class="hide320">Start Break</span> <span class="show320">SB</span> <input id="thru_breakstart1" type="text" name="thru_breakstart1" value="<?php echo $officeappointmentListArr['thru_breakstart']; ?>" ></div>
                <div class="app_col"><span class="hide320">End Break</span><span class="show320">EB</span> <input id="thru_breakend1" type="text" name="thru_breakend1" value="<?php echo $officeappointmentListArr['thru_breakend']; ?>" ></div>
                <div class="app_col"><span class="hide320">End Time</span><span class="show320">ET</span> <input id="thru_endtime1" type="text" name="thru_endtime1" value="<?php echo $officeappointmentListArr['thru_endtime']; ?>" ></div>
            </div>
            <div class="app_row">
            	<div class="day">Fri</div>
               <div class="app_col"><span class="hide320">Start Time</span> <span class="show320">ST</span> <input id="fri_starttime1" type="text" name="fri_starttime1" value="<?php echo $officeappointmentListArr['fri_starttime']; ?>" ></div>
                <div class="app_col"><span class="hide320">Start Break</span> <span class="show320">SB</span> <input id="fri_breakstart1" type="text" name="fri_breakstart1" value="<?php echo $officeappointmentListArr['fri_breakstart']; ?>" ></div>
                <div class="app_col"><span class="hide320">End Break</span><span class="show320">EB</span> <input id="fri_breakend1" type="text" name="fri_breakend1" value="<?php echo $officeappointmentListArr['fri_breakend']; ?>" ></div>
                <div class="app_col"><span class="hide320">End Time</span><span class="show320">ET</span> <input id="fri_endtime1" type="text" name="fri_endtime1" value="<?php echo $officeappointmentListArr['fri_endtime']; ?>" ></div>
            </div>
            <div class="app_row">
            	<div class="day">Sat</div>
               <div class="app_col"><span class="hide320">Start Time</span> <span class="show320">ST</span> <input id="sat_starttime1" type="text" name="sat_starttime1" value="<?php echo $officeappointmentListArr['sat_starttime']; ?>" ></div>
                <div class="app_col"><span class="hide320">Start Break</span> <span class="show320">SB</span> <input id="sat_breakstart1" type="text" name="sat_breakstart1" value="<?php echo $officeappointmentListArr['sat_breakstart']; ?>" ></div>
                <div class="app_col"><span class="hide320">End Break</span><span class="show320">EB</span> <input id="sat_breakend1" type="text" name="sat_breakend1" value="<?php echo $officeappointmentListArr['sat_breakend']; ?>" ></div>
                <div class="app_col"><span class="hide320">End Time</span><span class="show320">ET</span> <input id="sat_endtime1" type="text" name="sat_endtime1" value="<?php echo $officeappointmentListArr['sat_endtime']; ?>" ></div>
            </div>
            <div class="app_row">
            	<div class="app_col last"><span class="hide320">Start Date</span><span class="show320">SD</span> <input class="validate[required]"  id="from1" type="text" name="startdate1" value="<?php echo $officeappointmentListArr['start_date']; ?>" ></div>
                <div class="app_col last"><span class="hide320">End Date</span> <span class="show320">ED</span><input class="validate[required]" id="to1" type="text" name="enddate1" value="<?php echo $officeappointmentListArr['end_date']; ?>" ></div>
                <div class="app_col last"><span>Price</span> <input  class="validate[required]" type="text" name="price1" value="<?php echo $officeappointmentListArr['price']; ?>" ></div>
                <div class="app_col last"><span>Duration</span> <input  class="validate[required]" type="text" name="interval1" value="<?php echo $officeappointmentListArr['intervalBetween']; ?>" ></div>
            </div>
         
        </div>
      <div class="cls"></div>
      <div class="clndr">
      	<input type="hidden" name="action" value="2">
	 	<input type="hidden" name="Edtaction" value="<?php echo $officeappointmentListArr['id']; ?>">
      	<input type="submit" class="publish_but" value="Submit"></div>
      	</form>
    </div>
      
</div>
</div>
<!--| Contant End |--> 

<!--| footer Start |-->



<?php include_once(INCLUDES_DIR."/footer.php") ; ?>