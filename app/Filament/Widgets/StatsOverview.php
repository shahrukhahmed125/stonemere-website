<?php

namespace App\Filament\Widgets;

use App\Models\Page;
use App\Models\ServiceArea;
use App\Models\Service;
use App\Models\TeamMember;
use App\Models\MembershipLevel;
use App\Models\FaqItem;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Pages', Page::count())
                ->description('Website pages')
                ->icon('heroicon-o-document-text')
                ->color('primary'),
            Stat::make('Service Areas', ServiceArea::count())
                ->description('Main service areas')
                ->icon('heroicon-o-squares-plus')
                ->color('success'),
            Stat::make('Services', Service::count())
                ->description('Individual services')
                ->icon('heroicon-o-briefcase')
                ->color('warning'),
            Stat::make('Team Members', TeamMember::count())
                ->description('Team profiles')
                ->icon('heroicon-o-users')
                ->color('danger'),
            Stat::make('Membership Levels', MembershipLevel::count())
                ->description('Pricing tiers')
                ->icon('heroicon-o-credit-card')
                ->color('info'),
            Stat::make('FAQ Entries', FaqItem::count())
                ->description('Questions & answers')
                ->icon('heroicon-o-chat-bubble-left-right')
                ->color('gray'),
        ];
    }
}
