<?php include __DIR__ . '/../partials/header.php' ?>
<div class="container">
    <form action="/admin/posts/edit?id=<?=$post->id?>" method="POST">
        <div class="field">
            <label class="label" for="title">Title</label>
            <div class="control">
                <input class="input" type="text" placeholder="Title" id="title" name="title" value="<?=$post->title?>">
            </div>
        </div>
        <div class="field">
            <label class="label" for="body">Content</label>
            <div class="control">
                <textarea class="textarea" placeholder="Some content here..." id="body" name="body"><?=$post->body?></textarea>
            </div>
        </div>
        <div class="field">
            <input type="submit" value="Update" class="button is-primary">
        </div>
    </form>
</div>
<?php include __DIR__ . '/../partials/footer.php' ?>