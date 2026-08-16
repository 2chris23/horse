<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
});

Artisan::command('hws:test-all', function () {
    (new \App\Console\Commands\TestAllSystem())->setOutput($this->output)->handle();
});
