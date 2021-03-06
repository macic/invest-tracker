function sendComment(submit_button="#submit-btn", username, action_url) {
    $(submit_button).click(function(){
        $.ajax({
            type: 'post',
            url: action_url,
            data: $('form').serialize(),
            success: function (response) {
                var comment_id = response;
                var comment = $("form textarea").val();
                var d = new Date();
                var today = d.getFullYear() + "-" + (d.getMonth()+1) + "-" + d.getDate();
                var action_url = 'index.php?r=comment%2Fdelete&id=';
                $("#comments").append(
                ///// wersja z X do usuwania komenta
                '<div class="card-header bg-white">'+ '<div class="row">\n' +
                    '<div class="col-sm-10">'+
                    '<div class="d-flex flex-row user-info"><img class="rounded-circle"' +
                    'src="https://i.imgur.com/RpzrMR2.jpg"' +
                    'width="40" height="40">'+
                    '<div class="d-flex flex-column justify-content-start ml-2"><span class="d-block font-weight-bold name">'+username+'</span>'+
                    '<span class="date text-black-50">Shared publicly '+today+'</span>' +
                    '</div></div></div><div class="col-sm-2">' +
                    '<button type="button" class="close delete-comment-btn" id="'+comment_id+'" aria-label="Close">'+
                    '<span aria-hidden="true">&times;</span></button></div></div>'+
                    '<div class="mt-1">' +
                    '<p class="comment-text mb1"'+
                    'style="margin-bottom: 1px;">'+comment+'</p>'+
                    '</div>'+
                    '</div>');

                deleteComment('#'.concat(comment_id), action_url);
                clearDescription();

            },
            error: function() {
                alert('error comment not added');
            }
        });
    });
};
function clearDescription() {
    $("form textarea").val("");
}
function deleteComment(delete_comment_btn = ".delete-comment-btn",  action_url) {
    $(delete_comment_btn).click(function (event){
        comment_id = event.currentTarget.id;
        url = action_url.concat(comment_id);
        console.log(url);
        $.ajax({
            type: 'post',
            url: url,
            success: function () {
                $('#'.concat(comment_id)).parent().parent().parent().remove();
            }
        })
    })
}

