<?php
$theme_uri =  get_template_directory_uri();
wp_enqueue_style("style", $theme_uri . "/assets/styles/style.css");
$help_loop = new WP_Query(
    array(
        'post_type' => 'kg_help_section',
        'posts_per_page' => -1,
        'orderby' => 'date',
        'order'   => 'ASC',
    )
);
?>
<?php get_header(); ?>
<section class="mobile-tools">
    <div class="container">
        <div class="content">
            <h2 class="section-title">Skorzystaj z <span class="blue-txt">możliwości</span> narzędzi mobilnych</h2>
            <ul class="list">
                <li class="list-item section-txt">Zwiększ wydajność (wartość) swojej firmy</li>
                <li class="list-item section-txt">Usprawnij pracę swojego zespołu</li>
                <li class="list-item section-txt">Wykorzystaj nowe możliwości</li>
                <li class="list-item section-txt">Automatyzuj pracę</li>
            </ul>
        </div>
        <div class="hero-img">
            <img src="<?php echo $theme_uri . '/assets/images/mobile-tools.png'?>"
                alt="dsad">
        </div>
    </div>
</section>
<section class="bg-gradient numbers">
    <div class="container">
        <div class="content">
            <div class="content-item">
                <div class="number-title white-txt">6,64mld</div>
                <div class="section-txt">użytkowników smartfonów na świecie</div>
            </div>
            <div class="content-item">
                <div class="number-title white-txt">83.72%</div>
                <div class="section-txt">populacji światowej korzysta ze smartfonów</div>
            </div>
            <div class="content-item">
                <div class="number-title white-txt">7,26mld</div>
                <div class="section-txt">użytkowników telefonów na świecie</div>
            </div>
            <div class="content-item">
                <div class="number-title white-txt">10,57mld</div>
                <div class="section-txt">mobilnych połączeń sieciowych na świecie</div>
            </div>
            <div class="content-item">
                <div class="number-title white-txt">80%</div>
                <div class="section-txt">pracowników nie traci telefonu z oczu</div>
            </div>
            <div class="content-item">
                <div class="number-title white-txt">80%</div>
                <div class="section-txt">pracowników działa w ruchu</div>
            </div>
        </div>
        <div class="br-line"></div>
        <button class="btn-blue white-txt">Zobacz zewnętrzny raport</button>
    </div>
</section>
<section class="help-section">
    <div class="container">
        <h2 class="section-title txt-center">W czym <span class="blue-txt">mogę pomóc</span></h2>
        <div class="content">
            <?php
                foreach ($help_loop->posts as $key => $post) {
                    $meta = get_post_meta($post->ID, 'help_fields', true);
                    get_template_part('parts/help-section/help-item', '', [
                        "title" =>  __($post->post_title, 'help_section'),
                        "content" =>  __($post->post_content, 'help_section'),
                        "img" => $meta['img'],
                    ]);
                }
                wp_reset_postdata();
?>
        </div>
    </div>
</section>
<div class="blog-section">
    <div class="container">
        <div class="header">
            <h3 class="section-title">Przeczytaj nasze artykuły</h3>
            <button class="btn-blue white-txt">Przejdź do bloga</button>
        </div>
        <div class="blog-items">
            <div class="blog-card">
                <div class="blog-img"><img
                        src="<?php echo $theme_uri . '/assets/images/blog3.png'?>"
                        alt="">
                </div>
                <p class="blog-title">5 steps to creating a stakeholder engagement plan</p>
                <div class="utils">
                    <p class="date">22 kwietnia 2022</p>
                    <a class="read" href="#">Czytaj</a>
                </div>
            </div>
            <div class="blog-card">
                <div class="blog-img"><img
                        src="<?php echo $theme_uri . '/assets/images/blog-img.png'?>"
                        alt="">
                </div>
                <p class="blog-title">5 steps to creating a stakeholder engagement plan</p>
                <div class="utils">
                    <p class="date">22 kwietnia 2022</p>
                    <a class="read" href="#">Czytaj</a>
                </div>
            </div>
            <div class="blog-card">
                <div class="blog-img"><img
                        src="<?php echo $theme_uri . '/assets/images/blog2.png'?>"
                        alt="">
                </div>
                <p class="blog-title">5 steps to creating a stakeholder engagement plan</p>
                <div class="utils">
                    <p class="date">22 kwietnia 2022</p>
                    <a class="read" href="#">Czytaj</a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php


get_footer();
?>