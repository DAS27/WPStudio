window.initPlusMinusBox = function () {
    /*----------------------------
    	Cart Plus Minus Button
    ------------------------------ */
    let CartPlusMinus = $('.cart-plus-minus');
    CartPlusMinus.prepend('<div class="dec qtybutton">-</div>');
    CartPlusMinus.append('<div class="inc qtybutton">+</div>');
    $(".qtybutton").on("click", function () {
        let newVal;
        let $button = $(this);
        let oldValue = $button.parent().find("input").val();
        if ($button.text() === "+") {
            newVal = parseFloat(oldValue) + 1;
        } else {
            // Don't allow decrementing below zero
            if (oldValue > 1) {
                newVal = parseFloat(oldValue) - 1;
            } else {
                newVal = 1;
            }
        }
        $button.parent().find("input").val(newVal).request();
    });
};

(function ($) {
    initPlusMinusBox();
})(jQuery);
