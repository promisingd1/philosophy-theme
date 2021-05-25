<?php
    // Creating a variable for video name
    $philosophy_audio_file = "";
    // Checking if the there is a function named the_field()
    if ( function_exists("the_field") ) {
        $philosophy_audio_file = get_field("source_file");

    }
?>
<article class="masonry__brick entry format-video" data-aos="fade-up">
        
    <div class="entry__thumb video-image">
        <a href="<?php echo esc_url( $philosophy_audio_file ) ?>?color=01aef0&title=0&byline=0&portrait=0" data-lity>
            <?php the_post_thumbnail('philosophy-home-square') ?>
        </a>
    </div>

    <?php get_template_part( 'template-parts/common/post/summary' ) ?> 

</article> <!-- end article -->
