# Tentang Indo Data
Database apa saja yang berhubungan dengan indonesia

1. File province_regency_indonesia.json: Data 33 propinsi beserta 497 kab/kota termasuk latitude, longitude dan timezone id.
1. File province_regency_indonesia.sqlite: versi sqlite3
1. File suburban_town_regency_province_indonesia.sqlite: Data 81508 desa/kelurahan,6928 kecamatan, 497 kota/kabupaten, dan 33 propinsi.

# Contoh Penggunaan
Untuk anda pengguna Ubuntu, terlebih dahulu menginstall sqlite3
```
$ sudo apt-get install sqlite3
```

## Buka File Database
```
$ sqlite3 suburban_town_province_indonesia.sqlite
```

## Menampilkan schema database
```
sqlite> .schema
CREATE TABLE province(id INTEGER PRIMARY KEY AUTOINCREMENT, ref_code INTEGER, name VARCHAR(2000));
CREATE TABLE regency(id INTEGER PRIMARY KEY AUTOINCREMENT, province_id INTEGER,ref_code INTEGER,name VARCHAR(2000),latitude FLOAT(5) NULL, longitude FLOAT(5) NULL, timezone VARCHAR(2000) NULL, FOREIGN KEY(province_id) REFERENCES province(id));
CREATE TABLE suburban(id INTEGER PRIMARY KEY AUTOINCREMENT, town_id INTEGER,ref_code INTEGER,name VARCHAR(2000),latitude FLOAT(5) NULL, longitude FLOAT(5) NULL, FOREIGN KEY(town_id) REFERENCES town(id));
CREATE TABLE town(id INTEGER PRIMARY KEY AUTOINCREMENT, regency_id INTEGER,ref_code INTEGER,name VARCHAR(2000),latitude FLOAT(5) NULL, longitude FLOAT(5) NULL, FOREIGN KEY(regency_id) REFERENCES regency(id));
```

## Query list propinsi
```
sqlite> select id,name from province;
1|ACEH
2|BALI
3|BANTEN
4|BENGKULU
5|DAERAH ISTIMEWA YOGYAKARTA
6|DKI JAKARTA
7|GORONTALO
8|JAMBI
9|JAWA BARAT
...
31|SUMATERA BARAT
32|SUMATERA SELATAN
33|SUMATERA UTARA
```

## Query list kabupaten
```
sqlite> select b.name as province,a.name as regency,a.latitude,a.longitude,a.timezone from regency a INNER JOIN province b ON a.province_id=b.id ORDER BY b.name,a.name;
province|regency|latitude|longitude|timezone
ACEH|ACEH BARAT|4.454275|96.152698|Asia/Jakarta
ACEH|ACEH BARAT DAYA|3.796343|97.006839|Asia/Jakarta
ACEH|ACEH BESAR|5.452917|95.477781|Asia/Jakarta
ACEH|ACEH JAYA|4.787368|95.645795|Asia/Jakarta
ACEH|ACEH SELATAN|3.311506|97.351656|Asia/Jakarta
ACEH|ACEH SINGKIL|2.358946|97.87216|Asia/Jakarta
ACEH|ACEH TAMIANG|4.232887|98.002889|Asia/Jakarta
ACEH|ACEH TENGAH|4.448264|96.8351|Asia/Jakarta
ACEH|ACEH TENGGARA|3.308867|97.698227|Asia/Jakarta
ACEH|ACEH TIMUR|4.522411|97.611422|Asia/Jakarta
ACEH|ACEH UTARA|4.978633|97.222142|Asia/Jakarta
ACEH|BENER MERIAH|4.774835|97.006839|Asia/Jakarta
ACEH|BIREUEN|5.195278|96.665|Asia/Jakarta
ACEH|GAYO LUES|3.955165|97.351656|Asia/Jakarta
ACEH|KOTA BANDA ACEH|5.316667|95.35|Asia/Jakarta
ACEH|KOTA LANGSA|4.433333|97.966667|Asia/Jakarta
...
BALI|BADUNG|-8.58193|115.177059|Asia/Makassar
BALI|BANGLI|-8.45|115.35|Asia/Makassar
BALI|BULELENG|-8.113831|115.126999|Asia/Makassar
BALI|GIANYAR|-8.533333|115.333333|Asia/Makassar
BALI|JEMBRANA|-8.361852|114.6418|Asia/Makassar
BALI|KARANGASEM|-8.42969|115.627313|Asia/Makassar
...
BENGKULU|BENGKULU TENGAH|-3.792067|102.261996|Asia/Jakarta
BENGKULU|BENGKULU UTARA|-3.421956|102.163272|Asia/Jakarta
BENGKULU|KAUR|-4.679228|103.451177|Asia/Jakarta
BENGKULU|KEPAHIANG|-3.651431|102.578201|Asia/Jakarta
BENGKULU|KOTA BENGKULU|-3.816667|102.316667|Asia/Jakarta
BENGKULU|LEBONG|-2.992617|104.382202|Asia/Jakarta
BENGKULU|MUKOMUKO|-2.576|101.11698|Asia/Jakarta
BENGKULU|REJANG LEBONG|-3.454815|102.667558|Asia/Jakarta
BENGKULU|SELUMA|-4.062293|102.564226|Asia/Jakarta
```
