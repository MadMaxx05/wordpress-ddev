<section class="bg-gray-200/80">
    <div class="max-w-4xl mx-auto px-4 py-10 md:py-24">
        <div class="p-10 border border-black/10 bg-white rounded-[50px] text-center">
            <h2 class="mb-8 text-4xl md:text-5xl text-[#1D1D1D] font-bold !leading-tight">
                <?php echo $field->title ?>
            </h2>
            <div class="mx-auto mb-8 max-w-2xl text-lg text-[#464646]">
                <?php echo $field->text ?>
            </div>
            <a href="<?php echo $field->button['url'] ?>" class="inline-block py-2.5 px-12 bg-[#377DFF] text-base text-white font-bold rounded-full hover:opacity-80 transition">
                <?php echo $field->button['title'] ?>
            </a>
        </div>
    </div>
</section>