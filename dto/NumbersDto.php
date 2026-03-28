<?php

namespace app\dto;

final readonly class NumbersDto
{
    public function __construct(
        public array $numbers
    ) {}
}
