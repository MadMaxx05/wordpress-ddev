<?php

use \AmphiBee\AcfBlocks\Block;

use \Extended\ACF\Fields\Text;
use \Extended\ACF\Fields\WysiwygEditor;
use \Extended\ACF\Fields\Link;
use \Extended\ACF\Fields\Image;

Block::make('Home Hero', 'home-hero')
    ->setTitle('Home Hero')
    ->setFields([
        Text::make('Title')
            ->required(),
        WysiwygEditor::make('Text')
            ->mediaUpload(false)
            ->delay()
            ->required(),
        Link::make('Button')
            ->required(),
        Image::make('Background Image')
            ->returnFormat('url')
            ->required(),
    ])
    ->loadAllFields()
    ->setMode('edit')
    ->setAlign('wide')
    ->setCategory('home')
    ->setRenderTemplate('/views/blocks/home/hero.php');
