<script>
    $(document).ready(function () {
        $('.delete-article').on('click', function (e) {
            e.preventDefault();
            var articleId = $(this).data('article-id');
            
            // Perform AJAX request to delete the article
            $.ajax({
                type: 'POST',
                url: 'delete_article.php', // Replace with the actual URL to delete the article
                data: { id: articleId },
                success: function () {
                    // Redirect to index.php after successful deletion
                    window.location.href = 'index.php';
                }
            });
        });
    });
</script>
