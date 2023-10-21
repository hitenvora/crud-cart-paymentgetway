<?php
// session_start();
#remove below if you have latest version of php,it will not show warnings
$MERCHANT_KEY = "FH2qsrBv";
$SALT = "StCMXYEpZ3";
// Merchant Key and Salt as provided by Payu.
$PAYU_BASE_URL = "https://secure.payu.in";		// For Sandbox Mode
//$PAYU_BASE_URL = "https://secure.payu.in";			// For Production Mode
$action = '';

$posted = array();
if(!empty($_POST)) {
    //print_r($_POST);
  foreach($_POST as $key => $value) {    
    $posted[$key] = $value; 
	
  }
}
$formError = 0;
if(empty($posted['txnid'])) {
  // Generate random transaction id
  $txnid = substr(hash('sha256', mt_rand() . microtime()), 0, 20);
} else {
  $txnid = $posted['txnid'];
}
$hash = '';
// Hash Sequence
$hashSequence = "key|txnid|amount|productinfo|firstname|email|udf1|udf2|udf3|udf4|udf5|udf6|udf7|udf8|udf9|udf10";
if(empty($posted['hash']) && sizeof($posted) > 0) {
  if(
          empty($posted['key'])
          || empty($posted['txnid'])
          || empty($posted['amount'])
          || empty($posted['firstname'])
          || empty($posted['email'])
          || empty($posted['phone'])
          || empty($posted['productinfo'])
          || empty($posted['surl'])
          || empty($posted['furl'])
		  || empty($posted['service_provider'])
  ) {
    $formError = 1;
  } else {
    //$posted['productinfo'] = json_encode(json_decode('[{"name":"tutionfee","description":"","value":"500","isRequired":"false"},{"name":"developmentfee","description":"monthly tution fee","value":"1500","isRequired":"false"}]'));
	$hashVarsSeq = explode('|', $hashSequence);
    $hash_string = '';	
	foreach($hashVarsSeq as $hash_var) {
      $hash_string .= isset($posted[$hash_var]) ? $posted[$hash_var] : '';
      $hash_string .= '|';
    }

    $hash_string .= $SALT;


    $hash = strtolower(hash('sha512', $hash_string));
    $action = $PAYU_BASE_URL . '/_payment';
  }
} elseif(!empty($posted['hash'])) {
  $hash = $posted['hash'];
  $action = $PAYU_BASE_URL . '/_payment';
}
?>

<html>
<head>
<style>

</style>

<script type="text/javascript">
var hash = '<?php echo $hash ?>';
function submitPayuForm() {
if(hash == '') {
return;
}
var payuForm = document.forms.payuForm;
payuForm.submit();
}
  
</script>
</head>


<body onLoad="submitPayuForm()">



<section id="content">
<div class="mt-5 container-fluid p-5">
<h4 class="ms-5"><span>Checkout</span></h2></h4>
<h6 class="ms-5 text-danger"><span>Fill all required field(*)</span></h2></h6>
<div class="row">
<div class="col-md-6 ms-5 ">

<form method="post" id="frm" action="<?php echo $action; ?>" name="payuForm" enctype="multipart/form-data">

<input type="hidden" name="key" value="<?php echo $MERCHANT_KEY ?>" />
<input type="hidden" name="hash" value="<?php echo $hash ?>"/>
<input type="hidden" name="txnid" value="<?php echo $txnid ?>" />

<div class="form-group col-md-12 col-xs-12 mt-2">
<input name="amount" value="<?php echo (empty($posted['amount'])) ? '' : $posted['amount'] ?>" class="form-control" placeholder="Enter Ammount *" />
</div>
<div class="form-group col-md-12 col-xs-12 mt-2">
<input type="text" name="firstname" id="firstname" value="<?php echo (empty($posted['firstname'])) ? '' : $posted['firstname']; ?>" placeholder="Firstname *"  class="form-control">
</div>

<div class="form-group col-md-12 col-xs-12 mt-2">
<input type="text" name="lname" value="<?php echo (empty($posted['firstname'])) ? '' : $posted['firstname']; ?>" placeholder="Lastname *" class="form-control">
</div>

<div class="form-group col-md-12 col-xs-12 mt-2">
<input type="text" name="email" id="email" value="<?php echo (empty($posted['email'])) ? '' : $posted['email']; ?>" placeholder="Email *" class="form-control">
</div>


<div class="form-group col-md-12 col-xs-12 mt-2">
<input type="text" name="phone" value="<?php echo (empty($posted['phone'])) ? '' : $posted['phone']; ?>" placeholder="Mobile *"  class="form-control">
</div>

<div class="form-group col-md-12 col-xs-12 mt-2">
<textarea name="productinfo" class="form-control" placeholder="Product Info *"><?php echo (empty($posted['productinfo'])) ? '' : $posted['productinfo'] ?></textarea>
</div>

<!-- payment success url -->
<input type="hidden" name="surl" value="<?php echo $mainurl;?>paymentsuccess" size="64" />
<!-- payment failure url -->
<input type="hidden" name="furl" value="<?php echo $mainurl;?>paymentfailure" size="64" />

<input type="hidden" name="service_provider" value="payu_paisa" size="64" />



<div class="form-group mt-3">
<select name="state"  required class="form-control">
<option value="">-select state-</option>
<?php
foreach($shwstate as $shwstate1)
{ 
?>
<option value="<?php echo $shwstate1["state_id"];?>"><?php echo $shwstate1["state_name"];?></option>
<?php 
}
?> 
</select> 
</div>



<div class="form-group mt-3">
<select name="city"  required class="form-control">
<option value="">-select city-</option>
<?php
foreach($shwcity as $shwcity1)
{ 
?>
<option value="<?php echo $shwcity1["city_id"];?>"><?php echo $shwcity1["city_name"];?></option>
<?php 
}
?> 
</select> 
</div>


</div>




<div class="col-md-4 ms-5 shadow">
<div class="card-body">

<table class="table table-responsive">

<?php 
foreach($shwcrt as  $row)
{
?>
<tr align="center">

<!-- <td><img src="admin/<?php echo $row["coursephoto"];?>" style="width:50px; height:50px"></td> -->
<td><?php echo $row["coursename"];?></td>


<td><input type="number" name="qty" min="1" max="10" value="1" class="w-50"></td>
<td><?php echo $row["subtotal"];?></td>

</tr>
<?php 
}
?>
</table>


</div>
<div class="card-footer bg-white shadow p-3">
<div class="row">
<div class="col-md-12">
 
              
    
                <div class="col-md-6">
                <h4>Total₹   <span class="float-end fs-6"><?php echo $totalamount[0]["sum_total"]; ?> </span></h4>
    
                <b>Grand Total₹ <span class="float-end"> <?php echo $totalamount[0]["sum_total"]; ?> </span></b>
                <p>Inclusive of all the applicable taxes</p>
   
                </div>
<?php 
if(!$hash) 
{ 
    ?>
<p><button type="submit" name="checkout" class="btn btn-primary text-white btn-lg w-100">Place Order Now >></button></a></p>
<?php 
}
?>

</div>

</div>
</div>


</div>
</div>
</div>

</div>
</div>

</div>
</div>
</div>
</div>
</section>
<!-- form validator -->

</body>
