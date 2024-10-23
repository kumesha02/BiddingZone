function generateUniqueCode() {
    // Get the current timestamp
    const timestamp = Date.now().toString();

    // Generate a random number between 0 and 9999
    const randomNumber = Math.floor(Math.random() * 10000);

    // Combine timestamp and random number
    const uniqueCode = timestamp + randomNumber.toString().padStart(4, '0');

    return uniqueCode;
}

function payNow() {
    // Example usage
    const code = generateUniqueCode();

    var bidId = document.getElementById("bidId").innerHTML;
    var amount = document.getElementById("pmy").innerHTML;
    var address = document.getElementById("address").innerHTML;
    var fname = document.getElementById("fname").innerHTML;
    var lname = document.getElementById("lname").innerHTML;
    var email = document.getElementById("email").innerHTML;
    var mobile = document.getElementById("mobile").innerHTML;

    var f = new FormData();
    f.append("bidId", bidId);
    f.append("orderId", code);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4 && r.status == 200) {
            var txt = r.responseText;
            // Payment completed. It can be a successful failure.
            payhere.onCompleted = function onCompleted(orderId) {
                console.log("Payment completed. OrderID:" + orderId);
                // Note: validate the payment and show success or failure page to the customer
            };

            // Payment window closed
            payhere.onDismissed = function onDismissed() {
                // Note: Prompt user to pay again or show an error page
                console.log("Payment dismissed");
            };

            // Error occurred
            payhere.onError = function onError(error) {
                // Note: show an error page
                console.log("Error:" + error);
            };

            // Put the payment variables here
            var payment = {
                "sandbox": true,
                "merchant_id": "1222631",    // Replace your Merchant ID
                "return_url": "", // Important
                "cancel_url": "",     // Important
                "notify_url": "",
                "order_id": code,
                "items": "Portral Payment",
                "amount": amount,
                "currency": "LKR",
                "hash": txt, // *Replace with generated hash retrieved from backend
                "first_name": fname,
                "last_name": lname,
                "email": email,
                "phone": mobile,
                "address": address,
                "country": "Sri Lanka",
                "delivery_address": address,
            };

            payhere.startPayment(payment);
            // Show the payhere.js popup, when "PayHere Pay" is clicked
            // document.getElementById('payhere-payment').onclick = function (e) {

            // };
        }
    }

    r.open("POST", "buyer/payment_process.php", true);
    r.send(f);

}
