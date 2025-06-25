<!-- <div class="wp-block-group has-black-background-color has-background is-layout-constrained" style="padding-bottom:180px;">
    <div class="wp-block-columns zeever-margin-top-n80 zeever-animate zeever-move-up zeever-delay-1 is-layout-flex" style="padding-right:10px; padding-left:10px;">

        
        <div class="wp-block-column">
            <div class="wp-block-group is-style-customborderhover zeever-animate zeever-move-up zeever-delay-1 has-background" style="background-color:#121212; padding:50px 30px;">
                <figure class="wp-block-image size-full is-resized">
                    <img src="https://wp-themes.com/wp-content/themes/zeever/assets/img/concept.webp" alt="Concept Icon" class="wp-image-127" width="50" height="50">
                </figure>
                <h2 class="has-text-align-left has-zeever-primary-color has-text-color wp-block-heading" style="font-size:28px; font-weight:600; margin-top:30px;">
                    Future Concept.
                </h2>
                <p class="has-text-align-left has-zeever-bodytext-color has-text-color">
                    Lorem ipsum dolor sit amet, consectet adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore.
                </p>
            </div>
        </div>

        
        <div class="wp-block-column">
            <div class="wp-block-group is-style-customboxshadow zeever-animate zeever-move-up zeever-delay-3 has-border-color has-zeever-secondary-border-color has-background" style="background-color:#121212; border:2px solid; padding:50px 30px;">
                <figure class="wp-block-image size-full is-resized">
                    <img src="https://wp-themes.com/wp-content/themes/zeever/assets/img/ideas.webp" alt="Ideas Icon" class="wp-image-128" width="50" height="50">
                </figure>
                <h2 class="has-text-align-left has-zeever-primary-color has-text-color wp-block-heading" style="font-size:28px; font-weight:600; margin-top:30px;">
                    The Big Ideas.
                </h2>
                <p class="has-text-align-left has-zeever-bodytext-color has-text-color">
                    Lorem ipsum dolor sit amet, consectet adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore.
                </p>
            </div>
        </div>

        
        <div class="wp-block-column">
            <div class="wp-block-group is-style-customborderhover zeever-animate zeever-move-up zeever-delay-5 has-background" style="background-color:#121212; padding:50px 30px;">
                <figure class="wp-block-image size-full is-resized">
                    <img src="https://wp-themes.com/wp-content/themes/zeever/assets/img/creative.webp" alt="Creative Icon" class="wp-image-129" width="50" height="50">
                </figure>
                <h2 class="has-text-align-left has-zeever-primary-color has-text-color wp-block-heading" style="font-size:28px; font-weight:600; margin-top:30px;">
                    Creative Solutions.
                </h2>
                <p class="has-text-align-left has-zeever-bodytext-color has-text-color">
                    Lorem ipsum dolor sit amet, consectet adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore.
                </p>
            </div>
        </div>

    </div>
</div> -->
<?php if (have_rows('cards')) :
    $i = false; ?>
    <div class="wp-block-group has-black-background-color has-background is-layout-constrained" style="padding-bottom:180px;">
        <div class="wp-block-columns zeever-margin-top-n80 zeever-animate zeever-move-up zeever-delay-1 is-layout-flex" style="padding-right:10px; padding-left:10px;">
            <?php while (have_rows('cards')) : the_rows(); ?>
                <!-- Bloc 1 -->
                <div class="wp-block-column">
                    <div class="wp-block-group is-style-customborderhover zeever-animate zeever-move-up zeever-delay-1 has-background" style="background-color:#121212; padding:50px 30px;">
                        <?php if (get_sub_field('card-img')) : ?>
                            <figure class="wp-block-image size-full is-resized">
                                <img src="https://wp-themes.com/wp-content/themes/zeever/assets/img/concept.webp" alt="Concept Icon" class="wp-image-127" width="50" height="50">
                            </figure>
                        <?php endif;
                        if (get_sub_field('card_title')): ?>
                            <h2 class="has-text-align-left has-zeever-primary-color has-text-color wp-block-heading" style="font-size:28px; font-weight:600; margin-top:30px;">
                                Future Concept.
                            </h2>
                        <?php endif;
                        if (get_sub_field('card_text')): ?>
                            <p class="has-text-align-left has-zeever-bodytext-color has-text-color">
                                Lorem ipsum dolor sit amet, consectet adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore.
                            </p>
                        <?php endif; ?>
                    </div>
                </div>
            <?php
                if ($i == false) :
                    $i = true;
                else :
                    $i = false;
                endif;

            endwhile; ?>

        </div>
    </div>
<?php endif; ?>