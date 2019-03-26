$(document).ready(function() {




    function formatNumber(num) {
        return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,')
    }

    function refresh_page() {
        location.reload();
        $('#myModal').show('fast');
    }

    $('.addToCart').click(function() {

        // var id = $(this).parent().parent().parent().find('.men-thumb-item').attr('id');
        // var image = $(this).parent().parent().parent().find('.men-thumb-item').find('.image_cart').attr('id');
        // var qty = 1;
        // var name = $(this).parent().parent().find('.name_cart').attr('id');
        // var size = $(this).parent().parent().find('.size_cart').attr('id');
        // var price = $(this).parent().parent().find('.size_cart').find('.item_price').attr('id');
        var id = $(this).attr('data-id');
        var name = $(this).attr('data-name');
        var image = $(this).attr('data-image');
        var price = $(this).attr('data-price');
        var size = $(this).attr('data-size');
        var qty = 1;
        var url = $(this).attr('data-url');
        var urlMinus = $('.minusCart').attr('data-url');
        var urlPlus = $('.plusCart').attr('data-url');
        var token = $('input[name="_token"]').attr('value');
        $.ajax({
            type: "POST",
            url: url,
            data: {
                _token: token,
                id: id,
                name: name,
                qty: qty,
                size: size,
                price: price,
                image: image,
            },
            success: function(data) {
                var check = $('#product_cart' + id).hasClass('item' + id);
                var notification = alertify.notify('Bạn vừa thêm món ' + '<u>' + name + '</u>' + ' vào giỏ hàng', 'success', 2, function() { console.log('dismissed'); });
                if (check == false) {
                    $('.all_pro_duct').append(
                        '<div class="row remove_product item' + id + '"' + 'id="product_cart' + id + '">' +
                        '<div class="mobile_cart col-sm-3 id_cart" >' +
                        '<span>' + name + '</span>' +
                        '</div>' +
                        '<div class="mobile_cart col-sm-3" >' +
                        '<div class="row">' +
                        '<div class="number">' +
                        '<span class="cart minus minusCart" id="' + id + '" name="minusCart"  data-url="' + urlMinus + '">-</span>' +
                        '<input class="inputCart" type="text" id="qty_cart' + id + '" value="' + qty + '" disabled/>' +
                        '<span class="cart plus plusCart" name="plusCart" data-url="' + urlPlus + '">+</span>' +
                        '</div>' +
                        '</div>' +
                        '</div>' +
                        '<div class="mobile_cart col-sm-3"><span id="price_cart' + id + '">' + price + '</span></div>' +
                        '<div class="mobile_cart col-sm-3"><Span id="total_cart' + id + '">' + price * qty + '</Span></div>' +
                        '</div>' +
                        '<hr class="remove_hr" id="remove_hr">'
                    );
                    $(document).find('.modal-title').html('Giỏ hàng của bạn hiện có ' + data.amount + ' sản phẩm .');
                    $(document).find('#total_cart_total').html('Tổng Tiền : ' + formatNumber(data.total) + ' VNĐ');
                }
                $.each(data, function(i, val) {
                    var idCart = val.id;
                    $(document).find('#qty_cart' + idCart).val(val.qty);
                    $(document).find('#price_cart' + idCart).html(val.price);
                    $(document).find('#total_cart' + idCart).html(formatNumber(((val.price) * (val.qty))));
                    $(document).find('#total_cart_total').html('Tổng Tiền : ' + formatNumber(data.total) + ' VNĐ');
                })


            }
        });

    });



    $('.minusCart').click(function() {
        var id = $(this).attr('id');
        var qty = $(this).parent().find('.inputCart').val();
        var url = $(this).attr('data-url');
        var token = $('input[name="_token"]').attr('value');
        var check = $('#product_cart' + id).hasClass('item' + id);

        if (qty <= 1) {
            $(document).find('#product_cart' + id).css('display', 'none');
            $(document).find('.remove_cart' + id).css('display', 'none');

        }
        $.ajax({
            type: "POST",
            url: url,
            data: {
                _token: token,
            },
            success: function(data) {

                $.each(data, function(i, val) {
                    var idCart = val.id;
                    $(document).find('#qty_cart' + idCart).val(val.qty);
                    $(document).find('#total_cart' + idCart).html(formatNumber(((val.price) * (val.qty))));
                    $(document).find('#total_cart_total').html('Tổng Tiền : ' + formatNumber(data.total) + ' VNĐ');

                })
            }
        });


    });

    $('.plusCart').click(function() {
        var id = $(this).attr('id');
        var url = $(this).attr('data-url');
        var token = $('input[name="_token"]').attr('value');
        console.log(id);
        $.ajax({
            type: "POST",
            url: url,
            data: {
                _token: token,
            },
            success: function(data) {
                $.each(data, function(i, val) {
                    var idcart = val.id;
                    $(document).find('#qty_cart' + idcart).val(val.qty);
                    $(document).find('#total_cart' + idcart).html(formatNumber(((val.price) * (val.qty))));
                    $(document).find('#total_cart_total').html('Tổng Tiền : ' + formatNumber(data.total) + ' VNĐ');
                })
            }
        });
    });

    $('.delete_cart').click(function() {
        var url = $(this).attr('data-url');
        var token = $('input[name="_token"]').attr('value');

        $.ajax({
            type: "GET",
            url: url,
            data: {
                _token: token,
            },
            success: function(data) {
                $(document).find('.remove_product').css('display', 'none');
                $(document).find('.remove_hr').css('display', 'none');
                $(document).find('#total_cart_total').html('Tổng Tiền : ' + data.total + ' VNĐ');
                $(document).find('.modal-title').html('Bạn chưa có sản phẩm nào trong giỏ hàng');
            }
        });
    });

    $('.btn_delete_check').click(function() {
        var url = $(this).attr('data-url');
        var token = $('input[name="_token"]').attr('value');
        $.ajax({
            type: "GET",
            url: url,
            data: {
                _token: token,
            },
            success: function(data) {
                $(document).find('.remove_body').css('display', 'none');
                $(document).find('.total_check').html(formatNumber(data.total));
                $(document).find('.title_check').html('Bạn chưa có sản phẩm nào trong giỏ hàng');
            }
        });
    });

    $('.close1').click(function() {
        var url = $(this).attr('data-url');
        var id = $(this).attr('id');
        var token = $('input[name="_token"]').attr('value');
        $.ajax({
            type: "DELETE",
            url: url,
            data: {
                _token: token,
            },
            success: function(data) {
                $(document).find('.remove_cart' + id).css('display', 'none');
                $(document).find('.total_check').html(formatNumber(data.total));
            }
        });
    });
});