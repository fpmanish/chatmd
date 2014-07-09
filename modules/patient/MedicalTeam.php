<?php
include_once("../../conf/config.inc.php");
include_once(MODULES_PATH."/patient/code/appointment_code.php");
include_once(INCLUDES_DIR."/header.php");
?>

<!--| Contant Start |-->
<div class="container">
  <div class="row">
    <div class="span12 edit-pro-bar">
      <div class="span4 active"><a href="medical-team.html">Medical Team</a></div>
      <div class="span4"><a href="<?php echo MODULE_URL."/patient/pastAppointment.php"; ?>">Past Appointments</a></div>
      <div class="span4" style="border:none;"><a href="<?php echo MODULE_URL."/patient/dashboard.php"; ?>">Edit Profile</a></div>
      <div class="cls"></div>
    </div>
    <div class=" span12 top_do_bg_contant_box">
      <div class="span1"><img src="<?php echo IMAGE_URL; ?>/Pic_1.jpg" alt="picture"></div>
      <div class="span3">
        <div class="do_name">Dr. Jacob Abraham</div>
        <div class="do_post">Providence St. Vincent Medical Center</div>
        <div class="do_dis">Specialties : <strong>Cardiology, Internal Medicine</strong></div>
        <div class="do_dis">Accepting New Patients : <strong>Yes</strong></div>
        <div class="do_blog"><a href="#">Doctors Blog</a></div>
        <div class="bookonline_but">
          <input type="submit" name="" value="Book Online" onclick="location.href='doctor-profile.html'">
        </div>
        <div class="cls"></div>
      </div>
      <div class="span7">
        <table width="100%" class="top_doctor">
          <tr class="top_doctor">
            <th class="top_doctor" width="6%"><img src="<?php echo IMAGE_URL; ?>/table_arrow_left.png" alt="arrow"></th>
            <th class="top_doctor" width="12.57%"><strong>Tue</strong><br>09-17-13</th>
            <th class="top_doctor" width="12.57%"><strong>Wed</strong><br>09-17-13</th>
            <th class="top_doctor" width="12.57%"><strong>Thu</strong><br>09-17-13</th>
            <th class="top_doctor" width="12.57%"><strong>Fri</strong><br>09-17-13</th>
            <th class="top_doctor" width="12.57%"><strong>Sat</strong><br>09-17-13</th>
            <th class="top_doctor" width="12.57%"><strong>Sun</strong><br>09-17-13</th>
            <th class="top_doctor" width="12.57%"><strong>Mon</strong><br>09-17-13</th>
            <th class="top_doctor" width="6%"><img src="<?php echo IMAGE_URL; ?>/table_arrow_right.png" alt="arrow"></th>
          </tr>
          <tr class="top_doctor">
            <td class="top_doctor"></td>
            <td class="top_doctor" width="12.57%">3:15 pm</td>
            <td class="top_doctor" width="12.57%">3:15 pm</td>
            <td class="top_doctor" width="12.57%">3:15 pm</td>
            <td class="top_doctor" width="12.57%">3:15 pm</td>
            <td class="top_doctor" width="12.57%">3:15 pm</td>
            <td class="top_doctor" width="12.57%">3:15 pm</td>
            <td class="top_doctor" width="12.57%">3:15 pm</td>
            <td class="top_doctor"></td>
          </tr>
          <tr class="top_doctor">
            <td class="top_doctor"></td>
            <td class="top_doctor" width="12.57%">4:15 pm</td>
            <td class="top_doctor" width="12.57%">4:15 pm</td>
            <td class="top_doctor" width="12.57%">4:15 pm</td>
            <td class="top_doctor" width="12.57%">4:15 pm</td>
            <td class="top_doctor" width="12.57%">4:15 pm</td>
            <td class="top_doctor" width="12.57%">4:15 pm</td>
            <td class="top_doctor" width="12.57%">4:15 pm</td>
            <td class="top_doctor"></td>
          </tr>
          <tr class="top_doctor">
            <td class="top_doctor"></td>
            <td class="top_doctor" width="12.57%"></td>
            <td class="top_doctor" width="12.57%">4:25 pm</td>
            <td class="top_doctor" width="12.57%">4:25 pm</td>
            <td class="top_doctor" width="12.57%">4:25 pm</td>
            <td class="top_doctor" width="12.57%"></td>
            <td class="top_doctor" width="12.57%">4:25 pm</td>
            <td class="top_doctor" width="12.57%">4:25 pm</td>
            <td class="top_doctor"></td>
          </tr>
          <tr class="top_doctor">
            <td class="top_doctor"></td>
            <td class="top_doctor" width="12.57%">4:20 pm</td>
            <td class="top_doctor" width="12.57%">4:20 pm</td>
            <td class="top_doctor" width="12.57%"></td>
            <td class="top_doctor" width="12.57%">4:20 pm</td>
            <td class="top_doctor" width="12.57%">4:20 pm</td>
            <td class="top_doctor" width="12.57%">4:20 pm</td>
            <td class="top_doctor" width="12.57%"></td>
            <td class="top_doctor"></td>
          </tr>
          <tr class="top_doctor">
            <td class="top_doctor"></td>
            <td class="top_doctor" width="12.57%">4:30 pm</td>
            <td class="top_doctor" width="12.57%"></td>
            <td class="top_doctor" width="12.57%">4:30 pm</td>
            <td class="top_doctor" width="12.57%">4:30 pm</td>
            <td class="top_doctor" width="12.57%"></td>
            <td class="top_doctor" width="12.57%">4:30 pm</td>
            <td class="top_doctor" width="12.57%">4:30 pm</td>
            <td class="top_doctor"></td>
          </tr>
        </table>
      </div>
      <div class="cls find_do_border"></div>
      <div class="find_do_pd"></div>
      <div class="span1"><img src="<?php echo IMAGE_URL; ?>/Pic_3.jpg" alt="picture"></div>
      <div class="span3">
        <div class="do_name">Dr. Alicia M. Ahn</div>
        <div class="do_post">Kaiser Premanente Tualatin Medical Office</div>
        <div class="do_dis">Specialties : <strong>Internal Medicine</strong></div>
        <div class="do_dis">Accepting New Patients : <strong>Yes</strong></div>
        <div class="do_blog"><a href="#">Doctors Blog</a></div>
        <div class="bookonline_but">
          <input type="submit" name="" value="Book Online" onclick="location.href='doctor-profile.html'">
        </div>
      </div>
      <div class="span7">
        <table width="100%" class="top_doctor">
          <tr class="top_doctor">
            <th class="top_doctor" width="6%"><img src="<?php echo IMAGE_URL; ?>/table_arrow_left.png" alt="arrow"></th>
            <th class="top_doctor" width="12.57%"><strong>Tue</strong><br>09-17-13</th>
            <th class="top_doctor" width="12.57%"><strong>Wed</strong><br>09-17-13</th>
            <th class="top_doctor" width="12.57%"><strong>Thu</strong><br>09-17-13</th>
            <th class="top_doctor" width="12.57%"><strong>Fri</strong><br>09-17-13</th>
            <th class="top_doctor" width="12.57%"><strong>Sat</strong><br>09-17-13</th>
            <th class="top_doctor" width="12.57%"><strong>Sun</strong><br>09-17-13</th>
            <th class="top_doctor" width="12.57%"><strong>Mon</strong><br>09-17-13</th>
            <th class="top_doctor" width="6%"><img src="<?php echo IMAGE_URL; ?>/table_arrow_right.png" alt="arrow"></th>
          </tr>
          <tr class="top_doctor">
            <td class="top_doctor"></td>
            <td class="top_doctor" width="12.57%">3:15 pm</td>
            <td class="top_doctor" width="12.57%"></td>
            <td class="top_doctor" width="12.57%"></td>
            <td class="top_doctor" width="12.57%">3:15 pm</td>
            <td class="top_doctor" width="12.57%"></td>
            <td class="top_doctor" width="12.57%">3:15 pm</td>
            <td class="top_doctor" width="12.57%">3:15 pm</td>
            <td class="top_doctor"></td>
          </tr>
          <tr class="top_doctor">
            <td class="top_doctor"></td>
            <td class="top_doctor" width="12.57%">4:15 pm</td>
            <td class="top_doctor" width="12.57%">4:15 pm</td>
            <td class="top_doctor" width="12.57%"></td>
            <td class="top_doctor" width="12.57%"></td>
            <td class="top_doctor" width="12.57%"></td>
            <td class="top_doctor" width="12.57%">4:15 pm</td>
            <td class="top_doctor" width="12.57%">4:15 pm</td>
            <td class="top_doctor"></td>
          </tr>
          <tr class="top_doctor">
            <td class="top_doctor"></td>
            <td class="top_doctor" width="12.57%"></td>
            <td class="top_doctor" width="12.57%">4:25 pm</td>
            <td class="top_doctor" width="12.57%">4:25 pm</td>
            <td class="top_doctor" width="12.57%">4:25 pm</td>
            <td class="top_doctor" width="12.57%"></td>
            <td class="top_doctor" width="12.57%">4:25 pm</td>
            <td class="top_doctor" width="12.57%">4:25 pm</td>
            <td class="top_doctor"></td>
          </tr>
          <tr class="top_doctor">
            <td class="top_doctor"></td>
            <td class="top_doctor" width="12.57%">4:20 pm</td>
            <td class="top_doctor" width="12.57%">4:20 pm</td>
            <td class="top_doctor" width="12.57%"></td>
            <td class="top_doctor" width="12.57%">4:20 pm</td>
            <td class="top_doctor" width="12.57%"></td>
            <td class="top_doctor" width="12.57%">4:20 pm</td>
            <td class="top_doctor" width="12.57%"></td>
            <td class="top_doctor"></td>
          </tr>
          <tr class="top_doctor">
            <td class="top_doctor"></td>
            <td class="top_doctor" width="12.57%">4:30 pm</td>
            <td class="top_doctor" width="12.57%"></td>
            <td class="top_doctor" width="12.57%"></td>
            <td class="top_doctor" width="12.57%"></td>
            <td class="top_doctor" width="12.57%"></td>
            <td class="top_doctor" width="12.57%">4:30 pm</td>
            <td class="top_doctor" width="12.57%">4:30 pm</td>
            <td class="top_doctor"></td>
          </tr>
        </table>
      </div>
      <div class="cls"></div>
      
    </div>
    </div>
  </div>
</div>
</div>
<!--| Contant End |--> 
<?php include_once(INCLUDES_DIR."/footer.php") ; ?>