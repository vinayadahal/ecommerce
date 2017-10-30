$(document).ready(function () {
});

//function updateCartItem(obj, id) {
//    $.get("cartAction.php", {action: "updateCartItem", id: id, qty: obj.value}, function (data) {
//        if (data == 'ok') {
//            location.reload();
//        } else {
//            alert('Cart update failed, please try again.');
//        }
//    });
//}


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
        if (value === "") {
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
            $("#subtotal" + subtotal_count).html("Rs. " + response + "/-");
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
        },
        failure: function (response) {
            console.log(response);
        }
    });
}