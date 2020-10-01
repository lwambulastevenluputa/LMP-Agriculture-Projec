$(document).ready(function(){
        
    $(".addItemBtn").click(function(e){
        // prevent the page from refreshing when you press addToCart button
        e.preventDefault();
        var $form = $(this).closest(".form-submit");
        var pid = $form.find(".pid").val();
        var pname = $form.find(".pname").val();
        var pprice = $form.find(".pprice").val();
        var pimage = $form.find(".pimage").val();
        var pcode = $form.find(".pcode").val();
        var currency = $form.find(".currency").val();
    
        $.ajax({
            url: 'addToCart.php',
            method: 'post',
            data: {pid:pid,pname:pname,pprice:pprice,pimage:pimage,pcode:pcode},
            success:function(response) {
                $("#message").html(response);
                window.scrollTo(0,0);
                load_cart_item_number();
            }
        });
    });

    load_cart_item_number();

    function load_cart_item_number() {
        $.ajax({
            url: 'addToCart.php',
            method: 'get',
            data: {cartItem: "cart_item"},
            success: function(response){
                $("#cart-item").html(response);
            }
        });
    }
});