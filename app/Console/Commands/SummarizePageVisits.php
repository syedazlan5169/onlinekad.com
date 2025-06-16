<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\PageVisit;
use App\Models\DailyPageStat;
use App\Models\DailyReferrerStat;
use App\Notifications\PageVisitSummaryNotification;
use Illuminate\Support\Facades\Notification;

class SummarizePageVisits extends Command
{
    protected $signature = 'visits:summarize';

    protected $description = 'Summarize page visits and referrers, then prune raw data';

    public function handle()
    {
        $date = now()->subDay()->toDateString();

        // Summarize visits by URL
        $pageSummaries = PageVisit::selectRaw('url, COUNT(*) as total_visits, COUNT(DISTINCT ip) as unique_ips')
            ->whereDate('created_at', $date)
            ->groupBy('url')
            ->get();

        foreach ($pageSummaries as $row) {
            DailyPageStat::updateOrCreate([
                'date' => $date,
                'url' => $row->url,
            ], [
                'total_visits' => $row->total_visits,
                'unique_ips' => $row->unique_ips,
            ]);
        }

        // Summarize visits by referer
        $referrerSummaries = PageVisit::selectRaw('referer, COUNT(*) as total_visits, COUNT(DISTINCT ip) as unique_ips')
            ->whereDate('created_at', $date)
            ->groupBy('referer')
            ->get();

        foreach ($referrerSummaries as $row) {
            DailyReferrerStat::updateOrCreate([
                'date' => $date,
                'referer' => $row->referer,
            ], [
                'total_visits' => $row->total_visits,
                'unique_ips' => $row->unique_ips,
            ]);
        }

        // Delete summarized data from PageVisit
        PageVisit::whereDate('created_at', $date)->delete();

        Notification::route('mail', 'admin@onlinekad.com')
        ->notify(new PageVisitSummaryNotification(
            $date,
            $pageSummaries->count(),
            $referrerSummaries->count()
        ));

        $this->info("Page and referrer visits summarized for {$date}.");
    }
}

