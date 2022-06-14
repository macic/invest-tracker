function selectEntity(icon_button = "#icon-button", items_selector= "#icons ul li",
                      input_hidden="#portfolio-icon",
                      template= (icon_id) => `<i style="line-height: 0.75 !important;" class="${icon_id} fa-2x text-gray-300" ></i`) {

    $(icon_button).popover().on('shown.bs.popover', function() {
        $this=this;

        $(items_selector).hover(function(){
            $(this).css("background-color", "grey");
        }, function(){
            $(this).css("background-color", "");
        });

        $(items_selector).click(function (event) {
            var icon_id = event.currentTarget.id;
            // zmienia ikonke
            icon_to_add = template(icon_id);
            $(icon_button).empty();

            // zmienić style property
            $(icon_button).append(icon_to_add);

            // zapisac do input hidden
            $(input_hidden).val(icon_id);

            //zamknąć popover
            $(icon_button).popover('hide');
        });
    });
}

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

    $("#form form").submit(function(event){
        $("#form form .d-none").each(function(){$(this).empty()});
        $("#form form .d-none").each(function(){$(this).remove()});
        return true;

    });
});
