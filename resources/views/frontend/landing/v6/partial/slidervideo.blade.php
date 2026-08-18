<?php ($video = isset($video)?$video:null); ?>
<?php ($titulo = isset($titulo)?$titulo:null); ?>
<?php ($contenido = isset($contenido)?$contenido:null); ?>

<?php if(!empty($video)): ?>
    <section class="home-section bg-dark-30" id="home" data-background="<?php echo $video->getYoutubeThumb(); ?>">
        <div class="video-player"
             data-property="{videoURL:'<?php echo 'https:'. url($video->getNormalVideoYoutube()); ?>', containment:'.home-section', startAt:20, mute:false, autoPlay:true, loop:true, opacity:1, showControls:false, showYTLogo:false, vol:25}"></div>
        <div class="video-controls-box">
            <div class="container">
                <div class="video-controls"><a class="fa fa-volume-up" id="video-volume" href="#">&nbsp;</a>
                    <a class="fa fa-pause" id="video-play" href="#">&nbsp;</a></div>
            </div>
        </div>
        <div class="titan-caption">
            <div class="caption-content">
                <div class="font-alt mb-30 titan-title-size-1">
                    <?php echo $titulo; ?>

                </div>
                <div class="font-alt mb-40 titan-title-size-4">
                    <?php echo $contenido; ?>

                </div>
                

            </div>
        </div>
    </section>
<?php endif; ?>