<?php

use \AmphiBee\AcfBlocks\Block;

use \Extended\ACF\Fields\WysiwygEditor;

Block::make('Content', 'post-content')
    ->setTitle('Content')
    ->setFields([
        WysiwygEditor::make('Text')
            ->mediaUpload(false)
            ->delay()
            ->required(),

    ])
    ->loadAllFields()
    ->setMode('edit')
    ->setAlign('wide')
    ->setCategory('post')
    ->setRenderTemplate('/views/blocks/post/content.php');
