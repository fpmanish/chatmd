<?php include("../../conf/config.inc.php");?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
	
<title>PayPal Adaptive Payments - Pay</title>
    <script src ="https://www.paypalobjects.com/js/external/dg.js" type="text/javascript"></script>

<script type="text/javascript" charset="utf-8">
          
          function handleEmbeddedFlow() {
                    if (top && top.opener && top.opener.top) {
                         top.opener.top.myEmbeddedPaymentFlow.paymentCanceled();
                         window.close();
                    } else if (top.myEmbeddedPaymentFlow) {
                         top.myEmbeddedPaymentFlow.paymentCanceled();
                    } else {
                         alert('Please close the window and reload to continue');
                    }
          }
     
</script>
</head>
<body onLoad='setTimeout(handleEmbeddedFlow,200);'>
	<br />
	<div id="jive-wrapper">

		<div id="request_form">

			<div>
				<center>
					<h3>
						<b>Paypal Adaptive Payments - Webflow Return Page</b>
					</h3>
				</center>
				<br />

				<table align="center" width="60%">
					<tr>
						<td colspan="2">
							<center>
								<h5>You have returned here from a web flow</h5>
							</center>
						</td>
					</tr>
					<?php
					
						  echo '<script>window.parent.location.href="'.MODULE_URL.'/Appointment/payment.php"</script>';
                              exit();
					
?>

				</table>
			</div>
		</div>
	</div>
</body>
</html>