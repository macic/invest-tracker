function selectIcon(icon_button="#icon-select") {
    $(icon_button).click(function () {
        $.ajax({
            success: function (response) {
                $("#icons").show();

                $("#icons ul li").hover(function(){
                    $(this).css("background-color", "grey");
                }, function(){
                    $(this).css("background-color", "");
                });

                $("#icons ul li").click(function (event){
                    var icon_id = event.currentTarget.id;
                    console.log(icon_id)
                    // zmienia ikonke
                    icon_to_add = '<i style="line-height: 0.75 !important;" class="' + icon_id + ' fa-2x text-gray-300" ></i>';
                    $("#icon-select").empty();
                    // zmienić style property
                    // $("#icon-select").css("line-height", "0.75");
                    // $("#icon-select").css("line-height", "");
                    $("#icon-select").append(icon_to_add);



                    // zamknac div
                    $("#icons").hide();
                    // zapisac do input hidden
                    $("#portfolio-icon").val(icon_id);

                });
            }
        });
    })
}

function selectColor(button="#color-select") {
    $(button).click(function () {
        $.ajax({
            success: function (response) {
                $("#colors").show();

                $("#colors ul li").click(function (event){
                    var color_id = event.currentTarget.id;
                    console.log(color_id)
                    // zmienia color
                    color_to_add = '<p class="bg-' + color_id + ' text-' + color_id + '">...</p>';
                    $("#color-select").empty();
                    // zmienić style property
                    // $("#icon-select").css("line-height", "0.75");
                    // $("#icon-select").css("line-height", "");
                    $("#color-select").append(color_to_add);



                    // zamknac div
                    $("#colors").hide();
                    // zapisac do input hidden
                    $("#portfolio-color").val(color_id);

                    // zły zapis do bazy

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
