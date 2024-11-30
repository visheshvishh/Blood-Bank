<?php
$apiKey="rzp_test_MvQOUU6qTXpv9V";

?>

<script src="https://code.jquery.com/jquery-3.5.0.js"></script>
<form action="https://www.example.com/payment/success/" method="POST">
<script
    src="https://checkout.razorpay.com/v1/checkout.js"
    data-key="<?php echo $apiKey;?>" // Enter the Test API Key ID generated from Dashboard → Settings → API Keys
    data-amount="<?php echo $_POST['amt']*100;?>" // Amount is in currency subunits. Hence, 29935 refers to 29935 paise or ₹299.35.
    data-currency="INR"// You can accept international payments by changing the currency code. Contact our Support Team to enable International for your account
   
    data-buttontext="Pay with Razorpay"
    data-name="Blood Kinship"
    data-description="Helping others is the way we help ourselves!!!"
    data-image="https://www.bing.com/images/search?q=Logo%20for%20Blood%20Donation&FORM=IQFRBA&id=63396383F5785FC6E6B5BA946368AF5EF9BB55B3"
    data-prefill.name="<?php echo $_POST['id'];?>"
    data-prefill.name="<?php echo $_POST['name'];?>"
    data-prefill.email="<?php echo $_POST['email'];?>"
    data-prefill.contact="<?php echo $_POST['mobile'];?>"
    data-theme.color="#F37254"
></script>
<input type="hidden" custom="Hidden Element" name="hidden"/>
</form>