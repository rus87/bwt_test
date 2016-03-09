
<script src="js/signup_script.js"></script>
<div id="form" role="form">
    <div class="form-group">
        <label>Имя: 
            <input type="text" id="name" class="form-control" placeholder="Введите имя..." required>         </label>
    </div>
    <div class="form-group">
        <label>Фамилия: 
            <input type="text" id="surname" class="form-control" 
                   placeholder="Введите фамилию..." required>
        </label>
    </div>
    <div class="form-group">
        <label>E-mail: 
            <input type="email" id="email" class="form-control" 
                   placeholder="Введите email..." required>
        </label>
    </div>
    <div class="form-group">
        <label>Дата рождения
            <input type="date" id="birth" class="form-control">
        </label>
    </div>
    <div class="form-group">
        <label>Ваш пол:
        <select class="form-control" id="gender">
            <option>Это секрет</option>
            <option>Муж.</option>
            <option>Жен.</option>
        </select>
        </label>
    </div>
    <button id="send" type="submit" class="btn btn-success">Зарегистрироваться</button>
        
</div>
<div id="reg_message" class="alert alert-warning" role="alert">
    <button class="close" data-dismiss="alert">×</button>
    <div id="err_list"></div>
    </div>