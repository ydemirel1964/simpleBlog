function deleteComment(commentId) {
    const xhttp = new XMLHttpRequest();
    var articleId = document.getElementById("blog_id").innerHTML;
    var slug = document.getElementById('slug').innerHTML;
    xhttp.onload = function () {
        if (this.responseText == "success") {
            var element = document.getElementById(String(commentId));
            element.remove();
        }
    }
    xhttp.open("GET", "comment/delete?articleId=" + articleId + "&commentId=" + commentId + "&slug=" + slug + "", true);
    xhttp.send();
}
