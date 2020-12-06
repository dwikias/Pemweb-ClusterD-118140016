var dataBarang = [
  "Buku Tulis",
  "Pensil",
  "Spidol"
];


function tampilBarang(){
  var listBarang = document.getElementById("list");
  
  listBarang.innerHTML = "";

  // cetak semua barang
 for(let i = 0; i < dataBarang.length; i++){
      var btnEdit = "<a href='#' onclick='editBarang("+i+")'>Edit</a>";
      var btnHapus = "<a href='#' onclick='hapusBarang("+i+")'>Hapus</a>";

      listBarang.innerHTML += "<li>" + dataBarang[i] + " ["+btnEdit + " | "+ btnHapus +"]</li>";        
  }
}

function tambahBarang(){
  var input = document.getElementById("text");
  dataBarang.push(input.value);
  tampilBarang();
}

function editBarang(id){
  var newBarang = prompt("Nama baru", dataBarang[id]);
  dataBarang[id] = newBarang;
  tampilBarang();
}

function hapusBarang(id){
  dataBarang.splice(id, 1);
  tampilBarang();
}

tampilBarang();