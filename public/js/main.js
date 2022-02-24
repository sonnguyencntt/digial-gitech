function showModalOrder($id, $name_combo, $store_code) {
    $('#bookingModal').modal('show');
    $("[name=ten_goi]").val($name_combo);
    $("[name=id]").val($id);
    $("[name=store_code]").val($store_code);

}
function postOrder() {
    $name = $("[name=order_name]").val().replace("", "");
    $phone_number = $("[name=order_phone_number]").val().replace("", "");
    $address = $("[name=order_address]").val().replace("", "");
    $store_code = $("[name=store_code]").val();
    $id = $("[name=id]").val();
    var vnf_regex = /((09|03|07|08|05)+([0-9]{8})\b)/g;
    var isPhone = vnf_regex.test($phone_number)
    if ($name.length == 0)
        $(".error-name").removeClass("hide")
    else
        $(".error-name").addClass("hide");
    if ($phone_number.length == 0 || isPhone === false)
        $(".error-phone").removeClass("hide")
    else
        $(".error-phone").addClass("hide");
    if ($address.length == 0)
        $(".error-address").removeClass("hide")
    else
        $(".error-address").addClass("hide");

    if ($address.length > 0 && isPhone === true && $name.length > 0) {
        var hostName =  $('meta[name="host_name"]').attr('content');
        console.log(hostName);
        $(".loading").addClass("processing")
        try {
           
            $.ajax({
                url: `${hostName}/order`,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
                },
                // contentType: "application/json; charset=utf-8",
                data : {name:$name , address:$address , store_code:$store_code , phone_number:$phone_number , product_id:$id},
                error: function ($error) {
                    console.log($error);
                    $(".loading").removeClass("processing")
                    $(".msg-error").html(`${$error.responseJSON.msg}`)

                },
                dataType: 'json',
                success: function (data) {
                    console.log(data);
                    $(".loading").removeClass("processing")
                    $(".msg-success").html(`${data.msg}`);
                    document.getElementById("form-post-order").reset();
                },
                
                type: 'POST'
            });
        } catch (error) {
            $(".loading").removeClass("processing")

            $(".msg").html(`<div class="wpcf7-response-output" aria-hidden="true">Đã xãy ra lỗi, vui lòng kiểm tra lại</div>`)
        }
    }
}