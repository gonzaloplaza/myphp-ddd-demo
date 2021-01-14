<?php

namespace Shared\Domain;

interface Logger
{
    public function add(string $level, string $message, array $context = []): void;
    public function debug(string $message): void;
    public function info(string $message): void;
    public function warning(string $message): void;
    public function error(string $message): void;
    public function critical(string $message): void;
}