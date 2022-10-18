
//<script language="JavaScript">
function additemtocart(pid, price, weight, qty, length, width, height)
{
       $.ajax({
        type: 'POST',
        url: '/cart/cart.php?action=addcart&pid=' + pid,
        success: function (response) {
           // alert("item added to cart");
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
function updateButton(pid, rowcount, sessionID)
{
    //alert("button pressed PID:" + pid + " rows:" + rowcount);
    current_session=getPHPSessId();
    alert("session next id=",current_session);

    for (let i = 1; i <= rowcount; i++) {
        try{

            qty=document.getElementById("text_QTY" + i).value;
            updatePID=document.getElementById("text_PID" + i).innerText;

            //alert("pid=" + updatePID + " rowcount=" + rowcount + " sessionID=" + sessionID + " QTY=" + qty);
            if(qty=='0'){
                alert("pid=" + updatePID + " rowcount=" + rowcount + " sessionID=" + sessionID + " QTY=" + qty);
            }
            posturl='/cart/cart.php?action=updatecart&pid=' + updatePID + '&id=' + sessionID + '&qty=' + qty;

            $.ajax({
                type: 'POST',
                url: posturl,
                success: function (response) {
                    //alert("item added to cart");
                },
                error: function () {
                    alert("error");
                }
            })
            .fail(function (jqXHR, textStatus, errorThrown) {
                    // Request failed. Show error message to user. 
                    alert("failed" + jqXHR.responseText);
            })
            
        } catch  (error) { alert(error); }
    } 
    window.location.reload();

};

function get_session_id() {
    return /SESS\w*ID=([^;]+)/i.test(document.cookie) ? RegExp.$1 : false;
}

function getPHPSessId() {
    var phpSessionId = document.cookie.match(/PHPSESSID=[A-Za-z0-9]+\;/i);

    if(phpSessionId == null) 
        return '';

    if(typeof(phpSessionId) == 'undefined')
        return '';

    if(phpSessionId.length <= 0)
        return '';

    phpSessionId = phpSessionId[0];

    var end = phpSessionId.lastIndexOf(';');
    if(end == -1) end = phpSessionId.length;

    return phpSessionId.substring(10, end);
}



//The following can be used to retrieve JSESSIONID:

function getJSessionId(){
    var jsId = document.cookie.match(/JSESSIONID=[^;]+/);
    if(jsId != null) {
        if (jsId instanceof Array)
            jsId = jsId[0].substring(11);
        else
            jsId = jsId.substring(11);
    }
    return jsId;
}
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