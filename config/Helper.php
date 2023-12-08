<?

namespace config;

class Helper {
    
    public function formNeedAuth(){
        return '<form action="#" method="POST">
                    <input type="text" name="login" id="login" placeholder="Логин">
                    <input type="password" name="password" id="password" placeholder="Пароль">
                    <input type="submit" name="submit" id="submit" value="Войти">
                </form>';
    }
}