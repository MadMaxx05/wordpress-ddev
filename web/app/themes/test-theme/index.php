<?php get_header(); ?>

<?php $categories = get_categories([
    'exclude' => 1,
    'orderby' => 'none',
]);
$categories_array = [];

foreach ($categories as $category) {
    $categories_array[] = [
        'title'  => $category->name,
        'url'    => get_category_link($category->term_id),
        'active' => is_category($category->term_id),
    ];
} ?>

<div style="background-image: url('<?php echo TEMPLATE_DIR_URI . '/src/img/blog-bg.svg' ?>')" class="bg-no-repeat bg-top bg-contain bg-[#FAFBFC]">
    <div class="mx-auto px-4 py-10 md:pt-20 md:pb-24 max-w-7xl">
        <h1 class="mb-5 text-5xl md:text-6xl text-[#111111] !leading-tight font-extrabold text-center tracking-wider">News and insights</h1>
        <div class="mb-12 mx-auto max-w-md text-lg text-[#464646] text-center">
            <p>Learn about cryptocurrency, NFTs, and blockchain, discover our latest product updates, partnership announcements, user stories, and more.</p>
        </div>
        <div class="p-1.5 mb-16 mx-auto w-full max-w-max border border-black/10 bg-white rounded-md flex items-center justify-center flex-wrap gap-2">
            <div>
                <?php if (is_home()) { ?>
                    <a class="inline-block py-2 px-4 bg-[#444BFF] text-white rounded-md transition" href="<?php the_permalink(get_option('page_for_posts')); ?>">
                        <span>All</span>
                    </a>
                <?php } else { ?>
                    <a class="inline-block py-2 px-4 text-[#111111] rounded-md hover:bg-[#444BFF]/10 transition" href="<?php the_permalink(get_option('page_for_posts')); ?>">
                        <span>All</span>
                    </a>
                <?php } ?>
            </div>
            <?php foreach ($categories_array as $category) { ?>
                <div>
                    <?php if ($category['active']) { ?>
                        <a class="inline-block py-2 px-4 text-white bg-[#444BFF] rounded-md transition" href="<?php echo $category['url'] ?>">
                            <span><?php echo $category['title'] ?></span>
                        </a>
                    <?php } else { ?>
                        <a class="inline-block py-2 px-4 text-[#111111] rounded-md hover:bg-[#444BFF]/10 transition" href="<?php echo $category['url'] ?>">
                            <span><?php echo $category['title'] ?></span>
                        </a>
                    <?php } ?>
                </div>
            <?php } ?>
        </div>

        <?php if (have_posts()) { ?>
            <div class="grid sm:grid-cols-2 lg:grid-cols-3 items-start gap-8">
                <?php while (have_posts()) {
                    the_post(); ?>

                    <div class="group relative bg-white border border-black/10 rounded-md overflow-hidden">
                        <div class="[&_img]:w-full"><?php the_post_thumbnail(); ?></div>
                        <div class="p-6">
                            <div class="mb-4 flex items-center gap-3">
                                <span class="inline-block py-1 px-2 bg-[#111111] text-sm text-white rounded"><?php the_category() ?></span>
                                <span class="inline-block text-sm text-[#111111]"><?php echo get_the_date('M d, Y') ?></span>
                            </div>
                            <h3 class="text-2xl text-[#111111] !leading-normal font-bold group-hover:underline"><?php the_title() ?></h3>
                            <!-- <div class="mb-6 text-base tracking-wide text-[#111111]/60">
                                <?php the_content() ?>
                            </div>
                            <span class="inline-block py-2 px-4 border border-[#111111] text-[#111111] rounded">Read more</span> -->
                        </div>
                        <a class="absolute inset-0" href="<?php the_permalink(); ?>"></a>
                    </div>

                <?php } ?>
            </div>
        <?php } else {
            echo '<p>There is no posts</p>';
        } ?>
    </div>
</div>

<?php get_footer(); ?>