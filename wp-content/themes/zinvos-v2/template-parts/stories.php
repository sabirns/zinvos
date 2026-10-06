<!-- CASE STUDY -->
    <section class="section reveal" id="stories">
        <div class="container">
            <div class="case">
                <div class="case-media">
                    <div class="case-event">
                        <div class="eyebrow">Featured story</div>
                        <h4>One platform across the conference journey.</h4>
                        <p>Registration &middot; WhatsApp &middot; Onsite &middot; App &middot; Certificates</p>
                    </div>
                </div>
                <div class="case-copy">
                    <div class="eyebrow">Built for real conferences</div>
                    <h3 style="margin-top:20px">Proof lives in the <strong>event floor.</strong></h3>
                    
                    <?php
                    $case_query = new WP_Query( array(
                        'post_type'      => 'case_study',
                        'posts_per_page' => 1,
                    ) );

                    if ( $case_query->have_posts() ) :
                        while ( $case_query->have_posts() ) : $case_query->the_post();
                            ?>
                            <p><?php echo esc_html( get_the_excerpt() ); ?></p>
                            <div class="case-stats">
                                <div class="case-stat"><b>3,200</b><span>delegates</span></div>
                                <div class="case-stat"><b>14</b><span>onsite counters</span></div>
                                <div class="case-stat"><b>&lt;30s</b><span>average check-in</span></div>
                                <div class="case-stat"><b>98%</b><span>message delivery</span></div>
                            </div>
                            <?php
                        endwhile;
                        wp_reset_postdata();
                    else :
                        ?>
                        <p>Show organizers how Zinvos handled registrations, attendee communication, venue access, engagement and post-event workflows for a real conference.</p>
                        <div class="case-stats">
                            <div class="case-stat"><b>3,200</b><span>delegates</span></div>
                            <div class="case-stat"><b>14</b><span>onsite counters</span></div>
                            <div class="case-stat"><b>&lt;30s</b><span>average check-in</span></div>
                            <div class="case-stat"><b>98%</b><span>message delivery</span></div>
                        </div>
                        <?php
                    endif;
                    ?>
                </div>
            </div>
        </div>
    </section>