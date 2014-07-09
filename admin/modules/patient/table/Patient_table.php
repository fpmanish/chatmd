<link href="<?php echo ADMIN_CSS_URL; ?>/core/table.css" rel="stylesheet" type="text/css" />
<link href="<?php echo ADMIN_CSS_URL; ?>/core/panels.css" rel="stylesheet" type="text/css" />
<?php echo jscripts::script("jquery.dataTables.js"); ?>
<!-- Main Container Start -->
    <div id="mws-container" class="clearfix">
    <div class="container">
    <script>
        $(document).ready(function(){
            $(".mws-datatable").dataTable();
        });
    </script>
    <div style="float: right;margin: 0 10px 10px 0;"><a style="text-decoration: none;" href="<?php echo ADMIN_MODULE_URL."/patient/index.php?pageType=addPatient" ?>" class="mws-button blue">Add  Patient</a></div>
        <!-- Inner Container Start -->
        <div class="mws-panel grid_8">
            <div class="mws-panel-header">
                <span class="mws-i-24 i-admin-user">Patient's</span>
            </div>
            <div class="mws-panel-body">
                <table class="mws-datatable mws-table">
                    <thead>
                        <tr>
                        	<th>S.No</td>
                            <th>Name</td>
                            <th>Email</td>
                           <th>Verify</td>
                            <th>Activate</td>
                            <th>Action</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $k=1;
                        for($i=0;count($patientList)>$i;$i++)
                        {
                        ?>
                        <tr>
                        	<td><?php echo  $k; ?></td>
                            <td><?php echo $patientList[$i]['name']; ?></td>
                            <td><?php echo $patientList[$i]['email']; ?></td>
                            <td><?php echo actInactSwitch(ADMIN_MODULE_URL."/patient/index.php?id=".$patientList[$i]['patient_id']."&isUserAct=1&pageType=list",ADMIN_MODULE_URL."/patient/index.php?id=".$patientList[$i]['patient_id']."&&isUserAct=0&pageType=list",$patientList[$i]['is_verfiy']); ?></td>
                            <td><?php echo actInactSwitch(ADMIN_MODULE_URL."/patient/index.php?id=".$patientList[$i]['patient_id']."&isAct=1&pageType=list",ADMIN_MODULE_URL."/patient/index.php?id=".$patientList[$i]['patient_id']."&isAct=0&pageType=list",$patientList[$i]['is_active']); ?></td>
                            <td><a href="<?php echo ADMIN_MODULE_URL."/patient/index.php?pageType=editPatient&page_id=".$patientList[$i]['patient_id']; ?>"><img src="<?php echo ADMIN_IMAGE_URL; ?>/pencil.png" /></a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="javascript:" onclick="deleteConfirmation('<?php echo ADMIN_MODULE_URL."/patient/index.php?pageType=list&delete_id=".$patientList[$i]['patient_id']."&action=delete"; ?>');"><img src="<?php echo ADMIN_IMAGE_URL; ?>/cross.png" /></a></td>
                        </tr>
                        <?php
                        $k++;
                        }
                        ?>
                    </tbody>
                </table>
        </div>
        </div>           
    </div>
    <?php include_once(ADMIN_INCLUDE_PATH."/copyright.php"); ?>
    </div>
    <!-- Main Container End -->