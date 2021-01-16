<?php declare(strict_types=1);

/*
 * Class ApiRequestContext
 *
 * This file has been copied from CodelyTV's php-ddd-example repository on GitHub
 * https://github.com/CodelyTV/php-ddd-example
 */

namespace Tests\Shared\Infrastructure\Behat;

use Behat\Gherkin\Node\PyStringNode;
use Behat\Mink\Session;
use Behat\MinkExtension\Context\RawMinkContext;
use Tests\Shared\Infrastructure\Mink\MinkHelper;
use Tests\Shared\Infrastructure\Mink\MinkSessionRequestHelper;

final class ApiRequestContext extends RawMinkContext
{
    private MinkSessionRequestHelper $request;

    public function __construct(Session $session)
    {
        $this->request = new MinkSessionRequestHelper(new MinkHelper($session));
    }

    /**
     * @When I send a :method request to :url
     * @param string $method
     * @param string $url
     */
    public function iSendARequestTo(string $method, string $url): void
    {
        $this->request->sendRequest($method, $this->locatePath($url));
    }

    /**
     * @When I send a :method request to :url with body:
     * @param string $method
     * @param string $url
     * @param PyStringNode $body
     */
    public function iSendARequestToWithBody(string $method, string $url, PyStringNode $body): void
    {
        $this->request->sendRequestWithPyStringNode($method, $this->locatePath($url), $body);
    }
}