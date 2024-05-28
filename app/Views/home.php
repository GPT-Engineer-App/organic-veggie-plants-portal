<script>
    let page = 1;
    window.onscroll = function() {
        if ((window.innerHeight + window.scrollY) >= document.body.offsetHeight) {
            page++;
            loadMoreProducts(page);
        }
    };

    function loadMoreProducts(page) {
        $.ajax({
            url: '/loadMoreProducts?page=' + page,
            type: 'get',
            beforeSend: function() {
                $('.ajax-load').show();
            }
        })
        .done(function(data) {
            if (data.html == " ") {
                $('.ajax-load').html("No more records found");
                return;
            }
            $('.ajax-load').hide();
            $("#post-data").append(data.html);
        })
        .fail(function(jqXHR, ajaxOptions, thrownError) {
            alert('server not responding...');
        });
    }
</script>