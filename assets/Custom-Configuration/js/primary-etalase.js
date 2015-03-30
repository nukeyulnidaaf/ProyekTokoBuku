$(document).ready(function(){ 
    
    $('#btnLogin').click(function(){
        
    })

    //Render-Content
    $('#navigation li a').click(function(e){
        e.preventDefault();
        var $pureContent = $(this).attr('href'),
            $content = $pureContent;
        
        history.pushState('','',$pureContent);
        
        $('#loading').removeAttr('hidden');
        
        $.ajax({
            url: $content,
            method: 'GET',
            success:function(response){
                $('#content').html($(response).find('#content').html());
            }
        });
    });
    
    //Reflection-Link
    $('a.ajax-link').click(function(e){
        e.preventDefault();
        $('.nav li').removeClass('active');
        $(this).parent('li').addClass('active');
    });    
    
    //Render-Table-Toko-Buku-When-Menu-Click
    $('a.ajax-link').click(function(){
        $.ajax({
            url: 'daftar-toko/query-list-toko-buku.php',
            method: 'GET',
            success:function(response){
                $('#render-table').html(response);    
            }
        });
    });

    //Render-Table-Toko-Buku-When-Browser-Ready-State
    $('#render-table').ready(function(){
        $.ajax({
            url: 'daftar-toko/query-list-toko-buku.php',
            method: 'GET',
            success:function(response){
                $('#render-table').html(response);    
            }
        });
    });
    
    
    $('#form-create-toko').bootstrapValidator({
        fields:{
            namaTokoBuku:{
                validators:{
                    notEmpty:{
                        message: 'Nama Toko Buku Tidak Boleh Kosong'    
                    }
                }
            },
            alamatTokoBuku:{
                validators:{
                    notEmpty:{
                        message: 'Alamat Toko Buku Tidak Boleh Kosong'    
                    }
                }
            },
            nomerTelphoneTokoBuku:{
                validators:{
                    notEmpty:{
                        message: 'Nomer Telphone Toko Buku Tidak Boleh Kosong'    
                    },
                    regexp:{
                        regexp: /^[0-9]+$/,
                        message: 'Nomer Telphone Hanya Boleh Berisikan Angka'
                    }
                }
            },
            locationTag:{
                validators:{
                    notEmpty:{
                        message: 'Location Tag Tidak Boleh Kosong'    
                    }
                }
            },
            awalHari:{
                validators:{
                    notEmpty:{
                        message: 'Awal Hari Tidak Boleh Kosong'    
                    }
                }
            },
            akhirHari:{
                validators:{
                    notEmpty:{
                        message: 'Akhir Hari Tidak Boleh Kosong'    
                    }     
                }
            },
            jamOperasionalBuka:{
                validators:{
                    notEmpty:{
                        message: 'Jam Operasional Buka Tidak Boleh Kosong'    
                    }
                }
            },
            jamOperasionalTutup:{
                validators:{
                    notEmpty:{
                        message: 'Jam Operasional Tutup Tidak Boleh Kosong'    
                    }
                }
            }
        }
    })
    .on('success.form.bv',function(e){
        e.preventDefault();
        $.ajax({
            url:''
        });
    });
});