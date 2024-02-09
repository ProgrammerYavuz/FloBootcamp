# Kan Bankası Yönetim Sistemi

## Proje Tanıtımı
* Sistemde iki farklı alan vardır. Bunlar; admin paneli kısmı ve kan sorgulama alanlarıdır.
* Kan sorgulama alanı için oturum açma işlemi gerekmemektedir.
* Bu alanda kişi kendi kan grubunu seçerek sistemde bulunan mevcut kan stokuna ulaşabilir.
* Yönetici kısmında bir oturum açma işlemi gerçekleştirilir.
* Yönetici paneline girilince burada sistemde kayıtlı donör sayısına, donörlerin ad soyad, 
 telefon, posta, kan grubu ve kaç ünite kan bağışı yaptığı bilgileri görüntülenir.
* Yönetici panelinden yeni donör kayıtları girilebilir.
* Yönetici sistemde kayıtlı olan donörleri excel formatında .csv uzantılı dosyaya yazdırabilir.
<br><br>

## Proje Yapılışı
* Projede indexin içerisine diğer sayfalar include edilerek sayfalama işlemi kullanılmıştır.
* Sistemde yönetici girişi gerektiren sayfalara oturum açılmadan ulaşılmak istenirse (get 
 methodu ile) kişi tekrardan ana sayfaya yönlendirilir.
 * Projede donör kaydı için sınıf (class) yapısı veri tabanı bağlantısı için ise fonksiyon
 kullanılmıştır.
<br><br>
 
 ## Proje Resimleri
 #### * Ana Sayfa
![flo-(1)](https://user-images.githubusercontent.com/109480983/205433815-90e8c02c-b354-4395-82f5-d17fb97c04af.png)
<br><br>
#### * Kan grubu seçme alanı
![flo-(2)](https://user-images.githubusercontent.com/109480983/205434839-5daad4e9-eab4-43ea-abe2-5d7bf61630e9.png)
<br><br>
#### * Seçilen kan grubuna göre sistemde kayıtlı donör sayısı ve kan miktarı
![flo-(3)](https://user-images.githubusercontent.com/109480983/205434882-43280760-8470-4c9c-99dd-e3a284fc6dc4.png)
<br><br>
#### * Admin panele giriş ekranı
![flo-(4)](https://user-images.githubusercontent.com/109480983/205434994-c8966bc7-44a2-49a3-a595-8693aa735c33.png)
<br><br>
#### * Başarılı giriş geri bildirimi
![flo-(5)](https://user-images.githubusercontent.com/109480983/205435029-5a36376e-7712-45fb-b450-2a2a3e612a47.png)
<br><br>
#### * Admin paneli
![flo-(6)](https://user-images.githubusercontent.com/109480983/205435090-81580a5a-c5a5-4dca-a19e-77d8060cb2be.png)
<br><br>
#### * Excel (csv) yazdırma alanı
![flo-(7)](https://user-images.githubusercontent.com/109480983/205435181-1638efe3-4ae4-41a9-a648-74fd8f999ecb.png)
<br><br>
#### * Başarılı yazdırma işlemi geri bildirimi
![flo-(8)](https://user-images.githubusercontent.com/109480983/205435222-c761c88d-16a1-4886-8d4c-0b17cf107707.png)
<br><br>
#### * Oluşturulan csv dosyası
![flo-(9)](https://user-images.githubusercontent.com/109480983/205435277-6d7a0b9a-f5fc-4f76-aec2-39f1b545a16f.png)
<br><br>
#### * Donör ekleme alanı
![flo-(10)](https://user-images.githubusercontent.com/109480983/205435303-b4a55aba-d012-41ec-8d1c-c277c64e840c.png)
<br><br>
#### * Başarılı donör kaydı geri bildirimi
![flo-(11)](https://user-images.githubusercontent.com/109480983/205435401-21b81013-6d89-419c-b107-94db9ea066de.png)
<br><br>
#### * Başarılı oturum sonlandırma geri bildirimi
![flo-(12)](https://user-images.githubusercontent.com/109480983/205435470-bc8a126c-78c1-4bd9-bb3c-70a47e65bfcb.png)
<br><br>
#### * Oturum izni gereken alanlara erişmek istenildiğinde verilecek geri bildirim
![flo-(13)](https://user-images.githubusercontent.com/109480983/205435563-9fed5227-dedb-47bf-a1b1-7c0c0ae99a9d.png)
<br><br>
