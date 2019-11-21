function heightsEqualizer(selector) {
    var elements = document.querySelectorAll(selector),
        max_height = 0,
        len = 0,
        i;

    if ( (elements) && (elements.length > 0) ) {
        len = elements.length;

        for (i = 0; i < len; i++) { // get max height
            elements[i].style.height = ''; // reset height attr
            if (elements[i].clientHeight > max_height) {
                max_height = elements[i].clientHeight;
            }
        }

        for (i = 0; i < len; i++) { // set max height to all elements
            elements[i].style.height = max_height + 'px';
        }
    }
}
heightsEqualizer('.inner-case');

jQuery(function($){
    $('.side-cart .close-link').click(function(){
        $('.side-cart').css('right', '-390px');
        $('.side-cart-total').css('right', '-390px');
    });
    $('.side-cart .open-link').click(function(){
        $('.side-cart').css('right', '0');
        $('.side-cart-total').css('right', '0');
    })
    $('li.browse-case').click(function(){
        $('.cases-sub-menu').fadeToggle();
        return false;
    });
});
