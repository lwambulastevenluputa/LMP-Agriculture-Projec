$(document).ready(function(){
    $(".product_check").click(function(){
        $("#loader").show();

        var action = 'data';
        var category = get_filter_text('category');
        var brand = get_filter_text('brand');
        var price = get_filter_text('price');
        //var ram = get_filter_text('ram');
        //var hdd = get_filter_text('hdd');
        //var processor = get_filter_text('processor');
        //var screen = get_filter_text('screen');
        //var os = get_filter_text('os');
    
        $.ajax({
            url: 'controllers/load_filtered_data.php',
            method: 'POST',
            data: {
                action: action,
                brand: brand,
                category: category,
                price: price
            },
            success: function (response) {
                $("#result").html(response);
                $("#loader").hide();
                $("#textChange").text("Filtered Products");
            }
        });
    });
});
function get_filter_text(text_id) {
    var filterData = [];
    $('#'+text_id+':checked').each(function(){
        filterData.push($(this).val());
    });
    return filterData;
}
