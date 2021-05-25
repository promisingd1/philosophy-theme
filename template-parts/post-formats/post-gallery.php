<article class="masonry__brick entry format-gallery" data-aos="fade-up">
     
    <?php
        // checking whether attachment class exists 
        if ( class_exists( "Attachments" ) ): 
            // creating a new Attachment object.
            $attachements = new Attachments( 'gallery' );

            if ( $attachements-> exist() ) :
    ?>
                <div class="entry__thumb slider">
                    <div class="slider__slides">
                        <?php while( $attachements-> get() ) : ?> 
                            <div class="slider__slide">
                               <?php echo $attachements->image("philosophy-home-square"); ?> 
                            </div>
                        <?php endwhile; ?>
                    </div>
                </div>
    <?php   endif;
        endif; 
    ?>
   <?php 
        get_template_part('template-parts/common/post/summary');
   ?> 

</article> <!-- end article -->
