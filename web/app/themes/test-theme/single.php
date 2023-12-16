<?php get_header(); ?>

<?php if (have_posts()) { ?>
    <div class="bg-[#FAFBFC] py-10 md:pt-16 md:pb-24">
        <div class="mb-8 md:mb-12 mx-auto px-4 max-w-4xl">
            <?php while (have_posts()) {
                the_post(); ?>

                <span class="block mb-5 font-semibold text-[#111111] tracking-wider">
                    <a class="text-[#444BFF] hover:underline" href="<?php the_permalink(get_option('page_for_posts')); ?>">Blog</a> / <?php echo the_title() ?>
                </span>
                <div class="mb-4 w-full aspect-h-9 aspect-w-16 [&_img]:object-cover [&_img]:border [&_img]:border-black/10 [&_img]:rounded-md [&_img]:overflow-hidden"><?php the_post_thumbnail() ?></div>
                <h2 class="mb-2 text-3xl md:text-4xl text-[#111111] !leading-normal font-bold group-hover:underline"><?php the_title() ?></h2>
                <div class="flex items-center gap-3">
                    <span class="inline-block py-1 px-2 bg-[#111111] text-sm text-white rounded"><?php the_category() ?></span>
                    <span class="inline-block text-sm text-[#111111]">Published on <?php echo get_the_date('M d, Y') ?> by <strong class="inline-block font-semibold"><?php the_author(); ?></strong></span>
                </div>
            <?php } ?>
        </div>

        <?php the_content(); ?>

        <div class="mx-auto py-14 md:py-10 px-4 max-w-4xl flex justify-center items-center gap-5 [&_a]:py-2 [&_a]:px-4 [&_a]:border [&_a]:border-black/10 [&_a]:text-base [&_a]:text-[#111111] [&_a]:rounded-md hover:[&_a]:bg-[#444BFF]/10 [&_a]:transition">
            <?php

            previous_post_link('%link', '<-- Prev Post');
            next_post_link('%link', 'Next Post -->');

            ?>
        </div>
    </div>
<?php } ?>

<?php get_footer(); ?>