<?php

get_header();
?>

<!-- #Content -->
<div id="Content" class="entradaPropuestas">
    <div class="content_wrapper clearfix">

        <!-- .sections_group -->
        <div class="sections_group">

            <div class="entry-content" itemprop="mainContentOfPage">

                <?php
                    while (have_posts()) {
                        the_post();							// Post Loop
                        mfn_builder_print(get_the_ID());	// Content Builder & WordPress Editor Content
                    }
                ?>

                <div class="section section-page-footer">
                    <div class="section_wrapper clearfix">

                        <div class="column one page-pager">
                            <?php
                                // List of pages
                                wp_link_pages(array(
                                    'before'			=> '<div class="pager-single">',
                                    'after'				=> '</div>',
                                    'link_before'		=> '<span>',
                                    'link_after'		=> '</span>',
                                    'next_or_number'	=> 'number'
                                ));
                            ?>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<?php
 get_footer();

 ?>