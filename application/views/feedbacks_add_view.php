<div id="add_form">
        <div id="form_fb">
            <form role="form" method="post" action="add">
    <div class="form-group">
        <label>Имя:  
            <input type="text" name="name" id="login" class="form-control" placeholder="Введите имя..." required>
        </label>
    </div>
    <div class="form-group">           
        <label>E-mail:  
            <input type="email" name="email" id="email" class="form-control" placeholder="Введите E-mail..." required>
        </label>
    </div>
    <div class="form-group">
        <label>Отзыв:
            <textarea name="text" id="feedback_text" cols="100" rows="7" class="form-control" placeholder="Введите текст отзыва..." required></textarea>
        </label>
    </div>
    <div class="form-group">
        <img id="captcha" src="../application/third_party/securimage/securimage_show.php" alt="CAPTCHA Image">
         <input type="text" name="cap" size="10" maxlength="6">
<a href="#" onclick="document.getElementById('captcha').src = '../application/third_party/securimage/securimage_show.php?' + Math.random(); return false">[ Different Image ]</a>
    </div>
        <button id="send_feedback" class="btn btn-success">Отправить</button>
    </form>
    </div>
    </div>