<?php

use \AmphiBee\AcfBlocks\Block;

use \Extended\ACF\Fields\Text;
use \Extended\ACF\Fields\WysiwygEditor;
use \Extended\ACF\Fields\Image;
use \Extended\ACF\Fields\Repeater;

Block::make('Home Features', 'home-features')
    ->setTitle('Home Features')
    ->setFields([
        Text::make('Title')
            ->required(),
        Text::make('Subtitle'),
        WysiwygEditor::make('Text')
            ->mediaUpload(false)
            ->delay()
            ->required(),
        Repeater::make('Features')
            ->fields([
                Image::make('Icon')
                    ->required(),
                Text::make('Text')
                    ->required(),
            ])
            ->buttonLabel('Add Feature')
            ->layout('block')
        
    ])
    ->loadAllFields()
    ->setMode('edit')
    ->setAlign('wide')
    ->setCategory('home')
    ->setRenderTemplate('/views/blocks/home/features.php');