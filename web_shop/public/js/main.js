$(document).ready(function(){
    let origin = window.location.origin;

    $("#hi").click(function(){
        $(".hide-img").toggle();
    });

    $('#password').click(function(){
        $('.show-password').toggle();
    });

    $('#size-image').change(function () {
        let sizeImage = $(this).val();
        let elementImage = $('.image-thumbnail-product');

        const MIN_SIZE_IMAGE = 0;
        if(sizeImage > MIN_SIZE_IMAGE){
            elementImage.each(function (index, item) { 
                const VOLUM_SIZE = 50;
                item.width = sizeImage * VOLUM_SIZE;  
            });
        } else{
            alert('errors');
        }
    });

    $('#search-product').keyup(function () {
        let keyword = $(this).val();
        $.ajax({
            type: "GET",
            url: origin + "/product/search",
            data: {'keyword': keyword},
            dataType: "JSON",
            success: function (result) {
                if(result.data){
                    let data = result.data;
                    console.log(data);
                    let html = ``;
                    $.each(data, function (index, item) { 
                         html += `<tr>
                         <th scope="row">${index + 1}</th>
                         <th><img src="storage/images/${item.img}" class="image-thumbnail-product" width="50"></th>
                         <td>${item.name}</td>
                         <td>${item.slug}</td>
                         <td>${item.description}</td>
                         <td>${item.price}</td>
                         <td>${item.category_id}</td>
                         </tr>`;
                    });

                    $('#list-product').html(html);
                }
                        },
            error:function(errors){

            }
        });
    });

    $('.change-quantity-product').change(function () {
        let idProduct = $(this).attr('data-id');
        let quantity = $(this).val();

        if(quantity < 0){
            quantity = 0;
            alert('errors');
        };
        $.ajax({
            type: "GET",
            url: origin + "/cart/" + idProduct +"/update-cart/",
            data: {'quantity': quantity},
            dataType: "JSON",
            success: function (response) {
                if(response.data){
                    let data = response.data;
                    console.log(data);
                    let totalPrice = `$ ${number_format(data[0].totalPrice, 0, ',' , '.')}`;
                    let totalItemPrice = `$ ${number_format(data[0].totalItemPrice, 0, ',' , '.')}`;

                    $('#total-price').html(totalPrice);
                    $('#total-item-price-' + idProduct).html(totalItemPrice);
                }
            }
        });
    });
});