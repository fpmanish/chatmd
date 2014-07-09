<?php
   include_once("../../conf/config.inc.php");
   include_once(INCLUDES_DIR."/header.php");
   include_once(MODULES_PATH."/sign_up/code/fee_code.php");
   include_once(MODULES_PATH."/sign_up/paypal.php");
   
    $settings = array(
  'business' => $_SESSION['payer_email'],         //paypal email address
  'currency' => 'USD',                       //paypal currency
  'cursymbol'=> '$',                   //currency symbol
  'location' => 'GB',                        //location code  (ex GB)
  'returnurl'=> 'http://chat-md.com/modules/sign_up/doctorRegistration.php',//where to go back when the transaction is done.
  'returntxt'=> 'Return to My Site',         //What is written on the return button in paypal
  'cancelurl'=> 'http://chat-md.com/modules/home/',//Where to go if the user cancels.
  'notifyurl'=> 'http://chat-md.com/modules/sign_up/doctorRegistration.php',//Where to go if the user cancels.
  'shipping' => 0,                           //Shipping Cost
  'custom' =>$_SESSION['register_id']  
                           //Custom attribute
  );
   $paypal_obj = new paypalcheckout($settings) ;
   $doc_email = $_SESSION['doctor_email'] ;
  $doc_name= $_SESSION['doc_name'] ;
 $new_phrase= $_SESSION['new_phrase'];
 $doc_register_id= $_SESSION['register_id'] ;
   $items =array(
	'name'=>$_SESSION['doc_name'],
	'price'=>$feedetails['fee'],
	'quantity'=>"1",
	"shipping"=>0
	//"email"=>$_SESSION['doctor_email']
	);
	$paypal_obj->addSimpleItem($items);
	$cross_check=$paypal_obj->getCartContentAsHtml();
	$paypal_form=$paypal_obj->getCheckoutForm();
	$_SESSION['new_phrase']= $new_phrase;
	 $_SESSION['doctor_email'] = $doc_email ;
?>
<div class="load-ir"><?php //echo $cross_check ; ?>
		<?php echo $paypal_form; ?><img class="load" align="middle" height="100px" width="100px" alt="loader" src="<?php echo IMAGE_URL ?>/loader_gif.gif"></div>
<div class="modal hide fade" id="myModa112" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel"><?php echo $TERM_OF_USE['page_title']; ?> </h4>
      </div>
      <div class="modal-body">
     <?php echo $TERM_OF_USE['page_description']; ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
     
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<?php include_once(INCLUDES_DIR."/footer.php") ; ?>
<script type="text/javascript">
$(window).load(function(){
	
	
	
	 $("#paypal_checkout").submit();
});
	</script>