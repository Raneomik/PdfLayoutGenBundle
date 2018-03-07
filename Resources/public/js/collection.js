$('.btn-add').click(function(event) {
    var collectionHolder = $('#' + $(this).attr('data-target'));
    var type = $("#field_type").val();

    $.ajax({
        url: "/prototype/"+type,
        success: function(data) {
            var prototype = data;
            var form = prototype.replace(/__name__/g, collectionHolder.children().length);
            collectionHolder.append(form);
        }
    });
    return false;
});


$('[data-prototype]').on( "click",'a.btn-remove',function(event) {
    var name = $(this).attr('data-related');
    $('*[data-content="'+name+'"]').remove();
    return false;
});


