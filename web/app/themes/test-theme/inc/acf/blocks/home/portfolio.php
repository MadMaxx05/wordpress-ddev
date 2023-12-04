<?php

use \AmphiBee\AcfBlocks\Block;

use \Extended\ACF\Fields\Text;
use \Extended\ACF\Fields\WysiwygEditor;
use \Extended\ACF\Fields\Image;
use \Extended\ACF\Fields\Link;
use \Extended\ACF\Fields\Repeater;

Block::make('Home Portfolio', 'home-portfolio')
    ->setTitle('Home Portfolio')
    ->setFields([
        Text::make('Title')
            ->required(),
        Text::make('Subtitle'),
        WysiwygEditor::make('Text')
            ->mediaUpload(false)
            ->delay()
            ->required(),
        Repeater::make('Works')
            ->fields([
                Image::make('Image')
                    ->required(),
                Text::make('Text')
                    ->required(),
                Link::make('Link')
                    ->required(),
            ])
            ->buttonLabel('Add Work')
            ->layout('block')

    ])
    ->loadAllFields()
    ->setMode('edit')
    ->setAlign('wide')
    ->setCategory('home')
    ->setRenderTemplate('/views/blocks/home/portfolio.php');
