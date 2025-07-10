<article class="item card card-news card-width-picture bg-lightgrey">
    <a href="<?php the_permalink();?>"><?php the_post_thumbnail();?></a>
    <div class="card-content">
        <span class="item-date"><?php echo get_the_date('d M Y'); ?></span>
        <h3 class="item-title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
        <div class="item-excerpt">
        <?php the_excerpt();?>
        <a href="<?php the_permalink();?>" class="readmorelink">Lire la suite</a>
    </div>
</article>