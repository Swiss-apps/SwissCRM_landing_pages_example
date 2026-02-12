<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title></title>


    <!--      CollectJS Start-->
    <script src="https://secure.nmi.com/token/Collect.js"
            data-tokenization-key="48U7N8-pvCDKA-SFjSQm-92436G"
    ></script>
</head>
<link type="text/css" href="../css/common.css" rel="stylesheet" />
<body>
<h1>Payment page</h1>
<form id="payment" method="post" accept-charset="utf-8" action="/OrderFormSubmit">
    <input
            type="hidden"
            id="additional_data"
            name="payment_additional_data"
            value=""
    />
    <label
            for="payment_as_shipping"
            class="payment_as_shipping_label"
            id="payment-as-shipping"
    >
        <input
                id="payment_as_shipping"
                class="chkbox bill-inp"
                name=""
                type="checkbox"
                checked
        />
        <span>Billing same as shipping</span>
    </label>
    <div class="shipping" style="display: none">
        <h2>Shipping information</h2>
        <div class="row">
            <div class="column">
                <label>First Name:</label>
            </div>
            <div class="column">
                <label>Last Name:</label>
            </div>
        </div>
        <div class="row">
            <div class="column">
                <input
                        id="fields_fname"
                        name="fields_fname"
                        type="text"
                        title="First Name"
                        placeholder="First Name*"
                        onkeyup="javascript: this.value = this.value.replace(/[^a-zA-Z\ \,\-]/g, '');"
                        onchange="javascript: this.value = this.value.replace(/[^a-zA-Z\ \,\-]/g, '');"
                        value="<?=@$_SESSION['lead']->bill_first_name;?>"
                />
            </div>
            <div class="column">
                <input
                        id="fields_lname"
                        name="fields_lname"
                        type="text"
                        title="Last Name"
                        placeholder="Last Name*"
                        onkeyup="javascript: this.value = this.value.replace(/[^a-zA-Z\ \,\-]/g, '');"
                        onchange="javascript: this.value = this.value.replace(/[^a-zA-Z\ \,\-]/g, '');"
                        value="<?=@$_SESSION['lead']->bill_last_name;?>"
                />
            </div>
        </div>
        <div class="row">
            <div class="column">
                <label>Address:</label>
            </div>
        </div>
        <div class="column">
            <input
                    id="fields_address1"
                    name="fields_address1"
                    type="text"
                    title="Address"
                    placeholder="Address*"
                    value="<?=@$_SESSION['lead']->bill_address1;?>"
            />
        </div>
        <div class="row">
            <div class="column">
                <label>Postal Code:</label>
            </div>
        </div>
        <div class="column">
            <input
                    id="fields_zip"
                    name="fields_zip"
                    type="tel"
                    title="Postal Code"
                    placeholder="Postal Code*"
                    maxlength="5"
                    minlength="5"
                    onKeyUp="javascript: this.value = this.value.replace(/[^0-9]/g, '');"
                    value="<?=@$_SESSION['lead']->bill_postal_code;?>"
            />
        </div>
        <div class="row">
            <div class="column">
                <label>City:</label>
            </div>
        </div>
        <div class="column">
            <input
                    id="fields_city"
                    name="fields_city"
                    type="text"
                    title="City"
                    placeholder="City*"
                    onkeyup="javascript: this.value = this.value.replace(/[^a-zA-Z\ \,\-]/g, '');"
                    onchange="javascript: this.value = this.value.replace(/[^a-zA-Z\ \,\-]/g, '');"
                    value="<?=@$_SESSION['lead']->bill_city;?>"
            />
        </div>
        <div class="column">
            <label for="fields_state">State:</label>
            <select id="fields_state" name="fields_state" data-selected="">
                <option value="">Select State*</option>
                <option value="AL">Alabama (AL)</option>
                <option value="AK">Alaska (AK)</option>
                <option value="AZ">Arizona (AZ)</option>
                <option value="AR">Arkansas (AR)</option>
                <option value="CA">California (CA)</option>
                <option value="CO">Colorado (CO)</option>
                <option value="CT">Connecticut (CT)</option>
                <option value="DE">Delaware (DE)</option>
                <option value="DC">District of Columbia (DC)</option>
                <option value="FL">Florida (FL)</option>
                <option value="GA">Georgia (GA)</option>
                <option value="HI">Hawaii (HI)</option>
                <option value="ID">Idaho (ID)</option>
                <option value="IL">Illinois (IL)</option>
                <option value="IN">Indiana (IN)</option>
                <option value="IA">Iowa (IA)</option>
                <option value="KS">Kansas (KS)</option>
                <option value="KY">Kentucky (KY)</option>
                <option value="LA">Louisiana (LA)</option>
                <option value="ME">Maine (ME)</option>
                <option value="MD">Maryland (MD)</option>
                <option value="MA">Massachusetts (MA)</option>
                <option value="MI">Michigan (MI)</option>
                <option value="MN">Minnesota (MN)</option>
                <option value="MS">Mississippi (MS)</option>
                <option value="MO">Missouri (MO)</option>
                <option value="MT">Montana (MT)</option>
                <option value="NE">Nebraska (NE)</option>
                <option value="NV">Nevada (NV)</option>
                <option value="NH">New Hampshire (NH)</option>
                <option value="NJ">New Jersey (NJ)</option>
                <option value="NM">New Mexico (NM)</option>
                <option value="NY">New York (NY)</option>
                <option value="NC">North Carolina (NC)</option>
                <option value="ND">North Dakota (ND)</option>
                <option value="OH">Ohio (OH)</option>
                <option value="OK">Oklahoma (OK)</option>
                <option value="OR">Oregon (OR)</option>
                <option value="PA">Pennsylvania (PA)</option>
                <option value="RI">Rhode Island (RI)</option>
                <option value="SC">South Carolina (SC)</option>
                <option value="SD">South Dakota (SD)</option>
                <option value="TN">Tennessee (TN)</option>
                <option value="TX">Texas (TX)</option>
                <option value="UT">Utah (UT)</option>
                <option value="VT">Vermont (VT)</option>
                <option value="VA">Virginia (VA)</option>
                <option value="WA">Washington (WA)</option>
                <option value="WV">West Virginia (WV)</option>
                <option value="WI">Wisconsin (WI)</option>
                <option value="WY">Wyoming (WY)</option>
            </select>
        </div>
        <div class="row">
            <div class="column">
                <label>Phone:</label>
            </div>
        </div>
        <div class="row">
            <div class="column">
                <input
                        id="fields_phone"
                        name="fields_phone"
                        type="tel"
                        title="Phone Number"
                        placeholder="Phone Number*"
                        maxlength="10"
                        value="<?=@$_SESSION['lead']->phone;?>"
                />
            </div>
        </div>
        <h2 class="billing-title">Billing information</h2>
    </div>
    Credit Card Fields
    <div class="row">
        <div class="column">
            <label>Credit Card Number:</label>
            <div id="ccnumber"></div>
        </div>
    </div>
    <div class="row">
        <div class="column">
            <label>Expiry Date:</label>
            <div id="ccexp"></div>
        </div>
    </div>

    <div class="row">
        <div class="column">
            <label>CVV:</label>
            <div id="cvv"></div>
        </div>
    </div>
    <!--        Credit card fields end-->
    <button id="demoPayButton" type="button">Pay</button>

</form>
<div id="loading-wrapper" style="display: none">
    <img src="../images/loading.gif" />
</div>
<div class="requirements">
    <div class="text-wrapper">
        <h3>Overview</h3>
        <p>
            The base purchase is initiated on payment page.<br />This page
            captures customer billing information and shipping information.<br />
            Shipping information is optional unless the customer marks that their
            shipping information is not the same as billing information.
        </p>
        <h3>Requirements</h3>
        <ul>
            <li>All visible form fields need to be filled out</li>
            <li>
                Anti-fraud script needs to be run on filled out fields (see
                fraud-detection.js script)
            </li>
        </ul>
    </div>
</div>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        window.CollectJS.configure({
            variant: "inline",
            invalidCss: {
                color: "#e74c3c",
                "border-color": "#e74c3c",
            },
            paymentSelector: "#demoPayButton",
            fields: {
                ccnumber: {
                    selector: "#ccnumber",
                    title: "Card Number",
                    placeholder: "0000 0000 0000 0000",
                },
                ccexp: {
                    selector: "#ccexp",
                    title: "Card Expiration",
                    placeholder: "00 / 00",
                },
                cvv: {
                    selector: "#cvv",
                    title: "CVV Code",
                    placeholder: "123",
                }
            },
            price: "1.00",
            currency: "USD",
            country: "US",
            validationCallback: function (field, status, message) {
                if (status) {
                    var message = field + " is now OK: " + message;
                } else {
                    var message = field + " is now Invalid: " + message;
                }
                console.log(message);
            },
            timeoutDuration: 10000,
            timeoutCallback: function () {
                console.log(
                    "The tokenization didn't respond in the expected timeframe.  This could be due to an invalid or incomplete field or poor connectivity"
                );
            },
            fieldsAvailableCallback: function () {
                console.log("Collect.js loaded the fields onto the form");
            },
            callback: function (response) {
                alert(response.token);
                var input = document.createElement("input");
                input.type = "hidden";
                input.name = "payment_token";
                input.value = response.token;
                var form = document.getElementById("payment");
                form.appendChild(input);
                form.submit();
            },
        })

    });
</script>
<script
        type="text/javascript"
        src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.min.js"
></script>
<script
        defer
        type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js?v=2"
></script>
<script defer type="text/javascript" src="../js/fraud-detection.js"></script>
<script defer type="text/javascript" src="../js/common.js"></script>
</body>
</html>
