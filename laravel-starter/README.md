# Laravel Starter (Devter MVP)

Энэ хавтас нь Laravel 11 төсөлд шууд хуулж ашиглах **MVP суурь код** юм.

## Ашиглах стек
- Laravel 11
- MySQL 8+
- Blade (HTML/CSS)

## Суулгах дараалал
1. Laravel төсөл үүсгэнэ (`composer create-project laravel/laravel devter`).
2. Энэ хавтсын файлуудыг Laravel төслийн үндсэн хавтсанд merge хийнэ.
3. `.env` дээр MySQL тохируулна.
4. `php artisan migrate`
5. `php artisan serve`

## MVP боломжууд
- Байгууллага, үйлчилгээ, бараа, үйлчлүүлэгч CRUD API
- Booking үүсгэхэд slot conflict-оос хамгаалах transaction + lock
- Энгийн Blade dashboard + booking form
