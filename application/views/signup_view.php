
<div id="form" role="form">
    <form role="form" method="post" action="signup/add_user">
    <div class="form-group">
        <label>Имя: 
            <input type="text" name="name" id="name" class="form-control" placeholder="Введите имя..." required>         </label>
    </div>
    <div class="form-group">
        <label>Фамилия: 
            <input type="text" name="surname" id="surname" class="form-control" 
                   placeholder="Введите фамилию..." required>
        </label>
    </div>
    <div class="form-group">
        <label>E-mail: 
            <input type="email" name="email" id="email" class="form-control" 
                   placeholder="Введите email..." required>
        </label>
    </div>
    <div class="form-group">
        <label>Дата рождения
            <input type="date" name="birth" id="birth" class="form-control">
        </label>
    </div>
    <div class="form-group">
        <label>Ваш пол:
        <select class="form-control" id="gender" name="gender">
            <option>Это секрет</option>
            <option>Муж.</option>
            <option>Жен.</option>
        </select>
        </label>
    </div>
    <button id="send" type="submit" class="btn btn-success">Зарегистрироваться</button>
</form>        
</div>
