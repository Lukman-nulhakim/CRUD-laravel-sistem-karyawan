// ini  untuk manampilkan alert ketika dionclick nama usernya menggunakan dom
let listKaryawan = document.getElementsByTagName('ul');
listKaryawan[0].addEventListener("click", tampilkan);

function tampilkan(event) {
    alert("cek data karyawan " + event.target.innerHTML);
}