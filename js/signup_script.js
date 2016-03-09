function Check(input)
{
    if ((input.name.length < 3) & (input.name !== undefined)) return "Введите имя длиннее 3 символов!";
    if ((input.surname.length < 3) & (input.surname !== undefined)) return "Введите фамилию!";
    if ((input.email == '') & (input.email !== undefined)) return "Введите E-mail";
    if ((input.login == '') & (input.login !== undefined)) return "Логин забыли";
    if ((input.feedback_text == '') & (input.feedback_text !== undefined)) return "Отзыв-то какой?";
    return "OK";
}

$(document).ready(function()
{  
    $("#send").click(function()
    {
        var User = new Object();
        User['name'] = $("#name").val();
        User['surname'] = $("#surname").val();
        User['email'] = $("#email").val();
        User['birth'] = $("#birth").val();
        User['gender'] = $("#gender").val();
        if(User['birth'] == '') User['birth'] = '0000-00-00';
        
        Check_result = Check(User);
        if (Check_result == "OK")
            {
                var User_str = JSON.stringify(User);
        
                $.ajax({
                    method: "POST",
                    url: "signup/add_user",
                    data: "data="+User_str,
                    success: function(answer)
                    {
                        if(answer != 'OK') 
                        {
                            var user_errors = JSON.parse(answer);
                            var message = "<strong>Ошибка! </strong><ul>";
                            for(var key in user_errors)
                                {
                                    if(user_errors[key] != "OK") message += "<li>"+user_errors[key]+"</li>";
                                }
                            message += "</ul>";
                            
                            $("#err_list").html(message);
                            $("#reg_message").slideDown('500');
                            
                        }
                        else alert('Вы успешно зарегистрировались :-)');
                        
                    },
                    error: function (xhr, ajaxOptions, thrownError) 
                    {
                        alert(xhr.statusText+' '+xhr.responseText+' '+xhr.status+' '+thrownError);
                    }
                });
            }
        else alert(Check_result);
    });
    
    $(".close").click(function()
    {
        $("#reg_message").slideUp('500');
        
    });
});

        
        