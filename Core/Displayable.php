<?php

interface Displayable
{
    public function toArray(): array;
    public static function getDisplayHeaders(): array;
}
