# Devter системийн бизнес процесс ба системийн шаардлага (MVP)

## 1) Төслийн зорилго
Жижиг дунд бизнес, ресторан, гоо сайхны үйлчилгээ эрхлэгчдэд зориулсан **цаг захиалга + бараа/үйлчилгээний бүртгэл + үйлчлүүлэгчийн бүртгэл**-ийг нэг дор шийдэх, хурдан нэвтрүүлэх SaaS систем бүтээнэ.

Системийн гол үнэ цэнэ:
- Байгууллага 1–2 минутанд профайл үүсгэнэ.
- Drag & Drop интерфейсээр өөрийн форм, үйлчилгээ, барааны бүтэц, талбаруудыг код бичихгүйгээр тохируулна.
- Цаг захиалга, төлбөр, сануулга, тайланг нэг урсгалаар удирдана.

---

## 2) Хамрах хүрээ (Scope)
### MVP хүрээнд орох
1. Байгууллага бүртгэл + профайл үүсгэх
2. Салбар, ажилтан, үйлчилгээ, бараа бүртгэл
3. Ажлын цагийн хуваарь, амралтын өдөр, slot үүсгэлт
4. Онлайн захиалга (веб холбоосоор)
5. Үйлчлүүлэгчийн CRM (түүх, тэмдэглэл, давтан ирэлт)
6. SMS/Email сануулга (захиалгын өмнө ба дараа)
7. Энгийн борлуулалт/захиалга-үндэслэсэн борлуулалт
8. Үндсэн тайлан (өдөр/7 хоног/сар)
9. Роль ба эрх (Owner/Admin/Staff)

### MVP хүрээнд орохгүй (Phase 2)
- POS төхөөрөмжийн гүн интеграци
- Олон хэл/олон валютын бүрэн дэмжлэг
- Franchise төвлөрсөн толгой компанийн advanced reporting
- AI суурьтай demand forecasting

---

## 3) Оролцогч талууд (Actors)
1. **Owner** – байгууллагын эзэн, бүх тохиргоо хийнэ
2. **Admin** – өдөр тутмын удирдлага, захиалга/бараа хянах
3. **Staff** – зөвхөн өөрийн хуваарь, захиалга, үйлчлүүлэгч харах
4. **Customer** – захиалга өгөх эцсийн хэрэглэгч
5. **System** – сануулга, мэдэгдэл, тайлан автоматаар үүсгэнэ

---

## 4) Бизнес процесс (To-Be)

## 4.1 Байгууллага onboarding процесс
1. Байгууллага утас/имэйлээр бүртгүүлэх
2. OTP баталгаажуулалт
3. Байгууллагын төрлөө сонгох (ресторан / салон / бусад)
4. Анхны setup wizard:
   - Салбар
   - Ажилтан
   - Үйлчилгээ
   - Бараа
   - Ажлын цаг
5. Public booking page автоматаар үүсэх

**Гаралт:** 5 минутын дотор ашиглаж эхлэх бэлэн орчин.

## 4.2 Цаг захиалгын процесс
1. Customer public booking page нээнэ
2. Салбар → үйлчилгээ → ажилтан (optional) → огноо/цаг сонгоно
3. Контакт мэдээлэл оруулна
4. Систем давхардал шалгана (slot locking)
5. Захиалга үүсгэж баталгаажуулна
6. SMS/Email confirmation илгээнэ
7. Захиалгын өмнөх N минутанд reminder илгээнэ
8. Үйлчилгээ дууссаны дараа review/дахин захиалгын санал

## 4.3 Бараа бүртгэл ба ашиглалтын процесс
1. Admin бараа ангилал үүсгэнэ
2. SKU, үнэ, үлдэгдэл, доод босго бүртгэнэ
3. Борлуулалт хийхэд үлдэгдэл автоматаар буурна
4. Доод босгоос доош бол low-stock анхааруулга
5. Тайланд хамгийн их борлуулалттай бараа харагдана

## 4.4 Үйлчлүүлэгчийн бүртгэл (CRM) процесс
1. Захиалга хийх бүрт customer profile автоматаар үүсгэнэ
2. Ирэлтийн түүх, үйлчилгээнүүд, худалдан авалт хадгална
3. Staff тэмдэглэл үлдээнэ (харшил, дуртай үйлчилгээ гэх мэт)
4. Repeat customer сегмент үүсгэн промо явуулна

## 4.5 Drag & Drop тохиргооны процесс
1. Owner “Form Builder” модульд орно
2. Text, Select, Date, Phone, Checkbox талбаруудаас чирж байрлуулна
3. Required/Optional, validation rule тохируулна
4. Preview хийнэ
5. Publish дарж booking form-д нэвтрүүлнэ

---

## 5) Функциональ шаардлага (Functional Requirements)

### FR-01 Нэвтрэлт ба бүртгэл
- Утас/имэйл бүртгэл, OTP баталгаажуулалт
- Нууц үг шинэчлэх
- JWT эсвэл Sanctum суурьтай session

### FR-02 Байгууллагын менежмент
- Байгууллагын профайл CRUD
- Салбар CRUD
- Ажлын цаг, амралтын өдөр тохируулах

### FR-03 Ажилтан менежмент
- Ажилтан CRUD
- Үйлчилгээ-ажилтан mapping
- Ажилтны хувийн schedule override

### FR-04 Үйлчилгээ менежмент
- Үйлчилгээ CRUD (нэр, үргэлжлэх минут, үнэ, тайлбар)
- Category дэмжих
- Online/Offline availability тохируулах

### FR-05 Бараа менежмент
- Бараа CRUD (SKU, barcode optional, үнэ, cost)
- Stock in/out хөдөлгөөн бүртгэл
- Low stock alert

### FR-06 Цаг захиалга
- Slot generation (ажлын цаг + үйлчилгээний үргэлжлэх хугацаа)
- Давхар захиалгаас хамгаалах transaction locking
- Reschedule/Cancel
- No-show тэмдэглэгээ

### FR-07 CRM
- Customer CRUD
- Захиалга, худалдан авалтын timeline
- Note болон Tag

### FR-08 Мэдэгдэл
- Confirmation, reminder, cancellation мессеж
- Template editor (MVP: basic)
- Queue ашиглан асинхрон илгээх

### FR-09 Тайлан
- Өдрийн захиалга
- Орлого (үйлчилгээ/бараа)
- Хамгийн идэвхтэй үйлчлүүлэгч
- No-show хувь

### FR-10 Drag & Drop Form Builder
- Component palette
- Field property panel
- Validation rules
- JSON schema хэлбэрээр хадгалалт

---

## 6) Функциональ бус шаардлага (Non-Functional Requirements)
1. **Гүйцэтгэл:** Booking API хариу < 500ms (p95)
2. **Найдвартай байдал:** 99.5% uptime (MVP)
3. **Аюулгүй байдал:** OWASP top 10 суурь хамгаалалт, rate limiting
4. **Өргөтгөх чадвар:** Multi-tenant архитектур (organization_id)
5. **Нөөцлөлт:** Өдөр тутмын backup, 7 хоног хадгалалт
6. **Лог/ажиглалт:** API error logging + audit trail
7. **Нууцлал:** PII мэдээлэл (утас, имэйл)-д access policy

---

## 7) Техникийн шаардлага (Laravel + HTML/CSS + MySQL)

### 7.1 Backend
- Laravel 11+
- Laravel Sanctum (auth)
- Queue (database/redis)
- REST API + Blade/Admin panel (эсвэл API + SPA)

### 7.2 Frontend
- HTML5, CSS3, Vanilla JS (MVP)
- Drag & Drop: SortableJS эсвэл ижил төстэй хөнгөн сан
- Responsive layout (desktop + mobile)

### 7.3 Database
- MySQL 8+
- UTF8MB4 collation
- Индекс: `organization_id`, `staff_id`, `start_at`, `status`

### 7.4 Deployment
- Nginx + PHP-FPM
- CI/CD (GitHub Actions basic)
- Environment-based config (.env)

---

## 8) Өгөгдлийн загварын санал (Core Tables)
1. organizations
2. branches
3. users
4. roles
5. staff_profiles
6. services
7. service_staff
8. products
9. inventory_movements
10. customers
11. bookings
12. booking_items
13. customer_notes
14. notification_logs
15. form_templates
16. form_fields
17. form_submissions
18. payments
19. audit_logs

---

## 9) API endpoint-ийн MVP жагсаалт
- `POST /api/auth/register`
- `POST /api/auth/login`
- `GET /api/organizations/me`
- `POST /api/services`
- `GET /api/services`
- `POST /api/products`
- `POST /api/bookings`
- `PATCH /api/bookings/{id}/reschedule`
- `PATCH /api/bookings/{id}/cancel`
- `GET /api/customers`
- `POST /api/forms/templates`
- `POST /api/forms/templates/{id}/publish`

---

## 10) Acceptance Criteria (жишиг)
1. Owner бүртгүүлээд 3 минутын дотор анхны booking page-тэй болсон байх.
2. Нэг slot-д 2 захиалга зэрэг баталгаажихгүй байх.
3. Захиалга баталгаажсанаас хойш 10 секундэд confirmation мэдэгдэл queued болсон байх.
4. Барааны үлдэгдэл 0-с доош буухгүй байх.
5. Form builder-ээр үүсгэсэн required field хоосон үед submit болохгүй байх.

---

## 11) Codex-д оруулах бэлэн prompt (Laravel implementation)

Доорх prompt-ийг шууд Codex-д өгч хөгжүүлэлт эхлүүлж болно:

```text
You are a senior Laravel architect.
Build an MVP multi-tenant booking + inventory + CRM system for SMBs (restaurants and beauty services).
Tech stack: Laravel 11, MySQL 8, HTML/CSS, vanilla JS.

Business goals:
- Organization can onboard in under 5 minutes.
- Booking page is publicly shareable.
- Owner can configure custom booking fields using drag-and-drop form builder.
- Support services, products, staff, customers, bookings, reminders, and basic reports.

Please implement in this order:
1) Project setup + auth (Laravel Sanctum)
2) Multi-tenant data model with organization_id in all core tables
3) CRUD: services, products, staff, customers
4) Booking engine with slot generation + overlap protection (DB transaction + lock)
5) Notification queue for confirmation/reminder/cancellation
6) Drag-and-drop form builder storing schema in JSON
7) Basic dashboard with daily bookings and revenue summary
8) Seeders + factories + feature tests

Required deliverables:
- Migration files
- Eloquent models + relationships
- FormRequest validations
- REST API routes/controllers
- Blade pages for admin
- Public booking page
- Unit/Feature tests for booking conflicts
- README with setup instructions

Constraints:
- Clean architecture and reusable services
- Use policies for authorization
- Use DTO/resource responses where needed
- Add indexes for performance
- Prevent overbooking strictly

Also include:
- ERD description in markdown
- Sample .env.example
- Postman collection (optional)
```

---

## 12) Хөгжүүлэлтийн үе шат (Roadmap)
- **Phase 1 (2–4 долоо хоног):** MVP (booking + CRM + products)
- **Phase 2:** Online payment, loyalty, advanced analytics
- **Phase 3:** Mobile app + multi-branch enterprise controls

