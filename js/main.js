;(function (window) {
    console.log('JS');

    var currentExchange = document.getElementsByClassName('pp-form-course')[0];
    currentExchange = currentExchange.getElementsByTagName('span')[0];
    currentExchange = parseFloat(currentExchange.textContent);

    $('#sumFrom').keyup(function (event) {
        var value = event.target;
        var str = $(value).val();
        str = str.replace(/\s+/g, '');
        var numb = parseFloat(str);
        numb = currentExchange * numb;
        numb = numb.toFixed(2);
        $('#sumTo').val(numb);
    });

    $('#sumTo').keyup(function (event) {
        var value = event.target;
        var str = $(value).val();
        str = str.replace(/\s+/g, '');
        var numb = parseFloat(str);
        numb = numb / currentExchange;
        numb = numb.toFixed(2);
        $('#sumFrom').val(numb);
    });

})(window);