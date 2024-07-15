<?php

namespace App\Scheduler;

use App\Message\ClearRefreshTokenFromDatabase;
use Symfony\Component\Scheduler\Attribute\AsSchedule;
use Symfony\Component\Scheduler\RecurringMessage;
use Symfony\Component\Scheduler\Schedule;
use Symfony\Component\Scheduler\ScheduleProviderInterface;

#[AsSchedule('default')]
class ClearRefreshTokenScheduler implements ScheduleProviderInterface
{

    public function getSchedule(): Schedule
    {
        // TODO: Implement getSchedule() method.
        // exécuter scheduler : symfony console messenger:consume async -vv
        return (new Schedule())->add( RecurringMessage::every('first day of next month', new ClearRefreshTokenFromDatabase()));
    }
}