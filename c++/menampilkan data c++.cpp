#include <iostream> // untuk mendeklarasikan cin dan cout
#include <string> // untuk mendeklarasikan penyimpanan karakter
#include <algorithm> // untuk medeklarasikan max, min dan average

using namespace std; // menggunakan semua yang ada di dalam "namespace std/ standard"

// struct untuk menyimpan data siswa
struct Siswa {
string nama;
string password;
int nilai[5];
float rataRata;
int nilaiMax;
int nilaiMin;
};

bool sortByRataRataAsc(const Siswa& a, const Siswa& b) {
return a.rataRata < b.rataRata;
}

bool sortByRataRataDesc(const Siswa& a, const Siswa& b) {
return a.rataRata > b.rataRata;
}
int main() {
// inisialisasi data siswa
Siswa siswa[3] = {
{"Andi", "andi12345", {75, 83, 80, 92, 82}},
{"Fina", "fina12345", {70, 90, 80, 75, 85}},
{"Budi", "budi12345", {89, 73, 90, 79, 78}}
};
bool isLoginValid = false;
do{
// input login
string username, password;
cout << "       SELAMAT DATANG DI E-RAPORT\n   ";
cout << "   -----------------------------" << endl;
cout << "      KELAS-RPL  SMK PRESTASI PRIMA\n   ";
cout << "                                       " << endl;
cout << "===========================================" << endl;
cout << " | Silahkan Masukkan Username Anda : ";
cin >> username;
cout << "===========================================" << endl;
cout << " | Silahkan Masukkan Password Anda : ";
cin >> password;
cout << "===========================================" << endl;

// validasi login
if (username == "walas" && password == "12345") {
isLoginValid = true;
for (int i = 0; i < 3; i++) {
	
// hitung rata-rata nilai
float total = 0;
for (int j = 0; j < 5; j++) {
total += siswa[i].nilai[j];
}
siswa[i].rataRata = total / 5;
// tampilkan data nilai untuk walas
cout << "\n       Berikut Nilai Dari "<< siswa[i].nama << endl;
cout<<  "===========================================\n";
cout<<  "   No |      Nilai               | Hasil \n";
cout<<  "===========================================\n";
cout << "   1. | Nilai Matematika      \t :  " << siswa[i].nilai[0] << endl;
cout << " ------------------------------------------" << endl;
cout << "   2. | Nilai Fisika          \t :  " << siswa[i].nilai[1] << endl;
cout << " ------------------------------------------" << endl;
cout << "   3. | Nilai Bahasa Indonesia\t :  " << siswa[i].nilai[2] << endl;
cout << " ------------------------------------------" << endl;
cout << "   4. | Nilai English         \t :  " << siswa[i].nilai[3] << endl;
cout << " ------------------------------------------" << endl;
cout << "   5. | Nilai OOP             \t :  " << siswa[i].nilai[4] << endl;
cout << " ------------------------------------------" << endl;
cout << "   6. | Rata-Rata Nilai       \t :  " << siswa[i].rataRata << endl;
cout << " ------------------------------------------" << endl;

}

// menampilkan menu filter data
int filter;
cout << "\n  Mengurutkan Nilai Rata-Rata Bedasarkan\n";
cout << "===========================================" << endl;
cout << " | 1. Terkecil\n";
cout << "-------------------------------------------" << endl;
cout << " | 2. Terbesar\n";
cout << "===========================================" << endl;
cout << "Silahkan Masukkan Metode Yang Diinginkan: ";
cin >> filter;

// filter data berdasarkan rata-rata nilai
if (filter == 1) {
sort(siswa, siswa+3, sortByRataRataAsc);
} else if (filter == 2) {
sort(siswa, siswa+3, sortByRataRataDesc);
}

// tampilkan data siswa setelah difilter
cout << "\n  Nilai Siswa Setelah Diurutkan\n";
cout<<  "===========================================\n";
cout<<  "Nama |      Rata-Rata             : Hasil \n";
cout<<  "===========================================\n";
for (int i = 0; i < 3; i++) {
cout << siswa[i].nama<< " | Dengan Rata-Rata Nilai\t  | " << siswa[i].rataRata << endl;
cout << "-------------------------------------------" << endl;
}

} else {
isLoginValid = true;
for (int i = 0; i < 3; i++) {
if(username == siswa[i].nama && password == siswa[i].password){
// hitung rata-rata nilai
float total = 0;
for (int j = 0; j < 5; j++) {
total += siswa[i].nilai[j];
}
siswa[i].rataRata = total / 5;
// cari nilai maksimum dan minimum
int maxNilai = siswa[i].nilai[0];
int minNilai = siswa[i].nilai[0];
for (int j = 1; j < 5; j++) {
if (siswa[i].nilai[j] > maxNilai) {
maxNilai = siswa[i].nilai[j];
}
if (siswa[i].nilai[j] < minNilai) {
minNilai = siswa[i].nilai[j];
}
}
siswa[i].nilaiMax = maxNilai;
siswa[i].nilaiMin = minNilai;

// tampilkan data nilai bedasarkan siswa
cout << "\n       Hasil Nilai Dari "<< siswa[i].nama << endl;
cout<<  "===========================================\n";
cout<<  "   No |      Nilai               | Hasil \n";
cout<<  "===========================================\n";
cout << "   1. | Nilai Matematika      \t :  " << siswa[i].nilai[0] << endl;
cout << " ------------------------------------------" << endl;
cout << "   2. | Nilai Fisika          \t :  " << siswa[i].nilai[1] << endl;
cout << " ------------------------------------------" << endl;
cout << "   3. | Nilai Bahasa Indonesia\t :  " << siswa[i].nilai[2] << endl;
cout << " ------------------------------------------" << endl;
cout << "   4. | Nilai English         \t :  " << siswa[i].nilai[3] << endl;
cout << " ------------------------------------------" << endl;
cout << "   5. | Nilai OOP             \t :  " << siswa[i].nilai[4] << endl;
cout << " ------------------------------------------" << endl;
cout << "   6. | Rata-Rata Nilai       \t :  " << siswa[i].rataRata << endl;
cout << " ------------------------------------------" << endl;
cout << "   7. | Nilai Maksimum        \t :  " << siswa[i].nilaiMax << endl;
cout << " ------------------------------------------" << endl;
cout << "   8. | Nilai Minimum         \t :  "<< siswa[i].nilaiMin<< endl;
cout << " ------------------------------------------" << endl;
break;

}

}
}
if (!isLoginValid) {
cout<< "Login gagal, username atau password salah\n"<< endl;
}
}while(!isLoginValid);
return 0;
}
