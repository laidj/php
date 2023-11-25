<?php
if (isset($post->id)) {
    $postId = $post->id;
?>

<?php include __DIR__ . '/../partials/header.php'; ?>
<div class="container">
    <h2><?php echo $post->title; ?></h2>
    <p><?php echo $post->body; ?></p>

    <form action="/admin/posts/delete?id=<?=$post->id?>" method="POST">
        <input type="hidden" name="post_id" value="<?php echo $postId; ?>">
        <input type="submit" value="Delete" class="button is-danger" onclick="return confirm('Are you sure you want to delete this post?');">
    </form>
</div>
<?php include __DIR__ . '/../partials/footer.php'; ?>

<?php
} else {
    echo "Post not found!";
}
?>
