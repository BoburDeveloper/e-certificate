function printDiv(divName) {
    var element = document.getElementsByClassName(divName);
    var i = 0;
    var printContents='';
    for (i = 0; i < element.length; i++) {
        var item = element[i].outerHTML;
        printContents +=  item;
    }
    var originalContents = document.body.innerHTML;

    document.body.innerHTML = printContents;

    window.print();

    document.body.innerHTML = originalContents;

}
