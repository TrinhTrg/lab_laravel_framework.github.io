<?php

namespace App\Listeners;

use App\Events\OrderCreated;
use Illuminate\Contracts\Queue\ShouldQueue; // <-- BẠN CẦN CÁI NÀY
use Illuminate\Queue\InteractsWithQueue;
use App\Notifications\OrderCreatedNotification; // <-- THÊM DÒNG NÀY
use Illuminate\Support\Facades\Notification; // <-- THÊM DÒNG NÀY

class OrderCreatedListener implements ShouldQueue // <-- THÊM "implements ShouldQueue"
{
    use InteractsWithQueue; // <-- THÊM DÒNG NÀY

    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(OrderCreated $event): void
    {
        // SỬA LỖI TẠI ĐÂY: Thêm logic gửi mail
        
        $order = $event->order; // Lấy đơn hàng từ sự kiện

        // Gửi thông báo "on-demand" tới email trong form
        Notification::route('mail', $order->email)
                    ->notify(new OrderCreatedNotification($order));
    }
}