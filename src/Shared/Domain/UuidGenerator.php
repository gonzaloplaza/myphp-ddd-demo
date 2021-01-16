<?php

namespace Shared\Domain;

interface UuidGenerator
{
    public function generate(): string;
}