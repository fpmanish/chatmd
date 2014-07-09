<link href="<?php echo ADMIN_CSS_URL; ?>/core/table.css" rel="stylesheet" type="text/css" />
<link href="<?php echo ADMIN_CSS_URL; ?>/core/panels.css" rel="stylesheet" type="text/css" />
<?php echo jscripts::script("jquery.dataTables.js"); ?>

<!-- Main Container Start -->
    <div id="mws-container" class="clearfix">
    <div class="container">
  <script type="text/javascript" charset="utf-8">
			(function($) {
			/*
			 * Function: fnGetColumnData
			 * Purpose:  Return an array of table values from a particular column.
			 * Returns:  array string: 1d data array 
			 * Inputs:   object:oSettings - dataTable settings object. This is always the last argument past to the function
			 *           int:iColumn - the id of the column to extract the data from
			 *           bool:bUnique - optional - if set to false duplicated values are not filtered out
			 *           bool:bFiltered - optional - if set to false all the table data is used (not only the filtered)
			 *           bool:bIgnoreEmpty - optional - if set to false empty values are not filtered from the result array
			 * Author:   Benedikt Forchhammer <b.forchhammer /AT\ mind2.de>
			 */
			$.fn.dataTableExt.oApi.fnGetColumnData = function ( oSettings, iColumn, bUnique, bFiltered, bIgnoreEmpty ) {
				// check that we have a column id
				if ( typeof iColumn == "undefined" ) return new Array();
				
				// by default we only want unique data
				if ( typeof bUnique == "undefined" ) bUnique = true;
				
				// by default we do want to only look at filtered data
				if ( typeof bFiltered == "undefined" ) bFiltered = true;
				
				// by default we do not want to include empty values
				if ( typeof bIgnoreEmpty == "undefined" ) bIgnoreEmpty = true;
				
				// list of rows which we're going to loop through
				var aiRows;
				
				// use only filtered rows
				if (bFiltered == true) aiRows = oSettings.aiDisplay; 
				// use all rows
				else aiRows = oSettings.aiDisplayMaster; // all row numbers
			
				// set up data array	
				var asResultData = new Array();
				
				for (var i=0,c=aiRows.length; i<c; i++) {
					iRow = aiRows[i];
					var aData = this.fnGetData(iRow);
					var sValue = aData[iColumn];
					
					// ignore empty values?
					if (bIgnoreEmpty == true && sValue.length == 0) continue;
			
					// ignore unique values?
					else if (bUnique == true && jQuery.inArray(sValue, asResultData) > -1) continue;
					
					// else push the value onto the result data array
					else asResultData.push(sValue);
				}
				
				return asResultData;
			}}(jQuery));
			
			
			function fnCreateSelect( aData )
			{
				var r='<select><option value="">All Category</option>', i, iLen=aData.length;
				for ( i=0 ; i<iLen ; i++ )
				{
					r += '<option value="'+aData[i]+'">'+aData[i]+'</option>';
				}
				return r+'</select>';
			}
			
			
			$(document).ready(function() {
				/* Initialise the DataTable */
				var oTable = $('.mws-datatable').dataTable( {
					"oLanguage": {
						"sSearch": "Search all columns:"
						
					}
				} );
				
				/* Add a select menu for each TH element in the table footer */
				$("#test label").each( function ( i ) {
					this.innerHTML = fnCreateSelect( oTable.fnGetColumnData(i) );
					$('select', this).change( function () {
						oTable.fnFilter( $(this).val(), i );
					} );
				} );
			} );
		</script>
   
   
                    			
    <div style="float: right;margin: 0 10px 10px 0;"><a style="text-decoration: none;" href="<?php echo ADMIN_MODULE_URL."/cms/faqManager.php?pageType=addFaq" ?>" class="mws-button blue">Add  FAQ</a></div>
        <!-- Inner Container Start -->
      <div id="test" style="margin-left:1%">
				<label></label>
			</div>
        <div class="mws-panel grid_8">
            <div class="mws-panel-header">
                <span class="mws-i-24 i-question">FAQ Manager</span>
            </div>
            <div class="mws-panel-body">
            	
                <table class="mws-datatable mws-table">
                    <thead>
                        <tr>
                        	<th>Category</td>
                            <th>Question</td>
                            <th>Activate</td>
                            <th>Action</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        for($i=0;$i<count($faqList);$i++)
                        {
                        ?>
                        <tr>
                        	                             <td><?php $catName=$pageObj->getfaqCategoryById($faqList[$i]['category_id']);  echo $catName['category_name']; ?></td>

                            <td><?php echo $faqList[$i]['faq_title']; ?></td>
                            <td><?php echo actInactSwitch(ADMIN_MODULE_URL."/cms/faqManager.php?id=".$faqList[$i]['faq_id']."&isAct=1&pageType=list",ADMIN_MODULE_URL."/cms/faqManager.php?id=".$faqList[$i]['faq_id']."&isAct=0&pageType=list",$faqList[$i]['is_active']); ?></td>
                            <td><a href="<?php echo ADMIN_MODULE_URL."/cms/faqManager.php?pageType=editFaq&page_id=".$faqList[$i]['faq_id']; ?>"><img src="<?php echo ADMIN_IMAGE_URL; ?>/pencil.png" /></a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="javascript:" onclick="deleteConfirmation('<?php echo ADMIN_MODULE_URL."/cms/pageManager.php?pageType=list&delete_id=".$faqList[$i]['faq_id']."&action=delete"; ?>');"><img src="<?php echo ADMIN_IMAGE_URL; ?>/cross.png" /></a></td>
                        </tr>
                        <?php
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