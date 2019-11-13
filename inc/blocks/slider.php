<?php
$wrs_slider = get_field('wrs_slider');

if( $wrs_slider ) {
    ?>
    <div class="full-slider-block">
        <div class="owl-carousel full-slider">
            <?php
            foreach( $wrs_slider as $slider ) {
                $wrs_slider_slide_title        = $slider['wrs_slider_slide_title'];
                $wrs_slider_slide_desc         = $slider['wrs_slider_slide_desc'];
                $wrs_slider_slide_button_title = $slider['wrs_slider_slide_button_title'];
                $wrs_slider_slide_button_url   = $slider['wrs_slider_slide_button_url'];
                ?>
                <div class="owl-item-bg-img" style="background: url('<?php echo $slider['wrs_slider_slide_bg']['url']; ?>') 50% 50% no-repeat;-webkit-background-size: cover;background-size: cover;">
                    <span class="owl-item-bg"></span>
                    <div class="reducer">
                        <div class="owl-item-position">
                            <div class="mdl-grid">
                                <div class="mdl-cell mdl-cell--12-col">
                                    <?php
                                    if( $wrs_slider_slide_title ) {
                                        if($wrs_slider_slide_button_url) {
                                            ?>
                                            <h2><a href="<?php echo $wrs_slider_slide_button_url; ?>"><span><?php echo $wrs_slider_slide_title; ?></span></a></h2>
                                            <?php
                                        }
                                        else {
                                            ?>
                                            <h2><span><?php echo $wrs_slider_slide_title; ?></span></h2>
                                            <?php
                                        }
                                    }
                                    if( $wrs_slider_slide_desc ) {
                                        ?>
                                        <p><?php echo $wrs_slider_slide_desc; ?></p>
                                        <?php
                                    }
                                    if( $wrs_slider_slide_button_title ) {
                                        if($wrs_slider_slide_button_url) {
                                            ?>
                                            <a href="<?php echo $wrs_slider_slide_button_url; ?>"><button><?php echo $wrs_slider_slide_button_title; ?></button></a>
                                            <?php
                                        }
                                        else {
                                            ?>
                                            <button><?php echo $wrs_slider_slide_button_title; ?></button>
                                            <?php
                                        }
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
    <?php
}