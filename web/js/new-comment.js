function sendComment(submit_button="#submit-btn", username, action_url) {
    $(submit_button).click(function(){
        $.ajax({
            type: 'post',
            url: action_url,
            data: $('form').serialize(),
            success: function () {
                var comment = $("form textarea").val();
                var d = new Date();
                var today = d.getFullYear() + "-0" + (d.getMonth()+1) + "-0" + d.getDate();
                $("#comments").append('<div class="card-header bg-white">'+
                    '<div class="d-flex flex-row user-info"><img class="rounded-circle"' +
                    'src="https://i.imgur.com/RpzrMR2.jpg"' +
                    'width="40">'+
                    '<div class="d-flex flex-column justify-content-start ml-2"><span class="d-block font-weight-bold name">'+username+'</span>'+
                    '<span class="date text-black-50">Shared publicly '+today+'</span>' +
                    '</div></div><div class="mt-1">' +
                    '<p class="comment-text mb1"'+
                    'style="margin-bottom: 1px;">'+comment+'</p>'+
                    '</div>'+
                    '</div>');

            },
            error: function() {
                alert('error comment not added');
            }
        });

    });

};