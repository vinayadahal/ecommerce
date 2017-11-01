$(document).ready(function () {
});


function hide_product(item_id) {
    var url = $("#" + item_id).attr("link");
    ajax_addToCart(item_id, url);
}


function ajax_addToCart(item_id, url) {
    $.ajax({
        url: url,
        context: document.body
    }).done(function () {
        $("#" + item_id).fadeOut(600);
        $("#" + item_id).remove();
        var value = $("#item_count").html();
        if (value === "" || value === "0") {
            $("#item_count").html(1);
        }
        if (value >= 1) {
            $("#item_count").html(+value + +1);
        }
        $("#item_count").fadeIn(600);
    });
}

function update_itemCount(url, obj) {
    var subtotal_count = url.substr(url.length - 1);
    $.ajax({
        url: url + '/' + obj.value,
        type: 'get',
        cache: false,
        success: function (response) {
            $("#subtotal" + subtotal_count).html(response);
            grandTotal();
        },
        failure: function (response) {
            console.log(response);
        }
    });
}

function removeFromCart(url) {
    var itemId = url.substr(url.length - 1);
    $.ajax({
        url: url,
        type: 'get',
        cache: false,
        success: function (response) {
            $("#item" + itemId).fadeOut(600);
            $("#item" + itemId).remove();
            grandTotal();
            var item_count = $(".item").length;
            if (item_count === 0) {
                $("#tbl_content").html("<tr><td colspan=\"5\"><p>Your cart is empty.....</p></td>");
            }
        },
        failure: function (response) {
            console.log(response);
        }
    });
}

function grandTotal() {
    var item_count = $(".item").length;
    var grand_total = 0;
    for (var i = 1; i <= item_count; i++) {
        grand_total = grand_total + parseInt($("#subtotal" + i).html());
    }
    $("#grand_total").html(grand_total);
}

function signup_validation() {
    var num_element = $(".form_table :input[type='text']").length;
    compare_password();
    for (var i = 1; i <= num_element; i++) {
        return check_null("id" + i);
    }
}

function check_null(id) {
    var value = $("#" + id).val();
    if (value === "") {
        $("#" + id).css({
            "border-color": "#ff0000"
        });
        return false;
    }
}

function compare_password() {
    check_null("pass1");
    check_null("pass2");
    if ($("#pass1").val() === $("#pass2").val()) {
        return true;
    }
    alert("Passwords donot match !!!")
    return false;
}
