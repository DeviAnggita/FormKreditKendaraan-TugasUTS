var keyword = document.getElementById('keyword');
var tambah = document.getElementById('tambah')
var nama = document.getElementById('nama')
var container = document.getElementById('container')
var tempat = document.getElementById('ttambah')
var jumlah = document.getElementById('jumlah')
var total = window.parent.document.getElementById('tottal')
var semua = document.getElementById('totalss')


keyword.addEventListener('keyup',function(){
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange=function(){
        if(xhr.readyState == 4 && xhr.status == 200)
        {
            container.innerHTML = xhr.responseText
        }


    }

    xhr.open('POST','tabel.php?keyword='+keyword.value,true)
    xhr.send()
})



// tambah.addEventListener('click', function(){
//     var xhr = new XMLHttpRequest();
//     xhr.onreadystatechange=function(){
//         if(xhr.readyState == 4 && xhr.status == 200)
//         {
//             tempat.innerHTML += xhr.responseText
  
//         }   
//     }   
//            xhr.open('POST','tambah.php?keyword='+nama.value,true)
//            xhr.send()
 
// })

// jumlah.addEventListener('keyup',function(){
//     var xhr = new XMLHttpRequest();
//     xhr.onreadystatechange=function(){
//         if(xhr.readyState == 4 && xhr.status == 200)
//         {
//             tempat.innerHTML = xhr.responseText
  
//         }   
//     }   
//            xhr.open('POST','tambah.php?key='+jumlah.value,true)
//            xhr.send()
// })

$('#tambah').click(function(){
    var ijumlah = $('#jumlah').val();
    var inama = $('#nama').val();

    $.ajax({
        url:'tambah.php',
        data:{keyword:inama,key:ijumlah},
        success:function(data) {
            $('#ttambah').append(data)
        }
    })
});


// $('#totalss').click(function(){

//             $('#jumelah').data(total.value)
   
// });


