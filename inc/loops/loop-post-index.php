<article class="card card-news">
    <span class="item-date"><?php echo get_the_date('d M Y'); ?></span>
    <h3 class="item-title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
    <div class="item-excerpt">
        <?php the_excerpt();?>
    </div>
    <a class="readmorelink" href="<?php the_permalink();?>">Lire la suite</a>
</article>