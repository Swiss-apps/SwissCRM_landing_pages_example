<!DOCTYPE html>
<html lang="en" xmlns:mso="urn:schemas-microsoft-com:office:office" xmlns:msdt="uuid:C2F41010-65B3-11d1-A29F-00AA00C14882">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title></title>

    <!--[if gte mso 9]><xml>
        <mso:CustomDocumentProperties>
            <mso:display_urn_x003a_schemas-microsoft-com_x003a_office_x003a_office_x0023_Editor msdt:dt="string">Chris Hopson</mso:display_urn_x003a_schemas-microsoft-com_x003a_office_x003a_office_x0023_Editor>
            <mso:Order msdt:dt="string">3100.00000000000</mso:Order>
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
<h1>Confirm Order</h1>
<p style="text-align: center; margin-block-start: 15px;">Please confirm your order.</p>
<div style="text-align: center; margin-block-start: 30px;">
    <a href="/SendConfirmOrder" class="confirm-order-button">Confirm Order</a>
</div>
<div class="requirements">
    <div class="text-wrapper">
        <h3>Overview</h3>
        <p>
            Confirmation is an optional step of the process, and you may not need to use it. This is just and example on how to integrate the API.
        </p>
        <h3>Requirements</h3>
        <ul>
            <li>Should hande the case where you have to check if the transactions has finished and the order was completed.</li>
            <li>It is optional to show the order details here.</li>
        </ul>
    </div>
</div>
<div id="loading-wrapper" style="display: none">
    <img src="../images/loading.gif" />
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
