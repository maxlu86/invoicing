export default class AppStorage{

    storeToken(token){
        localStorage.setItem('token', token);
    }

    storeUser(user){
        localStorage.setItem('token', user);
    }

    store(token, user){
        this.storeToken(token)
        this.storeToken(user)
    }

    clear(){
        localStorage.removeItem('token')
        localStorage.removeItem('user')
    }

    getToken(){
        localStorage.getItem('token');
    }

    getUser(){
        localStorage.getItem('user');
    }
}
