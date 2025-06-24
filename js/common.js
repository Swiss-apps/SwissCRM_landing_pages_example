$(document).ready(function () {
  $("#credit_card").mask("0000 0000 0000 0000");
  $("#fields_phone, #billingPhone").mask("000-000-0000");
});

$("form").on("submit", function (e) {

  //Fraud detection
  if ($("#additional_data").length > 0) {
    $("#additional_data").val(retrieveAdditionalData());
  }

  if ($("#address_additional_data").length > 0) {
    $("input[name='address_additional_data']").val(
      retrieveAddressAdditionalData()
    );
  }

  if ($("#payment_additional_data").length > 0) {
    $("input[name='payment_additional_data']").val(
      retrievePaymentAdditionalData()
    );
  }
});

$("#payment-as-shipping").on("click", function (e) {
  const ship = $(".shipping");
  ship.toggle();
  toggleRequiredAttr(ship, ship.is(":visible"));
});

// Marks shipping fields on Payment page as required when Billing same as shipping is unchecked
function toggleRequiredAttr($toggleArea, action = true) {
  const billingFields = $toggleArea.find("input, select");
  if (billingFields) {
    billingFields.each(function () {
      if (action) $(this).attr("required", "required");
      else if (!action) $(this).removeAttr("required");
    });
  }
}
