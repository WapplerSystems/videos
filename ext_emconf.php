<?php

$EM_CONF['videos'] = [
    'title' => 'Videos',
    'description' => 'Extends video file properties and provides a player for playlists, cue points and subtitles.',
    'author' => 'Sven Wappler',
    'author_email' => 'typo3@wappler.systems',
    'category' => 'misc',
    'author_company' => 'WapplerSystems',
    'state' => 'stable',
    'clearCacheOnLoad' => 0,
    'version' => '14.0.0',
    'constraints' => [
        'depends' => [
            'typo3' => '14.0.0-14.4.99',
            'filemetadata' => '14.0.0'
        ],
        'conflicts' => [
        ],
        'suggests' => [
        ],
    ],
];

