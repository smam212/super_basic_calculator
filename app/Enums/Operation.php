<?php

namespace App\Enums;

enum Operation: string
{
    case division = 'division';
    case addition = 'addition';
    case subtraction = 'subtraction';
    case multiplication ='multiplication';
}
