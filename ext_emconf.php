<?php

$EM_CONF['videos'] = [
    'title' => 'Videos',
    'description' => 'Extends video file properties and provides a player for playlists, cue points and subtitles',
    'author' => 'Sven Wappler',
    'author_email' => 'typo3@wappler.systems',
    'category' => 'misc',
    'author_company' => 'WapplerSystems',
    'state' => 'stable',
    'clearCacheOnLoad' => 1,
    'version' => '11.0.11',
    'constraints' => [
        'depends' => [
            'typo3' => '11.5.0-11.5.99',
            'filemetadata' => ''
        ],
        'conflicts' => [
        ],
        'suggests' => [
        ],
    ],
];

