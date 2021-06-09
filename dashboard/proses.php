<?php
    $connect = mysqli_connect("localhost","root","root","dashboard1"); // Conncect ke Database.


    //Function untuk mengabil data
    function querytampil($datas){
        global $connect;
        $dok = mysqli_query($connect , $datas);
        $field = [];
        while($data = mysqli_fetch_assoc($dok) ){
            $field [] = $data;
        }
        return $field;
        
    }
    function pendaftar($data){
        global $connect;
         // Mendeklarasikan Variabel yang didapat dari POST 
         $username = strtolower(stripslashes($data["username"]));// Untuk menghurufkecilkkan semua User, dan Menghilangkan tanda slash jika ada User yang menginputnya.
         $email = $_POST['Remail'];
         $password = mysqli_real_escape_string($connect, $data['Rpassword']); //memastikan password yang di input adalah String
         $password2 = mysqli_real_escape_string($connect, $data['Rpassword2']);
         
         // Mengecek Username, Apakah telah ada yang mendaftar sebelumnya, Atau belum.
         $tes = mysqli_query($connect,"SELECT Username From Users WHERE Username = '$username'");
         if (mysqli_fetch_assoc($tes) ){
             echo "<script>
                alert ('Username telah ada');s
             </script>" ; 
             return false;
         }
         // Mengecek kesamaan Password yang di input oleh User
         if($password !== $password2){
             echo "<script>
                alert ('Password tidak sama!');
             </script>" ; 
             return false;
         }
         
         // Proses Enkripsi Password
         $password = password_hash($password, PASSWORD_DEFAULT);
         // Proses pemasukkan data ke dalam Database
         mysqli_query($connect, "INSERT INTO users(Username, Email, Password)
             VALUES('$username','$email','$password')");
         return mysqli_affected_rows($connect);
     }
    
    //function untuk menampilkan error
    function error(){
        global $connect;
        mysqli_error($connect);
    }

    //Function untuk menambah data
    function insert($tambah){
        global $connect;
        //Memasukkan data yang didapat dari $_POST ke dalam variabel baru
        $judul = htmlspecialchars($tambah["judul"]);
        $penulis = htmlspecialchars($tambah["penulis"]);
        $penerbit = htmlspecialchars($tambah["penerbit"]);
        $ISBN = htmlspecialchars($tambah["ISBN"]);
        $id_cat = htmlspecialchars($tambah["kategori"]);
        $tahun = htmlspecialchars($tambah["Year"]);
        
        //Proses menambahkan data
        $insert = "INSERT INTO databuku (id_cat, judulbuku, penulis , penerbit, tahunterbit, ISBN)
                VALUES('$id_cat','$judul','$penulis','$penerbit','$tahun','$ISBN')    
                ";
        mysqli_query($connect, $insert);
        //mengebalikan feedback berupa int yang akan dilanjutkan dengan proses di halaman yang bersangkutan
        return mysqli_affected_rows($connect);
    }

    //Function untuk menambah kategori
    function insert_kategori($tambah){
        global $connect;
        //Memasukkan data yang didapat dari $_POST ke dalam variabel baru
        $nama_kategori = htmlspecialchars($tambah["nama"]);
        //Proses menambahkan data
        $insert = "INSERT INTO kategori (nama_kategori)
                VALUES('$nama_kategori')    
                ";
        mysqli_query($connect, $insert);
        //mengebalikan feedback berupa int yang akan dilanjutkan dengan proses di halaman yang bersangkutan
        return mysqli_affected_rows($connect);
    }
    
    //mengapus data sesuai dengan Id yang didapat oleh $_GET
    function delete($id){
        global $connect;
        mysqli_query($connect, "DELETE FROM databuku WHERE id = $id");
        return mysqli_affected_rows($connect);
    }

    //menghapus kategori
    function delete_kategori($hapus){
        global $connect;
        $id = $hapus["id"];
        mysqli_query($connect, "DELETE FROM kategori WHERE id_cat = $id");
        return mysqli_affected_rows($connect);
    }

    //Mengubah data
    function ubah($data){
        
        //Kembali menangkap data dari $_POST ke Variabel
        global $connect;
        $id = $data["id"];
        $judul = htmlspecialchars($data["judul"]);
        $penulis = htmlspecialchars($data["penulis"]);
        $penerbit = htmlspecialchars($data["penerbit"]);
        $ISBN = htmlspecialchars($data["ISBN"]);
        $id_cat = htmlspecialchars($data["kategori"]);
        $tahun = htmlspecialchars($data["Year"]);


        //proses Update data
        $update = "UPDATE databuku SET
                    id_cat = '$id_cat',
                    judulbuku = '$judul',
                    penulis = '$penulis',
                    penerbit = '$penerbit',
                    tahunterbit = '$tahun',
                    ISBN = '$ISBN'
                    WHERE id = $id
                     ";
        mysqli_query($connect, $update);
        return mysqli_affected_rows($connect);

    }

    
    //Function untuk mengubah kategori
    function ubah_kategori($data){
        
        //Kembali menangkap data dari $_POST ke Variabel
        global $connect;
        $id = $data["id"];
        $nama_kategori = htmlspecialchars($data["nama"]);

        //proses Update data
        $update = "UPDATE kategori SET
                    nama_kategori = '$nama_kategori'
                    WHERE id_cat = $id
                     ";
        mysqli_query($connect, $update);
        return mysqli_affected_rows($connect);

    }


    function kat($Jkat){
        global $connect;
        $kat = mysqli_query($connect , $Jkat);
        $field = [];
        while($data = mysqli_fetch_assoc($kat) ){
            $field [] = $Jkat;
        }
        return $field;
   
    }


?>