
//<script language="JavaScript">
function additemtocart(pid, price, weight, qty, length, width, height)
{
       $.ajax({
        type: 'POST',
        url: '/cart/cart.php?action=addcart&pid=' + pid,
        success: function (response) {
            alert("item added to cart");
        },
        error: function () {
            alert("error");
        }
        

    })
    .fail(function (jqXHR, textStatus, errorThrown) {
            // Request failed. Show error message to user. 
            alert("failed" + jqXHR.responseText);
    })
};

/*
<span id="current"></span><br>
<input type="number" id="n" value="5" step=".5" />

$('#n').on('change paste', function () {
    $("#current").html($(this).val())   
});
// here when click on spinner to change value, call trigger change
$(".input-group-btn-vertical").click(function () {
   $("#n").trigger("change");
});
// you can use this to block characters non numeric
$("#n").keydown(function (e) {
    // Allow: backspace, delete, tab, escape, enter and .
    if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 || (e.keyCode === 65 && e.ctrlKey === true) || (e.keyCode >= 35 && e.keyCode <= 40)) 
           return;

    if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) 
       e.preventDefault();
});
*/
//</script>