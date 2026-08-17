<?php include "header.php"; ?>

<section class="account-payment-section">
    <div class="account-payment-wrapper">

        <div class="account-card payment-card">
            <h3>Online Payment</h3>

            <p class="payment-text">
                You can securely contribute using the following online payment options.
            </p>

            <ul class="payment-methods">
                <li>✔ UPI / QR Code</li>
                <li>✔ Debit / Credit Card</li>
                <li>✔ Net Banking</li>
                <li>✔ Google Pay / PhonePe / Paytm</li>
            </ul>

            <button id="payNowBtn" class="pay-btn">
                Pay Now
            </button>
        </div>

    </div>
</section>

<!-- Razorpay JS -->
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>

<script>
document.getElementById("payNowBtn").onclick = function () {

    var options = {
        "key": "rzp_test_XXXXXXXXXX", // 🔴 YOUR KEY ID
        "amount": 50000,             // ₹500 (in paise)
        "currency": "INR",
        "name": "ABC Welfare Organization",
        "description": "Donation Payment",

        "handler": function (response) {

            // Send payment ID to server
            fetch("payment-success.php", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json"
                },
                body: JSON.stringify({
                    razorpay_payment_id: response.razorpay_payment_id
                })
            })
            .then(res => res.json())
            .then(data => {
                if (data.status === "success") {
                    alert("Payment successfully completed!");
                    window.location.href = "donate-now.php";
                } else {
                    alert("Payment verification failed!");
                }
            });
        },

        "theme": {
            "color": "#1d3557"
        }
    };

    var rzp = new Razorpay(options);
    rzp.open();
};
</script>

<style>
.account-payment-section {
    padding: 80px 20px;
    background: #f4f6fb;
}

.account-payment-wrapper {
    max-width: 500px;
    margin: auto;
}

.account-card {
    background: #fff;
    padding: 30px;
    border-radius: 16px;
    box-shadow: 0 15px 40px rgba(0,0,0,0.08);
}

.pay-btn {
    padding: 14px 30px;
    background: #1d3557;
    color: #fff;
    border: none;
    border-radius: 30px;
    font-size: 16px;
    cursor: pointer;
}
</style>

<?php include "footer.php"; ?>
