
            $(document).ready(function(){
                $('.userinfo').click(function(){
                    var id = $(this).data('id');
                    $.ajax({
                        url: 'official/ajaxfile.php',
                        type: 'post',
                        data: {id: id},
                        success: function(response){ 
                            $('.modal-body').html(response); 
                            $('#empModal').modal('show'); 
                        }
                    });
                });
            });