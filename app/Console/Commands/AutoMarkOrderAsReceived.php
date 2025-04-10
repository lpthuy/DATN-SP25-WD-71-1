<?php

namespace App\Console\Commands;

use App\Models\Order;
use Illuminate\Console\Command;

class AutoMarkOrderAsReceived extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    // protected $signature = 'app:auto-mark-order-as-received';
    protected $signature = 'auto:mark-received';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
{
    $this->info('🔁 Đang kiểm tra đơn hàng cần chuyển sang "đã nhận hàng"...');

    $threshold = now()->subMinutes(1);

    $orders = Order::where('status', 'completed')
        ->whereNotNull('delivered_at')
        ->where('delivered_at', '<=', $threshold)
        ->get();

    foreach ($orders as $order) {
        $order->status = 'đã nhận hàng';
        $order->save();
        $this->info("✅ Đã cập nhật đơn #{$order->id} sang 'đã nhận hàng'");
    }

    if ($orders->isEmpty()) {
        $this->info('⚠️ Không có đơn hàng nào đủ điều kiện cập nhật.');
    }
}



}
