<?php

namespace Vws\Test\Integ;

use GuzzleHttp\Command\Event\PreparedEvent;

/**
 *
 */
class BlackboxClientAuthorizationSmokeTest extends BlackboxClientAbstractTestCase
{
    use IntegUtils;

    /**
     * @expectedException \Vws\Blackbox\Exception\BlackboxException
     * @expectedExceptionMessage (client error): The header parameter "Username" or "Password" is not valid or empty
     */
    public function testAuthorizationInvalidEmptyUsername()
    {
        $args = [
          'profile' => 'integ-sandbox-invalid-username',
        ];
        $client = $this->createClient($args);
        $response = $client->getCatalogs();

        $this->assertSame(
            401,
            $response->getStatusCode(),
            'Response StatusCode is not 401'
        );
        $this->assertSame(
            1000,
            $response->search('Messages[0].Code'),
            'Messages[0].Code is not 1000'
        );
        $this->assertSame(
            2,
            $response->search('Messages[0].Severity'),
            'Messages[0].Severity is not Error (2)'
        );
        $this->assertSame(
            'The header parameter "Username" or "Password" is not valid or empty.',
            $response->search('Messages[0].Message'),
            'Messages[0].Message does not contains '
            .'"The header parameter "Username" or "Password" is not valid or empty."'
        );

        // empty username

        $client->getEmitter()->on('prepared', function (PreparedEvent $event) {
            $request = $event->getRequest();
            $request->setHeader('Username', '');
        }, 'last');

        $response = $client->getCatalogs($args);

        $this->assertSame(
            401,
            $response->getStatusCode(),
            'Response StatusCode is not 401'
        );
        $this->assertSame(
            1000,
            $response->search('Messages[0].Code'),
            'Messages[0].Code is not 1000'
        );
        $this->assertSame(
            2,
            $response->search('Messages[0].Severity'),
            'Messages[0].Severity is not Error (2)'
        );
        $this->assertSame(
            'The header parameter "Username" or "Password" is not valid or empty.',
            $response->search('Messages[0].Message'),
            'Messages[0].Message does not contains '
            .'"The header parameter "Username" or "Password" is not valid or empty."'
        );
    }

    /**
     * @expectedException \Vws\Blackbox\Exception\BlackboxException
     * @expectedExceptionMessage (client error): The header parameter "Username" or "Password" is not valid or empty
     */
    public function testAuthorizationInvalidMissingUsername()
    {
        $args = [
          'profile' => 'integ-sandbox-invalid-username',
        ];
        $client = $this->createClient($args);
        $response = $client->getCatalogs();

        $this->assertSame(
            401,
            $response->getStatusCode(),
            'Response StatusCode is not 401'
        );
        $this->assertSame(
            1000,
            $response->search('Messages[0].Code'),
            'Messages[0].Code is not 1000'
        );
        $this->assertSame(
            2,
            $response->search('Messages[0].Severity'),
            'Messages[0].Severity is not Error (2)'
        );
        $this->assertSame(
            'The header parameter "Username" or "Password" is not valid or empty.',
            $response->search('Messages[0].Message'),
            'Messages[0].Message does not contains '
            .'"The header parameter "Username" or "Password" is not valid or empty."'
        );

        // no username

        $client->getEmitter()->on('prepared', function (PreparedEvent $event) {
            $request = $event->getRequest();
            $request->removeHeader('Username');
        }, 'last');

        $response = $client->getCatalogs();

        $this->assertSame(
            401,
            $response->getStatusCode(),
            'Response StatusCode is not 401'
        );
        $this->assertSame(
            1000,
            $response->search('Messages[0].Code'),
            'Messages[0].Code is not 1000'
        );
        $this->assertSame(
            2,
            $response->search('Messages[0].Severity'),
            'Messages[0].Severity is not Error (2)'
        );
        $this->assertSame(
            'The header parameter "Username" or "Password" is not valid or empty.',
            $response->search('Messages[0].Message'),
            'Messages[0].Message does not contains '
            .'"The header parameter "Username" or "Password" is not valid or empty."'
        );
    }

    /**
     * @expectedException \Vws\Blackbox\Exception\BlackboxException
     * @expectedExceptionMessage (client error): The header parameter "Username" or "Password" is not valid or empty
     */
    public function testAuthorizationInvalidEmptyPassword()
    {
        $args = [
           'profile' => 'integ-sandbox-invalid-password',
         ];
         $client = $this->createClient($args);
        $response = $client->getCatalogs();

        $this->assertSame(
            401,
            $response->getStatusCode(),
            'Response StatusCode is not 401'
        );
        $this->assertSame(
            1000,
            $response->search('Messages[0].Code'),
            'Messages[0].Code is not 1000'
        );
        $this->assertSame(
            2,
            $response->search('Messages[0].Severity'),
            'Messages[0].Severity is not Error (2)'
        );
        $this->assertSame(
            'The header parameter "Username" or "Password" is not valid or empty.',
            $response->search('Messages[0].Message'),
            'Messages[0].Message does not contains '
            . '"The header parameter "Username" or "Password" is not valid or empty."'
        );

         // empty password

         $client->getEmitter()->on('prepared', function (PreparedEvent $event) {
             $request = $event->getRequest();
             $request->setHeader('Password', '');
         }, 'last');

        $response = $client->getCatalogs();

        $this->assertSame(
            401,
            $response->getStatusCode(),
            'Response StatusCode is not 401'
        );
        $this->assertSame(
            1000,
            $response->search('Messages[0].Code'),
            'Messages[0].Code is not 1000'
        );
        $this->assertSame(
            2,
            $response->search('Messages[0].Severity'),
            'Messages[0].Severity is not Error (2)'
        );
        $this->assertSame(
            'The header parameter "Username" or "Password" is not valid or empty.',
            $response->search('Messages[0].Message'),
            'Messages[0].Message does not contains '
            . '"The header parameter "Username" or "Password" is not valid or empty."'
        );
    }

    /**
     * @expectedException \Vws\Blackbox\Exception\BlackboxException
     * @expectedExceptionMessage (client error): The header parameter "Username" or "Password" is not valid or empty
     */
    public function testAuthorizationInvalidMissingPassword()
    {
        $args = [
           'profile' => 'integ-sandbox-invalid-password',
         ];
         $client = $this->createClient($args);
        $response = $client->getCatalogs();

        $this->assertSame(
            401,
            $response->getStatusCode(),
            'Response StatusCode is not 401'
        );
        $this->assertSame(
            1000,
            $response->search('Messages[0].Code'),
            'Messages[0].Code is not 1000'
        );
        $this->assertSame(
            2,
            $response->search('Messages[0].Severity'),
            'Messages[0].Severity is not Error (2)'
        );
        $this->assertSame(
            'The header parameter "Username" or "Password" is not valid or empty.',
            $response->search('Messages[0].Message'),
            'Messages[0].Message does not contains '
            . '"The header parameter "Username" or "Password" is not valid or empty."'
        );

         // missing password

         $client->getEmitter()->on('prepared', function (PreparedEvent $event) {
             $request = $event->getRequest();
             $request->removeHeader('Password');
         }, 'last');

        $response = $client->getCatalogs();

        $this->assertSame(
            401,
            $response->getStatusCode(),
            'Response StatusCode is not 401'
        );
        $this->assertSame(
            1000,
            $response->search('Messages[0].Code'),
            'Messages[0].Code is not 1000'
        );
        $this->assertSame(
            2,
            $response->search('Messages[0].Severity'),
            'Messages[0].Severity is not Error (2)'
        );
        $this->assertSame(
            'The header parameter "Username" or "Password" is not valid or empty.',
            $response->search('Messages[0].Message'),
            'Messages[0].Message does not contains '
            . '"The header parameter "Username" or "Password" is not valid or empty."'
        );
    }

    /**
     * @expectedException \Vws\Blackbox\Exception\BlackboxException
     * @expectedExceptionMessage (client error): The header parameter "SubscriptionToken" is not valid or empty
     */
    public function testAuthorizationInvalidEmptySubscriptionToken()
    {
        $args = [
           'profile' => 'integ-sandbox-invalid-subscription_token',
         ];
         $client = $this->createClient($args);
        $response = $client->getCatalogs();

        $this->assertSame(
            401,
            $response->getStatusCode(),
            'Response StatusCode is not 401'
        );
        $this->assertSame(
            1001,
            $response->search('Messages[0].Code'),
            'Messages[0].Code is not 1001'
        );
        $this->assertSame(
            2,
            $response->search('Messages[0].Severity'),
            'Messages[0].Severity is not Error (2)'
        );
        $this->assertSame(
            'The header parameter "SubscriptionToken" is not valid or empty',
            $response->search('Messages[0].Message'),
            'Messages[0].Message does not contains '
            . '"The header parameter "SubscriptionToken" is not valid or empty"'
        );

        // empty SubscriptionToken

        $client->getEmitter()->on('prepared', function (PreparedEvent $event) {
             $request = $event->getRequest();
             $request->setHeader('SubscriptionToken', '');
        }, 'last');

        $response = $client->getCatalogs();

        $this->assertSame(
            401,
            $response->getStatusCode(),
            'Response StatusCode is not 401'
        );
        $this->assertSame(
            1001,
            $response->search('Messages[0].Code'),
            'Messages[0].Code is not 1001'
        );
        $this->assertSame(
            2,
            $response->search('Messages[0].Severity'),
            'Messages[0].Severity is not Error (2)'
        );
        $this->assertSame(
            'The header parameter "SubscriptionToken" is not valid or empty',
            $response->search('Messages[0].Message'),
            'Messages[0].Message does not contains '
            .'"The header parameter "SubscriptionToken" is not valid or empty"'
        );
    }

    /**
     * @expectedException \Vws\Blackbox\Exception\BlackboxException
     * @expectedExceptionMessage (client error): The header parameter "SubscriptionToken" is not valid or empty
     */
    public function testAuthorizationInvalidMissingSubscriptionToken()
    {
        $args = [
           'profile' => 'integ-sandbox-invalid-subscription_token',
        ];
        $client = $this->createClient($args);
        $response = $client->getCatalogs();

        $this->assertSame(
            401,
            $response->getStatusCode(),
            'Response StatusCode is not 401'
        );
        $this->assertSame(
            1001,
            $response->search('Messages[0].Code'),
            'Messages[0].Code is not 1001'
        );
        $this->assertSame(
            2,
            $response->search('Messages[0].Severity'),
            'Messages[0].Severity is not Error (2)'
        );
        $this->assertSame(
            'The header parameter "SubscriptionToken" is not valid or empty',
            $response->search('Messages[0].Message'),
            'Messages[0].Message does not contains '
            .'"The header parameter "SubscriptionToken" is not valid or empty"'
        );

        // missing SubscriptionToken

        $client->getEmitter()->on('prepared', function (PreparedEvent $event) {
             $request = $event->getRequest();
             $request->removeHeader('SubscriptionToken');
        }, 'last');

        $response = $client->getCatalogs();

        $this->assertSame(
            401,
            $response->getStatusCode(),
            'Response StatusCode is not 401'
        );
        $this->assertSame(
            1001,
            $response->search('Messages[0].Code'),
            'Messages[0].Code is not 1001'
        );
        $this->assertSame(
            2,
            $response->search('Messages[0].Severity'),
            'Messages[0].Severity is not Error (2)'
        );
        $this->assertSame(
            'The header parameter "SubscriptionToken" is not valid or empty',
            $response->search('Messages[0].Message'),
            'Messages[0].Message does not contains '
            .'"The header parameter "SubscriptionToken" is not valid or empty"'
        );
    }

    /**
     * @expectedException \Vws\Blackbox\Exception\BlackboxException
     * @expectedExceptionMessage (client error): The header parameter "Vendor" is not valid or empty.
     */
    public function testAuthorizationEmptyVendor()
    {
        $client = $this->createClient();

        $client->getEmitter()->on('prepared', function (PreparedEvent $event) {
             $request = $event->getRequest();
             $request->setHeader('Vendor', '');
        }, 'last');

        $response = $client->getCatalogs();

        $this->assertSame(
            401,
            $response->getStatusCode(),
            'Response StatusCode is not 401'
        );
        $this->assertSame(
            1001,
            $response->search('Messages[0].Code'),
            'Messages[0].Code is not 1001'
        );
        $this->assertSame(
            2,
            $response->search('Messages[0].Severity'),
            'Messages[0].Severity is not Error (2)'
        );
        $this->assertSame(
            'The header parameter "Vendor" is not valid or empty.',
            $response->search('Messages[0].Message'),
            'Messages[0].Message does not contains '
            .'"The header parameter "Vendor" is not valid or empty."'
        );
    }

    /**
     * @expectedException \Vws\Blackbox\Exception\BlackboxException
     * @expectedExceptionMessage (client error): The header parameter "Vendor" is not valid or empty.
     */
    public function testAuthorizationMissingVendor()
    {
        $client = $this->createClient();

        $client->getEmitter()->on('prepared', function (PreparedEvent $event) {
             $request = $event->getRequest();
             $request->removeHeader('Vendor');
        }, 'last');

        $response = $client->getCatalogs();

        $this->assertSame(
            401,
            $response->getStatusCode(),
            'Response StatusCode is not 401'
        );
        $this->assertSame(
            1001,
            $response->search('Messages[0].Code'),
            'Messages[0].Code is not 1001'
        );
        $this->assertSame(
            2,
            $response->search('Messages[0].Severity'),
            'Messages[0].Severity is not Error (2)'
        );
        $this->assertSame(
            'The header parameter "Vendor" is not valid or empty.',
            $response->search('Messages[0].Message'),
            'Messages[0].Message does not contains '
            .'"The header parameter "Vendor" is not valid or empty."'
        );
    }

    /**
     * @expectedException \Vws\Blackbox\Exception\BlackboxException
     * @expectedExceptionMessage (client error): The header parameter "Version" is not valid or empty.
     */
    public function testAuthorizationEmptyVersion()
    {
        $client = $this->createClient();

        $client->getEmitter()->on('prepared', function (PreparedEvent $event) {
             $request = $event->getRequest();
             $request->setHeader('Version', '');
        }, 'last');

        $response = $client->getCatalogs();

        $this->assertSame(
            401,
            $response->getStatusCode(),
            'Response StatusCode is not 401'
        );
        $this->assertSame(
            1003,
            $response->search('Messages[0].Code'),
            'Messages[0].Code is not 1003'
        );
        $this->assertSame(
            2,
            $response->search('Messages[0].Severity'),
            'Messages[0].Severity is not Error (2)'
        );
        $this->assertSame(
            'The header parameter "Vendor" is not valid or empty.',
            $response->search('Messages[0].Message'),
            'Messages[0].Message does not contains '
            .'"The header parameter "Vendor" is not valid or empty."'
        );
    }

    /**
     * @expectedException \Vws\Blackbox\Exception\BlackboxException
     * @expectedExceptionMessage (client error): The header parameter "Version" is not valid or empty.
     */
    public function testAuthorizationMissingVersion()
    {
        $client = $this->createClient();

        $client->getEmitter()->on('prepared', function (PreparedEvent $event) {
             $request = $event->getRequest();
             $request->removeHeader('Version');
        }, 'last');

        $response = $client->getCatalogs();

        $this->assertSame(
            401,
            $response->getStatusCode(),
            'Response StatusCode is not 401'
        );
        $this->assertSame(
            1003,
            $response->search('Messages[0].Code'),
            'Messages[0].Code is not 1003'
        );
        $this->assertSame(
            2,
            $response->search('Messages[0].Severity'),
            'Messages[0].Severity is not Error (2)'
        );
        $this->assertSame(
            'The header parameter "Version" is not valid or empty.',
            $response->search('Messages[0].Message'),
            'Messages[0].Message does not contains '
            .'"The header parameter "Version" is not valid or empty."'
        );
    }
}