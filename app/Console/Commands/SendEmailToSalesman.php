<?php

namespace App\Console\Commands;

use App\Models\Salesman;
use Illuminate\Console\Command;

class SendEmailToSalesman extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:send-email-to-salesman';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send email to salesman';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $salesmen = Salesman::all();

        foreach ($salesmen as $salesman) {
            $sales = $salesman->sale()->whereDate('created_at', today())->get();
            // Aqui colocariamos a lógica para o envio de email desses relatórios de vendas
        }

        $this->info('Emails enviados para os vendedores');
    }
}
