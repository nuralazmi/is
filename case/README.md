## Genel Bilgilendirme

- Nginx, Php, Mysql ve Redis Docker ile çalışmaktadır.
- Php 8.2 ve Laravel 11 kullanılmıştır. 
- Cache için Redis(DB0), Veri tabanı için Mysql kullanılmıştır.
- Composer paketlerinin kurulması, migrate ve seed işlemleri docker içinde çalışmaktadır.
- Kuyruk ve Cache kullanımı için örnek verilmiştir. Laravel Horizon uygulandı docker içerisinde supervisor ile calısmaktadır.
- Auth kullanılmıştır. Sipariş listeleme ve indirim listeleme auth olmadan çalışmaktadır.
- Api dokümanı için scramble kullanılmıştır.
- Multiple-Language yapısı uygulandı. Header Accept-Language içerisinde gönderilen veri response mesajları, ürün ve kategori isimlerine uygulanmaktadır. 
- Repository Pattern kullanılmıştır.
- Kullanıcının "revenue" verisi kuyruk ile güncellenmiştir. Ayrıca reponun kullanıldığını test etmek için kendime mail gönderdim 😊.
- Discount kuralları veri tabanında tutulmamıştır. Customize edilmeye müsait olan bu şekildeki verileri veri tabanında tutulmasını sağlıklı bulmuyorum. Proje içerisinde interface kullanılarak optimize bir kod yazılmıştır.
- Veri tabanı diyagramı svg olarak eklenmiştir.
- İndirim gösterme rotası middleware ile doğrudan rota cache alınmıştır(accept-language ile).

## Çalıştırma

- git clone https://github.com/nuralazmi/is.git
- cd is
- docker compose up -d

## Bağlantı Bilgileri

### Case
- http://127.0.0.1:8005/

### API Doc
- http://127.0.0.1:8005/docs/api#/

### Kuyruk Monitör
- http://127.0.0.1:8005/horizon/dashboard

### DB Diyagram
- http://127.0.0.1:8005/database.svg

### Auth User
- email=azmi.nural@case.com
- password=password

### MYSQL
- HOST=127.0.0.1 
- PORT=3309 
- DATABASE=is_case 
- USERNAME=is_case 
- PASSWORD=is_case

### REDIS
- HOST=127.0.0.1
- USERNAME=
- PASSWORD=
- PORT=6379 
