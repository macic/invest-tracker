$(document).ready(function(){
    $("#add-portfolio-asset-btn").click(function(){
        $("#form form .d-none").slice(0,2).removeClass('d-none');
    });


    $("#form form input, #form form select").change(function(){
        var $visibles = $(".assets:visible");
        var labels = Array();
        var data = Array()
        $.each($visibles, function (index, element ){
            if ($(element).attr('id').startsWith('asset')) {
                labels.push($(element).find('option:selected').text());
            } else {
                data.push($(element).val())
            }
        })
        updateDonut($("#portfolio-charts"), labels, data);
    });
});
