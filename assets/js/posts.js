function readMore(id) {
    $('#full' + id).css('display', 'block');
    $('#peek' + id).css('display', 'none');
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
function loadPosts(feed, user_posts) {
    $('#id' + String(feed)).prop('disabled', true);
    var offset = parseInt($('#id' + String(feed)).attr('count'), 10);
    var new_offset = offset + 9;
    xhttps = new XMLHttpRequest();
      xhttps.onreadystatechange = function()
      {
        if (this.status == 200 && this.readyState == 4)
        {
            if (this.responseText.length == 0) {
                $('#id' + String(feed)).attr('class', 'btn btn-danger');
                $('#id' + String(feed)).html("That's all for now <i class='fa fa-frown-o'></i>");
                $('#id' + String(feed)).prop('disabled', false);
            } else {
                $('#feed' + String(feed)).append(this.responseText);
                var offset = $('#id' + String(feed)).attr('count', new_offset);
                $('#id' + String(feed)).prop('disabled', false);
            }
        }
      }
    xhttps.open("GET","lib/ajaxify/loadPosts.php?feed="+feed+"&offset="+offset+"&user_posts="+user_posts);
    xhttps.send();
}
function deletePost(id) {
    if ($('#delete' + id).attr('count') == 0) {
        $('#delete' + id).attr('count', 1);
        $('#delete' + id).html('Press again to confirm delete');
    } else {
        $('#' + id).css('display', 'none');
        xhttps = new XMLHttpRequest();
    //     xhttps.onreadystatechange = function()
    //   {
    //     if (this.status == 200 && this.readyState == 4)
    //     {
    //         alert(this.responseText);
    //     }
    //   }
        xhttps.open("GET","lib/ajaxify/delete_post.php?&post_id="+id);
        xhttps.send();
    }
}