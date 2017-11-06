var total_items;
$(document).ready(function () {
    checkIndexPageNull();
    total_items = $(".item").length;
    $("#fileToUpload").change(function () { //image preview loader
        if (this.files && this.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#imagePreview').attr('src', e.target.result);
                $('#imagePreview').css({
                    "display": "block"
                });
            },
                    reader.readAsDataURL(this.files[0]);
        }
    });

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
        checkIndexPageNull();
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
    var n = url.lastIndexOf('/');
    var itemId = url.substring(n + 1);
    $.ajax({
        url: url,
        type: 'get',
        cache: false,
        success: function (response) {
//            var total_items = $(".item").length;
            $("#item" + itemId).fadeOut(600);
            $("#item" + itemId).remove();
            grandTotal(total_items);
            var item_count = $(".item").length;
            if (item_count === 0) {
                $("#tbl_content").html("<tr><td colspan=\"5\"><p>Your cart is empty.....</p></td>");
                $("#checkout_btn").after("<td colspan='2'></td>").remove();
            }
        },
        failure: function (response) {
            console.log(response);
        }
    });
}

function grandTotal(total_items) {
//    var item_count = $(".item").length;
//    console.log("item count: " + item_count);
//    console.log("skip id: " + item_count);
    var grand_total = 0;
    for (var i = 1; i <= total_items; i++) {
        if ($("#subtotal" + i).html() === undefined) {
            console.log("Skipped: #subtotal" + i);
            continue;
        }
//        console.log($("#subtotal" + i).html());
        grand_total = grand_total + parseInt($("#subtotal" + i).html());
        console.log("I= " + i);

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


function checkIndexPageNull() {
    var item_count = $("#products .item").length;
    if (item_count === 0) {
        $("#products").html("Product(s) not found.....");
    }
}