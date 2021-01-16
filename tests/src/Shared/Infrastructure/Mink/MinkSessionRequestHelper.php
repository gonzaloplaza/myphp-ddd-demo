<?php declare(strict_types=1);

/*
 * Class MinkSessionRequestHelper
 *
 * This file has been copied from CodelyTV's php-ddd-example repository on GitHub
 * https://github.com/CodelyTV/php-ddd-example
 */

namespace Tests\Shared\Infrastructure\Mink;

use Behat\Gherkin\Node\PyStringNode;
use Symfony\Component\DomCrawler\Crawler;

final class MinkSessionRequestHelper
{
    /** @var MinkHelper */
    private MinkHelper $sessionHelper;

    public function __construct(MinkHelper $sessionHelper)
    {
        $this->sessionHelper = $sessionHelper;
    }

    public function sendRequest($method, $url, array $optionalParams = []): void
    {
        $this->request($method, $url, $optionalParams);
    }

    public function sendRequestWithPyStringNode($method, $url, PyStringNode $body): void
    {
        $this->request($method, $url, ['content' => $body->getRaw()]);
    }

    public function request($method, $url, array $optionalParams = []): Crawler
    {
        return $this->sessionHelper->sendRequest($method, $url, $optionalParams);
    }
}