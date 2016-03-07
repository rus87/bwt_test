<div id="add_form">
        <div id="form_fb">        
    <div class="form-group">
        <label>Логин:  
            <input type="text" id="login" class="form-control" placeholder="Введите логин..." required>
        </label>
    </div>
    <div class="form-group">           
        <label>E-mail:  
            <input type="email" id="email" class="form-control" placeholder="Введите E-mail..." required>
        </label>
    </div>
    <div class="form-group">
        <label>Отзыв:
            <textarea id="feedback_text" cols="100" rows="7" class="form-control" placeholder="Введите текст отзыва..." required></textarea>
        </label>
    </div>
    <div class="form-group">
        <img id="captcha" src="../securimage/securimage_show.php" alt="CAPTCHA Image">
         <input type="text" id="cap" size="10" maxlength="6">
<a href="#" onclick="document.getElementById('captcha').src = '../securimage/securimage_show.php?' + Math.random(); return false">[ Different Image ]</a>
    </div>
        <button id="send_feedback" class="btn btn-success">Отправить</button>
            
            
    </div>
    </div>