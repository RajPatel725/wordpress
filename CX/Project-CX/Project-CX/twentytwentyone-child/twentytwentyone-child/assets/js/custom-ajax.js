$(document).ready(function() {

    $('#apply_filter').click(function() {
        
        var checked_cat = [];
        $.each($("input[name='product_cat']:checked"), function(){
            checked_cat.push($(this).val());
        });

        $.ajax({
            type: 'POST',
            url:frontendajax.ajaxurl,
            dataType: 'html',
            data: {
                action: 'myfilter',
                checked_cat: checked_cat,
            },
            success: function(res) {
                $('.product-row').html(res);
            }
        });
    });

    $('#search').keyup(function() {

        var keyword = $('#search').val();
        console.log(keyword);

        $.ajax({
            url:frontendajax.ajaxurl,
            type: 'post',
            data: {
                action: 'filter_product',
                keyword: keyword
            },
            success: function(data) {
                $('.product-row').html(data);
            }
        });
    });

});
