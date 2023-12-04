<div class="bg-[#383638]">
    <div class="mx-auto p-4 py-24 max-w-7xl">
        <div class="flex items-start gap-16 flex-wrap">
            <ul class="text-white text-base grid gap-4">
                <li class="text-xl">
                    <strong>Location</strong>
                </li>
                <li>
                    <div><?php the_field('address', 'option'); ?></div>
                </li>
            </ul>
            <ul class="text-white text-base grid gap-4">
                <li class="text-xl">
                    <strong>Contact</strong>
                </li>
                <li>
                    <div>
                        <a href="tel:<?php the_field('mobile_number', 'option'); ?>">
                            <?php the_field('mobile_number', 'option'); ?>
                        </a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>
</main>
<?php wp_footer(); ?>
</body>

</html>