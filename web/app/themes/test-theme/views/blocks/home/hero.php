<div class="max-w-4xl mx-auto py-10 md:pt-16 md:pb-24 px-4">
    <div class="mb-24 text-center">
        <h2 class="mb-10 text-5xl md:text-6xl !leading-tight text-center text-[#111111] font-extrabold max-w-3xl mx-auto">
            <?php echo $field->title; ?>
        </h2>
        <div class="mb-9 text-lg text-[#111111]/60 text-center">
            <?php echo $field->text; ?>
        </div>
        <a href="<?php echo $field->button['url'] ?>" class="inline-block py-2.5 px-12 bg-[#377DFF] text-base text-white font-bold rounded-full hover:opacity-80 transition">
            <?php echo $field->button['title'] ?>
        </a>
    </div>
    <div>
        <img src="<?php echo $field->background_image ?>" alt="Hero Image">
    </div>
</div>