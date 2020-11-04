window.initPlusMinusBox = function () {
    /*----------------------------
    	Cart Plus Minus Button
    ------------------------------ */
    $(".qtybutton").on("click", function () {
        let newVal = 0;
        let $button = $(this);
        let oldValue = $button.parent().find('input').val();
        if ($button.text() === "+") {
            newVal = parseInt(oldValue) + 1;
        } else {
            // Don't allow decrementing below zero
            if (oldValue > 1) {
                newVal = parseInt(oldValue) - 1;
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
