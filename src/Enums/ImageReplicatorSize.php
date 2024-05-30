<?php

namespace Laracasts\Holodeck\Enums;

enum ImageReplicatorSize: string
{
    case Square = '1024x1024';
    case Portrait = '1024x1792';
    case Landscape = '1792x1024';
}
