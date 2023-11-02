<h2><?php echo $title; ?></h2>

    <h3><?php echo $news['title']; ?></h3>
    <div class="main">
        <?php echo $news['text']; ?>
    </div>
    <p><a href="<?php echo site_url('news/'.$news['slug']); ?>">View article</a></p>
