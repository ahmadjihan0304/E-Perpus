# Database Schema E-Perpus

## Tabel users

| Field | Tipe |
|--------|------|
| id | INT |
| username | VARCHAR(100) |
| password | VARCHAR(255) |
| role | VARCHAR(20) |


## Tabel buku

| Field | Tipe |
|--------|------|
| id | INT |
| judul | VARCHAR(255) |
| penulis | VARCHAR(255) |
| stok | INT |
| kategori_id | INT |


## Tabel kategori

| Field | Tipe |
|--------|------|
| id | INT |
| nama_kategori | VARCHAR(100) |



## Tabel mahasiswa

| Field | Tipe |
|--------|------|
| id | INT |
| nama | VARCHAR(255) |
| nim | VARCHAR(20) |


## Tabel peminjaman

| Field | Tipe |
|--------|------|
| id | INT |
| mahasiswa_id | INT |
| buku_id | INT |
| tanggal_pinjam | DATE |
| tanggal_kembali | DATE |
| status | VARCHAR(20) |