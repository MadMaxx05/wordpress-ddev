<?php

use \AmphiBee\AcfBlocks\Block;

use \Extended\ACF\Fields\Text;
use \Extended\ACF\Fields\WysiwygEditor;
use \Extended\ACF\Fields\Image;
use \Extended\ACF\Fields\Repeater;

Block::make('Home Testimonials', 'home-testimonials')
    ->setTitle('Home Testimonials')
    ->setFields([
        Text::make('Title')
            ->required(),
        Text::make('Subtitle'),
        Repeater::make('Testimonials')
            ->fields([
                Text::make('Name'),
                Text::make('Position'),
                Image::make('Photo')
                    ->required(),
                WysiwygEditor::make('Text')
                    ->mediaUpload(false)
                    ->delay()
                    ->required(),
            ])
            ->buttonLabel('Add Testimonial')
            ->layout('block')
        
    ])
    ->loadAllFields()
    ->setMode('edit')
    ->setAlign('wide')
    ->setCategory('home')
    ->setRenderTemplate('/views/blocks/home/testimonials.php');