import router from "@/router"

export function isUserLogued(){
    const userData = JSON.parse(localStorage.getItem('dataUser'))  
    // let userId

    // if(userData !== null){
    //     userId = userData.id
    // }
    let isLogued = ( userData !== null ) ? true : false
    return isLogued
}

export function saveDataUser(){
    const userData = JSON.parse(localStorage.getItem('dataUser'))  
    if(isUserLogued()){
        return userData
    }
    location.href('/')
}

export function redirectUserLogued(){
    if(isUserLogued()){
        location.href = '/user'
    }else{
        location.href = '/'
    }
}
