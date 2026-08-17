<?php include "header.php"; ?>
<?php
require('razorpay-config.php'); // Contains $keyId and $keySecret
?>

<section class="account-payment-section" style="margin-top: 100px;" >
    <div class="account-payment-wrapper">

        <!-- ACCOUNT DETAILS -->
        <div class="account-card">
            <h3>Account Details</h3>
            <div class="info-row"><span>Account Name</span><strong>Jan Kalyan Educational And Welfare Trust</strong></div>
            <div class="info-row"><span>Account Number</span><strong>50200051156846</strong></div>
            <div class="info-row"><span>Bank Name</span><strong>HDFC Bank</strong></div>
            <div class="info-row"><span>IFSC Code</span><strong>HDFC0009096</strong></div>
            <div class="info-row"><span>Branch Code</span><strong>009096</strong></div>
            <div class="info-row"><span>MICR NO</span><strong>28124004</strong></div>
            <div class="info-row"><span>Branch Add</span><strong>NH-19,Township Chowk, Mathura Uttar Pradesh 281006</strong></div>
        </div>

        <!-- ONLINE PAYMENT -->
        <div class="account-card payment-card">
            <h3>Online Payment</h3>
            <p class="payment-text">Enter the amount you want to donate (INR):</p>
            <input type="number" id="donationAmount" class="donation-input" placeholder="Enter Amount">
            <button id="payBtn" class="pay-btn"><i class="fas fa-credit-card"></i> Pay Now</button>
        </div>

    </div>
</section>

<!-- ================= CSS ================= -->
<style>
.account-payment-section { 
    padding: 90px 20px; 
    background: #f4f6fb; 
    font-family: 'Segoe UI', sans-serif; 
}
.account-payment-wrapper { 
    max-width: 1200px; 
    margin: auto; 
    display: grid; 
    grid-template-columns: repeat(2, 1fr); 
    gap: 30px; 
}
.account-card { 
    background: #ffffff; 
    padding: 35px; 
    border-radius: 18px; 
    box-shadow: 0 15px 40px rgba(0,0,0,0.08); 
}
.account-card h3 { 
    font-size: 26px; 
    margin-bottom: 25px; 
    color: #1d3557; 
    font-weight: 700; 
}
.info-row { 
    display: flex; 
    justify-content: space-between; 
    padding: 14px 0; 
    border-bottom: 1px dashed #dcdcdc; 
    font-size: 15px; 
}
.info-row span { color: #6c757d; }
.info-row strong { color: #1d3557; font-weight: 600; }
.payment-text { font-size: 15px; color: #555; margin-bottom: 20px; }
.donation-input { 
    width: 100%; 
    padding: 12px 15px; 
    font-size: 16px; 
    margin-bottom: 20px; 
    border-radius: 10px; 
    border: 1px solid #dcdcdc; 
    outline: none; 
    transition: all 0.3s ease; 
}
.donation-input:focus { 
    border-color: #1d3557; 
    box-shadow: 0 0 10px rgba(29,53,87,0.2); 
}
.pay-btn { 
    display: inline-flex; 
    align-items: center; 
    gap: 8px; 
    padding: 14px 30px; 
    background: linear-gradient(135deg, #1d3557, #457b9d); 
    color: #fff; 
    border-radius: 30px; 
    font-weight: 600; 
    cursor:pointer; 
    border:none; 
    font-size: 16px; 
    transition: 0.3s ease; 
}
.pay-btn:hover { 
    transform: translateY(-2px); 
    box-shadow: 0 10px 20px rgba(0,0,0,0.18); 
}
.payment-methods { list-style: none; padding: 0; margin-bottom: 30px; }
.payment-methods li { font-size: 15px; color: #333; margin-bottom: 12px; }
.payment-methods i { color: #2a9d8f; margin-right: 8px; }
@media (max-width: 768px) { 
    .account-payment-wrapper { grid-template-columns: 1fr; } 
}
</style>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>

<script>
document.getElementById('payBtn').onclick = function() {
    var amount = document.getElementById('donationAmount').value;
    if(amount == "" || amount <= 0){
        alert("Please enter a valid donation amount.");
        return;
    }

    fetch("create-order.php", {
        method: "POST",
        headers: {"Content-Type": "application/json"},
        body: JSON.stringify({amount: amount})
    })
    .then(res => res.json())
    .then(order => {
        if(order.id){
            var options = {
                "key": "<?php echo $keyId; ?>", // Razorpay Key ID from config
                "amount": order.amount,
                "currency": order.currency,
                "name": "Jan Kalyan Educational And Welfare Trust",
                "description": "Donation",
                "order_id": order.id,
                "handler": function(response){
                    fetch("verify.php", {
                        method: "POST",
                        headers: {"Content-Type": "application/json"},
                        body: JSON.stringify(response)
                    })
                    .then(res => res.json())
                    .then(data => {
                        if(data.status === "success"){
                            alert("Donation Successful! Payment ID: " + response.razorpay_payment_id);
                            window.location.href = "donate-now.php";
                        } else {
                            alert("Payment verification failed.");
                        }
                    });
                },
                "theme": { "color": "#1d3557" }
            };
            var rzp = new Razorpay(options);
            rzp.open();
        } else {
            alert("Unable to create order. Please try again.");
        }
    });
}
</script>

<?php include "footer.php"; ?>
