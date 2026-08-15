# 🚗 DELTA_AVTOMAKTAB_UZ — Imtihon va Boshqaruv Tizimi

Ushbu platforma haydovchilik maktablari uchun mo'ljallangan bo'lib, o'quvchilar bilimini sinash (imtihon olish), o'qituvchilar va darslar davomatini boshqarish hamda moliyaviy hisob-kitoblarni amalga oshirish imkonini beruvchi to'liq avtomatlashtirilgan tizimdir.

---

## 🌟 Asosiy Imkoniyatlar

### 📚 1. 2200+ Betakror Test Savollari Bazasi
Tizimda **2,206 ta** to'liq o'zbek, kirill va rus tillaridagi haydovchilik nazariyasi test savollari jamlangan. Har bir savol mutlaqo betakror bo'lib, quyidagi yo'nalishlarni qamrab oladi:
* **Tezlik cheklovlari (Speed Limits)**: Turli hududlar (avtomagistral, aholi punkti, maktab atrofi, turar-joy dahasi) va transport vositalari uchun.
* **Birinchi Tibbiy Yordam (First Aid)**: YTHdagi jarohatlar (arterial/venoz qon ketish, suyak sinishi, sun'iy nafas berish).
* **Ma'muriy Jarimalar (Fines)**: O'zbekiston Respublikasi MJtK bo'yicha eng so'nggi ma'lumotlar (sug'urtasiz haydash, mastlik, kamar taqmaslik va h.k.).
* **Yo'l belgilari va chiziqlari (Signs & Markings)**: Belgilarning to'liq tavsiflari va qo'llanish tartibi.
* **Chorrahadan o'tish tartibi (Intersection Priority)**: Teng ahamiyatli, aylanma harakatli va tartibga solingan chorrahalardagi imtiyozlar.

### 🔄 2. Real-time Cloud Sync (Tizimlararo Sinxronizatsiya)
Kompyuterda (Admin/O'qituvchi boshqaruv panelida) kiritilgan har qanday o'quvchi, guruh yoki to'lov ma'lumoti darhol serverdagi markaziy **SQLite** bazasiga (`database/global_state.json` orqali) yoziladi.
* Telefon orqali ulangan har qanday o'quvchi darhol o'z login-paroli bilan tizimga kira oladi.
* O'quvchi telefonda topshirgan imtihon natijalari yoki dars davomati zudlik bilan o'qituvchi ekranida aks etadi.

### 📱 3. Android WebView App & Mobil Integratsiya
Loyiha tarkibida `android_app` katalogida to'liq Java-da yozilgan mobil ilova kodi mavjud.
* Ilova avtomatik ravishda serverning faol manziliga bog'lanadi.
* Brauzerning **LocalStorage** va xavfsizligini ta'minlash uchun xususiyatlar integratsiya qilingan.

### 🔗 4. Avtomatik Localtunnel & QR Kod
Tashqi mobil telefonlar dasturga ulanishi uchun tizim:
1. **Localtunnel** orqali xavfsiz ochiq internet havolasini generatsiya qiladi.
2. Dastur ichida o'quvchilar telefon orqali skanerlab kirishi uchun dinamik QR kodlarni taqdim etadi.

---

## 🛠️ Texnologiyalar

* **Frontend**: HTML5, CSS3, JavaScript (Vue.js WebAssembly / SPA)
* **Backend**: Node.js (Express server)
* **Ma'vulotlar bazasi**: SQLite (sql.js WebAssembly) + `global_state.json`
* **Mobil Ilova**: Android Studio (Java & XML, WebView component)

---

## 🚀 Loyihani Ishga Tushirish

Tizim Windows operatsion tizimida zudlik bilan ishga tushirish uchun `.bat` ssenariylar bilan ta'minlangan:

### 1-qadam: Node.js paketlarini o'rnatish
Dasturning asosiy papkasida terminalni ochib, quyidagi buyruqni bajaring:
```bash
npm install
```

### 2-qadam: Dasturnir ishga tushirish
* **`run_server.bat`** faylini ikki marta bosib ishga tushiring. Bu Node.js Express backend serverini `http://127.0.0.1:8000` manzilida ishga tushiradi.
* **`run_localtunnel.bat`** faylini ishga tushiring. Bu avtomatik ravishda dasturni internet tarmog'iga eksport qiladi va faol havolani `localtunnel_url.txt` fayliga yozib boradi.

### 3-qadam: Brauzerda kirish
Brauzeringizda quyidagi manzilni oching:
```
http://127.0.0.1:8000
```
*(Yoki telefonda kirish uchun ekrandagi mobil ulanish QR kodini skanerlang).*

---

## 📂 Kataloglar Tuzilishi

```
📂 MAKTAB
 ┣ 📂 android_app              # Android Studio uchun native mobil ilova kodi
 ┣ 📂 database                 # SQLite ma'lumotlar bazasi va sinxronizatsiya fayllari
 ┃ ┣ 📜 database.sqlite        # SQLite bazasi
 ┃ ┗ 📜 global_state.json      # Sinxronizatsiya qilingan real-time ma'lumotlar
 ┣ 📂 public                   # Serverning statik resurslari
 ┣ 📂 resources/views
 ┃ ┗ 📜 welcome.blade.php      # Tizimning asosiy Single-Page foydalanuvchi interfeysi (UI)
 ┣ 📜 node_server.js           # Asosiy backend server (Express & SQLite API)
 ┣ 📜 populate_db_questions.js # Savollarni generatsiya qiluvchi skript
 ┣ 📜 run_server.bat           # Serverni ishga tushiruvchi skript
 ┗ 📜 run_localtunnel.bat      # Mobil ulanish tunnelini yoquvchi skript
```

---

> [!NOTE]
> Loyiha mahalliy tarmoq o'chib qolganda ham, o'zining avtonom rejimi va real-time sinxronizatsiyasi tufayli ishonchli ishlashda davom etadi.
