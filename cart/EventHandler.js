
<script language="JavaScript">
function additemtocart(pid, price, weight, qty, length, width, height)
{
    //alert("data" + pid + price + weight + qty + length + width + height);

     $.ajax({
        type: 'POST',
        url: '/cart/cart.php?action=addcart&pid=' + pid,
        //data: jQuery.param({ action: "addcart"}) ,
        //data: "pid= + pid + &price= + price +&weight= + weight + &qty= + qty + &length= + length + &width= + width + &height= + height",	
        //contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
        //"action=addcart",
        success: function (response) {
            alert("item added to cart");
        },
        error: function () {
            alert("error");
        }
        
        /*success: function(data) {
            //$("p").text(data);
            alert("Item Added to cart" + data);
        }*/
    })
    .fail(function (jqXHR, textStatus, errorThrown) {
            // Request failed. Show error message to user. 
            // errorThrown has error message.
            alert("failed" + jqXHR.responseText);
    })
};
</script>