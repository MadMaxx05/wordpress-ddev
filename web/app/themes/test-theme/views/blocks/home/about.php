<section id="about" class="bg-gray-200/20">
    <div class="max-w-7xl mx-auto py-10 md:pt-24 md:pb-20 px-4">
        <?php if (!empty($field->subtitle)) { ?>
            <span class="block mb-5 text-[#377DFF] text-xl md:text-2xl font-semibold text-center"><?php echo $field->subtitle ?></span>
        <?php } ?>
        <h2 class="mb-11 text-4xl md:text-5xl text-[#1D1D1D] font-bold !leading-tight text-center"><?php echo $field->title ?></h2>
        <div class="grid lg:grid-cols-2 gap-8 md:gap-16 items-center">
            <div class="text-center">
                <img class="inline-block rounded-3xl" src="<?php echo $field->background_image ?>" alt="">
            </div>
            <div>
                <div class="text-lg text-[#464646] [&_p]:mb-6"><?php echo $field->text ?></div>
                <div class="flex items-center gap-2 lg:gap-5 flex-wrap lg:flex-nowrap">
                    <?php foreach ($field->buttons as $item) { ?>
                        <a href="<?php echo $item['button']['url'] ?>" class="inline-block py-2.5 px-12 border border-[#377DFF] odd:bg-[#377DFF] even:text-[#377DFF] odd:text-white font-bold rounded-full hover:opacity-80 transition">
                            <?php echo $item['button']['title'] ?>
                        </a>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</section>