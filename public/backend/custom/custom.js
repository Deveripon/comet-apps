
(function($){

$(document).ready(function(){

    $('.delete_form').submit(function(e){

        let conf = confirm('Are You Sure ?');

        if(conf){
            return true;
        }else{
            return e.preventDefault();
        }

    });
});

$(document).ready(function(){
    $('.data_table').DataTable()
});

$(document).ready(function(){
    $('.user-image').mouseenter(function(){
       $('.change_btn').show()
    })
});
$(document).ready(function(){
    $('.change_btn').hover(function(){
       $('.change_btn').show()
    })   
});
$(document).ready(function(){
    $('.change_btn').mouseleave(function(){
       $('.change_btn').hide()
    })   
});
$(document).ready(function(){
    $('#change_photo').change(function(e){

        const  $get_url = URL.createObjectURL(e.target.files[0]);
       $('.user-image').attr('src',$get_url);
        $('.submit_button').show()
    })   
});



})(jQuery);