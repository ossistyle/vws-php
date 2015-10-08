<?php

namespace Vws\Test\Integ\Delete;

use Vws\Test\Integ\WebApiClientAbstractTestCase;

class WebApiClientDeleteLinkTest extends WebApiClientAbstractTestCase
{
    use ProductCatalogDeleteLinkDataProvider;

    /**
     * @dataProvider productCatalogDeleteLinkData
     */
    public function testDeleteLink($catalogForeignId, $productForeignId, $expectedResponse)
    {
        $this->expectedResponse = $expectedResponse;
        $this->deleteLinkValidation(
            'DeleteLink',
            [
                'productForeignId' => $productForeignId[0],
                'catalogForeignId' => $catalogForeignId[0]
            ]
        );
    }
}
