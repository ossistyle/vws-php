<?php

return [
    'metadata' => [
        'apiVersion' => '2015-10-05',
        'serviceFullName' => 'Via Wcf Rest Service',
        'timestampFormat' => 'rfc822',
        'protocol' => 'rest-json',
        'jsonVersion' => '1.1',
    ],
    'operations' => [
        'GetCatalogs' => [
            'name' => 'GetCatalogs',
            'http' => [
              'method' => 'GET',
              'requestUri' => 'Catalogs',
            ],
            'output' => [
              'shape' => 'GetCatalogsOutput',
            ],
        ],
    ],

    'shapes' => [
        'GetCatalogsOutput' => [
            'type' => 'structure',
            'members' => [
                'd' =>  [
                  'shape' => 'CatalogList',
                ],
                'ServerProcessingTime' => [
                    'shape' => 'ServerProcessingTime',
                ],
            ],
        ],

        'CatalogList' => [
            'type' => 'list',
            'member' => [
                'shape' => 'Catalog',
            ],
        ],

        'Catalog' => [
            'type' => 'structure',
            'members' => [
                'Id' =>  [
                  'shape' => 'IntegerNoMinMax',
                ],
                'Name' => [
                    'shape' => 'StringMin3Max30',
                ],
                'IsRootLevel' => [
                    'shape' => 'Boolean',
                ],
                'ForeignId' => [
                    'shape' => 'StringMax255',
                ],
                'ChildCatalogs' => [
                    'shape' => 'CatalogList',
                ],
            ],
        ],

        /*****************************************
         *
         *             DATA TYPES
         *
         *****************************************/

         'Boolean' => [
             'type' => 'boolean',
         ],

         'Float' => [
             'type' => 'float',
         ],

         'String' => [
             'type' => 'string',
         ],

         'IntegerNoMinMax' => [
             'type' => 'integer',
         ],

         'IntegerMin0Max1' => [
             'type' => 'integer',
             'min' => 0,
             'max' => 1,
         ],

         'IntegerMin0Max2' => [
             'type' => 'integer',
             'min' => 0,
             'max' => 2,
         ],

         'IntegerMin1Max1' => [
             'type' => 'integer',
             'min' => 1,
             'max' => 1,
         ],

         'IntegerMin1Max100Default100' => [
             'type' => 'integer',
             'min' => 1,
             'max' => 100,
             'default' => 50,
         ],

         'IntegerMin1NoMaxDefault1' => [
             'type' => 'integer',
             'min' => 1,
             'default' => 1,
         ],

         'IntegerMax999' => [
             'type' => 'integer',
             'min' => 0,
             'max' => 999,
         ],

         'StringEan' => [
             'type' => 'string',
             'pattern' => '#\b[\d\\-]{3,18}\b#',
         ],

         'StringUpc' => [
             'type' => 'string',
             'pattern' => '#^(\\d{8}|\\d{12,14})$#',
         ],

         'StringIsbn' => [
             'type' => 'string',
             'pattern' => '#\b(?:ISBN(?:: ?| ))?((?:97[89])?\d{9}[\dx])\b#i',
         ],

         'StringNoMinMax' => [
             'type' => 'string',
         ],

         'StringMin3Max30' => [
             'type' => 'string',
             'min' => 3,
             'max' => 30,
         ],

         'StringMin3Max80' => [
             'type' => 'string',
             'min' => 3,
             'max' => 80,
         ],

         'StringMax5' => [
             'type' => 'string',
             'min' => 1,
             'max' => 5,
         ],

         'StringMax50' => [
             'type' => 'string',
             'min' => 1,
             'max' => 50,
         ],

         'StringMax2000' => [
             'type' => 'string',
             'max' => 2000,
         ],

         'StringMax255' => [
             'type' => 'string',
             'max' => 255,
         ],

         'StringMax4000' => [
             'type' => 'string',
             'max' => 4000,
         ],

         'TimestampType' => [
             'type' => 'timestamp',
         ],

         'ServerProcessingTime' => [
             'type' => 'string',
             'location' => 'header',
         ],

         'Url' => [
             'type' => 'string',
             'max' => 255,
             'pattern' => '#^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$#',
             'filters' => [
                 [
                     'method' => 'Respect\Validation\Validator::url',
                     'args' => [true, '@value'],
                 ],
             ],
         ],
    ]
]

?>
