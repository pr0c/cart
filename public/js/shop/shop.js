$(document).on('click', '.add-to-cart', function(event) {
    let product = $(event.target).parents('.product');
    let product_id = product[0].id;

    $.ajax({
        type: 'post',
        url: '/shop/add-to-cart',
        data: {
            _token: $('meta[name=csrf-token]').attr('content'),
            product: product_id
        },
        dataType: 'json',
        success: (response) => {
            if(response['result'] == 1) {
                console.log(response);
                $('#cart-count').text(parseInt($('#cart-count').text()) + 1);
            }
        },
        error: (response) => {
            console.log(response);
        }
    });
});

$(document).on('click', '.cart-remove', function(event) {
    let cartCount = $('#cart-count').text();
    let item = $(event.target).parents('.item');
    let item_id = item[0].id;

    $.ajax({
        type: 'delete',
        url: 'remove-from-cart',
        data: {
            _token: $('meta[name=csrf-token]').attr('content'),
            item: item_id
        },
        success: (response) => {
            if(response['result'] == 1) {
                item[0].remove();
                cartCount--;
                $('#cart-count').text(cartCount);
                if(cartCount == 0) {
                    $('#cart-count').hide();
                    $('.cart').remove();
                }
            }
        }
    })
});

$(document).on('click', '.toggle', function(event) {
    let category = $(event.target).parents('.category');
    let childrens = $(category[0]).children('.child-categories');
    let icon = $(category[0]).find('.toggle');
    if(childrens[0] !== undefined) {
        let status = !$(childrens[0]).attr('hidden');
        $(childrens[0]).attr('hidden', status);
        if(status) {
            $(icon).removeClass('ri-arrow-drop-down-line');
            $(icon).addClass('ri-arrow-drop-right-line');
        }
        else {
            $(icon).removeClass('ri-arrow-drop-right-line');
            $(icon).addClass('ri-arrow-drop-down-line');
        }
    }
});

$(document).on('click', '.category-title', function(event) {
    let category_id = $(event.target).attr('id');

});
