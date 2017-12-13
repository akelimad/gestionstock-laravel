$(function(){
	'use strict';
	var langFile= 'en';
	var oTable=$('#datatables').DataTable({
        "order": [],
        "sScrollX": '100%',
        "pagingType": "full_numbers",
        "lengthMenu": [
            [25, 50, 100, -1],
            [25, 50, 100, "Tous"]
        ],
        responsive: true,
        // "oLanguage": {
        //     "sUrl": "//cdn.datatables.net/plug-ins/1.10.15/i18n/"+ langFile +".json"
        // },
        "sDom": 'Rfrtlip',
        scrollCollapse: true,
    });

     $("#datatables").on('click', '.delete-product',function () {
        var id= $(this).data('id');
        var token = $('input[name="_token"]').val();
        var url = 'products/'+id+'/delete';
        //var $tr = $(this).closest('tr');
        swal({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!',
            showLoaderOnConfirm: true,
            preConfirm: function() {
            return new Promise(function(resolve) {
                $.ajax({
                    type: 'POST',
                    url:  url,
                    data: {
                        "id": id,
                        "_method": 'DELETE',
                        "_token": token,
                    },
                }).done(function(response){
                    swal('Deleted!', 'Product has been deleted.', 'success');
                    //$tr.find('td').fadeOut(1000,function(){ $tr.remove(); });
                    location.reload(); 
                }).fail(function(){
                    swal('Oops...', 'Something went wrong with ajax !', 'error');
                });
            });
            },
            allowOutsideClick: false     
        }); 
    });
        
});