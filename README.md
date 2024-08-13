# Aksamedia: Back End - Web Developer Intern Test
Link API: https://aksamedia-backend-assignment-production-1baa.up.railway.app/api/

Kredensial tertera [di sini](#tugas-1).

Update: Tambahan data untuk users dengan username "admin02" dan "admin03". Password sama dengan yang tertera [di sini](#tugas-1).

## Profil
Nama: Tridiktya Hardani Putra

PT: Institut Teknologi Sepuluh Nopember (ITS) Surabaya

## Requirement
- Laravel
- Mysql/MariaDB
- PhpMyAdmin / Adminer / HeidiSQL
- Postman

## Tugas 1
### Membuat Api Login
- Endpoint `/login`
- Method: `POST`
- Request
  
![image](/images/tugas1-req.png)

- Response
  
![image](/images/tugas1-res.png)

## Tugas 2
### Membuat Api Get All Data Divisi
- Endpoint `/divisions`
- Method: `GET`
- Bisa difilter berdasarkan nama
- Siapkan data dummy menggunakan seeder
- Isi data dummy (`Mobile Apps, QA, Full Stack, Backend, Frontend, UI/UX Designer`)
- Request
  
![image](/images/tugas2-req.png)

- Response
  
![image](/images/tugas2-res.png)

## Tugas 3
### Membuat Api Get All Data Karyawan
- Endpoint `/employees`
- Method: `GET`
- Bisa difilter berdasarkan nama
- Bisa difilter berdasarkan divisi
- Request
  
![image](/images/tugas3-req.png)

- Response
  
![image](/images/tugas3-res.png)

## Tugas 4

### Membuat Api Create Data Karyawan

- Endpoint `/employees`
- Method: `POST`
- Request
  
![image](/images/tugas4-req.png)

- Response
  
![image](/images/tugas4-res.png)

## Tugas 5

### Membuat Api Update Data Karyawan

- Endpoint `/employees/{uuid pegawai}`
- Method: `PUT`
- Request
  
![image](/images/tugas5-req.png)

- Response
  
![image](/images/tugas5-res.png)

## Tugas 6

### Membuat Api Delete Data Karyawan

- Endpoint `/employees/{uuid pegawai}`
- Method: `DELETE`
- Response
  
![image](/images/tugas6-res.png)

## Tugas 7

### Membuat Api Logout

- Endpoint `/logout`
- Method: `POST`
- Response
  
![image](/images/tugas7-res.png)
