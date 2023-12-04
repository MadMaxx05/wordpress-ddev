<?php

use \AmphiBee\AcfBlocks\Block;

use \Extended\ACF\Fields\Text;
use \Extended\ACF\Fields\WysiwygEditor;
use \Extended\ACF\Fields\Link;

Block::make('Home Call To Action', 'home-cta')
    ->setTitle('Home Call To Action')
    ->setFields([
        Text::make('Title')
            ->required(),
        WysiwygEditor::make('Text')
            ->mediaUpload(false)
            ->delay()
            ->required(),
        Link::make('Button')
            ->required(),
    ])
    ->loadAllFields()
    ->setMode('edit')
    ->setAlign('wide')
    ->setCategory('home')
    ->setRenderTemplate('/views/blocks/home/cta.php');