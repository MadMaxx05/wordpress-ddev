<?php

use \AmphiBee\AcfBlocks\Block;

use \Extended\ACF\Fields\Text;
use \Extended\ACF\Fields\WysiwygEditor;
use \Extended\ACF\Fields\Image;
use \Extended\ACF\Fields\Repeater;
use \Extended\ACF\Fields\Link;

Block::make('Home About', 'home-about')
    ->setTitle('Home About')
    ->setFields([
        Text::make('Title')
            ->required(),
        Text::make('Subtitle'),
        WysiwygEditor::make('Text')
            ->mediaUpload(false)
            ->delay()
            ->required(),
        Image::make('Background Image')
            ->returnFormat('url')
            ->required(),
        Repeater::make('Buttons')
            ->fields([
                Link::make('Button'),
            ])
            ->max(2)
            ->buttonLabel('Add Button')
            ->layout('block')
        
    ])
    ->loadAllFields()
    ->setMode('edit')
    ->setAlign('wide')
    ->setCategory('home')
    ->setRenderTemplate('/views/blocks/home/about.php');