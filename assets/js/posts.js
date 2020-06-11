function readMore(id) {
    $('#full' + id).css('display', 'block');
    $('#readMore' + id).css('display', 'none');
} 
function upvotePost(id, user_email) {
    var upvotes = $('#upvotes' + id).html();
    if ($('#upvoteBtn' + id).attr('class') == 'btn btn-danger') {
        $('#upvoteBtn' + id).attr('class', 'btn btn-fill btn-danger');
        $('#upvotes' + id).html(++upvotes);
    } else {
        $('#upvoteBtn' + id).attr('class', 'btn btn-danger');
        $('#upvotes' + id).html(--upvotes);
    }
    xhttps = new XMLHttpRequest();
    xhttps.open("GET","lib/ajaxify/upvotePost.php?&post_id="+id);
    xhttps.send();
}
function loadPosts(feed) {
    $('#' + feed).prop('disabled', true);
    var offset = parseInt($('#' + feed).attr('count'), 10);
    var new_offset = offset + 9;
    xhttps = new XMLHttpRequest();
      xhttps.onreadystatechange = function()
      {
        if (this.status == 200 && this.readyState == 4)
        {
            if (this.responseText.length == 0) {
                $('#' + feed).attr('class', 'btn btn-danger');
                $('#' + feed).html("That's all for now <i class='fa fa-frown-o'></i>");
                $('#' + feed).prop('disabled', false);
            } else {
                $('#feed' + feed).append(this.responseText);
                var offset = $('#' + feed).attr('count', new_offset);
                $('#' + feed).prop('disabled', false);
            }
        }
      }
    xhttps.open("GET","lib/ajaxify/loadPosts.php?feed="+feed+"&offset="+offset);
    xhttps.send();
}