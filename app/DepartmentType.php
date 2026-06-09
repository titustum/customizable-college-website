<?php

namespace App;

enum DepartmentType: string
{
    case ACADEMIC = 'academic';

    case ADMINISTRATIVE = 'administrative';

    case SERVICE = 'service';

    case SUPPORT = 'support';

    case CO_CURRICULAR = 'co_curricular';
}
