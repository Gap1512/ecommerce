$(document).ready(function(){
    var emails = 
    $.ajax({
        url:'./database/email-selection.php',
        type:'get',
        async:false,
        dataType: 'json',
        success: function(s){
        },
        error: function(e){
        }
    }).responseText

    emails = JSON.parse(emails);
    var emailsarray = [];

    $.each(emails, function(i){
        emailsarray.push(this['email']);
    })

    emails = emailsarray;



    console.log(Object.values(emails));

    $('#emailform').submit(function(){
        $.ajax({
            url:'./email/email-send.php',
            type:'post',
            data: {'emails': emails,
                'subject': $('#subject').val(), 'body': $('#body').val()},
            async:false,
            success: function(s){
                console.log(s)
            },
            error: function(e){
                console.log(e);
            }
        })
    })
})