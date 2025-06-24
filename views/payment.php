<!DOCTYPE html>
<html lang="en" xmlns:mso="urn:schemas-microsoft-com:office:office" xmlns:msdt="uuid:C2F41010-65B3-11d1-A29F-00AA00C14882">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title></title>
  
<!--[if gte mso 9]><xml>
<mso:CustomDocumentProperties>
<mso:display_urn_x003a_schemas-microsoft-com_x003a_office_x003a_office_x0023_Editor msdt:dt="string">Chris Hopson</mso:display_urn_x003a_schemas-microsoft-com_x003a_office_x003a_office_x0023_Editor>
<mso:Order msdt:dt="string">3200.00000000000</mso:Order>
<mso:ComplianceAssetId msdt:dt="string"></mso:ComplianceAssetId>
<mso:_ExtendedDescription msdt:dt="string"></mso:_ExtendedDescription>
<mso:display_urn_x003a_schemas-microsoft-com_x003a_office_x003a_office_x0023_Author msdt:dt="string">Chris Hopson</mso:display_urn_x003a_schemas-microsoft-com_x003a_office_x003a_office_x0023_Author>
<mso:TriggerFlowInfo msdt:dt="string"></mso:TriggerFlowInfo>
<mso:ContentTypeId msdt:dt="string">0x010100D1BCC6CA9BDFAE47AAB8F6BE8CB19CF9</mso:ContentTypeId>
<mso:_SourceUrl msdt:dt="string"></mso:_SourceUrl>
<mso:_SharedFileIndex msdt:dt="string"></mso:_SharedFileIndex>
</mso:CustomDocumentProperties>
</xml><![endif]-->
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
      <div class="row">
        <div class="column">
          <label>Credit card:</label>
        </div>
      </div>
      <div class="column">
        <input
          required
          id="credit_card"
          name="credit_card"
          type="tel"
          placeholder="Card Number"
          maxlength="20"
        />
      </div>
      <div class="row">
        <div class="column">
          <label>Card Expiry Date:</label>
        </div>
        <div class="column">
          <label></label>
        </div>
      </div>
      <div class="row">
        <div class="column">
          <select required id="cc_expmonth" name="cc_expmonth">
            <option value="">Month</option>
            <option value="01">01 - January</option>
            <option value="02">02 - February</option>
            <option value="03">03 - March</option>
            <option value="04">04 - April</option>
            <option value="05">05 - May</option>
            <option value="06">06 - June</option>
            <option value="07">07 - July</option>
            <option value="08">08 - August</option>
            <option value="09">09 - September</option>
            <option value="10">10 - October</option>
            <option value="11">11 - November</option>
            <option value="12">12 - December</option>
          </select>
        </div>
        <div class="column">
          <select required id="cc_expyear" name="cc_expyear">
            <option value="">Year</option>
            <option value="25">2025</option>
            <option value="26">2026</option>
            <option value="27">2027</option>
            <option value="28">2028</option>
            <option value="29">2029</option>
            <option value="30">2030</option>
            <option value="31">2031</option>
            <option value="32">2032</option>
            <option value="33">2033</option>
            <option value="34">2034</option>
            <option value="35">2035</option>
            <option value="36">2036</option>
            <option value="37">2037</option>
            <option value="38">2038</option>
            <option value="39">2039</option>
            <option value="40">2040</option>
            <option value="41">2041</option>
          </select>
        </div>
      </div>
      <div class="row">
        <div class="column">
          <label>CVV:</label>
        </div>
      </div>
      <div class="column">
        <input
          required
          id="cc_cvv"
          name="cc_cvv"
          type="tel"
          placeholder="CVV"
          maxlength="4"
          onKeyUp="javascript: this.value = this.value.replace(/[^0-9]/g, '');"
        />
      </div>
      <button class="button-submit" type="submit">
        Purchase and continue to upsell page
      </button>
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
    <script
      defer
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
