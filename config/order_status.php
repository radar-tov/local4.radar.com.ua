<?php

return [
	\App\Models\Order::STATUS_NEW => 'Новый',
	\App\Models\Order::STATUS_CONFIRMED => 'Подтвержден',
	\App\Models\Order::STATUS_SENT => 'Отправлен',
	\App\Models\Order::STATUS_READY => 'Завершен',
	\App\Models\Order::STATUS_CANCELED => 'Отменен'
];