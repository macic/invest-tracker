function selectIcon(icon_button="#icon-button") {
    $(icon_button).click(function () {
        $.ajax({
            success: function (response) {
                $("#icons").show();

                $("li").hover(function(){
                    $(this).css("background-color", "grey");
                }, function(){
                    $(this).css("background-color", "");
                });

                previous_class = '';
                $("li").click(function (event){
                    var icon_id = event.currentTarget.id;
                    console.log(icon_id)
                    // zmienia ikonke (nie działa remove)
                    class_to_add = 'form-group col-md-2' + icon_id;
                    $("#icon-button").removeClass(previous_class).empty();
                    $("#icon-button").addClass(class_to_add).empty();
                    previous_class = class_to_add;
                    // zamknac div
                    $("#icons").hide();
                    // zapisac do input hidden
                    $("#portfolio-icon").val(icon_id);

                });
            }
        });
    })
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
