//faz com que o alert desapareça  após 3 segundos.
$(document).ready(function() {
    // show the alert
    setTimeout(function() {
        $(".alert").alert('close');
    }, 3000);
});