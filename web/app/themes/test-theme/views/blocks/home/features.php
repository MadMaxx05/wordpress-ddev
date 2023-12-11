<section id="services" class="bg-gray-200/40">
    <div class="max-w-4xl mx-auto py-10 md:pt-24 md:pb-20 px-4">
        <div class="grid gap-10 items-center">
            <div>
                <?php if (!empty($field->subtitle)) { ?>
                    <span class="block mb-5 text-[#377DFF] text-xl md:text-2xl text-center font-semibold">
                        <?php echo $field->subtitle ?>
                    </span>
                <?php } ?>
                <h2 class="mb-5 text-4xl md:text-5xl text-[#1D1D1D] !leading-tight text-center font-bold"><?php echo $field->title ?></h2>
                <div class="text-lg text-[#464646] text-center"><?php echo $field->text ?></div>
            </div>
            <div>
                <?php if (!empty($field->features)) { ?>
                    <div class="grid sm:grid-cols-2 gap-5 sm:gap-10 mx-auto max-w-2xl">
                        <?php foreach ($field->features as $item) { ?>
                            <div class="p-8 grid gap-5 text-center border border-black/10 bg-white rounded-3xl hover:shadow-lg transition">
                                <div>
                                    <img class="inline-block w-20 h-20" src="<?php echo $item['icon']['url'] ?>" alt="">
                                </div>
                                <span class="inline-block text-xl text-[#1D1D1D] font-bold !leading-normal"><?php echo $item['text'] ?></span>
                            </div>
                        <?php } ?>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</section>