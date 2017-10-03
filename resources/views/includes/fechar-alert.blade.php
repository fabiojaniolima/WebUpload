<script>
    /* fecha o alert após um determinado tempo */
    window.setTimeout(function () {
        $(".alert").fadeTo(500, 0).slideUp(500, function () {
            $(this).remove();
        });
    }, 7000);
</script>