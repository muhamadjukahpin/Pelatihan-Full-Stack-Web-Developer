<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitySeeder extends Seeder
{
    private $arr = [
        ['province_id' => 21, 'name' => 'Aceh Barat'],
        ['province_id' => 21, 'name' => 'Aceh Barat Daya'],
        ['province_id' => 21, 'name' => 'Aceh Besar'],
        ['province_id' => 21, 'name' => 'Aceh Jaya'],
        ['province_id' => 21, 'name' => 'Aceh Selatan'],
        ['province_id' => 21, 'name' => 'Aceh Singkil'],
        ['province_id' => 21, 'name' => 'Aceh Tamiang'],
        ['province_id' => 21, 'name' => 'Aceh Tengah'],
        ['province_id' => 21, 'name' => 'Aceh Tenggara'],
        ['province_id' => 21, 'name' => 'Aceh Timur'],
        ['province_id' => 21, 'name' => 'Aceh Utara'],
        ['province_id' => 32, 'name' => 'Agam'],
        ['province_id' => 23, 'name' => 'Alor'],
        ['province_id' => 19, 'name' => 'Ambon'],
        ['province_id' => 34, 'name' => 'Asahan'],
        ['province_id' => 24, 'name' => 'Asmat'],
        ['province_id' => 1, 'name' => 'Badung'],
        ['province_id' => 13, 'name' => 'Balangan'],
        ['province_id' => 15, 'name' => 'Balikpapan'],
        ['province_id' => 21, 'name' => 'Banda Aceh'],
        ['province_id' => 18, 'name' => 'Bandar Lampung'],
        ['province_id' => 9, 'name' => 'Bandung'],
        ['province_id' => 9, 'name' => 'Bandung'],
        ['province_id' => 9, 'name' => 'Bandung Barat'],
        ['province_id' => 29, 'name' => 'Banggai'],
        ['province_id' => 29, 'name' => 'Banggai Kepulauan'],
        ['province_id' => 2, 'name' => 'Bangka'],
        ['province_id' => 2, 'name' => 'Bangka Barat'],
        ['province_id' => 2, 'name' => 'Bangka Selatan'],
        ['province_id' => 2, 'name' => 'Bangka Tengah'],
        ['province_id' => 11, 'name' => 'Bangkalan'],
        ['province_id' => 1, 'name' => 'Bangli'],
        ['province_id' => 13, 'name' => 'Banjar'],
        ['province_id' => 9, 'name' => 'Banjar'],
        ['province_id' => 13, 'name' => 'Banjarbaru'],
        ['province_id' => 13, 'name' => 'Banjarmasin'],
        ['province_id' => 10, 'name' => 'Banjarnegara'],
        ['province_id' => 28, 'name' => 'Bantaeng'],
        ['province_id' => 5, 'name' => 'Bantul'],
        ['province_id' => 33, 'name' => 'Banyuasin'],
        ['province_id' => 10, 'name' => 'Banyumas'],
        ['province_id' => 11, 'name' => 'Banyuwangi'],
        ['province_id' => 13, 'name' => 'Barito Kuala'],
        ['province_id' => 14, 'name' => 'Barito Selatan'],
        ['province_id' => 14, 'name' => 'Barito Timur'],
        ['province_id' => 14, 'name' => 'Barito Utara'],
        ['province_id' => 28, 'name' => 'Barru'],
        ['province_id' => 17, 'name' => 'Batam'],
        ['province_id' => 10, 'name' => 'Batang'],
        ['province_id' => 8, 'name' => 'Batang Hari'],
        ['province_id' => 11, 'name' => 'Batu'],
        ['province_id' => 34, 'name' => 'Batu Bara'],
        ['province_id' => 30, 'name' => 'Bau-Bau'],
        ['province_id' => 9, 'name' => 'Bekasi'],
        ['province_id' => 9, 'name' => 'Bekasi'],
        ['province_id' => 2, 'name' => 'Belitung'],
        ['province_id' => 2, 'name' => 'Belitung Timur'],
        ['province_id' => 23, 'name' => 'Belu'],
        ['province_id' => 21, 'name' => 'Bener Meriah'],
        ['province_id' => 26, 'name' => 'Bengkalis'],
        ['province_id' => 12, 'name' => 'Bengkayang'],
        ['province_id' => 4, 'name' => 'Bengkulu'],
        ['province_id' => 4, 'name' => 'Bengkulu Selatan'],
        ['province_id' => 4, 'name' => 'Bengkulu Tengah'],
        ['province_id' => 4, 'name' => 'Bengkulu Utara'],
        ['province_id' => 15, 'name' => 'Berau'],
        ['province_id' => 24, 'name' => 'Biak Numfor'],
        ['province_id' => 22, 'name' => 'Bima'],
        ['province_id' => 22, 'name' => 'Bima'],
        ['province_id' => 34, 'name' => 'Binjai'],
        ['province_id' => 17, 'name' => 'Bintan'],
        ['province_id' => 21, 'name' => 'Bireuen'],
        ['province_id' => 31, 'name' => 'Bitung'],
        ['province_id' => 11, 'name' => 'Blitar'],
        ['province_id' => 11, 'name' => 'Blitar'],
        ['province_id' => 10, 'name' => 'Blora'],
        ['province_id' => 7, 'name' => 'Boalemo'],
        ['province_id' => 9, 'name' => 'Bogor'],
        ['province_id' => 9, 'name' => 'Bogor'],
        ['province_id' => 11, 'name' => 'Bojonegoro'],
        ['province_id' => 31, 'name' => 'Bolaang Mongondow (Bolmong)'],
        ['province_id' => 31, 'name' => 'Bolaang Mongondow Selatan'],
        ['province_id' => 31, 'name' => 'Bolaang Mongondow Timur'],
        ['province_id' => 31, 'name' => 'Bolaang Mongondow Utara'],
        ['province_id' => 30, 'name' => 'Bombana'],
        ['province_id' => 11, 'name' => 'Bondowoso'],
        ['province_id' => 28, 'name' => 'Bone'],
        ['province_id' => 7, 'name' => 'Bone Bolango'],
        ['province_id' => 15, 'name' => 'Bontang'],
        ['province_id' => 24, 'name' => 'Boven Digoel'],
        ['province_id' => 10, 'name' => 'Boyolali'],
        ['province_id' => 10, 'name' => 'Brebes'],
        ['province_id' => 32, 'name' => 'Bukittinggi'],
        ['province_id' => 1, 'name' => 'Buleleng'],
        ['province_id' => 28, 'name' => 'Bulukumba'],
        ['province_id' => 16, 'name' => 'Bulungan (Bulongan)'],
        ['province_id' => 8, 'name' => 'Bungo'],
        ['province_id' => 29, 'name' => 'Buol'],
        ['province_id' => 19, 'name' => 'Buru'],
        ['province_id' => 19, 'name' => 'Buru Selatan'],
        ['province_id' => 30, 'name' => 'Buton'],
        ['province_id' => 30, 'name' => 'Buton Utara'],
        ['province_id' => 9, 'name' => 'Ciamis'],
        ['province_id' => 9, 'name' => 'Cianjur'],
        ['province_id' => 10, 'name' => 'Cilacap'],
        ['province_id' => 3, 'name' => 'Cilegon'],
        ['province_id' => 9, 'name' => 'Cimahi'],
        ['province_id' => 9, 'name' => 'Cirebon'],
        ['province_id' => 9, 'name' => 'Cirebon'],
        ['province_id' => 34, 'name' => 'Dairi'],
        ['province_id' => 24, 'name' => 'Deiyai (Deliyai)'],
        ['province_id' => 34, 'name' => 'Deli Serdang'],
        ['province_id' => 10, 'name' => 'Demak'],
        ['province_id' => 1, 'name' => 'Denpasar'],
        ['province_id' => 9, 'name' => 'Depok'],
        ['province_id' => 32, 'name' => 'Dharmasraya'],
        ['province_id' => 24, 'name' => 'Dogiyai'],
        ['province_id' => 22, 'name' => 'Dompu'],
        ['province_id' => 29, 'name' => 'Donggala'],
        ['province_id' => 26, 'name' => 'Dumai'],
        ['province_id' => 33, 'name' => 'Empat Lawang'],
        ['province_id' => 23, 'name' => 'Ende'],
        ['province_id' => 28, 'name' => 'Enrekang'],
        ['province_id' => 25, 'name' => 'Fakfak'],
        ['province_id' => 23, 'name' => 'Flores Timur'],
        ['province_id' => 9, 'name' => 'Garut'],
        ['province_id' => 21, 'name' => 'Gayo Lues'],
        ['province_id' => 1, 'name' => 'Gianyar'],
        ['province_id' => 7, 'name' => 'Gorontalo'],
        ['province_id' => 7, 'name' => 'Gorontalo'],
        ['province_id' => 7, 'name' => 'Gorontalo Utara'],
        ['province_id' => 28, 'name' => 'Gowa'],
        ['province_id' => 11, 'name' => 'Gresik'],
        ['province_id' => 10, 'name' => 'Grobogan'],
        ['province_id' => 5, 'name' => 'Gunung Kidul'],
        ['province_id' => 14, 'name' => 'Gunung Mas'],
        ['province_id' => 34, 'name' => 'Gunungsitoli'],
        ['province_id' => 20, 'name' => 'Halmahera Barat'],
        ['province_id' => 20, 'name' => 'Halmahera Selatan'],
        ['province_id' => 20, 'name' => 'Halmahera Tengah'],
        ['province_id' => 20, 'name' => 'Halmahera Timur'],
        ['province_id' => 20, 'name' => 'Halmahera Utara'],
        ['province_id' => 13, 'name' => 'Hulu Sungai Selatan'],
        ['province_id' => 13, 'name' => 'Hulu Sungai Tengah'],
        ['province_id' => 13, 'name' => 'Hulu Sungai Utara'],
        ['province_id' => 34, 'name' => 'Humbang Hasundutan'],
        ['province_id' => 26, 'name' => 'Indragiri Hilir'],
        ['province_id' => 26, 'name' => 'Indragiri Hulu'],
        ['province_id' => 9, 'name' => 'Indramayu'],
        ['province_id' => 24, 'name' => 'Intan Jaya'],
        ['province_id' => 6, 'name' => 'Jakarta Barat'],
        ['province_id' => 6, 'name' => 'Jakarta Pusat'],
        ['province_id' => 6, 'name' => 'Jakarta Selatan'],
        ['province_id' => 6, 'name' => 'Jakarta Timur'],
        ['province_id' => 6, 'name' => 'Jakarta Utara'],
        ['province_id' => 8, 'name' => 'Jambi'],
        ['province_id' => 24, 'name' => 'Jayapura'],
        ['province_id' => 24, 'name' => 'Jayapura'],
        ['province_id' => 24, 'name' => 'Jayawijaya'],
        ['province_id' => 11, 'name' => 'Jember'],
        ['province_id' => 1, 'name' => 'Jembrana'],
        ['province_id' => 28, 'name' => 'Jeneponto'],
        ['province_id' => 10, 'name' => 'Jepara'],
        ['province_id' => 11, 'name' => 'Jombang'],
        ['province_id' => 25, 'name' => 'Kaimana'],
        ['province_id' => 26, 'name' => 'Kampar'],
        ['province_id' => 14, 'name' => 'Kapuas'],
        ['province_id' => 12, 'name' => 'Kapuas Hulu'],
        ['province_id' => 10, 'name' => 'Karanganyar'],
        ['province_id' => 1, 'name' => 'Karangasem'],
        ['province_id' => 9, 'name' => 'Karawang'],
        ['province_id' => 17, 'name' => 'Karimun'],
        ['province_id' => 34, 'name' => 'Karo'],
        ['province_id' => 14, 'name' => 'Katingan'],
        ['province_id' => 4, 'name' => 'Kaur'],
        ['province_id' => 12, 'name' => 'Kayong Utara'],
        ['province_id' => 10, 'name' => 'Kebumen'],
        ['province_id' => 11, 'name' => 'Kediri'],
        ['province_id' => 11, 'name' => 'Kediri'],
        ['province_id' => 24, 'name' => 'Keerom'],
        ['province_id' => 10, 'name' => 'Kendal'],
        ['province_id' => 30, 'name' => 'Kendari'],
        ['province_id' => 4, 'name' => 'Kepahiang'],
        ['province_id' => 17, 'name' => 'Kepulauan Anambas'],
        ['province_id' => 19, 'name' => 'Kepulauan Aru'],
        ['province_id' => 32, 'name' => 'Kepulauan Mentawai'],
        ['province_id' => 26, 'name' => 'Kepulauan Meranti'],
        ['province_id' => 31, 'name' => 'Kepulauan Sangihe'],
        ['province_id' => 6, 'name' => 'Kepulauan Seribu'],
        ['province_id' => 31, 'name' => 'Kepulauan Siau Tagulandang Biaro (Sitaro)'],
        ['province_id' => 20, 'name' => 'Kepulauan Sula'],
        ['province_id' => 31, 'name' => 'Kepulauan Talaud'],
        ['province_id' => 24, 'name' => 'Kepulauan Yapen (Yapen Waropen)'],
        ['province_id' => 8, 'name' => 'Kerinci'],
        ['province_id' => 12, 'name' => 'Ketapang'],
        ['province_id' => 10, 'name' => 'Klaten'],
        ['province_id' => 1, 'name' => 'Klungkung'],
        ['province_id' => 30, 'name' => 'Kolaka'],
        ['province_id' => 30, 'name' => 'Kolaka Utara'],
        ['province_id' => 30, 'name' => 'Konawe'],
        ['province_id' => 30, 'name' => 'Konawe Selatan'],
        ['province_id' => 30, 'name' => 'Konawe Utara'],
        ['province_id' => 13, 'name' => 'Kotabaru'],
        ['province_id' => 31, 'name' => 'Kotamobagu'],
        ['province_id' => 14, 'name' => 'Kotawaringin Barat'],
        ['province_id' => 14, 'name' => 'Kotawaringin Timur'],
        ['province_id' => 26, 'name' => 'Kuantan Singingi'],
        ['province_id' => 12, 'name' => 'Kubu Raya'],
        ['province_id' => 10, 'name' => 'Kudus'],
        ['province_id' => 5, 'name' => 'Kulon Progo'],
        ['province_id' => 9, 'name' => 'Kuningan'],
        ['province_id' => 23, 'name' => 'Kupang'],
        ['province_id' => 23, 'name' => 'Kupang'],
        ['province_id' => 15, 'name' => 'Kutai Barat'],
        ['province_id' => 15, 'name' => 'Kutai Kartanegara'],
        ['province_id' => 15, 'name' => 'Kutai Timur'],
        ['province_id' => 34, 'name' => 'Labuhan Batu'],
        ['province_id' => 34, 'name' => 'Labuhan Batu Selatan'],
        ['province_id' => 34, 'name' => 'Labuhan Batu Utara'],
        ['province_id' => 33, 'name' => 'Lahat'],
        ['province_id' => 14, 'name' => 'Lamandau'],
        ['province_id' => 11, 'name' => 'Lamongan'],
        ['province_id' => 18, 'name' => 'Lampung Barat'],
        ['province_id' => 18, 'name' => 'Lampung Selatan'],
        ['province_id' => 18, 'name' => 'Lampung Tengah'],
        ['province_id' => 18, 'name' => 'Lampung Timur'],
        ['province_id' => 18, 'name' => 'Lampung Utara'],
        ['province_id' => 12, 'name' => 'Landak'],
        ['province_id' => 34, 'name' => 'Langkat'],
        ['province_id' => 21, 'name' => 'Langsa'],
        ['province_id' => 24, 'name' => 'Lanny Jaya'],
        ['province_id' => 3, 'name' => 'Lebak'],
        ['province_id' => 4, 'name' => 'Lebong'],
        ['province_id' => 23, 'name' => 'Lembata'],
        ['province_id' => 21, 'name' => 'Lhokseumawe'],
        ['province_id' => 32, 'name' => 'Lima Puluh Koto/Kota'],
        ['province_id' => 17, 'name' => 'Lingga'],
        ['province_id' => 22, 'name' => 'Lombok Barat'],
        ['province_id' => 22, 'name' => 'Lombok Tengah'],
        ['province_id' => 22, 'name' => 'Lombok Timur'],
        ['province_id' => 22, 'name' => 'Lombok Utara'],
        ['province_id' => 33, 'name' => 'Lubuk Linggau'],
        ['province_id' => 11, 'name' => 'Lumajang'],
        ['province_id' => 28, 'name' => 'Luwu'],
        ['province_id' => 28, 'name' => 'Luwu Timur'],
        ['province_id' => 28, 'name' => 'Luwu Utara'],
        ['province_id' => 11, 'name' => 'Madiun'],
        ['province_id' => 11, 'name' => 'Madiun'],
        ['province_id' => 10, 'name' => 'Magelang'],
        ['province_id' => 10, 'name' => 'Magelang'],
        ['province_id' => 11, 'name' => 'Magetan'],
        ['province_id' => 9, 'name' => 'Majalengka'],
        ['province_id' => 27, 'name' => 'Majene'],
        ['province_id' => 28, 'name' => 'Makassar'],
        ['province_id' => 11, 'name' => 'Malang'],
        ['province_id' => 11, 'name' => 'Malang'],
        ['province_id' => 16, 'name' => 'Malinau'],
        ['province_id' => 19, 'name' => 'Maluku Barat Daya'],
        ['province_id' => 19, 'name' => 'Maluku Tengah'],
        ['province_id' => 19, 'name' => 'Maluku Tenggara'],
        ['province_id' => 19, 'name' => 'Maluku Tenggara Barat'],
        ['province_id' => 27, 'name' => 'Mamasa'],
        ['province_id' => 24, 'name' => 'Mamberamo Raya'],
        ['province_id' => 24, 'name' => 'Mamberamo Tengah'],
        ['province_id' => 27, 'name' => 'Mamuju'],
        ['province_id' => 27, 'name' => 'Mamuju Utara'],
        ['province_id' => 31, 'name' => 'Manado'],
        ['province_id' => 34, 'name' => 'Mandailing Natal'],
        ['province_id' => 23, 'name' => 'Manggarai'],
        ['province_id' => 23, 'name' => 'Manggarai Barat'],
        ['province_id' => 23, 'name' => 'Manggarai Timur'],
        ['province_id' => 25, 'name' => 'Manokwari'],
        ['province_id' => 25, 'name' => 'Manokwari Selatan'],
        ['province_id' => 24, 'name' => 'Mappi'],
        ['province_id' => 28, 'name' => 'Maros'],
        ['province_id' => 22, 'name' => 'Mataram'],
        ['province_id' => 25, 'name' => 'Maybrat'],
        ['province_id' => 34, 'name' => 'Medan'],
        ['province_id' => 12, 'name' => 'Melawi'],
        ['province_id' => 8, 'name' => 'Merangin'],
        ['province_id' => 24, 'name' => 'Merauke'],
        ['province_id' => 18, 'name' => 'Mesuji'],
        ['province_id' => 18, 'name' => 'Metro'],
        ['province_id' => 24, 'name' => 'Mimika'],
        ['province_id' => 31, 'name' => 'Minahasa'],
        ['province_id' => 31, 'name' => 'Minahasa Selatan'],
        ['province_id' => 31, 'name' => 'Minahasa Tenggara'],
        ['province_id' => 31, 'name' => 'Minahasa Utara'],
        ['province_id' => 11, 'name' => 'Mojokerto'],
        ['province_id' => 11, 'name' => 'Mojokerto'],
        ['province_id' => 29, 'name' => 'Morowali'],
        ['province_id' => 33, 'name' => 'Muara Enim'],
        ['province_id' => 8, 'name' => 'Muaro Jambi'],
        ['province_id' => 4, 'name' => 'Muko Muko'],
        ['province_id' => 30, 'name' => 'Muna'],
        ['province_id' => 14, 'name' => 'Murung Raya'],
        ['province_id' => 33, 'name' => 'Musi Banyuasin'],
        ['province_id' => 33, 'name' => 'Musi Rawas'],
        ['province_id' => 24, 'name' => 'Nabire'],
        ['province_id' => 21, 'name' => 'Nagan Raya'],
        ['province_id' => 23, 'name' => 'Nagekeo'],
        ['province_id' => 17, 'name' => 'Natuna'],
        ['province_id' => 24, 'name' => 'Nduga'],
        ['province_id' => 23, 'name' => 'Ngada'],
        ['province_id' => 11, 'name' => 'Nganjuk'],
        ['province_id' => 11, 'name' => 'Ngawi'],
        ['province_id' => 34, 'name' => 'Nias'],
        ['province_id' => 34, 'name' => 'Nias Barat'],
        ['province_id' => 34, 'name' => 'Nias Selatan'],
        ['province_id' => 34, 'name' => 'Nias Utara'],
        ['province_id' => 16, 'name' => 'Nunukan'],
        ['province_id' => 33, 'name' => 'Ogan Ilir'],
        ['province_id' => 33, 'name' => 'Ogan Komering Ilir'],
        ['province_id' => 33, 'name' => 'Ogan Komering Ulu'],
        ['province_id' => 33, 'name' => 'Ogan Komering Ulu Selatan'],
        ['province_id' => 33, 'name' => 'Ogan Komering Ulu Timur'],
        ['province_id' => 11, 'name' => 'Pacitan'],
        ['province_id' => 32, 'name' => 'Padang'],
        ['province_id' => 34, 'name' => 'Padang Lawas'],
        ['province_id' => 34, 'name' => 'Padang Lawas Utara'],
        ['province_id' => 32, 'name' => 'Padang Panjang'],
        ['province_id' => 32, 'name' => 'Padang Pariaman'],
        ['province_id' => 34, 'name' => 'Padang Sidempuan'],
        ['province_id' => 33, 'name' => 'Pagar Alam'],
        ['province_id' => 34, 'name' => 'Pakpak Bharat'],
        ['province_id' => 14, 'name' => 'Palangka Raya'],
        ['province_id' => 33, 'name' => 'Palembang'],
        ['province_id' => 28, 'name' => 'Palopo'],
        ['province_id' => 29, 'name' => 'Palu'],
        ['province_id' => 11, 'name' => 'Pamekasan'],
        ['province_id' => 3, 'name' => 'Pandeglang'],
        ['province_id' => 9, 'name' => 'Pangandaran'],
        ['province_id' => 28, 'name' => 'Pangkajene Kepulauan'],
        ['province_id' => 2, 'name' => 'Pangkal Pinang'],
        ['province_id' => 24, 'name' => 'Paniai'],
        ['province_id' => 28, 'name' => 'Parepare'],
        ['province_id' => 32, 'name' => 'Pariaman'],
        ['province_id' => 29, 'name' => 'Parigi Moutong'],
        ['province_id' => 32, 'name' => 'Pasaman'],
        ['province_id' => 32, 'name' => 'Pasaman Barat'],
        ['province_id' => 15, 'name' => 'Paser'],
        ['province_id' => 11, 'name' => 'Pasuruan'],
        ['province_id' => 11, 'name' => 'Pasuruan'],
        ['province_id' => 10, 'name' => 'Pati'],
        ['province_id' => 32, 'name' => 'Payakumbuh'],
        ['province_id' => 25, 'name' => 'Pegunungan Arfak'],
        ['province_id' => 24, 'name' => 'Pegunungan Bintang'],
        ['province_id' => 10, 'name' => 'Pekalongan'],
        ['province_id' => 10, 'name' => 'Pekalongan'],
        ['province_id' => 26, 'name' => 'Pekanbaru'],
        ['province_id' => 26, 'name' => 'Pelalawan'],
        ['province_id' => 10, 'name' => 'Pemalang'],
        ['province_id' => 34, 'name' => 'Pematang Siantar'],
        ['province_id' => 15, 'name' => 'Penajam Paser Utara'],
        ['province_id' => 18, 'name' => 'Pesawaran'],
        ['province_id' => 18, 'name' => 'Pesisir Barat'],
        ['province_id' => 32, 'name' => 'Pesisir Selatan'],
        ['province_id' => 21, 'name' => 'Pidie'],
        ['province_id' => 21, 'name' => 'Pidie Jaya'],
        ['province_id' => 28, 'name' => 'Pinrang'],
        ['province_id' => 7, 'name' => 'Pohuwato'],
        ['province_id' => 27, 'name' => 'Polewali Mandar'],
        ['province_id' => 11, 'name' => 'Ponorogo'],
        ['province_id' => 12, 'name' => 'Pontianak'],
        ['province_id' => 12, 'name' => 'Pontianak'],
        ['province_id' => 29, 'name' => 'Poso'],
        ['province_id' => 33, 'name' => 'Prabumulih'],
        ['province_id' => 18, 'name' => 'Pringsewu'],
        ['province_id' => 11, 'name' => 'Probolinggo'],
        ['province_id' => 11, 'name' => 'Probolinggo'],
        ['province_id' => 14, 'name' => 'Pulang Pisau'],
        ['province_id' => 20, 'name' => 'Pulau Morotai'],
        ['province_id' => 24, 'name' => 'Puncak'],
        ['province_id' => 24, 'name' => 'Puncak Jaya'],
        ['province_id' => 10, 'name' => 'Purbalingga'],
        ['province_id' => 9, 'name' => 'Purwakarta'],
        ['province_id' => 10, 'name' => 'Purworejo'],
        ['province_id' => 25, 'name' => 'Raja Ampat'],
        ['province_id' => 4, 'name' => 'Rejang Lebong'],
        ['province_id' => 10, 'name' => 'Rembang'],
        ['province_id' => 26, 'name' => 'Rokan Hilir'],
        ['province_id' => 26, 'name' => 'Rokan Hulu'],
        ['province_id' => 23, 'name' => 'Rote Ndao'],
        ['province_id' => 21, 'name' => 'Sabang'],
        ['province_id' => 23, 'name' => 'Sabu Raijua'],
        ['province_id' => 10, 'name' => 'Salatiga'],
        ['province_id' => 15, 'name' => 'Samarinda'],
        ['province_id' => 12, 'name' => 'Sambas'],
        ['province_id' => 34, 'name' => 'Samosir'],
        ['province_id' => 11, 'name' => 'Sampang'],
        ['province_id' => 12, 'name' => 'Sanggau'],
        ['province_id' => 24, 'name' => 'Sarmi'],
        ['province_id' => 8, 'name' => 'Sarolangun'],
        ['province_id' => 32, 'name' => 'Sawah Lunto'],
        ['province_id' => 12, 'name' => 'Sekadau'],
        ['province_id' => 28, 'name' => 'Selayar (Kepulauan Selayar)'],
        ['province_id' => 4, 'name' => 'Seluma'],
        ['province_id' => 10, 'name' => 'Semarang'],
        ['province_id' => 10, 'name' => 'Semarang'],
        ['province_id' => 19, 'name' => 'Seram Bagian Barat'],
        ['province_id' => 19, 'name' => 'Seram Bagian Timur'],
        ['province_id' => 3, 'name' => 'Serang'],
        ['province_id' => 3, 'name' => 'Serang'],
        ['province_id' => 34, 'name' => 'Serdang Bedagai'],
        ['province_id' => 14, 'name' => 'Seruyan'],
        ['province_id' => 26, 'name' => 'Siak'],
        ['province_id' => 34, 'name' => 'Sibolga'],
        ['province_id' => 28, 'name' => 'Sidenreng Rappang/Rapang'],
        ['province_id' => 11, 'name' => 'Sidoarjo'],
        ['province_id' => 29, 'name' => 'Sigi'],
        ['province_id' => 32, 'name' => 'Sijunjung (Sawah Lunto Sijunjung)'],
        ['province_id' => 23, 'name' => 'Sikka'],
        ['province_id' => 34, 'name' => 'Simalungun'],
        ['province_id' => 21, 'name' => 'Simeulue'],
        ['province_id' => 12, 'name' => 'Singkawang'],
        ['province_id' => 28, 'name' => 'Sinjai'],
        ['province_id' => 12, 'name' => 'Sintang'],
        ['province_id' => 11, 'name' => 'Situbondo'],
        ['province_id' => 5, 'name' => 'Sleman'],
        ['province_id' => 32, 'name' => 'Solok'],
        ['province_id' => 32, 'name' => 'Solok'],
        ['province_id' => 32, 'name' => 'Solok Selatan'],
        ['province_id' => 28, 'name' => 'Soppeng'],
        ['province_id' => 25, 'name' => 'Sorong'],
        ['province_id' => 25, 'name' => 'Sorong'],
        ['province_id' => 25, 'name' => 'Sorong Selatan'],
        ['province_id' => 10, 'name' => 'Sragen'],
        ['province_id' => 9, 'name' => 'Subang'],
        ['province_id' => 21, 'name' => 'Subulussalam'],
        ['province_id' => 9, 'name' => 'Sukabumi'],
        ['province_id' => 9, 'name' => 'Sukabumi'],
        ['province_id' => 14, 'name' => 'Sukamara'],
        ['province_id' => 10, 'name' => 'Sukoharjo'],
        ['province_id' => 23, 'name' => 'Sumba Barat'],
        ['province_id' => 23, 'name' => 'Sumba Barat Daya'],
        ['province_id' => 23, 'name' => 'Sumba Tengah'],
        ['province_id' => 23, 'name' => 'Sumba Timur'],
        ['province_id' => 22, 'name' => 'Sumbawa'],
        ['province_id' => 22, 'name' => 'Sumbawa Barat'],
        ['province_id' => 9, 'name' => 'Sumedang'],
        ['province_id' => 11, 'name' => 'Sumenep'],
        ['province_id' => 8, 'name' => 'Sungaipenuh'],
        ['province_id' => 24, 'name' => 'Supiori'],
        ['province_id' => 11, 'name' => 'Surabaya'],
        ['province_id' => 10, 'name' => 'Surakarta (Solo)'],
        ['province_id' => 13, 'name' => 'Tabalong'],
        ['province_id' => 1, 'name' => 'Tabanan'],
        ['province_id' => 28, 'name' => 'Takalar'],
        ['province_id' => 25, 'name' => 'Tambrauw'],
        ['province_id' => 16, 'name' => 'Tana Tidung'],
        ['province_id' => 28, 'name' => 'Tana Toraja'],
        ['province_id' => 13, 'name' => 'Tanah Bumbu'],
        ['province_id' => 32, 'name' => 'Tanah Datar'],
        ['province_id' => 13, 'name' => 'Tanah Laut'],
        ['province_id' => 3, 'name' => 'Tangerang'],
        ['province_id' => 3, 'name' => 'Tangerang'],
        ['province_id' => 3, 'name' => 'Tangerang Selatan'],
        ['province_id' => 18, 'name' => 'Tanggamus'],
        ['province_id' => 34, 'name' => 'Tanjung Balai'],
        ['province_id' => 8, 'name' => 'Tanjung Jabung Barat'],
        ['province_id' => 8, 'name' => 'Tanjung Jabung Timur'],
        ['province_id' => 17, 'name' => 'Tanjung Pinang'],
        ['province_id' => 34, 'name' => 'Tapanuli Selatan'],
        ['province_id' => 34, 'name' => 'Tapanuli Tengah'],
        ['province_id' => 34, 'name' => 'Tapanuli Utara'],
        ['province_id' => 13, 'name' => 'Tapin'],
        ['province_id' => 16, 'name' => 'Tarakan'],
        ['province_id' => 9, 'name' => 'Tasikmalaya'],
        ['province_id' => 9, 'name' => 'Tasikmalaya'],
        ['province_id' => 34, 'name' => 'Tebing Tinggi'],
        ['province_id' => 8, 'name' => 'Tebo'],
        ['province_id' => 10, 'name' => 'Tegal'],
        ['province_id' => 10, 'name' => 'Tegal'],
        ['province_id' => 25, 'name' => 'Teluk Bintuni'],
        ['province_id' => 25, 'name' => 'Teluk Wondama'],
        ['province_id' => 10, 'name' => 'Temanggung'],
        ['province_id' => 20, 'name' => 'Ternate'],
        ['province_id' => 20, 'name' => 'Tidore Kepulauan'],
        ['province_id' => 23, 'name' => 'Timor Tengah Selatan'],
        ['province_id' => 23, 'name' => 'Timor Tengah Utara'],
        ['province_id' => 34, 'name' => 'Toba Samosir'],
        ['province_id' => 29, 'name' => 'Tojo Una-Una'],
        ['province_id' => 29, 'name' => 'Toli-Toli'],
        ['province_id' => 24, 'name' => 'Tolikara'],
        ['province_id' => 31, 'name' => 'Tomohon'],
        ['province_id' => 28, 'name' => 'Toraja Utara'],
        ['province_id' => 11, 'name' => 'Trenggalek'],
        ['province_id' => 19, 'name' => 'Tual'],
        ['province_id' => 11, 'name' => 'Tuban'],
        ['province_id' => 18, 'name' => 'Tulang Bawang'],
        ['province_id' => 18, 'name' => 'Tulang Bawang Barat'],
        ['province_id' => 11, 'name' => 'Tulungagung'],
        ['province_id' => 28, 'name' => 'Wajo'],
        ['province_id' => 30, 'name' => 'Wakatobi'],
        ['province_id' => 24, 'name' => 'Waropen'],
        ['province_id' => 18, 'name' => 'Way Kanan'],
        ['province_id' => 10, 'name' => 'Wonogiri'],
        ['province_id' => 10, 'name' => 'Wonosobo'],
        ['province_id' => 24, 'name' => 'Yahukimo'],
        ['province_id' => 24, 'name' => 'Yalimo'],
        ['province_id' => 5, 'name' => 'Yogyakarta']
    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cities')->insert($this->arr);
    }
}
