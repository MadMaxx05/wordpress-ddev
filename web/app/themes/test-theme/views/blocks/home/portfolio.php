<section class="bg-gray-200/60">
    <div class="max-w-7xl mx-auto py-10 md:pt-24 md:pb-20 px-4">
        <?php if (!empty($field->subtitle)) { ?>
            <span class="block mb-5 text-[#377DFF] text-xl md:text-2xl font-semibold text-center">
                <?php echo $field->subtitle ?>
            </span>
        <?php } ?>
        <h2 class="mb-8 text-4xl md:text-5xl text-[#1D1D1D] font-bold !leading-tight text-center">
            <?php echo $field->title ?>
        </h2>
        <div class="mx-auto mb-12 max-w-2xl text-lg text-[#464646] text-center">
            <?php echo $field->text ?>
        </div>
        <?php if (!empty($field->works)) { ?>
            <div class="mx-auto max-w-sm sm:max-w-none grid sm:grid-cols-2 lg:grid-cols-3 gap-12 lg:gap-16">
                <?php foreach ($field->works as $item) { ?>
                    <div class="group relative rounded-[30px] overflow-hidden">
                        <div>
                            <img class="w-full group-hover:scale-110 transition duration-500" src="<?php echo $item['image']['url'] ?>" alt="">
                        </div>
                        <span class="absolute bottom-10 left-10 right-10 inline-block text-xl text-white font-semibold"><?php echo $item['text'] ?></span>
                        <a href="<?php echo $item['link']['url'] ?>" class="group absolute inset-0 w-full h-full rounded-[30px]"></a>
                    </div>
                <?php } ?>
            </div>
        <?php } ?>
    </div>
</section>