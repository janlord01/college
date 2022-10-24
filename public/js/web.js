$(function(){
    $('.dropdown-btn-users').click(function(e){
        if($('#dropdown-users').hasClass('hidden')){
            $('#dropdown-users').addClass('block');
            $('#dropdown-users').removeClass('hidden');
        }else{
            $('#dropdown-users').addClass('hidden');
            $('#dropdown-users').removeClass('block');
        }
    });
    $('.dropdown-btn-subjects').click(function(e){
        if($('#dropdown-subjects').hasClass('hidden')){
            $('#dropdown-subjects').addClass('block');
            $('#dropdown-subjects').removeClass('hidden');
        }else{
            $('#dropdown-subjects').addClass('hidden');
            $('#dropdown-subjects').removeClass('block');
        }
    });
    $('.dropdown-btn-finance').click(function(e){
        if($('#dropdown-finance').hasClass('hidden')){
            $('#dropdown-finance').addClass('block');
            $('#dropdown-finance').removeClass('hidden');
        }else{
            $('#dropdown-finance').addClass('hidden');
            $('#dropdown-finance').removeClass('block');
        }
    });
    $('.dropdown-btn-qrcode').click(function(e){
        if($('#dropdown-qrcode').hasClass('hidden')){
            $('#dropdown-qrcode').addClass('block');
            $('#dropdown-qrcode').removeClass('hidden');
        }else{
            $('#dropdown-qrcode').addClass('hidden');
            $('#dropdown-qrcode').removeClass('block');
        }
    });
    $('.dropdown-btn-reports').click(function(e){
        if($('#dropdown-reports').hasClass('hidden')){
            $('#dropdown-reports').addClass('block');
            $('#dropdown-reports').removeClass('hidden');
        }else{
            $('#dropdown-reports').addClass('hidden');
            $('#dropdown-reports').removeClass('block');
        }
    });
    $('.dropdown-btn-settings').click(function(e){
        if($('#dropdown-settings').hasClass('hidden')){
            $('#dropdown-settings').addClass('block');
            $('#dropdown-settings').removeClass('hidden');
        }else{
            $('#dropdown-settings').addClass('hidden');
            $('#dropdown-settings').removeClass('block');
        }
    });
    $('.dropdown-btn-admission').click(function(e){
        if($('#dropdown-admission').hasClass('hidden')){
            $('#dropdown-admission').addClass('block');
            $('#dropdown-admission').removeClass('hidden');
        }else{
            $('#dropdown-admission').addClass('hidden');
            $('#dropdown-admission').removeClass('block');
        }
    });
    $('.dropdown-btn-course').click(function(e){
        if($('#dropdown-course').hasClass('hidden')){
            $('#dropdown-course').addClass('block');
            $('#dropdown-course').removeClass('hidden');
        }else{
            $('#dropdown-course').addClass('hidden');
            $('#dropdown-course').removeClass('block');
        }
    });
    
    $('.button-mobile-menu').click(function(){
        $('.mobile-menu').animate({width:'toggle'},350);
        
    });

    $('#transfery').change(function(){
        var transValue = $(this).children('option:selected').val();
        if(transValue == 'yes'){
            $('#transfery_details').removeClass('hidden').addClass('block');
        }else{
            $('#transfery_details').removeClass('block').addClass('hidden');
        }
    });
    $('#indigenous').change(function(){
        var indiValue = $(this).children('option:selected').val();
        if(indiValue == 'yes'){
            $('#indi_details').removeClass('hidden').addClass('block');
        }else{
            $('#indi_details').removeClass('block').addClass('hidden');
        }
    });
    /**
     * 
     */
    $('.editStudentFileBtn').click(function(e){
        let file_id = e.target.id;

        $('.edit_id').val("");
        $('.edit_id').text("");
        $('.edit_notes').val("");
        $('.user_id').val("");
        // alert(file_id);
        $('.editModal').removeClass('hidden');
        $('.editModal').addClass('visible');
        $('.mobile-menu').removeClass('z-10');
        $('.editStudentFile').attr('value', file_id);
        
        $.ajax({
            type: "GET",
            url: "/student/requirement/get-data/" + file_id,
            dataType: "json",
            success: function(response){
                let data = JSON.parse(JSON.stringify(response))
                console.log(data.getData);
                $('.edit_id').val(data.getData.id);
                $('.edit_id').text(data.getData.title);
                $('.edit_notes').val(data.getData.notes);
                $('.user_id').val(data.getData.user_id);

                if(data == null){
                    $('.edit_error').addClass('block');
                    $('.edit_error').removeClass('hidden');
                }else{
                    $('.edit_error').addClass('hidden');
                    $('.edit_error').removeClass('block');
                }
            },
                
        });
    });

    /**
     * 
     * End of Edit Modal Functions
     */
    /**
     * 
     * Delete Functions
     */
    $('.deleteStudentFileBtn').click(function(e){
        let file_id = e.target.id;
        // alert(file_id);
        $('.deleteModal').removeClass('hidden');
        $('.deleteModal').addClass('visible');
        $('.mobile-menu').removeClass('z-10');
        $('.deleteStudentFile').attr('value', file_id);
    });

    /**
     * Hide Delete Modal
     */
    $('.cancelBtn').click(function(e){
        $('.deleteModal').removeClass('visible');
        $('.deleteModal').addClass('hidden');

        $('.editModal').removeClass('visible');
        $('.editModal').addClass('hidden');
        $('.mobile-menu').addClass('z-10');
    });
    $('.bgStudentModal').click(function(e){
        $('.deleteModal').removeClass('visible');
        $('.deleteModal').addClass('hidden');

        $('.editModal').removeClass('visible');
        $('.editModal').addClass('hidden');
        $('.mobile-menu').addClass('z-10');
    });
    
    
    
    
});