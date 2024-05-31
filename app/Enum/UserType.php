<?php 

namespace App\Enum; 



enum UserType:string
{
    case ADMIN = 'admin';
    case CHILD = 'child';
    case TEACHER = 'teacher';
    case FOREBEAR = 'forebear';
}
