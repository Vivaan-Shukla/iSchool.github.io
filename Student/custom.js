$(document).ready(function () {
    $(function () {
        $("#playlist li").on("click", function () {
            $("#videoarea").attr({
                src: $(this).attr("moveurl"),
            });
        });
        $("#videoarea").attr({
            src: $("#playlist li").eq(0).attr("movieurl",)
        });
    });
});